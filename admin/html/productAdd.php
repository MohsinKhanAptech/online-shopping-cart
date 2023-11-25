<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    alert("Only admin can access this page");
    historyGo();
} ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Product Add";
$currentPage = "productAdd";
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
                    <form action="productAddValid.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">Products /</span><span> Product Add</span></h4>
                            <div class="app-ecommerce">
                                <!-- Add Product -->
                                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h4 class="mb-1 mt-3">Add a new Product</h4>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                        <button onclick="location.href='productList.php'" type="button" class="btn btn-label-secondary">Discard</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Publish Product</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- First column-->
                                    <div class="col-12">
                                        <!-- Product Information -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-tile mb-0">Product information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="ecommerce-product-name">Name</label>
                                                    <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product title" name="product_name" aria-label="Product title" maxlength="100" required>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                                                        <label class="form-label" for="Price">Price</label>
                                                        <input type="number" class="form-control" id="Price" placeholder="Price" name="product_price" min="1" step="0.01" maxlength="65" required>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <label class="form-label" for="Category">Category</label>
                                                        <select name="product_category" id="Category" class="form-control" required>
                                                            <option value="Accessories">Accessories</option>
                                                            <option value="Fragrances">Fragrances</option>
                                                            <option value="Stationaries">Stationaries</option>
                                                            <option value="Sweets">Sweets</option>
                                                            <option value="Toys">Toys</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div>
                                                    <label class="form-label">Description</label>
                                                    <textarea name="product_description" id="" rows="8" class="ql-editor ql-blank form-control" maxlength="1000" placeholder="Product Description" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Product Information -->
                                        <!-- Media -->
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 card-title">Media</h5>
                                            </div>
                                            <div class="card-body">
                                                <img id="uploadPreview" class="w-px-150 h-px-150 d-none rounded" />
                                                <div class="dz-message needsclick my-2">
                                                    <label class="form-label" for="btnBrowse">please select an image with a 1:1 aspect ratio (a square image)</label>
                                                    <div><input type="file" name="product_image" id="btnBrowse" class="form-control" maxlength="255" accept="image/png, image/jpeg, image/jpg" required onchange="document.getElementById('uploadPreview').classList.add('d-none');PreviewImage();"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Media -->
                                        <!-- Variants -->
                                        <!-- Inventory -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Inventory</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Navigation -->
                                                    <div class="col-12 col-md-4 mx-auto card-separator">
                                                        <div class="d-flex justify-content-between flex-column mb-3 mb-md-0 pe-md-3">
                                                            <ul class="nav nav-align-left nav-pills flex-column" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#restock" aria-selected="true" role="tab">
                                                                        <i class="bx bx-cube me-2"></i>
                                                                        <span class="align-middle">Stock</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- /Navigation -->
                                                    <!-- Options -->
                                                    <div class="col-12 col-md-8 pt-4 pt-md-0">
                                                        <div class="tab-content p-0 pe-md-5 ps-md-3">
                                                            <!-- Restock Tab -->
                                                            <div class="tab-pane fade show active" id="restock" role="tabpanel">
                                                                <h5>Options</h5>
                                                                <label class="form-label" for="ecommerce-product-stock">Add to Stock</label>
                                                                <div class="row mb-3 g-3">
                                                                    <div class="col-12 col-sm-9">
                                                                        <input type="number" class="form-control" id="ecommerce-product-stock" placeholder="Quantity" name="product_stock" aria-label="Quantity" min="1" required>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3">
                                                                        <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-check me-2"></i>Confirm</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Options-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Inventory -->
                                    </div>
                                    <!-- /first column -->
                                </div>
                            </div>
                        </div>
                    </form>
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
<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("btnBrowse").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            document.getElementById("uploadPreview").classList.remove("d-none");
        };
    };
</script>