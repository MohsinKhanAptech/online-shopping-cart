<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["customer"])) {
    $wishlist_id = $_GET["wishlist_id"];

    $querry = "DELETE FROM `wishlist` WHERE `wishlist_id` = $wishlist_id";

    if (mysqli_query($connect, $querry)) {
        historyGo();
    } else {
        alert('ERROR: something went wrong');
        location('wishlist.php');
    }
} else {
    alert('you must login first');
    location('account.php');
}
