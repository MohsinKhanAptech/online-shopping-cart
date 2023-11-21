<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["user"])) {
    $customer_id = $_SESSION["user_id"];
    $product_id = $_POST["product_id"];
    $rating = $_POST["rating"];
    $review_title = $_POST["review_title"];
    $review = $_POST["review"];

    $querry = "INSERT INTO `reviews`(`customer_id`, `product_id`, `rating`, `review_title`, `review`) VALUES ('$customer_id','$product_id','$rating','$review_title','$review')";

    $count_5stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) FROM `reviews` WHERE `rating` = 5 AND `product_id` = '$product_id';"));
    $count_4stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) FROM `reviews` WHERE `rating` = 4 AND `product_id` = '$product_id';"));
    $count_3stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) FROM `reviews` WHERE `rating` = 3 AND `product_id` = '$product_id';"));
    $count_2stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) FROM `reviews` WHERE `rating` = 2 AND `product_id` = '$product_id';"));
    $count_1stars = mysqli_fetch_column(mysqli_query($connect, "SELECT count(`rating`) FROM `reviews` WHERE `rating` = 1 AND `product_id` = '$product_id';"));
    $product_review_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`rating`) FROM `reviews` WHERE `product_id` = '$product_id';"));

    $product_rating = round(($count_5stars * 5 + $count_4stars * 4 + $count_3stars * 3 + $count_2stars * 2 + $count_1stars * 1) / ($product_review_count), 2);

    $product_review_update_querry = "UPDATE `products` SET `product_rating`='$product_rating',`product_review_count`='$product_review_count' WHERE `product_id` = '$product_id';";

    if (mysqli_query($connect, $querry)) {
        mysqli_query($connect, $product_review_update_querry);
        historyGo();
    } else {
        alert("ERROR: something went wrong");
        historyGo();
    }
} else {
    alert('you must login first');
    location('account.php');
}
