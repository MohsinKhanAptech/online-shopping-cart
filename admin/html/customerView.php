<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    location("404.php");
} ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Customer View";
$currentPage = "customerView";
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
                        <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">Customers /</span><span> Customer View</span></h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <p class="card-title">Search the customer name or id you want to view.</p>
                                <form action="customerSearch.php" method="get">
                                    <div class="d-flex flex-sm-row flex-column align-items-center gap-3">
                                        <input name="search" type="search" value="" class="form-control w-100" placeholder="Search Customer" autocomplete="off" onkeyup="customerView(this.value);">
                                        <button class="dt-button add-new btn btn-primary flex-shrink-0 flex-grow-0">
                                            <span><i class="bx bx-search-alt me-1"></i><span>Search Customer</span></span>
                                        </button>
                                        <div id="productViewSearch"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (!empty($_GET["customer_id"])) {
                            $customer_id = $_GET["customer_id"];
                            $sql = "SELECT * FROM `customers` WHERE `customer_id` = $customer_id";
                            $row = mysqli_fetch_assoc(mysqli_query($connect, $sql)); ?>
                            <div class="card mb-4">
                                <div class="card-header d-flex flex-sm-row flex-column align-items-center justify-content-between gap-4">
                                    <h5 class="card-title text-capitalize m-0"><?php echo $row["customer_id"] . ". " . $row["customer_name"] ?></h5>
                                    <div class="flex-shrink-0 flex-grow-0 d-flex flex-column flex-sm-row gap-2">
                                        <button onclick="location.href='customerDelete.php?customer_id=<?php echo $customer_id ?>'" class="dt-button btn btn-danger" type="button">
                                            <span><i class="bx bx-trash me-1"></i><span>Delete Customer</span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title text-capitalize m-0">Account Details:</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-1 mx-sm-5">
                                        <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                            <span style="display: inline-block; width: 6em;">Id:</span>
                                            <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["customer_id"] ?></span>
                                        </p>
                                        <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                            <span style="display: inline-block; width: 6em;">Name:</span>
                                            <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["customer_name"] ?></span>
                                        </p>
                                        <p class="m-0 my-1 p-0 fs-5">
                                            <span style="display: inline-block; width: 6em;">Email:</span>
                                            <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["customer_email"] ?></span>
                                        </p>
                                        <p class="m-0 my-1 p-0 fs-5">
                                            <span style="display: inline-block; width: 6em;">Password:</span>
                                            <span onclick="document.getElementById('passwordShow').classList.toggle('password')" role="button">
                                                <span id="passwordShow" class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0 password"><?php echo $row["customer_password"] ?></span><sup class="ms-2 text-warning">*click</sup>
                                            </span>
                                        </p>
                                        <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                            <span style="display: inline-block; width: 6em;">Time Added:</span>
                                            <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["customer_timestamp"] ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $customer_detail_querry = "SELECT * FROM `customer_details` WHERE `customer_id` = '$customer_id'";
                            $customer_detail = mysqli_query($connect, $customer_detail_querry);
                            if (mysqli_num_rows($customer_detail) > 0) {
                                $detail = mysqli_fetch_assoc($customer_detail); ?>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title text-capitalize m-0">Personal Details:</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mx-1 mx-sm-5">
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">First Name:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["first_name"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">Last Name:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["last_name"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">Contact:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["phone"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">Address:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["street_address"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">Town:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["town"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">State:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["state"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">Country:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["country"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span class="p-0">Post Code:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $detail["postcode"] ?></span>
                                            </p>
                                        </div>
                                        <div class="row flex-column flex-sm-row flex-grow-1 p-0 m-0">
                                            <button onclick="location.href='customerDelete.php?customer_id=<?php echo $customer_id ?>'" class="dt-button btn btn-danger flex-grow-1 w-auto my-4 mx-sm-5" type="button">
                                                <span><i class="bx bx-trash me-1"></i><span>Delete Customer</span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } ?>
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include "include/script.php"; ?>
</body>

</html>
<script>
    function customerView(search, type = "view") {
        if (search.length == 0) {
            document.getElementById("productViewSearch").innerHTML = "";
            document.getElementById("productViewSearch").classList.remove("searchResult");
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productViewSearch").innerHTML = this.responseText;
                document.getElementById("productViewSearch").classList.add("searchResult");
            }
        }
        xmlhttp.open("GET", "customerSearch.php?search=" + search + "&type=" + type, true);
        xmlhttp.send();
    }
</script>