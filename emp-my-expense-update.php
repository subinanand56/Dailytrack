<?php
session_start();
include 'dbcon.php';
$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['update'])) {
    if (!empty($_POST['expense_id']) && !empty($_POST['amount']) && !empty($_POST['item']) && !empty($_POST['date'])&& !empty($_POST['text'])) {
        $expense_id = $_POST['expense_id'];
        
        $amount = $_POST['amount'];
        $item = $_POST['item'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $Eid = $_SESSION['id'];

        $check_review_sql = "SELECT review FROM expense WHERE id = $expense_id";
        $result = mysqli_query($conn, $check_review_sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $review_status = $row['review'];

            if ($review_status == '0') {
                // Update expense details if review status is '0'
                $qry = "UPDATE `expense` SET `price`='$amount', `item`='$item', `date`='$date', `Eid`='$Eid',`text`='$text' WHERE `id`='$expense_id'";
                $run = mysqli_query($conn, $qry);

                if ($run) {
                    echo "<script type='text/javascript'>alert('Expense Updated Successfully'); window.location.href='emp-my-expense.php';</script>";
                } else {
                    echo "Failed to update expense, try again";
                }
            } else {
                echo "<script type='text/javascript'>alert('Expense cannot be updated as it has been reviewed by the manager'); window.location.href='emp-my-expense.php';</script>";
            }
        } else {
            echo "Error fetching review status: " . mysqli_error($conn);
        }
    }
}
?>
