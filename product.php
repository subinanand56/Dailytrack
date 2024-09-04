<?php
$server = "localhost";
$username = "uaaqxzmb_dashboard";
$password = "Powerband@2020";
$dbname="uaaqxzmb_dashboard";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {


    if (!empty($_POST['name']) ) {
        $name = $_POST['name'];


        $qry = "INSERT INTO `product`( `name`) VALUES ('$name')";
        $run = mysqli_query($conn, $qry);

        if ($run) {
            echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='add-product-form.php';</script>";
        } else {
            echo "Form not submited,try again";
        }
    }
}
?>