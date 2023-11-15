<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];

    $customer_querry = "SELECT * FROM `customers` WHERE (`customer_name` = '$user_email' OR `customer_email` = '$user_email') AND `customer_password` = '$user_password'";
    $customer_querry_run = mysqli_query($connect, $customer_querry);
    $customer_querry_fetch = mysqli_fetch_assoc($customer_querry_run);

    if (mysqli_num_rows($customer_querry_run) > 0) {
        $_SESSION["user"] = $customer_querry_fetch["customer_name"];
        $_SESSION["user_id"] = $customer_querry_fetch["customer_id"];
        $_SESSION["user_type"] = "customer";
        alert("user is a customer");
        location('index.php');
    } else {
        $employee_querry = "SELECT * FROM `employees` WHERE (`employee_name` = '$user_email' OR `employee_email` = '$user_email') AND `employee_password` = '$user_password'";
        $employee_querry_run = mysqli_query($connect, $employee_querry);
        $employee_querry_fetch = mysqli_fetch_assoc($employee_querry_run);

        if (mysqli_num_rows($employee_querry_run) > 0) {
            $_SESSION["user"] = $employee_querry_fetch["employee_name"];
            $_SESSION["user_id"] = $employee_querry_fetch["employee_id"];
            $_SESSION["user_type"] = "employee";
            alert("user is a employee");
            location('employeePanel.php');
        } else {
            $admin_querry = "SELECT * FROM `admins` WHERE (`admin_name` = '$user_email' OR `admin_email` = '$user_email') AND `admin_password` = '$user_password'";
            $admin_querry_run = mysqli_query($connect, $admin_querry);
            $admin_querry_fetch = mysqli_fetch_assoc($admin_querry_run);

            if (mysqli_num_rows($admin_querry_run) > 0) {
                $_SESSION["user"] = $admin_querry_fetch["admin_name"];
                $_SESSION["user_id"] = $admin_querry_fetch["admin_id"];
                $_SESSION["user_type"] = "admin";
                alert("user is a admin");
                location('adminPanel.php');
            } else {
                alert('login information invalid');
                location('login.php');
            }
        }
    }
}
