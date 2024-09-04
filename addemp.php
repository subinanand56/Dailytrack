<?php
$server = "localhost";
$username = "uaaqxzmb_dashboard";
$password = "Powerband@2020";
$dbname="uaaqxzmb_dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {

    if (!empty($_POST['branch']) && !empty($_POST['name']) && !empty($_POST['role']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
        $branch = $_POST['branch'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
       
       
        $qry= "INSERT INTO `register`(`name`, `email`, `branch`, `role`, `password`, `phone`, `address`) VALUES ('$name','$email','$branch','$role','$password','$phone','$address')";
        $run = mysqli_query($conn, $qry);

        if ($run) {
            echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='add-emp-form.php';</script>";
        } else {
            echo "Form not submited,try again";
        }
    }
}
?>