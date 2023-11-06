<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "my cart";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>my cart</h1>
    <?php
    $select_cart = mysqli_query($connect, "SELECT * FROM `cart_items` WHERE `customer_id` = {$_SESSION["user_id"]}");
    $select_cart_num = mysqli_num_rows($select_cart);
    $cart_total_sum = mysqli_fetch_assoc(mysqli_query($connect, "SELECT SUM(cart_total) AS sum FROM `cart_items` WHERE `customer_id` = {$_SESSION["user_id"]}")); ?>

    <div class="card flex flex-space-around">
        <h1>total = $<?php echo $cart_total_sum["sum"]; ?></h1>
        <h1>No. of items = <?php echo $select_cart_num; ?></h1>
    </div>
    <hr><br>

    <?php if ($select_cart_num > 0) {
        while ($cart_items = mysqli_fetch_assoc($select_cart)) {
            $select_cart_items = mysqli_query($connect, "SELECT * FROM `products` WHERE `product_id` = {$cart_items["product_id"]}");
            $product = mysqli_fetch_assoc($select_cart_items) ?>
            <div class="card">
                <div class="imageContainer">
                    <?php
                    if ($product["product_image_1"] != "") {
                        echo "<img src='uploads/products/" . $product["product_image_1"] . "' class='image' alt=''>";
                        if ($product["product_image_2"] != "") {
                            echo "<img src='uploads/products/" . $product["product_image_2"] . "' class='image' alt=''>";
                            if ($product["product_image_3"] != "") {
                                echo "<img src='uploads/products/" . $product["product_image_3"] . "' class='image' alt=''>";
                                if ($product["product_image_4"] != "") {
                                    echo "<img src='uploads/products/" . $product["product_image_4"] . "' class='image' alt=''>";
                                    if ($product["product_image_5"] != "") {
                                        echo "<img src='uploads/products/" . $product["product_image_5"] . "' class='image' alt=''>";
                                    }
                                }
                            }
                        }
                    } else {
                        echo "<h3>products image not avaliable</h3>";
                    }
                    ?>
                </div>
                <div class="productName">
                    productName:
                    <?php echo $product["product_name"] ?>
                </div>
                <div class="productPrice">
                    productPrice:
                    <?php echo $product["product_price"] ?>
                </div>
                <div class="productStock">
                    productStock:
                    <?php echo $product["product_stock"] ?>
                </div>
                <form action="updateCart.php" method="post">
                    <div><input type="hidden" name="cart_id" value="<?php echo $cart_items["cart_id"] ?>"></div>
                    <div><label for="cart_quantity">quantity</label></div>
                    <div><input type="number" name="cart_quantity" id="cart_quantity" value="<?php echo $cart_items["cart_quantity"]; ?>" min="1" max="10"> * <sup>for orders above 10 please contact us through email</sup></div>
                    <div><button type="submit" name="submit">update</button></div>
                </form>
                <form action="deleteCartItem.php" method="post">
                    <div><input type="hidden" name="cart_id" value="<?php echo $cart_items["cart_id"] ?>"></div>
                    <div><button type="submit" name="submit">remove</button></div>
                </form>
                <hr>
            </div>
    <?php
        }
    } else {
        echo "<br><h1>no items in cart</h1>";
    } ?>
</body>

</html>