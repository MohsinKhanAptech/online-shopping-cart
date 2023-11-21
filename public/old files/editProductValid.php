<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $product_id = $_POST["product_id"];
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

    $querry = "UPDATE `products` SET `product_name`='$product_name',`product_description`='$product_description',`product_category`='$product_category',`product_price`='$product_price',`product_stock`='$product_stock',`product_video`='$product_video' WHERE `product_id` = $product_id";
    $updateImage1 = "UPDATE `products` SET `product_image_1`='$product_image_1' WHERE `product_id` = $product_id";
    $updateImage2 = "UPDATE `products` SET `product_image_2`='$product_image_2' WHERE `product_id` = $product_id";
    $updateImage3 = "UPDATE `products` SET `product_image_3`='$product_image_3' WHERE `product_id` = $product_id";
    $updateImage4 = "UPDATE `products` SET `product_image_4`='$product_image_4' WHERE `product_id` = $product_id";
    $updateImage5 = "UPDATE `products` SET `product_image_5`='$product_image_5' WHERE `product_id` = $product_id";

    if (mysqli_query($connect, $querry)) {
        if (isset($product_image_1)) {
            mysqli_query($connect, $updateImage1);
            move_uploaded_file($product_tmp_image_1, "uploads/products/" . $product_image_1);
            if (isset($product_image_2)) {
                mysqli_query($connect, $updateImage2);
                move_uploaded_file($product_tmp_image_2, "uploads/products/" . $product_image_2);
                if (isset($product_image_3)) {
                    mysqli_query($connect, $updateImage3);
                    move_uploaded_file($product_tmp_image_3, "uploads/products/" . $product_image_3);
                    if (isset($product_image_4)) {
                        mysqli_query($connect, $updateImage4);
                        move_uploaded_file($product_tmp_image_4, "uploads/products/" . $product_image_4);
                        if (isset($product_image_5)) {
                            mysqli_query($connect, $updateImage5);
                            move_uploaded_file($product_tmp_image_5, "uploads/products/" . $product_image_5);
                        }
                    }
                }
            }
        }
        alert('product updated successfully');
        location('editProduct.php');
    } else {
        alert('ERROR: something went wrong');
    }
}
