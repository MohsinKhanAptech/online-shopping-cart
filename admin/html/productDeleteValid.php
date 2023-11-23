<?php
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $product_id = $_POST["product_id"];

    $product_image = mysqli_fetch_column(mysqli_query($connect, "SELECT `product_image` FROM `products` WHERE `product_id` = '$product_id'"));

    $querry = "DELETE FROM `products` WHERE `product_id` = '$product_id'";

    if (mysqli_query($connect, $querry)) {
        unlink("../../public/uploads/products/$product_image");
        location("productList.php");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
