<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Track Orders | OSC - OnlineShoppingCart";
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
                    <h2>Track Order</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="trackOrder.php">Track Order</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Track-Order-Page -->
        <div class="page-track-order u-s-p-t-80">
            <div class="container">
                <div class="track-order-wrapper">
                    <h2 class="track-order-h2 u-s-m-b-20 text-center">Track Your Order</h2>
                    <h6 class="track-order-h6 u-s-m-b-30">To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</h6>
                    <form onsubmit="alert('Order tracking link has been sent to your billing-email.\n Thank you.')">
                        <div class="u-s-m-b-30">
                            <label for="order-id">Order ID
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="order-id" class="text-field" placeholder="Found in your order confirmation email" required>
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="billing-email">Billing Email
                                <span class="astk">*</span>
                            </label>
                            <input type="email" id="billing-email" class="text-field" placeholder="Email you used during checkout." required>
                        </div>
                        <div class="u-s-m-b-30">
                            <button type="submit" class="button button-outline-secondary w-100">TRACK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Track-Order-Page /- -->
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