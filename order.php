<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $select_cart = mysqli_query($connect, "SELECT * FROM `cart_items` WHERE `customer_id` = {$_SESSION["user_id"]}");

    if (mysqli_num_rows($select_cart) > 0) {
        while ($cart = mysqli_fetch_assoc($select_cart)) {
            $place_order = mysqli_query($connect, "INSERT INTO `orders`(`customer_id`, `product_id`, `order_status_id`, `order_total`) VALUES ('{$cart["customer_id"]}','{$cart["product_id"]}','1','{$cart["cart_total"]}')");
            $remove_cart_item = mysqli_query($connect, "DELETE FROM `cart_items` WHERE `cart_id` = {$cart["cart_id"]};");
        }
        alert("order placed");
        location("cart.php");
    } else {
        alert("Your cart is empty");
        location("cart.php");
    }
}
