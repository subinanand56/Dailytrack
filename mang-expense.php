<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Newsvariety</title>

    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        /* CSS to change text color in tbody to black */
        table#example tbody {
            color: black;
        }

        .dataTables_wrapper option[value="10"],
        option[value="25"],
        option[value="50"] {
            display: none !important;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            background-color: #fff;
            padding: 10px;
            margin: 20%;
            border-radius: 5px;
        }

        .form-control {
            color: black;
            border-color: black;
        }
    </style>

</head>

<body>

    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-content">
            <div id="updateForm" style="display: none;">
                <form action="mng-allexpense-update.php" method="POST">

                    <input class="form-control" type="hidden" name="expense_id" id="expense_id">
                    <label style="color:black;">Amount*</label>
                    <input class="form-control" type="text" name="amount" id="amount" placeholder="Amount"></br>
                    <label style="color:black;">Expense Item*</label>
                    <input class="form-control" type="text" name="item" id="item" placeholder="Item" readonly></br>
                    <label style="color:black;">Date*</label>
                    <input class="form-control" type="text" name="date" id="date" placeholder="Date"></br>
                    <div style="align-item: center; ">
                        <input class="btn btn-success" type="submit" name="update" value="Update ">
                        <button class="btn btn-danger" type="button" onclick="closeUpdateForm()">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left"></div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                            <a style="color: black; font-weight: bold; font-size: 18px;">
                                    <?php
                                    
                                    if (isset($_SESSION['name'])) {
                                        echo $_SESSION['name'];
                                    } else {

                                        echo 'Guest';
                                    }
                                    ?>
                                </a>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./index.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a class="" href="managerdashboard.php" aria-expanded="false"><span
                                class="nav-text">Dashboard</span></a>

                    </li>
                    <li class="nav-label">Add</li>
                    <li>
                        <a class="" href="mng-add-sale.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Sale </span></a>

                    </li>

                    <li>
                        <a class="" href="mng-expense-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Expense</span></a>

                    </li>
                    <li>
                        <a class="" href="mng-purchase-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Purchase</span></a>

                    </li>
                    <li>
                        <a class="" href="mang-purchase-accept.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Purchase request</span></a>
                    </li>
                    <li>
                        <a class="" href="mang-sales.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                                class="nav-text">Sales</span></a>
                    </li>
                    <li>
                        <a class="" href="mang-expense.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Expense</span></a>
                    </li>
                    <li>
                        <a class="" href="mang-my-expense.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">My Expense</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Expense Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="filter-branch">Filter by Branch:</label>
                                        <?php
                                        include "dbcon.php";

                                        $sql = "SELECT name FROM branch";
                                        $result = $conn->query($sql);

                                        ?>

                                        <select class="form-control" id="filter-branch">
                                            <option value="All">All</option>


                                            <?php
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                            }
                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="start-date">From:</label>
                                        <input type="text" class="form-control datepicker" id="start-date"
                                            name="start-date">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end-date">To:</label>
                                        <input type="text" class="form-control datepicker" id="end-date"
                                            name="end-date">
                                    </div>
                                </div>


                                <div class="table-responsive" style="padding-top:30px;">
                                    <?php

                                    include "dbcon.php";
                                    $query = "SELECT branch, price, item,id, date ,review,Ename  FROM expense ORDER BY date DESC ";
                                    $result = mysqli_query($conn, $query);
                                    ?>
                                    <table id="example" class="display" style="min-width: 845px;color:black;">
                                        <thead>
                                            <tr>
                                                <th>Branch name</th>
                                                <th>Employee name</th>
                                                <th>Amount </th>
                                                <th>Item</th>
                                                <th>date</th>
                                                <th>Status</th>
                                                <th>Review</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                $sn = 1;
                                                while ($data = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $data['branch']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['Ename']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['price']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $data['item']; ?>
                                                        </td>


                                                        <td>
                                                            <?php echo $data['date']; ?>
                                                        </td>



                                                        <td>
                                                            <?php
                                                            $reviewStatus = $data['review'];
                                                            $text = ($reviewStatus == 1) ? 'Reviewed' : 'Not Reviewed';
                                                            $color = ($reviewStatus == 1) ? 'red' : 'green';

                                                            echo "<span style='color: $color;'>$text</span>";

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <a href="update_review_status.php?id=<?php echo $data['id']; ?>"><button
                                                                    class="btn " style="color:green; font-size: 16px; "><i
                                                                        class='fas fa-check'></i></button></a>
                                                        </td>
                                                        <td>
                                                            <button class="btn " style="color:black; font-size: 16px; "
                                                                onclick="openUpdateForm(<?php echo $data['id']; ?>)"><i
                                                                    class="fas fa-pencil-alt"></i></button>
                                                        </td>
                                                        <td>
                                                            <a href="mang-allexpense-delete.php?id=<?php echo $data['id']; ?>"><button
                                                                    class="btn " style="color:red; font-size: 16px; "><i
                                                                        class="fas fa-trash-alt"></i></button></a>
                                                        </td>

                                                    </tr>


                                                    <?php
                                                    $sn++;
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="8">No data found</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"><strong>Total:</strong></td>
                                                <td><strong style="color:red;font-size: 18px;" id="total-sum"></strong>
                                                </td>

                                            </tr>
                                        </tfoot>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>
                    Copyright © newsvariety; Developed by <a href="https://www.lestora.com/" target="_blank">Lestora</a>
                    2024
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <script>
        // Function to update the table based on the selected number of rows
        function updateTable() {
            // Get the selected value from the dropdown
            var selectedRows = document.getElementById("rows").value;

            // Get the table and its rows
            var table = document.getElementById("the");
            var rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

            // Hide all rows
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = "none";
            }

            // Display the selected number of rows
            for (var i = 0; i < selectedRows; i++) {
                if (rows[i]) {
                    rows[i].style.display = "";
                }
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.dataTables_wrapper select').val('100');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.review-checkbox').on('change', function () {
                var expenseID = $(this).data('expense-id');
                var isChecked = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    type: 'POST',
                    url: 'update_review_status.php',
                    data: {
                        expenseID: expenseID,
                        isChecked: isChecked
                    },
                    success: function (response) {
                        console.log('Review status updated successfully.');
                    },
                    error: function (error) {
                        console.error('Error updating review status:', error);
                    }
                });
            });
        });
    </script>






    <script>
        // JavaScript function to open update form with selected expense details
        function openUpdateForm(expenseId) {
            fetchExpenseDetails(expenseId)
                .then(data => {
                    // Populate form fields with fetched data
                    document.getElementById('expense_id').value = data.id;

                    document.getElementById('amount').value = data.price;
                    document.getElementById('item').value = data.item;
                    document.getElementById('date').value = data.date;

                    // Show the modal overlay
                    document.getElementById('modalOverlay').style.display = 'flex';
                    document.getElementById('updateForm').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching expense details:', error);
                });
        }

        function closeUpdateForm() {
            document.getElementById('modalOverlay').style.display = 'none';
        }
        // Define the function to fetch expense details using AJAX
        function fetchExpenseDetails(expenseId) {
            return new Promise((resolve, reject) => {
                // Perform an AJAX request to fetch expense details based on the expenseId
                fetch('get-empmyexpense-details.php?id=' + expenseId)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Assuming the server returns JSON data
                    })
                    .then(data => {
                        // Resolve the promise with fetched data
                        resolve(data);
                    })
                    .catch(error => {
                        // Reject the promise with the error message
                        reject(error);
                    });
            });
        }


    </script>


    <script>

        $(document).ready(function () {
            function updateTableData(branch, startDate, endDate) {
                $.ajax({
                    method: 'POST',
                    url: 'fetch_expensedata2.php',
                    data: {
                        branch: branch,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function (response) {

                        var expenseTableBody = $('#example tbody');
                        var totalSumCell = $('#total-sum');
                        var data = JSON.parse(response);
                        console.log(data);
                        if (data.length > 0) {
                            var rowsHtml = '';
                            var totalPrice = 0;
                            data.forEach(function (item) {
                                var reviewStatus = item.review === '1' ? 'Reviewed' : 'Not Reviewed';
                                var reviewColor = reviewStatus === 'Reviewed' ? 'green' : 'red';
                                var row = '<tr>' +
                                    '<td>' + item.branch + '</td>' +
                                    '<td>' + item.Ename + '</td>' +
                                    '<td>' + item.price + '</td>' +
                                    '<td>' + item.item + '</td>' +
                                    '<td>' + item.date + '</td>' +
                                    '<td style="color: ' + reviewColor + ';">' + reviewStatus + '</td>';


                                if (reviewStatus === 'Reviewed') {
                                    row += '<td></td>';
                                } else {
                                    row += '<td><a href="update_review_status.php?id=' + item.id + '"><button class="btn" style="color: green; font-size: 16px;"><i class="fas fa-check"></i></button></a></td>';
                                }

                                row += '<td><button class="btn" style="color: black; font-size: 16px;" onclick="openUpdateForm(' + item.id + ')"><i class="fas fa-pencil-alt"></i></button></td>' +
                                    '<td><a href="mang-allexpense-delete.php?id=' + item.id + '"><button class="btn" style="color: red; font-size: 16px;"><i class="fas fa-trash-alt"></i></button></a></td>' +
                                    '</tr>';

                                rowsHtml += row;
                                totalPrice += parseFloat(item.price);
                            });


                            expenseTableBody.html(rowsHtml);
                            totalSumCell.html(totalPrice.toFixed(2));

                            console.log('Total Sum: ' + totalPrice.toFixed(2));
                        } else {
                            expenseTableBody.html('<tr><td colspan="7">No data found</td></tr>');
                            totalSumCell.html('0');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }


            // Event handler for branch selection change
            $('#filter-branch').change(function () {
                var selectedBranch = $(this).val();
                var selectedStartDate = $('#start-date').val();
                var selectedEndDate = $('#end-date').val();
                updateTableData(selectedBranch, selectedStartDate, selectedEndDate);
            });

            // Event handler for date range changes
            $('.datepicker').on('changeDate', function () {
                var selectedBranch = $('#filter-branch').val();
                var selectedStartDate = $('#start-date').val();
                var selectedEndDate = $('#end-date').val();
                updateTableData(selectedBranch, selectedStartDate, selectedEndDate);
            });

            // Set default date range to one month
            var startDate = new Date();
            var endDate = new Date();
            startDate.setMonth(startDate.getMonth() - 1);

            // Initialize datepicker for start-date and end-date inputs
            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });

            // Set default date range values in datepicker inputs
            $('#start-date').datepicker('setDate', startDate);
            $('#end-date').datepicker('setDate', endDate);

            var defaultBranch = 'All'; // Default branch value
            updateTableData(defaultBranch, $('#start-date').val(), $('#end-date').val());
        });

    </script>


    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>