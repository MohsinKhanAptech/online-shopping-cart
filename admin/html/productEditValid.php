<?php
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_category = $_POST["product_category"];
    $product_price = $_POST["product_price"];
    $product_stock = $_POST["product_stock"];
    $product_image = $_FILES["product_image"]["name"];
    $product_image_size = $_FILES["product_image"]["size"];
    $product_image_tmp = $_FILES["product_image"]["tmp_name"];

    if ($product_image_size > 0) {
        $querry = "UPDATE `products` SET `product_name`='$product_name',`product_description`='$product_description',`product_category`='$product_category',`product_price`='$product_price',`product_stock`='$product_stock',`product_image`='$product_image' WHERE `product_id` = $product_id";
    } else {
        $querry = "UPDATE `products` SET `product_name`='$product_name',`product_description`='$product_description',`product_category`='$product_category',`product_price`='$product_price',`product_stock`='$product_stock' WHERE `product_id` = $product_id";
    }

    if (mysqli_query($connect, $querry)) {
        if ($product_image_size > 0) {
            move_uploaded_file($product_image_tmp, "../../public/uploads/products/" . $product_image);
        };
        location("productView.php?product_id=$product_id");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
