<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $cart_id = $_POST["cart_id"];

    $querry = "DELETE FROM `cart_items` WHERE `cart_id` = $cart_id";

    if (mysqli_query($connect, $querry)) {
        alert('remove successful');
        location('cart.php');
    } else {
        alert('ERROR: something went wrong');
        location('cart.php');
    }
}
