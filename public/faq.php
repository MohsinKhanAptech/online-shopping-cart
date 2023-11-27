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
                    <h2>FAQ</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="faq.php">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- FAQ-Page -->
        <div class="page-faq u-s-p-t-80">
            <div class="container">
                <div class="faq u-s-m-b-50">
                    <h1>FREQUENTLY QUESTIONS</h1>
                    <h1>Below are frequently asked questions, you may find the answer for yourself.</h1>
                </div>
                <div class="u-s-m-b-50">
                    <div class="f-a-q u-s-m-b-30">
                        <a data-toggle="collapse" href="#faq-1">How can I get discount coupon ?</a>
                        <div class="collapse show" id="faq-1">
                            <p>
                                You can get a discount coupon through our product promotions and special events or by attending and/or completing a challenge.
                            </p>
                        </div>
                    </div>
                    <div class="f-a-q u-s-m-b-30">
                        <a data-toggle="collapse" href="#faq-2">Do I need to create an account to buy products ?</a>
                        <div class="collapse" id="faq-2">
                            <p>
                                Yes. it is required that you create an account to place an order.
                            </p>
                        </div>
                    </div>
                    <div class="f-a-q u-s-m-b-30">
                        <a data-toggle="collapse" href="#faq-3">How can I track my order ?</a>
                        <div class="collapse" id="faq-3">
                            <p>
                                Visit the Track order page on our website for more information.
                            </p>
                        </div>
                    </div>
                    <div class="f-a-q u-s-m-b-30">
                        <a data-toggle="collapse" href="#faq-4">What is the payment security system ?</a>
                        <div class="collapse" id="faq-4">
                            <p>
                                Cash on delivery
                            </p>
                        </div>
                    </div>
                    <div class="f-a-q u-s-m-b-30">
                        <a data-toggle="collapse" href="#faq-6">How can I return my product ?</a>
                        <div class="collapse" id="faq-6">
                            <p>
                                you need to return your product within 7 days of delivery.
                            </p>
                        </div>
                    </div>
                    <div class="f-a-q u-s-m-b-30">
                        <a data-toggle="collapse" href="#faq-7">What Payment Methods are Available ?</a>
                        <div class="collapse" id="faq-7">
                            <p>
                                Cash on delivery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ-Page /- -->
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