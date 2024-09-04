<?php
session_start();
$role = $_SESSION['role'] ?? '';
echo "<script>console.log('Role:', '" . $role . "');</script>";
if ($role !== 'employee' || !isset($_SESSION['token'])) {
  echo "<script type='text/javascript'>window.location.href='index.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Newsvariety</title>
  <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css" />
  <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet" />
  <link href="./css/style.css" rel="stylesheet" />


  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
                  <a href="logout.php" class="dropdown-item">
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
            <a class="" href="employeedashboard.php" aria-expanded="false"><span class="nav-text">Dashboard</span></a>

          </li>
          <li class="nav-label">Add</li>
          <li>
            <a class="" href="emp-sale-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Sale</span></a>

          </li>
          <li>
            <a class="" href="emp-expense-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Expense</span></a>

          </li>
          <li>
            <a class="" href="emp-purchase-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Purchase request</span></a>
          </li>
          <li>
            <a class="" href="emp-request-status.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Request Status</span></a>
          </li>
          <li>
            <a class="" href="emp-my-expense.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">My Expense</span></a>
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
        <div class="row mb-3">

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="start-date">From:</label>
              <input type="date" class="form-control datepicker" id="start-date" name="start-date">
            </div>
            <div class="col-md-6">
              <label for="end-date">To:</label>
              <input type="date" class="form-control datepicker" id="end-date" name="end-date">
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <button id="todayButton" type="button" class="btn btn-primary">Today</button>
          </div>
        </div>

        <div class="row">
          <div id="sales-card" class="col-lg-3 col-sm-6">
            <div class="card" style="background:rgb(18, 163, 18);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Sales</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <span id="sales-amount"></span>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="col-lg-3 col-sm-6">

            <div class="card" style="background:rgb(231, 152, 5);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Expense</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <span id="expense-amount"></span>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-sm-6">

            <div class="card" style="background: rgb(41, 126, 206);">
              <div class="stat-widget-two card-body">
                <div class="stat-content">
                  <div class="stat-text" style="color: white;">Purchase</div>
                  <div class="stat-digit" style="color: white;">
                    <i class="fa fa-inr"></i>
                    <span id="purchase-amount"></span>
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
        Copyright © newsvariety; Developed by <a href="https://www.lestora.com/" target="_blank">Lestora</a> 2024
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



  <!-- <script>
    // Function to format date to YYYY-MM-DD format
    function formatDate(date) {
      var year = date.getFullYear();
      var month = (date.getMonth() + 1).toString().padStart(2, '0');
      var day = date.getDate().toString().padStart(2, '0');
      return year + '-' + month + '-' + day;
    }


    // Function to update card values when data is received from AJAX requests
    function updateDataForBranchAndDate(branch, startDate, endDate) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            document.getElementById('sales-amount').innerText = xhr.responseText;
          } else {
            console.error('Failed to fetch data');
          }
        }
      };

      xhr.open('GET', 'get_rangesales_total.php?branch=' + branch + '&start_date=' + startDate + '&end_date=' + endDate, true);
      xhr.send();
    }

    // Function to update expense data based on branch and date range
    function updateExpenseDataForBranchAndDate(branch, startDate, endDate) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var responseData = xhr.responseText;

            document.getElementById('expense-amount').innerText = responseData;
          } else {
            console.error('Failed to fetch expense data');
          }
        }
      };

      xhr.open('GET', 'get_rangeexpense_total.php?branch=' + branch + '&start_date=' + startDate + '&end_date=' + endDate, true);
      xhr.send();
    }

    function updatePurchaseDataForBranchAndDate(branch, startDate, endDate) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var responseData = xhr.responseText;
            console.log('Fetched Purchase Data:', responseData);
            document.getElementById('purchase-amount').innerText = responseData;
          } else {
            console.error('Failed to fetch purchase data');
          }
        }
      };

      xhr.open('GET', 'get_rangepurchase_total.php?branch=' + branch + '&start_date=' + startDate + '&end_date=' + endDate, true);
      xhr.send();
    }



    window.onload = function () {
      var today = new Date();
      var startDate = new Date();
      startDate.setMonth(today.getMonth() - 1);

      var formattedStartDate = formatDate(startDate);
      var formattedEndDate = formatDate(today);

      document.getElementById('start-date').value = formattedStartDate;
      document.getElementById('end-date').value = formattedEndDate;

      var selectedBranch = '<?php echo ($_SESSION['branch']) ?>';
    console.log(selectedBranch);

      document.getElementById('filter-branch').onchange = function () {
        var selectedBranch = this.value;
        var startDate = document.getElementById('start-date').value;
        var endDate = document.getElementById('end-date').value;
        updateDataForBranchAndDate(selectedBranch, startDate, endDate);
        updateExpenseDataForBranchAndDate(selectedBranch, startDate, endDate);
        updatePurchaseDataForBranchAndDate(selectedBranch, startDate, endDate);
      };

      document.getElementById('start-date').addEventListener('change', function () {
        var selectedBranch = document.getElementById('filter-branch').value;
        var startDate = this.value;
        var endDate = document.getElementById('end-date').value;
        updateDataForBranchAndDate(selectedBranch, startDate, endDate);
        updateExpenseDataForBranchAndDate(selectedBranch, startDate, endDate);
        updatePurchaseDataForBranchAndDate(selectedBranch, startDate, endDate);
      });

      document.getElementById('end-date').addEventListener('change', function () {
        var selectedBranch = document.getElementById('filter-branch').value;
        var startDate = document.getElementById('start-date').value;
        var endDate = this.value;
        updateDataForBranchAndDate(selectedBranch, startDate, endDate);
        updateExpenseDataForBranchAndDate(selectedBranch, startDate, endDate);
        updatePurchaseDataForBranchAndDate(selectedBranch, startDate, endDate);
      });


      updateDataForBranchAndDate('<?php echo ($_SESSION['branch']) ?>', formattedStartDate, formattedEndDate);
      updateExpenseDataForBranchAndDate('<?php echo ($_SESSION['branch']) ?>', formattedStartDate, formattedEndDate);
      updatePurchaseDataForBranchAndDate('<?php echo ($_SESSION['branch']) ?>', formattedStartDate, formattedEndDate);
    };
  </script> -->

  <script>
    // Function to format date to YYYY-MM-DD format
    function formatDate(date) {
      var year = date.getFullYear();
      var month = (date.getMonth() + 1).toString().padStart(2, '0');
      var day = date.getDate().toString().padStart(2, '0');
      return year + '-' + month + '-' + day;
    }

    // Function to update card values when data is received from AJAX requests
    function updateDataForBranchAndDate(startDate, endDate) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            document.getElementById('sales-amount').innerText = xhr.responseText;
          } else {
            console.error('Failed to fetch data');
          }
        }
      };

      xhr.open('GET', 'get_rangesales_total.php?branch=<?php echo ($_SESSION['branch']) ?>&start_date=' + startDate + '&end_date=' + endDate, true);
      xhr.send();
    }

    // Function to update expense data based on date range
    function updateExpenseDataForDate(startDate, endDate) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var responseData = xhr.responseText;
            document.getElementById('expense-amount').innerText = responseData;
          } else {
            console.error('Failed to fetch expense data');
          }
        }
      };

      xhr.open('GET', 'get_rangeexpense_total.php?branch=<?php echo ($_SESSION['branch']) ?>&start_date=' + startDate + '&end_date=' + endDate, true);
      xhr.send();
    }

    function updatePurchaseDataForDate(startDate, endDate) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var responseData = xhr.responseText;
            document.getElementById('purchase-amount').innerText = responseData;
          } else {
            console.error('Failed to fetch purchase data');
          }
        }
      };

      xhr.open('GET', 'get_rangepurchase_total.php?branch=<?php echo ($_SESSION['branch']) ?>&start_date=' + startDate + '&end_date=' + endDate, true);
      xhr.send();
    }

    function setTodayDate() {
      var today = new Date();
      var formattedDate = formatDate(today);
      document.getElementById('start-date').value = formattedDate;
      document.getElementById('end-date').value = formattedDate;


      updateDataForBranchAndDate(formattedDate, formattedDate);
      updateExpenseDataForDate(formattedDate, formattedDate);
      updatePurchaseDataForDate(formattedDate, formattedDate);
    }

    window.onload = function () {
      var today = new Date();
      var startDate = new Date();
      startDate.setMonth(today.getMonth() - 1);

      var formattedStartDate = formatDate(startDate);
      var formattedEndDate = formatDate(today);

      document.getElementById('start-date').value = formattedStartDate;
      document.getElementById('end-date').value = formattedEndDate;

      document.getElementById('start-date').addEventListener('change', function () {
        var startDate = this.value;
        var endDate = document.getElementById('end-date').value;
        updateDataForBranchAndDate(startDate, endDate);
        updateExpenseDataForDate(startDate, endDate);
        updatePurchaseDataForDate(startDate, endDate);
      });

      document.getElementById('end-date').addEventListener('change', function () {
        var startDate = document.getElementById('start-date').value;
        var endDate = this.value;
        updateDataForBranchAndDate(startDate, endDate);
        updateExpenseDataForDate(startDate, endDate);
        updatePurchaseDataForDate(startDate, endDate);
      });

      document.getElementById('todayButton').addEventListener('click', function () {
        setTodayDate();
      });

      updateDataForBranchAndDate(formattedStartDate, formattedEndDate);
      updateExpenseDataForDate(formattedStartDate, formattedEndDate);
      updatePurchaseDataForDate(formattedStartDate, formattedEndDate);
    };
  </script>



</body>

</html>