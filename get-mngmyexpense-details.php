<?php
include "dbcon.php";

if (isset($_GET['id'])) {
    $expense1_id = $_GET['id'];
    echo "Received ID: " . $expense1_Id;
    $query = "SELECT price, item, date FROM expense WHERE id = '$expense1_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $expense_data = mysqli_fetch_assoc($result);
        echo json_encode($expense_data);
    } else {
        echo json_encode(['error' => 'Expense not found']);
    }
    var_dump($fetchedExpenseData);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
