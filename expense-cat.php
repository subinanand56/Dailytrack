<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname="dashboard";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {


    if (!empty($_POST['name']) ) {
        $name = $_POST['name'];


        $qry = "INSERT INTO `expensecat`( `name`) VALUES ('$name')";
        $run = mysqli_query($conn, $qry);

        if ($run) {
            echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='add-exp-cat-form.php';</script>";
        } else {
            echo "Form not submited,try again";
        }
    }
}
?>