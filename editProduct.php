<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "edit product panel";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>edit product panel</h1>

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
                <div class="productName">
                    productName:
                    <?php echo $row["product_name"] ?>
                </div>
                <div class="productPrice">
                    productPrice:
                    <?php echo $row["product_price"] ?>
                </div>
                <div class="productStock">
                    productStock:
                    <?php echo $row["product_stock"] ?>
                </div>
                <form action="editProductForm.php" method="post">
                    <div><input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>"></div>
                    <div><button type="submit" name="submit">edit product</button></div>
                </form>
                <form action="deleteProduct.php" method="post">
                    <div><input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>"></div>
                    <div><button type="submit" name="submit">delete</button></div>
                </form>
                <hr>
            </div>
    <?php
        }
    } ?>
</body>

</html>