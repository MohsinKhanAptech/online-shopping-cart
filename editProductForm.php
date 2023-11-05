<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "add product panel";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>add product panel</h1>

    <?php
    if (isset($_POST["submit"])) {
        $product_id = $_POST["product_id"];

        $querry = "SELECT * FROM `products` WHERE `product_id` = $product_id";
        $querry_run = mysqli_query($connect, $querry);

        if (mysqli_num_rows($querry_run) > 0) {
            while ($row = mysqli_fetch_assoc($querry_run)) { ?>
                <form action="editProductValid.php" method="post" enctype="multipart/form-data">
                    <div><label for="product_name">Product Name</label></div>
                    <div><input type="text" name="product_name" id="product_name" value="<?php echo $row["product_name"] ?>" required></div>
                    <div><label for="product_description">Product Description</label></div>
                    <div><textarea name="product_description" id="product_description" cols="30" rows="5" required><?php echo $row["product_description"] ?></textarea></div>
                    <div><label for="product_category">Product Category</label></div>
                    <div><select name="product_category" id="product_category" required>
                            <option <?php if ($row["product_category"] == 1) {
                                        echo "selected";
                                    } ?> value="1">stationary</option>
                            <option <?php if ($row["product_category"] == 2) {
                                        echo "selected";
                                    } ?> value="2">accessory</option>
                            <option <?php if ($row["product_category"] == 3) {
                                        echo "selected";
                                    } ?> value="3">sweet</option>
                            <option <?php if ($row["product_category"] == 4) {
                                        echo "selected";
                                    } ?> value="4">fragrance</option>
                            <option <?php if ($row["product_category"] == 5) {
                                        echo "selected";
                                    } ?> value="5">toy</option>
                        </select></div>
                    <div><label for="product_price">Product Price</label></div>
                    <div><input type="number" name="product_price" id="product_price" step=".01" value="<?php echo $row["product_price"] ?>" required></div>
                    <div><label for="product_stock">Product Stock</label></div>
                    <div><input type="number" name="product_stock" id="product_stock" value="<?php echo $row["product_stock"] ?>" required></div>
                    <div><label for="product_video">Product Video</label></div>
                    <div><input type="text" name="product_video" id="product_video"></div>
                    <div class="productImgContainer">
                        <?php
                        if ($row["product_image_1"] != "") {
                            echo "<img src='uploads/products/" . $row["product_image_1"] . "' class='productImg' alt=''>";
                            if ($row["product_image_2"] != "") {
                                echo "<img src='uploads/products/" . $row["product_image_2"] . "' class='productImg' alt=''>";
                                if ($row["product_image_3"] != "") {
                                    echo "<img src='uploads/products/" . $row["product_image_3"] . "' class='productImg' alt=''>";
                                    if ($row["product_image_4"] != "") {
                                        echo "<img src='uploads/products/" . $row["product_image_4"] . "' class='productImg' alt=''>";
                                        if ($row["product_image_5"] != "") {
                                            echo "<img src='uploads/products/" . $row["product_image_5"] . "' class='productImg' alt=''>";
                                        } else {
                                            echo '<img src="" alt="">';
                                        }
                                    } else {
                                        echo '<img src="" alt=""><img src="" alt="">';
                                    }
                                } else {
                                    echo '<img src="" alt=""><img src="" alt=""><img src="" alt="">';
                                }
                            } else {
                                echo '<img src="" alt=""><img src="" alt=""><img src="" alt=""><img src="" alt="">';
                            }
                        } else {
                            echo "<h3>products image not avaliable</h3>";
                        }
                        ?>
                        <div>
                            <div><label for="product_image_1">Product Image 1</label></div>
                            <div><input type="file" name="product_image_1" id="product_image_1" required></div>
                        </div>
                        <div>
                            <div><label for="product_image_2">Product Image 2</label></div>
                            <div><input type="file" name="product_image_2" id="product_image_2"></div>
                        </div>
                        <div>
                            <div><label for="product_image_3">Product Image 3</label></div>
                            <div><input type="file" name="product_image_3" id="product_image_3"></div>
                        </div>
                        <div>
                            <div><label for="product_image_4">Product Image 4</label></div>
                            <div><input type="file" name="product_image_4" id="product_image_4"></div>
                        </div>
                        <div>
                            <div><label for="product_image_5">Product Image 5</label></div>
                            <div><input type="file" name="product_image_5" id="product_image_5"></div>
                        </div>
                    </div>
                    <div><input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>"></div>
                    <div><button type="submit" name="submit">Submit</button></div>
                </form>
    <?php
            }
        }
    };
    ?>
</body>

</html>