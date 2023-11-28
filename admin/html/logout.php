<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Log-out";
include "include/head.php";
?>

<head>
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.php" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bold fs-1">OSC</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Are You Sure?</h4>
                        <p class="mb-4">Log-out page</p>
                        <div class="mb-3">
                            <a href="logoutValid.php"><button class="btn btn-secondary d-grid w-100" type="button">Log Out</button></a>
                        </div>
                        <div class="mb-3">
                            <button onclick="history.back()" class="btn btn-primary d-grid w-100" type="button">Go Back</button>
                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
    <?php include "include/script.php"; ?>
</body>

</html>