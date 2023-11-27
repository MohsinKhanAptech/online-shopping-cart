<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
  alert("Please log-in to gain access");
  location("login.php");
} elseif ($_SESSION["user_type"] == "employee") {
  location("orderList.php");
} ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Admin Panel";
$currentPage = "index";
include "include/head.php";
?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php include "include/aside.php"; ?>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include "include/navbar.php"; ?>
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary text-capitalize">Welcome Back <?php echo $_SESSION["user"] ?>! 👋</h5>
                        <p class="mb-4">
                          Thank you for your hard work. ♥
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-4 col-md-4 order-1"> -->
              <div class="row w-100 p-0 m-0">
                <div class="col-lg-3 col-sm-6 col-12 mb-4 d-grid">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="../assets/img/icons/unicons/wallet.png" alt="chart success" class="rounded" />
                        </div>
                      </div>
                      <span class="fw-medium d-block mb-1">Products</span>
                      <h3 class="card-title mb-2"><?php echo mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(product_id) FROM `products`")) ?></h3>
                      <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +increse</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-4 d-grid">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                        </div>
                      </div>
                      <span class="fw-medium d-block mb-1">Users</span>
                      <h3 class="card-title mb-2"><?php echo mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(customer_id) FROM `customers`")) ?></h3>
                      <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +increse</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-4 d-grid">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="../assets/img/icons/unicons/chart.png" alt="chart success" class="rounded" />
                        </div>
                      </div>
                      <span class="fw-medium d-block mb-1">Orders</span>
                      <h3 class="card-title mb-2"><?php echo mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(order_id) FROM `orders`")) ?></h3>
                      <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +increse</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-4 d-grid">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                        </div>
                      </div>
                      <span>Sales</span>
                      <h3 class="card-title text-nowrap mb-1">$<?php $order_total = mysqli_fetch_column(mysqli_query($connect, "SELECT SUM(order_total) FROM `orders`"));
                                                                echo empty($order_total) ? 0 : $order_total; ?></h3>
                      <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +increase</small>
                    </div>
                  </div>
                </div>
                <!-- </div> -->
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-medium"><i class="bx bx-chevron-up"></i> increase</small>
                                <h3 class="mb-0">$<?php $order_total = mysqli_fetch_column(mysqli_query($connect, "SELECT SUM(order_total) FROM `orders`"));
                                                  echo empty($order_total) ? 0 : $order_total; ?></h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- / Content wrapper -->
        </div>
        <!-- / Layout container -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- / Overlay -->
    </div>
    <!-- / Layout wrapper -->
    <?php include "include/script.php"; ?>
</body>

</html>