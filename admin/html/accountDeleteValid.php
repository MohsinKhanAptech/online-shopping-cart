<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] == "admin") {
    if (isset($_POST["submit"])) {
        $admin_id = $_SESSION["user_id"];

        $querry = "DELETE FROM `admins` WHERE `admin_id` = '$admin_id'";

        if (mysqli_query($connect, $querry)) {
            location("login.php");
        } else {
            alert("something went wrong");
            location("somethingWentWrong.php");
        }
    }
} elseif ($_SESSION["user_type"] == "employee") {
    if (isset($_POST["submit"])) {
        $employee_id = $_SESSION["user_id"];

        $querry = "DELETE FROM `employees` WHERE `employee_id` = '$employee_id'";

        if (mysqli_query($connect, $querry)) {
            location("login.php");
        } else {
            alert("something went wrong");
            location("somethingWentWrong.php");
        }
    }
}
