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

    $product_id = mysqli_fetch_column(mysqli_query($connect, "SELECT `product_id` FROM `products` WHERE `product_name` = '$product_name'"));

    list($width, $height) = getimagesize($employee_image_tmp);

    if ($width != $height) {
        alert("Image is not square");
        historyGo();
    } elseif (mysqli_query($connect, $querry)) {
        move_uploaded_file($product_image_tmp, "../../public/uploads/products/" . $product_image);
        location("productView.php?product_id=$product_id");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
