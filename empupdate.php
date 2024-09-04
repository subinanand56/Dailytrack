<?php
$server = "localhost";
$username = "uaaqxzmb_dashboard";
$password = "Powerband@2020";
$dbname="uaaqxzmb_dashboard";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'id' parameter exists in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $name = "Updated Name";
    $email = "updated@example.com";
    $branch = "Updated Branch";
    $role = "Updated Role";
    $phone = "Updated Phone";
    $address = "Updated Address";

    $sql = "UPDATE register SET name='$name', email='$email', branch='$branch', role='$role', phone='$phone', address='$address' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Successfully Updated');window.location.href='emp-table.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid user ID";
}

mysqli_close($conn);
?>
