<?php
session_start();
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
            <a class="" href="managerdashboard.php" aria-expanded="false"><span class="nav-text">Dashboard</span></a>

          </li>
          <li class="nav-label">Add</li>
          <li>
            <a class="" href="mng-add-sale.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Sale </span></a>

          </li>

          <li>
            <a class="" href="mng-expense-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Expense</span></a>

          </li>
          <li>
            <a class="" href="mng-purchase-form.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Add Purchase</span></a>

          </li>
          <li>
            <a class="" href="mang-purchase-accept.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Purchase request</span></a>
          </li>
          <li>
            <a class="" href="mang-sales.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Sales</span></a>
          </li>
          <li>
            <a class="" href="mang-expense.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
                class="nav-text">Expense</span></a>
          </li>
          <li>
            <a class="" href="mang-my-expense.php" aria-expanded="false"><i class="icon icon-app-store"></i><span
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
        <div class="row">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Manager Sale Entry Form</h4>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <form action="mngsale.php" method="post">

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Branch</label>

                      <?php
                      include "dbcon.php";

                      $sql = "SELECT name FROM branch";
                      $result = $conn->query($sql);

                      ?>
                      <select id="inputState" class="form-control" name="branch" required>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                          echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Amount</label>
                      <input type="number" class="form-control" placeholder="amount" name="amount" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Product</label>

                      <?php
                      include "dbcon.php";

                      $sql = "SELECT name FROM product";
                      $result = $conn->query($sql);

                      ?>
                      <select id="inputState" class="form-control" name="product" required>


                        <?php
                        while ($row = $result->fetch_assoc()) {
                          echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                        }
                        ?>


                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Date</label>
                      <input type="date" class="form-control" name="date" required max="<?php echo date('Y-m-d'); ?>">
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Quantity</label>
                      <input type="number" class="form-control" name="quantity" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Unit</label>
                      <select id="inputState" class="form-control" name="unit" required>
                        <option selected>Ton</option>
                        <option>Kg</option>

                      </select>
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
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.querySelector('form');

      form.addEventListener('submit', function (event) {
        event.preventDefault();

        fetch('mngsale.php', {
          method: 'POST',
          body: new FormData(form),
        })
          .then(response => {
            if (response.ok) {

              showMessage('Success!', 'green');
              setTimeout(function () {
                window.location.href = 'mng-add-sale.php';
              }, 1500);
            } else {

              showMessage('Error! Please try again.', 'red');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            showMessage('Error! Please try again.', 'red');
          });
      });

      function showMessage(message, color) {
        const popup = document.createElement('div');
        popup.textContent = message;
        popup.style.backgroundColor = color;
        popup.style.color = 'white';
        popup.style.padding = '10px 20px';
        popup.style.borderRadius = '5px';
        popup.style.position = 'fixed';
        popup.style.top = '50%';
        popup.style.left = '50%';
        popup.style.transform = 'translate(-50%, -50%)';
        document.body.appendChild(popup);


        setTimeout(function () {
          document.body.removeChild(popup);
        }, 2000);
      }
    });
  </script>

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