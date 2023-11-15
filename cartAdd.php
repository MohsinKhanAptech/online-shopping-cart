<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["user"])) {
    if (isset($_POST["submit"])) {
        $customer_id = $_SESSION["user_id"];
        $product_id = $_POST["product_id"];
        $product_price = $_POST["product_price"];
        $cart_quantity = $_POST["cart_quantity"];
        $cart_total = $product_price * $cart_quantity;

        $cart_querry = "INSERT INTO `cart_items`(`customer_id`, `product_id`, `product_price`, `cart_quantity`, `cart_total`) VALUES ('$customer_id','$product_id','$product_price','$cart_quantity','$cart_total')";
        $cart_querry_run = mysqli_query($connect, $cart_querry);

        if ($cart_querry_run) {
            alert('success');
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
