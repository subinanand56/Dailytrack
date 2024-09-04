<?php
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['purchase_id']) && isset($_POST['text'])) {
        $purchaseId = $_POST['purchase_id'];
        $text = $_POST['text'];

        $query = "UPDATE purchase SET `accepted` = 'Rejected', reason = '$text' WHERE id = $purchaseId";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script type='text/javascript'>alert('Response added'); window.location.href='mang-purchase-accept.php';</script>";
        } else {
            echo "Failed to update expense, try again";
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Invalid parameters."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
