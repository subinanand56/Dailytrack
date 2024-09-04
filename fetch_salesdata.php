<?php

include "dbcon.php";

$branch = $_POST['branch'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];

$recordsPerPage = isset($_POST['records_per_page']) ? $_POST['records_per_page'] : 100;
$query = "SELECT branch, name, price, quantity, unit, date ,Ename FROM sales WHERE 1";

if ($branch !== 'All') {
    $query .= " AND branch = '$branch'";
}

$query .= " AND date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC LIMIT $recordsPerPage";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $sumPrice = 0; // Variable to hold the total sum of prices

    while ($data = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $data['branch'] . '</td>
                <td>' . $data['Ename'] . '</td>
                <td>' . $data['name'] . '</td>
                <td>' . $data['price'] . '</td>
                <td>' . $data['quantity'] . '</td>
                <td>' . $data['unit'] . '</td>
                <td>' . $data['date'] . '</td>
              </tr>';

        $sumPrice += floatval($data['price']); 
    }

    // Display the total sum at the end of the table
    echo '<tr>
            <td colspan="2"><strong>Total:</strong></td>
            <td><strong style="color:red;font-size: 18px;">' . $sumPrice . '</strong></td>
            <td colspan="3"></td>
          </tr>';
} else {
    echo '<tr><td colspan="6">No data found</td></tr>';
}
?>
