<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
if (isset($_SESSION["user"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $page_title = "My Wishlist | OSC - OnlineShoppingCart";
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
                        <h2>Wishlist</h2>
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <i class="ion ion-md-home"></i>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="wishlist.php">Wishlist</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Page Introduction Wrapper /- -->
            <!-- Wishlist-Page -->
            <div class="page-wishlist u-s-p-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Products-List-Wrapper -->
                            <div class="table-wrapper u-s-m-b-60">
                                <table>
                                    <thead>
                                        <tr class="x4grid">
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Stock Status</th>
                                            <th>Add to cart / Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_wishlist_items = mysqli_query(
                                            $connect,
                                            "SELECT wishlist.wishlist_id,products.product_id,products.product_image,products.product_name,products.product_price,products.product_stock
                                            FROM `wishlist`
                                            INNER JOIN `products`
                                            ON wishlist.product_id = products.product_id AND wishlist.customer_id = {$_SESSION["user_id"]};"
                                        );

                                        if (mysqli_num_rows($select_wishlist_items) > 0) {
                                            while ($wishlist_item = mysqli_fetch_assoc($select_wishlist_items)) { ?>
                                                <tr class="x4grid">
                                                    <td>
                                                        <div class="cart-anchor-image">
                                                            <a href="single-product.html">
                                                                <img src="uploads/products/<?php echo $wishlist_item["product_image"] ?>" alt="Product" />
                                                                <h6><?php echo $wishlist_item["product_name"] ?></h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-price">$<?php echo $wishlist_item["product_price"] ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-stock"><?php echo $wishlist_item["product_stock"] > 0 ? "In Stock" : "Out Of Stock"; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="action-wrapper">
                                                            <form action="cartAdd.php" method="post">
                                                                <input type="hidden" name="wishlist_id" value="<?php echo $wishlist_item["wishlist_id"] ?>">
                                                                <input type="hidden" name="product_id" value="<?php echo $wishlist_item["product_id"] ?>">
                                                                <input type="hidden" name="product_price" value="<?php echo $wishlist_item["product_price"] ?>">
                                                                <input type="hidden" name="cart_quantity" value="1">
                                                                <button type="submit" name="submit" class="button button-outline-secondary">
                                                                    Add to Cart
                                                                </button>
                                                                <a href="wishlistDelete.php?wishlist_id=<?php echo $wishlist_item["wishlist_id"] ?>" class="button button-outline-secondary fas fa-trash"></a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            location("wishlistEmpty.php");
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Products-List-Wrapper /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wishlist-Page /- -->
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
<?php
} else {
    alert("No User Logged-in");
    location("account.php");
} ?>