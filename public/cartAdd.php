<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["customer"])) {
    if (isset($_POST["submit"])) {
        $customer_id = $_SESSION["customer_id"];
        $product_id = $_POST["product_id"];
        $product_price = $_POST["product_price"];
        $cart_quantity = $_POST["cart_quantity"];
        $cart_total = $product_price * $cart_quantity;

        $cart_querry = "INSERT INTO `cart_items`(`customer_id`, `product_id`, `product_price`, `cart_quantity`, `cart_total`) VALUES ('$customer_id','$product_id','$product_price','$cart_quantity','$cart_total')";

        if (mysqli_query($connect, $cart_querry)) {
            if (isset($_POST["wishlist_id"])) {
                $wishlist_id = $_POST["wishlist_id"];
                mysqli_query($connect, "DELETE FROM `wishlist` WHERE `wishlist_id` = $wishlist_id");
            };
            // alert('success');
            historyGo();
        } else {
            alert('ERROR');
            historyGo();
        }
    }
} else {
    alert('you must login first');
    location('account.php');
}
