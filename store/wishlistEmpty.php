<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Empty Wishlist | OSC - OnlineShoppingCart";
include "include/head.php";
?>

<body>
    <!-- app -->
    <div id="app">
        <!-- Wishlist-Page -->
        <div class="page-wishlist">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>Em<i class="fas fa-child"></i>ty!</h1>
                    <h5>No Products were added to the wishlist.</h5>
                    <div class="redirect-link-wrapper u-s-p-t-25">
                        <a class="redirect-link" href="index.php">
                            <span>Home</span>
                        </a>
                        <a class="redirect-link" href="shop.php" style="margin: 0 1rem">
                            <span>Return to Shop</span>
                        </a>
                        <a class="redirect-link" onclick="history.back()">
                            <span>Go Back</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist-Page /- -->
    </div>
    <!-- app /- -->
</body>

</html>