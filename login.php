<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM `register` WHERE `email`='$email' AND `password`='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            // Generating different tokens based on user roles
            $adminToken = hash('sha256', uniqid() . 'Admin');
            $employeeToken = hash('sha256', uniqid() . 'employee');
            $managerToken = hash('sha256', uniqid() . 'Manager');

            // Store tokens in the respective session variables based on the user role
            if ($row['role'] === 'Admin') {
                $_SESSION['role'] = $row['role'];
                $_SESSION['branch'] = $row['branch'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['token'] = $adminToken; // Admin token
                header("Location: index11.php"); // Redirect to admin dashboard
            } else if ($row['role'] === 'employee') {
                $_SESSION['role'] = $row['role'];
                $_SESSION['branch'] = $row['branch'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['token'] = $employeeToken; // Employee token
                header("Location: employeedashboard.php"); // Redirect to employee dashboard
            } else if ($row['role'] === 'Manager') {
                $_SESSION['role'] = $row['role'];
                $_SESSION['branch'] = $row['branch'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['token'] = $managerToken; // Manager token
                header("Location: managerdashboard.php"); // Redirect to manager dashboard
            } else {
                header("Location: index.php?error=Role not specified"); // Redirect to an error page if role is not specified
            }
            exit();
        } else {
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
