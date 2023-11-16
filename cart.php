<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
if (isset($_SESSION["user"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $page_title = "My Cart | OSC - OnlineShoppingCart";
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
                        <h2>Cart</h2>
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <i class="ion ion-md-home"></i>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="cart.php">Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Page Introduction Wrapper /- -->
            <!-- Cart-Page -->
            <div class="page-cart u-s-p-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Products-List-Wrapper -->
                            <div class="table-wrapper u-s-m-b-60">
                                <table>
                                    <thead>
                                        <tr class="x4grid">
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_cart_items = mysqli_query(
                                            $connect,
                                            "SELECT cart_items.cart_id,cart_items.product_id,products.product_image,products.product_name,products.product_price,cart_items.cart_quantity,cart_items.cart_total
                                            FROM `cart_items`
                                            INNER JOIN `products`
                                            ON cart_items.product_id = products.product_id AND cart_items.customer_id = '{$_SESSION["user_id"]}';"
                                        );
                                        $cart_total_sum = mysqli_fetch_assoc(mysqli_query($connect, "SELECT SUM(cart_total) AS sum FROM `cart_items` WHERE `customer_id` = {$_SESSION["user_id"]}"));

                                        if (mysqli_num_rows($select_cart_items) > 0) {
                                            while ($cart_item = mysqli_fetch_assoc($select_cart_items)) { ?>
                                                <tr class="x4grid">
                                                    <td>
                                                        <div class="cart-anchor-image">
                                                            <a href="product.php?product_id=<?php echo $cart_item["product_id"] ?>">
                                                                <img src="uploads/products/<?php echo $cart_item["product_image"] ?>" alt="Product" />
                                                                <h6><?php echo $cart_item["product_name"] ?></h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-price">$<?php echo $cart_item["product_price"] ?></div>
                                                    </td>
                                                    <form action="cartUpdate.php" method="post">
                                                        <td>
                                                            <div class="cart-quantity">
                                                                <div class="quantity">
                                                                    <input type="text" name="cart_quantity" class="quantity-text-field" value="<?php echo $cart_item["cart_quantity"] ?>" readonly />
                                                                    <a class="plus-a" data-max="100">&#43;</a>
                                                                    <a class="minus-a" data-min="1">&#45;</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="action-wrapper">
                                                                <input type="hidden" name="cart_id" value="<?php echo $cart_item["cart_id"] ?>">
                                                                <input type="hidden" name="product_price" value="<?php echo $cart_item["product_price"] ?>">
                                                                <button type="submit" name="submit" class="button button-outline-secondary fas fa-sync"></button>
                                                                <a href="cartDelete.php?cart_id=<?php echo $cart_item["cart_id"] ?>" class="button button-outline-secondary fas fa-trash"></a>
                                                            </div>
                                                        </td>
                                                    </form>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            location("cartEmpty.php");
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Products-List-Wrapper /- -->
                            <!-- Coupon -->
                            <div class="coupon-continue-checkout u-s-m-b-60">
                                <div class="coupon-area">
                                    <h6>Enter your coupon code if you have one.</h6>
                                    <div class="coupon-field">
                                        <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                        <input id="coupon-code" type="text" class="text-field" placeholder="Coupon Code" />
                                        <button type="button" onclick="alert('Cupon Invalid')" class="button">Apply Coupon</button>
                                    </div>
                                </div>
                                <div class="button-area">
                                    <a href="shop.php" class="continue">Continue Shopping</a>
                                    <a href="checkout.php" class="checkout">Proceed to Checkout</a>
                                </div>
                            </div>
                            <!-- Coupon /- -->
                            <!-- Billing -->
                            <div class="calculation u-s-m-b-60">
                                <div class="table-wrapper-2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="2">Cart Totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3>
                                                </td>
                                                <td>
                                                    <span class="calc-text">$<?php echo $cart_total_sum["sum"] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="calc-h3 u-s-m-b-8">Shipping</h3>
                                                    <div class="calc-choice-text u-s-m-b-4">
                                                        Free Shipping: Available
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="calc-h3 u-s-m-b-0" id="tax-heading">
                                                        Tax
                                                    </h3>
                                                    <span> (estimated for your country)</span>
                                                </td>
                                                <td>
                                                    <span class="calc-text">$0.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="calc-h3 u-s-m-b-0">Total</h3>
                                                </td>
                                                <td>
                                                    <span class="calc-text">$<?php echo $cart_total_sum["sum"] ?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Billing /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart-Page /- -->
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