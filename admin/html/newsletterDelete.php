<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    location("404.php");
}

if (isset($_GET["newsletter_id"])) {
    $newsletter_id = $_GET["newsletter_id"];

    $querry = "DELETE FROM `newsletter` WHERE `newsletter_id` = '$newsletter_id'";

    if (mysqli_query($connect, $querry)) {
        location("newsletter.php");
    } else {
        alert("something went wrong");
        location("somethingWentWrong.php");
    }
}
