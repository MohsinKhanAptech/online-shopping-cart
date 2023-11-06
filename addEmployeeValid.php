<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $employee_name = $_POST["employee_name"];
    $employee_email = $_POST["employee_email"];
    $employee_password = $_POST["employee_password"];
    $employee_contact = $_POST["employee_contact"];
    $employee_address = $_POST["employee_address"];
    $employee_image = $_FILES["employee_image"]["name"];
    $employee_tmp_image = $_FILES["employee_image"]["tmp_name"];

    $querry = "INSERT INTO `employees`(`employee_name`, `employee_email`, `employee_password`, `employee_contact`, `employee_address`, `employee_image`) VALUES ('$employee_name','$employee_email','$employee_password','$employee_contact','$employee_address','$employee_image')";
    $dup_name_check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `employees` WHERE `employee_name` = '$employee_name'"));
    $dup_email_check = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `employees` WHERE `employee_email` = '$employee_email'"));

    if ($dup_name_check == 0) {
        if ($dup_email_check == 0) {
            if (mysqli_query($connect, $querry)) {
                move_uploaded_file($employee_tmp_image, "uploads/employees/" . $employee_image);
                alert('employee registration successful');
                location('adminPanel.php');
            } else {
                alert('ERROR: employee registration unsuccessful');
                location('addEmployee.php');
            }
        } else {
            alert('name is already taken');
            location('addEmployee.php');
        }
    } else {
        alert('email is already taken');
        location('addEmployee.php');
    }
}
