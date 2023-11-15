<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Empty Cart | OSC";
include "include/head.php";
?>

<body>
    <!-- app -->
    <div id="app">
        <!-- Wishlist-Page -->
        <div class="page-wishlist">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>Em <i class="fas fa-child"></i>ty!</h1>
                    <h5>No Products were added to the wishlist.</h5>
                    <div class="redirect-link-wrapper u-s-p-t-25">
                        <a class="redirect-link" href="shop-v1-root-category.html">
                            <span>Return to Shop</span>
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