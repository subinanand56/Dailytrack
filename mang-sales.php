<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Newsvariety</title>

    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="path/to/simple-datatables.js"></script>

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


        .form-control {
            color: black;
            border-color: black;
        }
    </style>

</head>

<body>

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
                                    session_start();
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
                                <h4 class="card-title">Sales Data</h4>
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

                                <div style="color:black;" id="totalSum"></div>



                                <div class="table-responsive" style="padding-top:30px;">
                                    <?php

                                    include "dbcon.php";

                                    $query = "SELECT  `branch`, `Ename`, `name`, `price`, `date`, `quantity`, `unit` FROM `sales`";
                                    $result = mysqli_query($conn, $query);
                                    $sumAmount = 0;
                                    ?>
                                    <table id="example" class="display" style="min-width: 845px;color:black;">
                                        <thead>
                                            <tr>
                                                <th>Branch name</th>
                                                <th>Employee name</th>
                                                <th>Product name </th>
                                                <th>Amount </th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                $sn = 1;
                                                while ($data = mysqli_fetch_assoc($result)) {
                                                    $sumAmount += $data['price'];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $data['branch']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['Ename']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['price']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['quantity']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['unit']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['date']; ?>
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


    <script>
        $(document).ready(function () {
            $('.dataTables_wrapper select').val('100');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Event listener for the rows dropdown
            document.getElementById('rows').addEventListener('change', function () {
                updateTable();
            });

            // Function to update the table based on the selected number of rows
            function updateTable() {
                // Get the selected value from the dropdown
                var selectedRows = document.getElementById('rows').value;

                // Get the table and its rows
                var table = document.getElementById('the');
                var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

                // Hide all rows
                for (var i = 0; i < rows.length; i++) {
                    rows[i].style.display = 'none';
                }

                // Display the selected number of rows
                for (var i = 0; i < selectedRows; i++) {
                    if (rows[i]) {
                        rows[i].style.display = '';
                    }
                }
            }
        });
    </script>


    <script>
        $(document).ready(function () {

            function updateTableData(branch, startDate, endDate) {
                $.ajax({
                    method: 'POST',
                    url: 'fetch_salesdata.php',
                    data: {
                        branch: branch,
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function (response) {
                        $('#tableBody').html(response);
                        var data = JSON.parse(response);
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

    <!-- Other HTML code remains unchanged -->






    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>