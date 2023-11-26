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
$title = "Product View";
$currentPage = "productView";
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
                        <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">Products /</span><span> Product View</span></h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <p class="card-title">Search the product name or id you want to view.</p>
                                <form action="productSearch.php" method="get">
                                    <div class="d-flex flex-sm-row flex-column align-items-center gap-3">
                                        <input name="search" type="search" value="" class="form-control w-100" placeholder="Search Product" autocomplete="off" onkeyup="productView(this.value);">
                                        <button class="dt-button add-new btn btn-primary flex-shrink-0 flex-grow-0">
                                            <span><i class="bx bx-search-alt me-1"></i><span>Search Product</span></span>
                                        </button>
                                        <div id="productViewSearch"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (!empty($_GET["product_id"])) {
                            $product_id = $_GET["product_id"];
                            $sql = "SELECT * FROM `products` WHERE `product_id` = $product_id";
                            $row = mysqli_fetch_assoc(mysqli_query($connect, $sql)); ?>
                            <div class="card mb-4">
                                <div class="card-header d-flex flex-sm-row flex-column align-items-center justify-content-between gap-4">
                                    <h5 class="card-title text-capitalize m-0"><?php echo $row["product_id"] . ". " . $row["product_name"] ?></h5>
                                    <div class="flex-shrink-0 flex-grow-0 d-flex flex-column flex-sm-row gap-2">
                                        <button onclick="location.href='../../public/product.php?product_id=<?php echo $row['product_id'] ?>'" class="dt-button btn btn-light" type="button">
                                            <span><i class="bx bx-link me-1"></i><span>Open Page</span></span>
                                        </button>
                                        <button onclick="location.href='productEdit.php?product_id=<?php echo $row['product_id'] ?>'" class="dt-button btn btn-secondary" type="button">
                                            <span><i class="bx bx-edit me-1"></i><span>Edit Product</span></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-sm-4 my-sm-4 align-items-center">
                                        <div class="col-sm-4 col-12"><img class="w-100 h-100 rounded" src="../../public/uploads/products/<?php echo $row["product_image"] ?>" alt=""></div>
                                        <div class="col-sm-8 col-12">
                                            <div class="row mx-3 mx-sm-0 mx-lg-5 justify-content-center">
                                                <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                    <span style="display: inline-block; width: 6em;">Id:</span>
                                                    <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["product_id"] ?></span>
                                                </p>
                                                <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                    <span style="display: inline-block; width: 6em;">Name:</span>
                                                    <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["product_name"] ?></span>
                                                </p>
                                                <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                    <span style="display: inline-block; width: 6em;">Category:</span>
                                                    <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["product_category"] ?></span>
                                                </p>
                                                <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                    <span style="display: inline-block; width: 6em;">Price:</span>
                                                    <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0">$<?php echo $row["product_price"] ?></span>
                                                </p>
                                                <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                    <span style="display: inline-block; width: 6em;">Stock:</span>
                                                    <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["product_stock"] ?> Units</span>
                                                </p>
                                                <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                    <span style="display: inline-block; width: 6em;">Sold:</span>
                                                    <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["product_sold"] ?> Units</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-1 mx-sm-5 mt-2">
                                        <p class="row m-0 my-1 p-0 fs-5">
                                            <span>Time Added:</span>
                                            <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $row["product_timestamp"] ?></span>
                                        </p>
                                        <p class="row m-0 my-1 p-0 fs-5">
                                            <span>Rating:</span>
                                            <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $row["product_rating"] ?>/5.00 Stars From <?php echo $row["product_review_count"] ?> Reviews</span>
                                        </p>
                                        <p class="row m-0 my-1 p-0 fs-5">
                                            <span>Description:</span>
                                            <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $row["product_description"] ?></span>
                                        </p>
                                    </div>
                                    <div class="row flex-column flex-sm-row flex-grow-1 p-0 m-0">
                                        <button onclick="location.href='../../public/product.php?product_id=<?php echo $row['product_id'] ?>'" class="dt-button btn btn-light flex-grow-1 w-auto my-4 mx-sm-5" type="button">
                                            <span><i class="bx bx-link me-1"></i><span>Open Page</span></span>
                                        </button>
                                        <button onclick="location.href='productDelete.php?product_id=<?php echo $product_id ?>'" class="dt-button btn btn-danger flex-grow-1 w-auto my-4 mx-sm-5" type="button">
                                            <span><i class="bx bx-trash me-1"></i><span>Delete Product</span></span>
                                        </button>
                                        <button onclick="location.href='productEdit.php?product_id=<?php echo $row['product_id'] ?>'" class="dt-button btn btn-secondary flex-grow-1 w-auto my-4 mx-sm-5" type="button">
                                            <span><i class="bx bx-edit me-1"></i><span>Edit Product</span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php
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
    function productView(search, type = "view") {
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
        xmlhttp.open("GET", "productSearch.php?search=" + search + "&type=" + type, true);
        xmlhttp.send();
    }
</script>