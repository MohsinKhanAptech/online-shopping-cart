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

if (isset($_POST["submit"])) {
    $admin_name = $_POST["admin_name"];
    $admin_email = $_POST["admin_email"];
    $admin_password = $_POST["admin_password"];
    $admin_image = $_FILES["admin_image"]["name"];
    $admin_image_tmp = $_FILES["admin_image"]["tmp_name"];

    $querry = "INSERT INTO `admins`( `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES ('$admin_name','$admin_email','$admin_password','$admin_image')";

    $admin_id = mysqli_fetch_column(mysqli_query($connect, "SELECT `admin_id` FROM `admins` WHERE `admin_name` = '$admin_name'"));

    $dupcheck = mysqli_query($connect, "SELECT `admin_id` FROM `admins` WHERE `admin_name` = '$admin_name' OR `admin_email` = '$admin_email'");

    list($width, $height) = getimagesize($admin_image_tmp);

    if (mysqli_num_rows($dupcheck) > 0) {
        alert("Admin Name Or Admin Email Already Exists");
        historyGo();
    } elseif ($width != $height) {
        alert("Image is not square");
        historyGo();
    } else {
        if (mysqli_query($connect, $querry)) {
            move_uploaded_file($admin_image_tmp, "uploads/admins/" . $admin_image);
            location("adminView.php?admin_id=$admin_id");
        } else {
            alert("something went wrong");
            historyGo();
        }
    }
}
