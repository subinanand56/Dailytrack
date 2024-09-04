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

    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        /* CSS to change text color in tbody to black */
        table#example tbody {
            color: black;
        }

        .dataTables_wrapper select option:nth-child(2) {
            display: none;
        }

        .dataTables_wrapper select option:nth-child(3) {
            display: none;
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
                        <a class="" href="employeedashboard.php" aria-expanded="false"><span
                                class="nav-text">Dashboard</span></a>

                    </li>
                    <li class="nav-label">Add</li>
                    <li>
                        <a class="" href="emp-sale-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Sale</span></a>

                    </li>
                    <li>
                        <a class="" href="emp-expense-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Expense</span></a>

                    </li>
                    <li>
                        <a class="" href="emp-purchase-form.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Add Purchase request</span></a>
                    </li>
                    <li>
                        <a class="" href="emp-request-status.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Request Status</span></a>
                    </li>
                    <li>
                        <a class="" href="emp-my-expense.php" aria-expanded="false"><i
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
                                <h4 class="card-title">Purchase Request</h4>
                            </div>
                            <div class="card-body">
                                <div id="total-amount" style="margin-top: 10px; font-size: 18px; color: black;"></div>


                                <div class="table-responsive">
                                    <?php
                                    include "dbcon.php";
                                    $ide = $_SESSION['id'];
                                    $query = "SELECT branch, productName, companyName, price ,accepted ,text,reason  FROM purchase WHERE Eid='$ide' ORDER BY date DESC ";
                                    $result = mysqli_query($conn, $query);
                                    ?>
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Branch</th>
                                                <th>Product Name </th>
                                                <th>Company Name</th>
                                                <th>price</th>
                                                <th>accepted</th>
                                                <th>Comment</th>
                                                <th>Reason</th>

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
                                                            <?php echo $data['productName']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $data['companyName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['price']; ?>
                                                        </td>

                                                        <!-- <td>
                                                            <?php echo $data['accepted']; ?>
                                                        </td> -->
                                                        <td>
                                                            <?php
                                                            $status = $data['accepted'];
                                                            $color = '';

                                                            if ($status == 'Pending') {
                                                                $color = 'yellow'; 
                                                            } elseif ($status == 'Rejected') {
                                                                $color = 'red';
                                                            } elseif ($status == 'Accepted') {
                                                                $color = 'green';
                                                            }

                                                            // Output the status with appropriate styling
                                                            echo "<span style='color: $color;'>$status</span>";
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $data['text']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['reason']; ?>
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
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>