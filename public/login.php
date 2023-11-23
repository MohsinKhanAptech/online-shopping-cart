<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];

    $customer_querry = "SELECT `customer_id`,`customer_name` FROM `customers` WHERE (`customer_name` = '$user_email' OR `customer_email` = '$user_email') AND `customer_password` = '$user_password'";
    $customer_querry_run = mysqli_query($connect, $customer_querry);
    $customer_querry_fetch = mysqli_fetch_assoc($customer_querry_run);

    if (mysqli_num_rows($customer_querry_run) > 0) {
        $_SESSION["user"] = $customer_querry_fetch["customer_name"];
        $_SESSION["user_id"] = $customer_querry_fetch["customer_id"];
        $_SESSION["user_type"] = "customer";
        location('index.php');
    } elseif ($user_email == "employee" && $user_password == "employee") {
        location('employeePanel.php');
    } elseif ($user_email == "admin" && $user_password == "admin") {
        // $_SESSION["user"] = $admin_querry_fetch["admin_name"];
        // $_SESSION["user_id"] = $admin_querry_fetch["admin_id"];
        // $_SESSION["user_type"] = "admin";
        location('../admin/html/index.php');
    } else {
        alert('login information invalid');
        location('account.php');
    }
}
