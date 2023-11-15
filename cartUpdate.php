<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $cart_id = $_POST["cart_id"];
    $cart_quantity = $_POST["cart_quantity"];
    $product_price = $_POST["product_price"];
    $cart_total = $product_price * $cart_quantity;

    $cart_querry = "UPDATE `cart_items` SET `cart_quantity`='$cart_quantity',`cart_total`='$cart_total' WHERE `cart_id` = '$cart_id'";
    $cart_querry_run = mysqli_query($connect, $cart_querry);

    if ($cart_querry_run) {
        historyGo();
    } else {
        alert('ERROR');
        location('cart.php');
    }
}
