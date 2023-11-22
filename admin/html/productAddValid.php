<?php
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_category = $_POST["product_category"];
    $product_price = $_POST["product_price"];
    $product_stock = $_POST["product_stock"];
    $product_image = $_FILES["product_image"]["name"];
    $product_image_tmp = $_FILES["product_image"]["tmp_name"];

    $querry = "INSERT INTO `products`( `product_name`, `product_description`, `product_category`, `product_price`, `product_stock`, `product_image`) VALUES ('$product_name','$product_description','$product_category','$product_price','$product_stock','$product_image')";

    if (mysqli_query($connect, $querry)) {
        move_uploaded_file($product_image_tmp, "../../../public/uploads/products/" . $product_image);
        historyGo();
    } else {
        alert("something went wrong");
        historyGo();
    }
}
