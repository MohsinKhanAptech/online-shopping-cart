<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["user"])) {
    $review_id = $_GET["review_id"];

    $querry = "DELETE FROM `reviews` WHERE `review_id` = $review_id";

    $count_5stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) AS count_5stars FROM `reviews` WHERE `rating` = 5;"));
    $count_4stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) AS count_4stars FROM `reviews` WHERE `rating` = 4;"));
    $count_3stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) AS count_3stars FROM `reviews` WHERE `rating` = 3;"));
    $count_2stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) AS count_2stars FROM `reviews` WHERE `rating` = 2;"));
    $count_1stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) AS count_1stars FROM `reviews` WHERE `rating` = 1;"));
    $product_review_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`rating`) AS count FROM `reviews`;"));

    $product_rating = round(($count_5stars * 5 + $count_4stars * 4 + $count_3stars * 3 + $count_2stars * 2 + $count_1stars * 1) / ($product_review_count > 0 ? $product_review_count : 0), 2);

    $product_review_update_querry = "UPDATE `products` SET `product_rating`='$product_rating',`product_review_count`='$product_review_count' WHERE `product_id` = '$product_id';";

    if (mysqli_query($connect, $querry)) {
        mysqli_query($connect, $product_review_update_querry);
        historyGo();
    } else {
        alert('ERROR: something went wrong');
        historyGo();
    }
} else {
    alert('you must login first');
    location('account.php');
}