<?php
// Include your database connection file
include "dbcon.php";

// Fetch parameters from the GET request
$branch = $_GET['branch'];
$startDate = $_GET['start_date'];
$endDate = $_GET['end_date'];
$acceptedValue = "accepted"; // Change this to the value you're filtering by

// Initialize SQL query string
$sql = "";

if ($branch === 'All') {
    // SQL query to get the sum of prices for all branches within the date range where accepted = $acceptedValue
    $sql = "SELECT SUM(price) AS total_purchase FROM purchase WHERE date BETWEEN '$startDate' AND '$endDate' AND accepted = '$acceptedValue'";
} else {
    // SQL query to get the sum of prices for a specific branch within the date range where accepted = $acceptedValue
    $sql = "SELECT SUM(price) AS total_purchase FROM purchase WHERE branch = '$branch' AND date BETWEEN '$startDate' AND '$endDate' AND accepted = 'accepted'";
}

// Execute SQL query
$result = $conn->query($sql);

if ($result === false) {
    // Error handling - display or log the error message
    echo "Error: " . $conn->error;
} else {
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Output the total purchase sum or 'No results found' if no data is found
        echo $row['total_purchase'] ?? "0";
    } else {
        echo "No results found";
    }
}

// Close the database connection
$conn->close();
?>
