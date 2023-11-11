<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Home";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>home</h1>
    <?php
    $product_querry = "SELECT * FROM `products`";
    $product_querry_run = mysqli_query($connect, $product_querry);

    if (mysqli_num_rows($product_querry_run) > 0) {
        while ($row = mysqli_fetch_assoc($product_querry_run)) { ?>
            <div class="card">
                <div class="imageContainer">
                    <?php
                    if ($row["product_image_1"] != "") {
                        echo "<img src='uploads/products/" . $row["product_image_1"] . "' class='image' alt=''>";
                        if ($row["product_image_2"] != "") {
                            echo "<img src='uploads/products/" . $row["product_image_2"] . "' class='image' alt=''>";
                            if ($row["product_image_3"] != "") {
                                echo "<img src='uploads/products/" . $row["product_image_3"] . "' class='image' alt=''>";
                                if ($row["product_image_4"] != "") {
                                    echo "<img src='uploads/products/" . $row["product_image_4"] . "' class='image' alt=''>";
                                    if ($row["product_image_5"] != "") {
                                        echo "<img src='uploads/products/" . $row["product_image_5"] . "' class='image' alt=''>";
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
                    <?php echo $row["product_name"] ?>
                </div>
                <div class="fs-1">
                    productPrice:
                    <?php echo $row["product_price"] ?>
                </div>
                <div class="fs-1">
                    productStock:
                    <?php echo $row["product_stock"] ?>
                </div>
                <form action="addToCart.php" method="post">
                    <div><input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>"></div>
                    <div><input type="hidden" name="product_price" value="<?php echo $row["product_price"] ?>"></div>
                    <div><label for="cart_quantity">quantity</label></div>
                    <div><input type="number" name="cart_quantity" id="cart_quantity" value="1" min="1" max="10"> * <sup>for orders above 10 please contact us through email</sup></div>
                    <div><button type="submit" name="submit">add to cart</button></div>
                </form>
                <hr>
            </div>
    <?php
        };
    } ?>
</body>

</html>