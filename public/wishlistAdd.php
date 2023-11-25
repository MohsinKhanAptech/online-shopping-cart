<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["customer"])) {
    $customer_id = $_SESSION["customer_id"];
    $product_id = $_GET["product_id"];

    $wishlistExists = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `wishlist` WHERE `product_id` = '$product_id' AND `customer_id` = '$customer_id'"));
    $wishlist_add = "INSERT INTO `wishlist`(`customer_id`, `product_id`) VALUES ('$customer_id','$product_id')";
    $wishlist_remove = "DELETE FROM `wishlist` WHERE `product_id` = '$product_id' AND `customer_id` = '$customer_id'";

    if ($wishlistExists == 1) {
        mysqli_query($connect, $wishlist_remove);
        historyGo();
    } else {
        mysqli_query($connect, $wishlist_add);
        historyGo();
    }
} else {
    alert('you must login first');
    location('account.php');
}
