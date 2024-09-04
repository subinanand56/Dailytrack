<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['update'])) {
    if (!empty($_POST['expense_id']) && !empty($_POST['amount']) && !empty($_POST['item']) && !empty($_POST['date'])) {
        $expense_id = $_POST['expense_id'];
        $amount = $_POST['amount'];
        $item = $_POST['item'];
        $date = $_POST['date'];

        $qry = "UPDATE `expense` SET `price`='$amount', `item`='$item', `date`='$date' WHERE `id`='$expense_id'";
        $run = mysqli_query($conn, $qry);

        if ($run) {
            echo "<script type='text/javascript'>alert('Expense Updated Successfully'); window.location.href='mang-expense.php';</script>";
        } else {
            echo "Failed to update expense, try again";
        }
    }
}
?>
