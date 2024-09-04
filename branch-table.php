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

    <style>
        /* CSS to change text color in tbody to black */
        table#example tbody {
            color: black;
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
                                <h4 class="card-title">Branch Data</h4>
                            </div>
                            <div class="card-body">
                                <label for="rows">Show</label>
                                

                                <div class="table-responsive" style="padding-top:30px;">
                                    <?php

                                    include "dbcon.php";


                                    $query = "SELECT `name`,`id` FROM `branch` ";
                                    $result = mysqli_query($conn, $query);
                                    ?>
                                    <table id="example" class="display" style="min-width: 845px;color:black;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Action</th>
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
                                                            <?php echo $data['name']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="branchdelete.php?id=<?php echo $data['id']; ?>"><button
                                                                    class="btn btn-danger">Delete</button></a>

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

    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>


    <!-- Include this script at the end of your HTML body -->
    <script>
        // Function to update the table based on the selected number of rows
        function updateTable() {
            // Get the selected value from the dropdown
            var selectedRows = document.getElementById("rows").value;

            // Get the table and its rows
            var table = document.getElementById("example");
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



    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>


</body>

</html>