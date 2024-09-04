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
        <!-- Bootstrap Icons -->
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

            .circle-buttons {
                display: flex;
                justify-content: space-between;
            }

            .circle-button {
                width: 20px;
                height: 20px;
                border-radius: 50%;
                border: none;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                font-weight: bold;
                margin-right: 5px;
                /* Adjust spacing between buttons if needed */
            }

            .accept-button {
                background-color: green;
                color: white;
            }

            .reject-button {
                background-color: red;
                color: white;
            }

            td.pending-cell {
                color: red;

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

    <div class="modal-overlay" id="modalOverlay1">
        <div class="modal-content">
            <div id="updateForm1" style="display: none;">
                <form action="updatereason.php" method="POST">

                    <input class="form-control" type="hidden" id="purchaseId" name="purchase_id">
                    <label style="color:black;">Reason *</label>
                    <input class="form-control" type="text" name="text" id="text" placeholder="text" required></br>
                    <div style="align-item: center; ">
                        <input class="btn btn-success" type="submit" name="update" value="Update ">
                        <button class="btn btn-danger" type="button" onclick="closeRejectForm()">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-content">
            <div id="updateForm" style="display: none;">
                <form action="update-purchase-text.php" method="POST">
                    <label style="color:black;">Comment *</label>
                    <input class="form-control" type="hidden" id="purchaseId1" name="purchase_id1">

                    <input class="form-control" type="text" name="text1" id="text1" placeholder="text"></br>

                    <input class="btn btn-success" type="submit" name="update1" value="Update">
                    <button class="btn btn-danger" type="button" onclick="closeUpdateForm()">Close</button>
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
                                <h4 class="card-title">Purchase Data</h4>
                            </div>
                            <div class="card-body">

                              

                                <div class="table-responsive" style="padding-top:30px;">

                                    <table id="example" class="display" style="min-width: 845px;color:black;">
                                        <thead>
                                            <tr>
                                                <th>Branch</th>
                                                <th>Emp Name</th>
                                                <th>Product Name </th>
                                                <th>Company Name</th>
                                                <th>price</th>
                                                <th>Accept</th>
                                                <th>image</th>
                                                <th>Action</th>
                                                <th>Input</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            include 'dbcon.php';
                                            $query = "SELECT branch, productName, companyName, price , accepted , image , id , text ,Ename FROM purchase ORDER BY date DESC";
                                            $result = mysqli_query($conn, $query);
                                            $row['accepted'] = false;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['branch'] . "</td>";
                                                echo "<td>" . $row['Ename'] . "</td>";
                                                echo "<td>" . $row['productName'] . "</td>";
                                                echo "<td>" . $row['companyName'] . "</td>";
                                                echo "<td>" . $row['price'] . "</td>";

                                                if ($row['accepted'] === 'Pending') {
                                                    echo "<td style='color: yellow;'>" . $row['accepted'] . "</td>";
                                                } elseif ($row['accepted'] === 'Accepted') {
                                                    echo "<td style='color: green;'>" . $row['accepted'] . "</td>";
                                                } elseif ($row['accepted'] === 'Rejected') {
                                                    echo "<td style='color: red;'>" . $row['accepted'] . "</td>";
                                                } else {
                                                    echo "<td>" . $row['accepted'] . "</td>";
                                                }
                                                echo "<td><a href='uploads/" . $row['image'] . "'><img src='uploads/" . $row['image'] . "' width='50'></a></td>";
                                                
                                                if ($row['accepted'] !== 'Accepted' && $row['accepted'] !== 'Rejected') {
                                                    echo "<td>
                                                        <div class='circle-buttons'>
                                                            <button class='circle-button reject-button' onclick='openRejectForm(" . $row['id'] . ")'>X</button>
                                                            <a href='purchaseaccept.php?id=" . $row['id'] . "'><button class='circle-button accept-button'><i class='fas fa-check'></i></button></a>
                                                        </div>
                                                    </td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                                echo "<td>
                                                <button  class='circle-button   btn-primary' style='font-size: 1.5em;'  onclick='openUpdateForm(" . $row['id'] . ")'><i class='bi bi-plus'></i></button>
                                              </td>";
                                                echo "</tr>";
                                            }
                                            ?>
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


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var acceptCells = document.querySelectorAll('.accept-cell');

            acceptCells.forEach(function (cell) {
                if (cell.textContent.trim() === 'Pending') {
                    cell.classList.add('pending-cell');
                }
            });
        });
    </script>


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

    <script>
        // Function to open the update form with the selected row's data
        function openRejectForm(purchaseId) {
            // Set the value of the hidden input field in the form with the selected purchase ID
            document.getElementById('purchaseId').value = purchaseId;
            var tableRow = document.getElementById('statusCell' + purchaseId);


            // Show the modal overlay
            document.getElementById('modalOverlay1').style.display = 'flex';
            document.getElementById('updateForm1').style.display = 'block';
        }

        // Function to close the update form
        function closeRejectForm() {

            document.getElementById('modalOverlay1').style.display = 'none';
            document.getElementById('updateForm1').style.display = 'none';
        }
    </script>

    <script>
        // Function to open the update form with the selected row's data
        function openUpdateForm(purchaseId1) {
            // Set the value of the hidden input field in the form with the selected purchase ID
            document.getElementById('purchaseId1').value = purchaseId1;

            // Show the modal overlay
            document.getElementById('modalOverlay').style.display = 'flex';
            document.getElementById('updateForm').style.display = 'block';
        }

        // Function to close the update form
        function closeUpdateForm() {
            // Hide the modal overlay and the form
            document.getElementById('modalOverlay').style.display = 'none';
            document.getElementById('updateForm').style.display = 'none';

        }
    </script>
    <script>
        $(document).ready(function () {
            $('.dataTables_wrapper select').val('100');
        });
    </script>


    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>