<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $select_cart = mysqli_query($connect, "SELECT * FROM `cart_items` WHERE `customer_id` = {$_SESSION["user_id"]}");

    if (mysqli_num_rows($select_cart) > 0) {
        $insert_order = mysqli_query(
            $connect,
            "INSERT INTO `orders` (`customer_id`,`product_id`,`order_quantity`,`order_total`)
            SELECT `customer_id`,`product_id`,`cart_quantity`,`cart_total`
            FROM `cart_items`
            WHERE `customer_id` = {$_SESSION["user_id"]};"
        );
        $clear_cart = mysqli_query(
            $connect,
            "DELETE FROM `cart_items`
            WHERE `customer_id` = {$_SESSION["user_id"]};"
        );
        alert("order placed");
        location("index.php");
    } else {
        alert("Your cart is empty");
        location("index.php");
    }
}
