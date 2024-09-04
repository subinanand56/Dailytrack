<?php
session_start();
$role = $_SESSION['role'] ?? '';
echo "<script>console.log('Role:', '" . $role . "');</script>";
if ($role !== 'Admin' || !isset($_SESSION['token'])) {
  echo "<script type='text/javascript'>window.location.href='index.php';</script>";
  exit();
}
?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        /* CSS to change text color in tbody to black */
        table#example tbody {
            color: black;
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

        .dataTables_wrapper option[value="10"],
        option[value="25"],
        option[value="50"] {
            display: none !important;
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
                        <a class="" href="index11.php" aria-expanded="false"><span class="nav-text">Dashboard</span></a>

                    </li>
                    <li class="nav-label">Add</li>
                    <li>
                        <a class="" href="add-sale-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Sale</span></a>

                    </li>
                    <li>
                        <a class="" href="add-expense-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Expense</span></a>

                    </li>
                    <li>
                        <a class="" href="add-purchse-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Purchase</span></a>

                    </li>
                    <li>
                        <a class="" href="add-emp-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Employee</span></a>

                    </li>
                    <li>
                        <a class="" href="add-branch-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Branch</span></a>

                    </li>
                    <li>
                        <a class="" href="add-product-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Product</span></a>

                    </li>
                    <li>
                        <a class="" href="add-exp-cat-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Expense Category</span></a>

                    </li>

                    <li class="nav-label">View</li>
                    <li>
                        <a class="" href="sales-table-form.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Sales</span></a>

                    </li>
                    <li>
                        <a class="" href="expense-table.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Expense</span></a>

                    </li>
                    <li>
                        <a class="" href="purchase-table.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Purchase</span></a>

                    </li>
                    <li>
                        <a class="" href="emp-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                                class="nav-text">Employee</span></a>
                    </li>
                    <li>
                        <a class="" href="product-table.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Product</span></a>
                    </li>
                    <li>
                        <a class="" href="branch-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                                class="nav-text">Branch</span></a>
                    </li>
                    <li>
                        <a class="" href="expensecat-table.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Expense Category</span></a>
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
                                    <div class="col-md-6">
                                        <label for="filter-category">Filter by Catagory:</label>
                                        <?php
                                        include "dbcon.php";

                                        $sql = "SELECT name FROM expensecat";
                                        $result = $conn->query($sql);

                                        ?>

                                        <select class="form-control" id="filter-category">
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
                                
                                
                                <div class="row mb-3">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <a href="expense-table.php"><button class="btn btn-dark"
                                                style="font-size: 25px;"><i class='bi bi-plus'></i></button></a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function () {
            $('.dataTables_wrapper select').val('100');
        });
    </script>

    <script>

        $(document).ready(function () {
            function updateTableData(branch, startDate, endDate, category) {
                $.ajax({
                    method: 'POST',
                    url: 'fetch_expensedata2.php',
                    data: {
                        branch: branch,
                        start_date: startDate,
                        end_date: endDate,
                        category: category,
                    },
                    success: function (response) {                      
                        var expenseTableBody = $('#example tbody');
                        var totalSumCell = $('#total-sum');
                        var data = JSON.parse(response);
                        console.log(data);

                        if (Object.keys(data).length > 0) {

                            var totalPrice = 0;
                            var rowsHtml = '';
                            $.each(data, function (index, item) {
                                var row = '<tr>' +
                                    '<td>' + (item.branch ? item.branch : '') + '</td>' +
                                    '<td>' + (item.Ename ? item.Ename : '') + '</td>' +
                                    '<td>' + (item.price ? item.price : '') + '</td>' +
                                    '<td>' + (item.item ? item.item : '') + '</td>' +
                                    '<td>' + (item.date ? item.date : '') + '</td>' +
                                    '</tr>';
                                rowsHtml += row;
                                if (item.price) {
                                    totalPrice += parseFloat(item.price);
                                }
                            });
                            expenseTableBody.html(rowsHtml);
                            console.log(rowsHtml);
                            totalSumCell.html(totalPrice.toFixed(2));
                            console.log(totalPrice.toFixed(2));
                        } else {
                            expenseTableBody.html('<tr><td colspan="5">No data found</td></tr>');
                            totalSumCell.html('0');
                        }


                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }



            $('#filter-category').change(function () {
                var selectedBranch = $('#filter-branch').val();
                var selectedStartDate = $('#start-date').val();
                var selectedEndDate = $('#end-date').val();
                var selectedCategory = $(this).val();
                updateTableData(selectedBranch, selectedStartDate, selectedEndDate, selectedCategory);
            });


            // Event handler for branch selection change
            $('#filter-branch').change(function () {
                var selectedBranch = $(this).val();
                var selectedStartDate = $('#start-date').val();
                var selectedEndDate = $('#end-date').val();
                var selectedCategory = $('#filter-category').val();
                updateTableData(selectedBranch, selectedStartDate, selectedEndDate, selectedCategory);
            });

            // Event handler for date range changes
            $('.datepicker').on('changeDate', function () {
                var selectedBranch = $('#filter-branch').val();
                var selectedStartDate = $('#start-date').val();
                var selectedEndDate = $('#end-date').val();
                var selectedCategory = $('#filter-category').val();
                updateTableData(selectedBranch, selectedStartDate, selectedEndDate, selectedCategory);
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