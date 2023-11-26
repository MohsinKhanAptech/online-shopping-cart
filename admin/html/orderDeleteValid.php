<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
}

if (isset($_POST["submit"])) {
    $order_id = $_POST["order_id"];

    $querry = "DELETE FROM `orders` WHERE `order_id` = '$order_id'";

    if (mysqli_query($connect, $querry)) {
        location("orderList.php");
    } else {
        alert("something went wrong");
        location("somethingWentWrong.php");
    }
}
