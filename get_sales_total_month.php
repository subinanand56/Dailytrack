<?php
include "dbcon.php";

if (isset($_GET['branch'])) {
    $selectedBranch = $_GET['branch'];
    $currentMonth = date('m'); 
    $currentYear = date('Y'); 

    if ($selectedBranch === 'All') {
        // Fetch total sum of 'price' column for the current month for all branches
        $sql = "SELECT SUM(price) AS total_amount FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear'";
    } else {
        // Fetch total sum of 'price' column for the current month for the selected branch
        $sql = "SELECT SUM(price) AS total_amount FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear' AND branch = '$selectedBranch'";
    }

    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        echo $row['total_amount'] ? $row['total_amount'] : '0'; // Return total amount or '0' if no data found
    } else {
        echo '0'; // Return '0' if query execution fails
    }
} else {
    echo 'Invalid request'; // Return error for invalid request
}
?>