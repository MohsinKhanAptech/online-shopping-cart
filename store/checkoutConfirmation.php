<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Checkout Confirmation | OSC - OnlineShoppingCart";
include "include/head.php";
?>

<body>
    <!-- app -->
    <div id="app">
        <!-- Checkout-Confirmation-Page -->
        <div class="page-checkout-confirm">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>Thank you!</h1>
                    <h5>If you haven't received it yet. click to
                        <button onclick="alert('Confirmation Email Resent');location.href='index.php';">resend confirmation email</button>.
                    </h5>
                    <a href="index.php" class="thank-you-back">Back to homepage</a>
                </div>
            </div>
        </div>
        <!-- Checkout-Confirmation-Page /- -->
    </div>
    <!-- app /- -->
</body>

</html>