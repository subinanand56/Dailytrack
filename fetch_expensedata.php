<?php
include "dbcon.php";
$branchFilter = $_POST['branch'];
$categoryFilter = $_POST['category'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];

$sql = "SELECT branch, SUM(price) AS total_price, item, id, DATE(date) AS expense_date, review, Ename 
        FROM expense 
        WHERE 1=1";

if ($branchFilter != 'All') {
    $sql .= " AND branch = '$branchFilter'";
}

if ($categoryFilter != 'All') {
    $sql .= " AND item = '$categoryFilter'";
}

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND date BETWEEN '$startDate' AND '$endDate'";
}

$sql .= " GROUP BY item, DATE(date) ORDER BY date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    $totalPrice = 0;

    while ($row = $result->fetch_assoc()) {
        $totalPrice += $row['total_price'];
        $data[] = $row;
    }

    $data['totalPrice'] = $totalPrice;
    echo json_encode($data);
} else {
    echo json_encode([]);
}
?>
