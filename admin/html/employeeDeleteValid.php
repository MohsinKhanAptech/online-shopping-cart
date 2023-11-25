<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    alert("Only admin can access this page");
    historyGo();
}

if (isset($_POST["submit"])) {
    $employee_id = $_POST["employee_id"];

    $employee_image = mysqli_fetch_column(mysqli_query($connect, "SELECT `employee_image` FROM `employees` WHERE `employee_id` = '$employee_id'"));

    $querry = "DELETE FROM `employees` WHERE `employee_id` = '$employee_id'";

    if (mysqli_query($connect, $querry)) {
        unlink("uploads/employees/$employee_image");
        location("employeeList.php");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
