<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' parameter exists in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete a record based on the received ID
    $sql = "DELETE FROM register WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Successfully Deleted');window.location.href='emp-table.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID";
}

mysqli_close($conn);
?>
