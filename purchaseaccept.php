<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE `purchase` SET `accepted` = 'Accepted' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Successfully updated');window.location.href='mang-purchase-accept.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID";
}

mysqli_close($conn);
?>
