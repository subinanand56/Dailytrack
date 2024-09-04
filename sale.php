<?php
session_start();
include "dbcon.php";

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


    $qry = "INSERT INTO `sales`( `branch`, `name`, `price`, `date`, `quantity`, `unit`,`Ename`) VALUES ('$branch','$product','$amount','$date','$quantity','$unit','$Ename')";
    $run = mysqli_query($conn, $qry);

    if ($run) {
      echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='add-sale-form.php';</script>";
    } else {
      echo "Form not submited,try again";
    }
  }
}


$currentMonth = date('m'); 
$currentYear = date('Y'); 

$totalAmountQuery = "SELECT SUM(price) AS total_amount FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear'";
$result = mysqli_query($conn, $totalAmountQuery);
$row = mysqli_fetch_assoc($result);

if ($row['total_amount']) {
  $totalAmount = $row['total_amount'];
  echo "Total amount for the current month is: $totalAmount";
} else {
  echo "No sales found for the current month";
}
?>