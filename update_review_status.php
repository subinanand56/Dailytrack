<?php

if(isset($_GET['id'])) {
    include "dbcon.php";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL to update the review status
    $id = $_GET['id'];
    $sql = "UPDATE expense SET review = 1 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the previous page after the update
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No ID received for update.";
}
?>
