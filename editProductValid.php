<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_category = $_POST["product_category"];
    $product_price = $_POST["product_price"];
    $product_stock = $_POST["product_stock"];
    $product_video = $_POST["product_video"];
    $product_image_1 = $_FILES["product_image_1"]["name"];
    $product_tmp_image_1 = $_FILES["product_image_1"]["tmp_name"];
    $product_image_2 = $_FILES["product_image_2"]["name"];
    $product_tmp_image_2 = $_FILES["product_image_2"]["tmp_name"];
    $product_image_3 = $_FILES["product_image_3"]["name"];
    $product_tmp_image_3 = $_FILES["product_image_3"]["tmp_name"];
    $product_image_4 = $_FILES["product_image_4"]["name"];
    $product_tmp_image_4 = $_FILES["product_image_4"]["tmp_name"];
    $product_image_5 = $_FILES["product_image_5"]["name"];
    $product_tmp_image_5 = $_FILES["product_image_5"]["tmp_name"];

    $querry = "UPDATE `products` SET `product_name`='$product_name',`product_description`='$product_description',`product_category`='$product_category',`product_price`='$product_price',`product_stock`='$product_stock',`product_video`='$product_video',`product_image_1`='$product_image_1',`product_image_2`='$product_image_2',`product_image_3`='$product_image_3',`product_image_4`='$product_image_4',`product_image_5`='$product_image_5' WHERE `product_id` = $product_id";

    if (mysqli_query($connect, $querry)) {
        move_uploaded_file($product_tmp_image_1, "uploads/products/" . $product_image_1);
        move_uploaded_file($product_tmp_image_2, "uploads/products/" . $product_image_2);
        move_uploaded_file($product_tmp_image_3, "uploads/products/" . $product_image_3);
        move_uploaded_file($product_tmp_image_4, "uploads/products/" . $product_image_4);
        move_uploaded_file($product_tmp_image_5, "uploads/products/" . $product_image_5);
        alert('product added successfully');
        location('addProduct.php');
    } else {
        alert('ERROR: something went wrong');
    }
}
