<?php
include "dbcon.php";

$branchFilter = $_POST['branch'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];
$recordsPerPage = isset($_POST['records_per_page']);

$sql = "SELECT branch, price, item, id, date, review, Ename FROM expense WHERE 1=1";

if ($branchFilter != 'All') {
    $sql .= " AND branch = '$branchFilter'";
}

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND date BETWEEN '$startDate' AND '$endDate'";
}

$sql .= " ORDER BY date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $totalPrice = 0;
    while ($row = $result->fetch_assoc()) {
        $totalPrice += $row['price'];
        $data[] = $row;
    }
    echo json_encode($data);
    $data['totalPrice'] = $totalPrice;
} else {
    echo json_encode([]);
}
?>