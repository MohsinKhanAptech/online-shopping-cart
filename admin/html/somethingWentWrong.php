<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Shomething Went Wrong | Admin Panel | OSC";
include "include/head.php";
?>

<head>
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-misc.css" />
</head>

<body>
    <!-- Content -->

    <!--Something Went Wrong -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Something Went Wrong!</h2>
            <p class="mb-4 mx-2">Something unexpected happend sorry for the inconvenience</p>
            <a href="index.php" class="btn btn-primary">Back to home</a>
            <div class="mt-4">
                <img src="../assets/img/illustrations/girl-doing-yoga-light.png" alt="girl-doing-yoga-light" width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png" data-app-light-img="illustrations/girl-doing-yoga-light.png" />
            </div>
        </div>
    </div>
    <!-- /Something Went Wrong -->

    <!-- / Content -->
    <?php include "include/script.php" ?>
</body>

</html>