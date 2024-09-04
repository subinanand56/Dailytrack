<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Focus - Bootstrap Admin Dashboard</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png" />
  <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css" />
  <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet" />
  <link href="./css/style.css" rel="stylesheet" />
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
      <a href="index.html" class="brand-logo">
        <!-- <img class="logo-abbr" src="./images/logo.png" alt=""> -->
        <!-- <img class="logo-compact" src="./images/logo-text.png" alt=""> -->
        <!-- <img class="brand-title" src="./images/logo-text.png" alt=""> -->
      </a>

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
                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                  <i class="mdi mdi-account"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right"> 
                  <a href="./page-login.php" class="dropdown-item">
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
            <a class="" href="index.php" aria-expanded="false"><span class="nav-text">Dashboard</span></a>

          </li>
          <li class="nav-label">Add</li>
          <li>
            <a class="" href="add-sale-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Sale</span></a>

          </li>
          <li>
            <a class="" href="add-expense-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Expense</span></a>

          </li>
          <li>
            <a class="" href="add-purchse-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Purchase</span></a>

          </li>
          <li>
            <a class="" href="add-emp-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Employee</span></a>

          </li>
          <li>
            <a class="" href="add-branch-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Branch</span></a>

          </li>
          <li>
            <a class="" href="add-product-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Product</span></a>

          </li>

          <li class="nav-label">View</li>
          <li>
            <a class="" href="sales-table-form.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Sales</span></a>

          </li>
          <li>
            <a class="" href="" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Expense</span></a>

          </li>
          <li>
            <a class="" href="" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Purchase</span></a>

          </li>
          <li>
            <a class="" href="javascript:void()" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Employee</span></a>

          </li>
          <li class="nav-label">Forms</li>
          <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-form"></i><span
                class="nav-text">Forms</span></a>
            <ul aria-expanded="false">
              <li><a href="./form-element.html">Form Elements</a></li>
              <li><a href="./form-wizard.html">Wizard</a></li>
              <li><a href="./form-editor-summernote.html">Summernote</a></li>
              <li><a href="form-pickers.html">Pickers</a></li>
              <li>
                <a href="form-validation-jquery.html">Jquery Validate</a>
              </li>
            </ul>
          </li>
          <li class="nav-label">Table</li>
          <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-layout-25"></i><span
                class="nav-text">Table</span></a>
            <ul aria-expanded="false">
              <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
              <li><a href="table-datatable-basic.html">Datatable</a></li>
            </ul>
          </li>

          <li class="nav-label">Extra</li>
          <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
            <ul aria-expanded="false">
              <li><a href="./page-register.html">Register</a></li>
              <li><a href="./page-login.html">Login</a></li>
              <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                <ul aria-expanded="false">
                  <li><a href="./page-error-400.html">Error 400</a></li>
                  <li><a href="./page-error-403.html">Error 403</a></li>
                  <li><a href="./page-error-404.html">Error 404</a></li>
                  <li><a href="./page-error-500.html">Error 500</a></li>
                  <li><a href="./page-error-503.html">Error 503</a></li>
                </ul>
              </li>
              <li><a href="./page-lock-screen.html">Lock Screen</a></li>
            </ul>
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
      <!-- row -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="card" style="background: rgb(41, 126, 206);">

              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Sales Today</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dashboard";

                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    $todayDate = date('Y-m-d'); // Get today's date in YYYY-MM-DD format
                    
                    // Query to get the total sum of amount for today's sales
                    $totalTodaySalesQuery = "SELECT SUM(price) AS total_amount FROM sales WHERE DATE(date) = '$todayDate'";
                    $resultToday = mysqli_query($conn, $totalTodaySalesQuery);
                    $rowToday = mysqli_fetch_assoc($resultToday);

                    if ($rowToday['total_amount']) {
                      $totalTodayAmount = $rowToday['total_amount'];
                      echo $totalTodayAmount; // Display total amount for today's sales
                    } else {
                      echo "0"; // Display 0 if no sales found for today
                    }
                    ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card" style="background:rgb(231, 152, 5);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Expense Today</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dashboard";

                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    $todayDate = date('Y-m-d'); // Get today's date in YYYY-MM-DD format
                    
                    // Query to get the total sum of amount for today's sales
                    $totalTodaySalesQuery = "SELECT SUM(price) AS total_amount FROM expense WHERE DATE(date) = '$todayDate'";
                    $resultToday = mysqli_query($conn, $totalTodaySalesQuery);
                    $rowToday = mysqli_fetch_assoc($resultToday);

                    if ($rowToday['total_amount']) {
                      $totalTodayAmount = $rowToday['total_amount'];
                      echo $totalTodayAmount; // Display total amount for today's sales
                    } else {
                      echo "0"; // Display 0 if no sales found for today
                    }
                    ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card" style="background: rgb(18, 163, 18);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Purchase Today</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dashboard";

                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    $todayDate = date('Y-m-d'); // Get today's date in YYYY-MM-DD format
                    
                    // Query to get the total sum of amount for today's sales
                    $totalTodaySalesQuery = "SELECT SUM(price) AS total_amount FROM purchase WHERE DATE(date) = '$todayDate'";
                    $resultToday = mysqli_query($conn, $totalTodaySalesQuery);
                    $rowToday = mysqli_fetch_assoc($resultToday);

                    if ($rowToday['total_amount']) {
                      $totalTodayAmount = $rowToday['total_amount'];
                      echo $totalTodayAmount; // Display total amount for today's sales
                    } else {
                      echo "0"; // Display 0 if no sales found for today
                    }
                    ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card" style="background: rgb(41, 126, 206);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Sales this month</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dashboard";

                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    $currentMonth = date('m'); // Get current month
                    $currentYear = date('Y'); // Get current year
                    
                    // Query to get the total sum of amount for the current month
                    $totalAmountQuery = "SELECT SUM(price) AS total_amount FROM sales WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear'";
                    $result = mysqli_query($conn, $totalAmountQuery);
                    $row = mysqli_fetch_assoc($result);

                    if ($row['total_amount']) {
                      $totalAmount = $row['total_amount'];
                      echo $totalAmount; // Display total amount
                    } else {
                      echo "0"; // Display 0 if no sales found for the current month
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="card" style="background:rgb(231, 152, 5);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Expense this month</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dashboard";

                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    $currentMonth = date('m'); // Get current month
                    $currentYear = date('Y'); // Get current year
                    
                    // Query to get the total sum of amount for the current month
                    $totalAmountQuery = "SELECT SUM(price) AS total_amount FROM expense WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear'";
                    $result = mysqli_query($conn, $totalAmountQuery);
                    $row = mysqli_fetch_assoc($result);

                    if ($row['total_amount']) {
                      $totalAmount = $row['total_amount'];
                      echo $totalAmount; // Display total amount
                    } else {
                      echo "0"; // Display 0 if no sales found for the current month
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card" style="background: rgb(18, 163, 18); ">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Purchase this month</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "dashboard";

                    $conn = mysqli_connect($server, $username, $password, $dbname);

                    $currentMonth = date('m'); // Get current month
                    $currentYear = date('Y'); // Get current year
                    
                    // Query to get the total sum of amount for the current month
                    $totalAmountQuery = "SELECT SUM(price) AS total_amount FROM purchase WHERE MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear'";
                    $result = mysqli_query($conn, $totalAmountQuery);
                    $row = mysqli_fetch_assoc($result);

                    if ($row['total_amount']) {
                      $totalAmount = $row['total_amount'];
                      echo $totalAmount; // Display total amount
                    } else {
                      echo "0"; // Display 0 if no sales found for the current month
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>


      </div>
      <!-- /# column -->
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
        Copyright © &amp; Developed by <a href="#" target="_blank"></a> 2023
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

  <!-- Vectormap -->
  <script src="./vendor/raphael/raphael.min.js"></script>
  <script src="./vendor/morris/morris.min.js"></script>

  <script src="./vendor/circle-progress/circle-progress.min.js"></script>
  <script src="./vendor/chart.js/Chart.bundle.min.js"></script>

  <script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

  <!--  flot-chart js -->
  <script src="./vendor/flot/jquery.flot.js"></script>
  <script src="./vendor/flot/jquery.flot.resize.js"></script>

  <!-- Owl Carousel -->
  <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <!-- Counter Up -->
  <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
  <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
  <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>

  <script src="./js/dashboard/dashboard-1.js"></script>
</body>

</html>