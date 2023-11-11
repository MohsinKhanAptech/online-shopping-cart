<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "employee panel";
include "include/head.php";
?>

<body>
    <?php
    $page_title = "employee panel";
    include "include/navbar.php";
    ?>
    <h1>employee panel</h1>
    <?php
    $select_orders = mysqli_query($connect, "SELECT * FROM `orders`");
    $select_orders_num = mysqli_num_rows($select_orders);

    if ($select_orders_num > 0) {
        while ($order = mysqli_fetch_assoc($select_orders)) {
            $select_orders_items = mysqli_query($connect, "SELECT * FROM `products` WHERE `product_id` = {$order["product_id"]}");
            $product = mysqli_fetch_assoc($select_orders_items) ?>
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
                <div class="fs-1">
                    productName:
                    <?php echo $product["product_name"] ?>
                </div>
                <div class="fs-1">
                    productPrice:
                    <?php echo $product["product_price"] ?>
                </div>
                <div class="fs-1">
                    productStock:
                    <?php echo $product["product_stock"] ?>
                </div>
                <form action="updateOrderStatus.php" method="post">
                    <div><input type="hidden" name="order_id" value="<?php echo $order["order_id"] ?>"></div>
                    <div><label for="order_status_id">Order Status</label></div>
                    <div><select name="order_status_id" id="order_status_id" required>
                            <option <?php if ($order["order_status_id"] == 1) {
                                        echo "selected";
                                    } ?> value="1">Pending</option>
                            <option <?php if ($order["order_status_id"] == 2) {
                                        echo "selected";
                                    } ?> value="2">Processing</option>
                            <option <?php if ($order["order_status_id"] == 3) {
                                        echo "selected";
                                    } ?> value="3">Shipped</option>
                            <option <?php if ($order["order_status_id"] == 4) {
                                        echo "selected";
                                    } ?> value="4">Backorder</option>
                            <option <?php if ($order["order_status_id"] == 5) {
                                        echo "selected";
                                    } ?> value="5">On Hold</option>
                        </select></div>
                    <div><button type="submit" name="submit">update</button></div>
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