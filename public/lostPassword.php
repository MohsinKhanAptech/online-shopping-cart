<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Lost Password | OSC - OnlineShoppingCart";
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
                    <h2>Lost Password</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="lostPassword.php">Lost Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Lost-password-Page -->
        <div class="page-lost-password u-s-p-t-80">
            <div class="container">
                <div class="page-lostpassword">
                    <h2 class="account-h2 u-s-m-b-20">Forgot Password ?</h2>
                    <h6 class="account-h6 u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</h6>
                    <form onsubmit="alert('You will receive a reset link shortly');return false;">
                        <div class="w-50">
                            <div class="u-s-m-b-13">
                                <label for="user-name-email">Username or Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name-email" class="text-field" placeholder="Username / Email">
                            </div>
                            <div class="u-s-m-b-13">
                                <button type="submit" class="button button-outline-secondary">Get Reset Link</button>
                            </div>
                        </div>
                        <div class="page-anchor">
                            <a href="account.php">
                                <i class="fas fa-long-arrow-alt-left u-s-m-r-9"></i>
                                Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Lost-Password-Page /- -->
        <!-- Footer -->
        <?php include "include/footer.php"; ?>
        <!-- Footer /- -->
        <!-- Dummy Selectbox -->
        <?php include "include/dummySelectbox.php"; ?>
        <!-- Dummy Selectbox /- -->
        <!-- Responsive-Search -->
        <?php include "include/responsiveSearch.php"; ?>
        <!-- Responsive-Search /- -->
        <!-- Quick-view-Modal -->
        <?php // include "include/quickViewModal.php"; 
        ?>
        <!-- Quick-view-Modal /- -->
    </div>
    <?php include "include/scripts.php" ?>
</body>

</html>