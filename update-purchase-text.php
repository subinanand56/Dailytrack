<?php
include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['purchase_id1']) && isset($_POST['text1'])) {
        $purchaseId = $_POST['purchase_id1'];
        $text = $_POST['text1'];
        
        $query = "UPDATE purchase SET text = '$text' WHERE id = $purchaseId";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script type='text/javascript'>alert('Response added'); window.location.href='mang-purchase-accept.php';</script>";
        } else {
            echo "Failed to update, try again";
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Invalid parameters."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>