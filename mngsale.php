<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {


  if (!empty($_POST['branch']) && !empty($_POST['amount']) && !empty($_POST['product']) && !empty($_POST['date']) && !empty($_POST['quantity']) && !empty($_POST['unit'])) {
    $branch = $_POST['branch'];
    $amount = $_POST['amount'];
    $product = $_POST['product'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $Ename = $_SESSION['name'];


    $qry = "INSERT INTO `sales`( `branch`, `name`, `price`, `date`, `quantity`, `unit`, `Ename`) VALUES ('$branch','$product','$amount','$date','$quantity','$unit','$Ename')";
    $run = mysqli_query($conn, $qry);

    if ($run) {
      echo "<script type='text/javascript'>window.location.href='mng-add-sale.php';</script>";
    } else {
      echo "Form not submited,try again";
    }
  }
}
?>