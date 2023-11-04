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

    <form action="addProductValid.php" method="post" enctype="multipart/form-data">
        <div><label for="product_name">Product Name</label></div>
        <div><input type="text" name="product_name" id="product_name" required></div>
        <div><label for="product_description">Product Description</label></div>
        <div><textarea name="product_description" id="product_description" cols="30" rows="5" required></textarea></div>
        <div><label for="product_category">Product Category</label></div>
        <div><select name="product_category" id="product_category" required>
                <option value="1">stationary</option>
                <option value="2">accessory</option>
                <option value="3">sweet</option>
                <option value="4">fragrance</option>
                <option value="5">toy</option>
            </select></div>
        <div><label for="product_price">Product Price</label></div>
        <div><input type="number" name="product_price" id="product_price" required></div>
        <div><label for="product_stock">Product Stock</label></div>
        <div><input type="number" name="product_stock" id="product_stock" required></div>
        <div><label for="product_video">Product Video</label></div>
        <div><input type="text" name="product_video" id="product_video"></div>
        <div><label for="product_image_1">Product Image 1</label></div>
        <div><input type="file" name="product_image_1" id="product_image_1" required></div>
        <div><label for="product_image_2">Product Image 2</label></div>
        <div><input type="file" name="product_image_2" id="product_image_2"></div>
        <div><label for="product_image_3">Product Image 3</label></div>
        <div><input type="file" name="product_image_3" id="product_image_3"></div>
        <div><label for="product_image_4">Product Image 4</label></div>
        <div><input type="file" name="product_image_4" id="product_image_4"></div>
        <div><label for="product_image_5">Product Image 5</label></div>
        <div><input type="file" name="product_image_5" id="product_image_5"></div>
        <div><button type="submit" name="submit">Submit</button></div>
    </form>
</body>

</html>