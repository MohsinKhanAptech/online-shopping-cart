<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["customer"])) {
    $cart_id = $_GET["cart_id"];

    $querry = "DELETE FROM `cart_items` WHERE `cart_id` = $cart_id";

    if (mysqli_query($connect, $querry)) {
        historyGo();
    } else {
        alert('ERROR: something went wrong');
        historyGo();
    }
} else {
    alert('you must login first');
    location('account.php');
}
