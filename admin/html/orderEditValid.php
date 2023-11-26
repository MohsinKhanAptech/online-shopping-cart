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
    $order_status = $_POST["order_status"];

    $querry = "UPDATE `orders` SET `order_status`='$order_status' WHERE `order_id` = $order_id";

    if (mysqli_query($connect, $querry)) {
        location("orderView.php?order_id=$order_id");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
