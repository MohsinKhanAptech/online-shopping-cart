<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "ERROR 404";
include "include/head.php";
?>

<head>
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-misc.css" />
</head>

<body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Page Not Found :(</h2>
            <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
            <a href="index.php" class="btn btn-primary">Back to home</a>
            <div class="mt-3">
                <img src="../assets/img/illustrations/page-misc-error-light.png" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png" />
            </div>
        </div>
    </div>
    <!-- /Error -->

    <!-- / Content -->
    <?php include "include/script.php" ?>
</body>

</html>