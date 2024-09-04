<?php
session_start();

// Check if a category filter is applied
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : 'All';

// Fetch expenses based on the selected category filter
include "dbcon.php";
$id = $_SESSION['id'];

if ($categoryFilter === 'All') {
    $query = "SELECT price, item, date, id, branch, text, review FROM expense WHERE Eid='$id' ORDER BY date DESC";
} else {
    $query = "SELECT price, item, date, id, branch, text, review FROM expense WHERE Eid='$id' AND item='$categoryFilter' ORDER BY date DESC";
}
$result = mysqli_query($conn, $query);
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
                <form action="mng-my-expense-update.php" method="POST">
                    <input class="form-control" type="hidden" name="expense_id" id="expense_id">
                    <label style="color:black;">Amount*</label>
                    <input class="form-control" type="text" name="amount" id="amount" placeholder="Amount" required>
                    <label style="color:black;">Expense Item*</label>
                    <input class="form-control" type="text" name="item" id="item" placeholder="Item" readonly required>
                    <label style="color:black;">Date*</label>
                    <input class="form-control" type="text" name="date" id="date" placeholder="Date" readonly
                        required></br>
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
                                <h4 class="card-title">My Expense</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="filter-branch">Filter by Category:</label>
                                        <?php
                                        $sql = "SELECT name FROM expensecat";
                                        $categoriesResult = $conn->query($sql);
                                        ?>
                                        <select class="form-control" id="filter-category"
                                            onchange="filterTable(this.value)">
                                            <option value="All" <?php if ($categoryFilter === 'All' || $categoryFilter === '') {
                                                echo 'selected';
                                            } ?>>All</option>
                                            <?php
                                            while ($row = $categoriesResult->fetch_assoc()) {
                                                echo '<option value="' . $row['name'] . '"';
                                                if ($categoryFilter === $row['name']) {
                                                    echo 'selected';
                                                }
                                                echo '>' . $row['name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="table-responsive" style="padding-top:30px;">

                                    <table id="example" class="display" style="min-width: 845px;color:black;">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Text</th>
                                                <th>Status</th>
                                                <th>Date</th>
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
                                                            <?php echo $data['item']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['price']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['text']; ?>
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
                                                            <?php echo $data['date']; ?>
                                                        </td>
                                                        <td>

                                                            <?php
                                                            if ($reviewStatus == 1) {

                                                                echo "<button class='btn update-btn' style='color: black; font-size: 16px; display: none;'><i class='fas fa-pencil-alt'></i></button>";
                                                            } else {

                                                                echo "<button class='btn update-btn' style='color: black; font-size: 16px;' onclick='openUpdateForm(" . $data['id'] . ")'><i class='fas fa-pencil-alt'></i></button>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="mang-my-expense-delete.php?id=<?php echo $data['id']; ?>"><button
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
        $(document).ready(function () {
            $('.dataTables_wrapper select').val('100');
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
        // Function to set the dropdown to 'All' on page reload if no category selected
        window.onload = function () {
            var filterCategory = '<?php echo $categoryFilter; ?>';
            console.log(filterCategory);
            if (filterCategory == '') {
                document.getElementById('filter-category').value = 'All';
            }
        };

        function filterTable(category) {
            window.location.href = 'mang-my-expense.php?category=' + category;
        }
    </script>


    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>