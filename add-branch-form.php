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
          <li>
            <a class="" href="add-exp-cat-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Expense Category</span></a>

          </li>

          <li class="nav-label">View</li>
          <li>
            <a class="" href="sales-table-form.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Sales</span></a>

          </li>
          <li>
            <a class="" href="expense-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Expense</span></a>

          </li>
          <li>
            <a class="" href="purchase-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Purchase</span></a>

          </li>
          <li>
            <a class="" href="emp-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Employee</span></a>
          </li>
          <li>
            <a class="" href="product-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Product</span></a>
          </li>
          <li>
            <a class="" href="branch-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Branch</span></a>
          </li>
          <li>
            <a class="" href="expensecat-table.php" aria-expanded="false"><i class="icon icon-world-2"></i><span
                class="nav-text">Expense Category</span></a>
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
      <div class="container-fluid ">
        <div class="row">
          <div class="card col-md-6">
            <div class="card-header">
              <h4 class="card-title">Add Branch</h4>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <form action="branch.php" method="post">

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Name</label>
                      <input type="text" class="form-control" placeholder="name" name="name" required>
                    </div>
                  </div>


                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
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
</body>

</html>