<?php
include "dbcon.php"; 

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $expenseId = $_GET['id'];
    $query = "SELECT price, item, date, id,text FROM expense WHERE id = '$expenseId'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $expenseData = mysqli_fetch_assoc($result);
        // Return fetched data as JSON response
        header('Content-Type: application/json');
        echo json_encode($expenseData);
        exit();
    } else {
        echo json_encode(array('error' => 'Expense not found')); // Return an error if expense not found
        exit();
    }
} else {
    echo json_encode(array('error' => 'Invalid request')); // Return an error for invalid request
    exit();
}
?>
