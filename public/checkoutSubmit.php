<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
$customer_id = $_SESSION["user_id"];
$cart_check = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(cart_id) FROM `cart_items` WHERE `customer_id` = '$customer_id'"));

if (isset($_SESSION["user"])) {
    if (isset($_POST["submit"])) {
        if ($cart_check > 0) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $country = $_POST["country"];
            $street_address = $_POST["street_address"];
            $town = $_POST["town"];
            $state = $_POST["state"];
            $postcode = $_POST["postcode"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            $detail_check = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(customer_id) FROM `customer_details` WHERE `customer_id` = '$customer_id'"));
            $order_sql =
                "INSERT INTO `orders` (customer_id, product_id, order_price, order_quantity, order_total)
                SELECT customer_id, product_id, product_price, cart_quantity, cart_total
                FROM `cart_items`
                WHERE `customer_id` = '$customer_id';
            ";
            $cart_sql = "DELETE FROM `cart_items` WHERE `customer_id` = '$customer_id';";

            if ($detail_check == 0) {
                $detail_sql = "INSERT INTO `customer_details`(`customer_id`, `first_name`, `last_name`, `country`, `street_address`, `town`, `state`, `postcode`, `email`, `phone`) VALUES ('$customer_id','$first_name','$last_name','$country','$street_address','$town','$state','$postcode','$email','$phone')";
                if (mysqli_query($connect, $detail_sql) && mysqli_query($connect, $order_sql) && mysqli_query($connect, $cart_sql)) {
                    location("checkoutConfirmation.php");
                } else {
                    alert("ERROR: something went wrong");
                };
            } elseif ($detail_check > 0) {
                $detail_sql = "UPDATE `customer_details` SET `first_name`='$first_name',`last_name`='$last_name',`country`='$country',`street_address`='$street_address',`town`='$town',`state`='$state',`postcode`='$postcode',`email`='$email',`phone`='$phone' WHERE `customer_id` = '$customer_id'";
                if (mysqli_query($connect, $detail_sql) && mysqli_query($connect, $order_sql) && mysqli_query($connect, $cart_sql)) {
                    location("checkoutConfirmation.php");
                } else {
                    alert("ERROR: something went wrong");
                };
            }
        } else {
            alert("your cart is empty");
            location("index.php");
        }
    }
} else {
    alert('you must login first');
    location('account.php');
}
