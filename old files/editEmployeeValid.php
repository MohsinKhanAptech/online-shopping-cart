<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $employee_id = $_POST["employee_id"];
    $employee_name = $_POST["employee_name"];
    $employee_image = $_FILES["employee_image"]["name"];
    $employee_tmp_image = $_FILES["employee_image"]["tmp_name"];

    $querry = "UPDATE `employees` SET `employee_name`='$employee_name',`employee_email`='$employee_email',`employee_password`='$employee_password',`employee_contact`='$employee_contact',`employee_address`='$employee_address',`employee_image`='$employee_image' WHERE `employee_id` = '$employee_id'";

    if (mysqli_query($connect, $querry)) {
        move_uploaded_file($employee_tmp_image, "uploads/employees/" . $employee_image);
        alert('employee updated successfully');
        location('editEmployee.php');
    } else {
        alert('ERROR: something went wrong');
        location('editEmployee.php');
    }
}
