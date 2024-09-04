<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['fromDate']) && isset($_POST['toDate'])) {
  $fromDate = $_POST['fromDate'];
  $toDate = $_POST['toDate'];

  $totalSalesQuery = "SELECT SUM(price) AS total_amount FROM sales WHERE DATE(date) BETWEEN '$fromDate' AND '$toDate'";
  $resultSales = mysqli_query($conn, $totalSalesQuery);
  $rowSales = mysqli_fetch_assoc($resultSales);

  if ($rowSales['total_amount']) {
    echo $rowSales['total_amount'];
  } else {
    echo "0";
  }
}
?>
