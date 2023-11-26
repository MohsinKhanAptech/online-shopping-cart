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
    $employee_id = $_POST["employee_id"];
    $employee_name = $_POST["employee_name"];
    $employee_email = $_POST["employee_email"];
    $employee_password = $_POST["employee_password"];
    $employee_contact = $_POST["employee_contact"];
    $employee_address = $_POST["employee_address"];
    $employee_image = $_FILES["employee_image"]["name"];
    $employee_image_size = $_FILES["employee_image"]["size"];
    $employee_image_tmp = $_FILES["employee_image"]["tmp_name"];

    $employee_image_old = mysqli_fetch_column(mysqli_query($connect, "SELECT `employee_image` FROM `employees` WHERE `employee_id` = '$employee_id'"));

    if ($employee_image_size > 0) {
        $querry = "UPDATE `employees` SET `employee_name`='$employee_name',`employee_email`='$employee_email',`employee_password`='$employee_password',`employee_contact`='$employee_contact',`employee_address`='$employee_address',`employee_image`='$employee_image' WHERE `employee_id` = $employee_id";
    } else {
        $querry = "UPDATE `employees` SET `employee_name`='$employee_name',`employee_email`='$employee_email',`employee_password`='$employee_password',`employee_contact`='$employee_contact',`employee_address`='$employee_address' WHERE `employee_id` = $employee_id";
    }
    if (mysqli_query($connect, $querry)) {
        if ($employee_image_size > 0) {
            list($width, $height) = getimagesize($employee_image_tmp);
            if ($width != $height) {
                alert("Image is not square");
                historyGo();
            } else {
                unlink("uploads/employees/$employee_image_old");
                move_uploaded_file($employee_image_tmp, "uploads/employees/" . $employee_image);
            }
        };
        location("employeeView.php?employee_id=$employee_id");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
