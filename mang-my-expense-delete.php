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

    // Check if the 'review' parameter is set to '1'
    if (isset($_GET['review']) && $_GET['review'] == '1') {
        $sql = "UPDATE expense SET review = '1' WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('Manager has reviewed the expense');window.location.href='mang-my-expense.php';</script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Check the 'review' status before deletion
        $check_review_sql = "SELECT review FROM expense WHERE id = $id";
        $result = mysqli_query($conn, $check_review_sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $review_status = $row['review'];

            if ($review_status == '0') {
                // Delete record if review status is '0'
                $delete_sql = "DELETE FROM expense WHERE id = $id";
                if (mysqli_query($conn, $delete_sql)) {
                    echo "<script type='text/javascript'>alert('Successfully Deleted');window.location.href='mang-my-expense.php';</script>";
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            } else {
                echo "<script type='text/javascript'>alert('Manager reviewed');window.location.href='mang-my-expense.php';</script>";
            }
        } else {
            echo "Error fetching review status: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid user ID";
}

mysqli_close($conn);
?>