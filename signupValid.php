<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $customer_name = $_POST["user_name"];
    $customer_email = $_POST["user_email"];
    $customer_password = $_POST["user_password"];
    $customer_contact = $_POST["user_contact"];
    $customer_address = $_POST["user_address"];
    $customer_image = $_FILES["user_image"]["name"];
    $customer_tmp_image = $_FILES["user_image"]["tmp_name"];

    $querry = "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_password`, `customer_contact`, `customer_address`, `customer_image`) VALUES ('$customer_name','$customer_email','$customer_password','$customer_contact','$customer_address','$customer_image')";
    $dup_name_check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `customers` WHERE `customer_name` = '$customer_name'"));
    $dup_email_check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `customers` WHERE `customer_email` = '$customer_email'"));

    if ($dup_name_check > 0) {
        alert('name is already taken');
        location('signup.php');
    } elseif ($dup_email_check > 0) {
        alert('email is already taken');
        location('signup.php');
    } elseif (mysqli_query($connect, $querry)) {
        move_uploaded_file($customer_tmp_image, "upload/users/" . $customer_image);
        alert('signup successful');
        location('login.php');
    } else {
        alert('ERROR: signup unsuccessful');
        location('signup.php');
    }
}
