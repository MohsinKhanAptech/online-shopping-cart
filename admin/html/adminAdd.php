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
$title = "Admin Add";
$currentPage = "adminAdd";
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
                    <form action="adminAddValid.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">admins /</span><span> admin Add</span></h4>
                            <div class="app-ecommerce">
                                <!-- Add admin -->
                                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h4 class="mb-1 mt-3">Add a new Admin</h4>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-3">
                                        <button onclick="location.href='adminList.php'" type="button" class="btn btn-label-secondary">Discard</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- First column-->
                                    <div class="col-12">
                                        <!-- admin Information -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-tile mb-0">Admin information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-12 mb-3 mb-sm-0">
                                                        <label class="form-label" for="ecommerce-product-name">Name</label>
                                                        <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Admin Name" name="admin_name" aria-label="Admin title" maxlength="100" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                                                        <label class="form-label" for="Email">Email</label>
                                                        <input type="text" class="form-control" id="Email" placeholder="Email" name="admin_email" min="1" step="0.01" maxlength="255" required>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <label class="form-label" for="Password">Password</label>
                                                        <input type="password" class="form-control" id="Password" placeholder="Password" name="admin_password" min="1" step="0.01" maxlength="255" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Admin Information -->
                                        <!-- Media -->
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 card-title">Image</h5>
                                            </div>
                                            <div class="card-body">
                                                <img id="uploadPreview" class="w-px-150 h-px-150 d-none rounded" />
                                                <div class="dz-message needsclick my-2">
                                                    <label class="form-label" for="btnBrowse">please select an image with a 1:1 aspect ratio (a square image)</label>
                                                    <div><input type="file" name="admin_image" id="btnBrowse" class="form-control" maxlength="255" accept="image/png, image/jpeg, image/jpg" required onchange="document.getElementById('uploadPreview').classList.add('d-none');PreviewImage();"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Media -->
                                        <!-- Variants -->
                                        <div class="card mb-4">
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-check me-2"></i>Confirm</button>
                                        </div>
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