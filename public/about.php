<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "FAQ | OSC - OnlineShoppingCart";
include "include/head.php";
?>

<body>
    <div id="app">
        <!-- Header -->
        <?php include "include/navbar.php" ?>
        <!-- Header /- -->
        <!-- Page Introduction Wrapper -->
        <div class="page-style-a">
            <div class="container">
                <div class="page-intro">
                    <h2>About</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="about.php">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- About-Page -->
        <div class="page-about u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-me-info u-s-m-b-30">
                            <h1>Welcome to
                                <span>Groover</span>
                            </h1>
                            <p>At our store, we are passionate about providing our customers with unique and creative items that are not typically found in brick-and-mortar stores. Our team of experts works tirelessly to curate a collection of high-quality products that are sure to delight our customers.
                            </p>
                            <p>We believe that every gift should be special and that every occasion deserves to be celebrated in style. Whether you’re looking for the perfect gift for a loved one or a unique piece of stationery to make your mark, we’ve got you covered. Thank you for choosing our store for all your gift and stationary needs!
                            </p>
                            <p>Our online gift and stationary store is passionate about providing our customers with unique and creative items that are not typically found in brick-and-mortar stores. Our team of experts works tirelessly to curate a collection of high-quality products that are sure to delight our customers. We believe that every gift should be special and that every occasion deserves to be celebrated in style. Whether you’re looking for the perfect gift for a loved one or a unique piece of stationery to make your mark, we’ve got you covered.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-me-image u-s-m-b-30">
                            <div class="banner-hover effect-border-scaling-gray">
                                <img class="img-fluid" src="include/images/about/cart1.jpg" alt="About Picture">
                            </div>
                        </div>
                        <div class="about-social text-center u-s-m-b-30">
                            <ul class="social-media-list">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.google.com/" target="_blank">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/" target="_blank">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About-Page /- -->
        <!-- Footer -->
        <?php include "include/footer.php"; ?>
        <!-- Footer /- -->
        <!-- Dummy Selectbox -->
        <?php include "include/dummySelectbox.php"; ?>
        <!-- Dummy Selectbox /- -->
        <!-- Responsive-Search -->
        <?php include "include/responsiveSearch.php"; ?>
        <!-- Responsive-Search /- -->
    </div>
    <?php include "include/scripts.php" ?>
</body>

</html>