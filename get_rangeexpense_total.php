<?php
include "dbcon.php";

$branch = $_GET['branch'];
$startDate = $_GET['start_date'];
$endDate = $_GET['end_date'];

$sql = "";

if ($branch === 'All') {
    $sql = "SELECT SUM(price) AS total_expense FROM expense WHERE date BETWEEN '$startDate' AND '$endDate'";
} else {
    $sql = "SELECT SUM(price) AS total_expense FROM expense WHERE branch = '$branch' AND date BETWEEN '$startDate' AND '$endDate'";
}

$result = $conn->query($sql);

if ($result === false) {
    // Error handling - display or log the error message
    echo "Error: " . $conn->error;
} else {
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['total_expense']?? "0";
    } else {
        echo "No results found";
    }
}

// Close the database connection
$conn->close();
?>
