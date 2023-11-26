<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_SESSION["user"])) {
    alert("An account is already logged-in");
    location("index.php");
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $employee_querry = "SELECT `employee_id`,`employee_name` FROM `employees` WHERE (`employee_name` = '$email' OR `employee_email` = '$email') AND `employee_password` = '$password'";
    $employee_querry_run = mysqli_query($connect, $employee_querry);
    $employee_querry_fetch = mysqli_fetch_assoc($employee_querry_run);

    $admin_querry = "SELECT `admin_id`,`admin_name` FROM `admins` WHERE (`admin_name` = '$email' OR `admin_email` = '$email') AND `admin_password` = '$password'";
    $admin_querry_run = mysqli_query($connect, $admin_querry);
    $admin_querry_fetch = mysqli_fetch_assoc($admin_querry_run);


    if (mysqli_num_rows($employee_querry_run) > 0) {
        $_SESSION["user"] = $employee_querry_fetch["employee_name"];
        $_SESSION["user_id"] = $employee_querry_fetch["employee_id"];
        $_SESSION["user_type"] = "employee";
        location("orderList.php");
    } elseif (mysqli_num_rows($admin_querry_run) > 0) {
        $_SESSION["user"] = $admin_querry_fetch["admin_name"];
        $_SESSION["user_id"] = $admin_querry_fetch["admin_id"];
        $_SESSION["user_type"] = "admin";
        location("index.php");
    } else {
        alert('login information invalid');
        location('login.php');
    }
}
