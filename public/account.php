<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Log-in / Sign-up | OSC - OnlineShoppingCart";
include "include/head.php";
if (!isset($_SESSION["customer"])) {
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
                        <h2>Detail</h2>
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <i class="ion ion-md-home"></i>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="account.php">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Page Introduction Wrapper /- -->
            <!-- Account-Page -->
            <div class="page-account u-s-p-t-80">
                <div class="container">
                    <div class="row">
                        <!-- Login -->
                        <div class="col-lg-6">
                            <div class="login-wrapper">
                                <h2 class="account-h2 u-s-m-b-20">Login</h2>
                                <h6 class="account-h6 u-s-m-b-30">
                                    Welcome back! Sign in to your account.
                                </h6>
                                <form action="login.php" method="post">
                                    <div class="u-s-m-b-30">
                                        <label for="user-name-email">Username or Email
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="email" type="text" id="user-name-email" class="text-field" placeholder="Username / Email" maxlength="255" required />
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label for="login-password">Password
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="password" type="text" id="login-password" class="text-field" placeholder="Password" maxlength="255" required />
                                    </div>
                                    <div class="group-inline u-s-m-b-30">
                                        <div class="group-1">
                                            <input type="checkbox" class="check-box" id="remember-me-token" />
                                            <label class="label-text" for="remember-me-token">Remember me</label>
                                        </div>
                                        <div class="group-2 text-right">
                                            <div class="page-anchor">
                                                <a href="lostPassword.php">
                                                    <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost
                                                    your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-b-45">
                                        <button name="submit" type="submit" class="button button-outline-secondary w-100">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login /- -->
                        <!-- Register -->
                        <div class="col-lg-6">
                            <div class="reg-wrapper">
                                <h2 class="account-h2 u-s-m-b-20">Register</h2>
                                <h6 class="account-h6 u-s-m-b-30">
                                    Registering for this site allows you to access your order
                                    status and history.
                                </h6>
                                <form action="register.php" method="post">
                                    <div class="u-s-m-b-30">
                                        <label for="user-name">Username
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="name" type="text" id="user-name" class="text-field" placeholder="Username" maxlength="100" required />
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label for="email">Email
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="email" type="text" id="email" class="text-field" placeholder="Email" maxlength="255" required />
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label for="password">Password
                                            <span class="astk">*</span>
                                        </label>
                                        <input name="password" type="text" id="password" class="text-field" placeholder="Password" maxlength="255" required />
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <input type="checkbox" class="check-box" id="accept" required />
                                        <label class="label-text no-color" for="accept">I’ve read and accept the
                                            <a href="termsAndConditions.php" class="u-c-brand">terms & conditions</a>
                                        </label>
                                    </div>
                                    <div class="u-s-m-b-45">
                                        <button type="submit" name="submit" class="button button-primary w-100">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register /- -->
                    </div>
                </div>
            </div>
            <!-- Account-Page /- -->
            <!-- Footer -->
            <?php include "include/footer.php"; ?>
            <!-- Footer /- -->
            <!-- Dummy Selectbox -->
            <?php include "include/dummySelectbox.php"; ?>
            <!-- Dummy Selectbox /- -->
            <!-- Quick-view-Modal -->
            <?php // include "include/quickViewModal.php"; 
            ?>
            <!-- Quick-view-Modal /- -->
        </div>
        <?php include "include/scripts.php" ?>
    </body>
<?php
} else {
    alert("a user is already logged in");
    historyGo();
}
?>