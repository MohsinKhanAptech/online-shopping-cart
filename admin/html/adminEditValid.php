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
    $admin_id = $_POST["admin_id"];
    $admin_name = $_POST["admin_name"];
    $admin_email = $_POST["admin_email"];
    $admin_password = $_POST["admin_password"];
    $admin_image = $_FILES["admin_image"]["name"];
    $admin_image_size = $_FILES["admin_image"]["size"];
    $admin_image_tmp = $_FILES["admin_image"]["tmp_name"];

    $admin_image_old = mysqli_fetch_column(mysqli_query($connect, "SELECT `admin_image` FROM `admins` WHERE `admin_id` = '$admin_id'"));

    if ($admin_image_size > 0) {
        $querry = "UPDATE `admins` SET `admin_name`='$admin_name',`admin_email`='$admin_email',`admin_password`='$admin_password',`admin_image`='$admin_image' WHERE `admin_id` = $admin_id";
    } else {
        $querry = "UPDATE `admins` SET `admin_name`='$admin_name',`admin_email`='$admin_email',`admin_password`='$admin_password' WHERE `admin_id` = $admin_id";
    }
    if (mysqli_query($connect, $querry)) {
        if ($admin_image_size > 0) {
            list($width, $height) = getimagesize($admin_image_tmp);
            if ($width != $height) {
                alert("Image is not square");
                historyGo();
            } else {
                unlink("uploads/admins/$admin_image_old");
                move_uploaded_file($admin_image_tmp, "uploads/admins/" . $admin_image);
            }
        };
        location("adminView.php?admin_id=$admin_id");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
