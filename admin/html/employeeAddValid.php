<?php
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $employee_name = $_POST["employee_name"];
    $employee_email = $_POST["employee_email"];
    $employee_password = $_POST["employee_password"];
    $employee_contact = $_POST["employee_contact"];
    $employee_address = $_POST["employee_address"];
    $employee_image = $_FILES["employee_image"]["name"];
    $employee_image_tmp = $_FILES["employee_image"]["tmp_name"];

    $querry = "INSERT INTO `employees`( `employee_name`, `employee_email`, `employee_password`, `employee_contact`, `employee_address`, `employee_image`) VALUES ('$employee_name','$employee_email','$employee_password','$employee_contact','$employee_address','$employee_image')";

    $employee_id = mysqli_fetch_column(mysqli_query($connect, "SELECT `employee_id` FROM `employees` WHERE `employee_name` = '$employee_name'"));

    $dupcheck = mysqli_query($connect, "SELECT `employee_id` FROM `employees` WHERE `employee_name` = '$employee_name' OR `employee_email` = '$employee_email'");

    list($width, $height) = getimagesize($employee_image_tmp);

    if (mysqli_num_rows($dupcheck) > 0) {
        alert("Employee Name Or Employee Email Already Exists");
        historyGo();
    } elseif ($width != $height) {
        alert("Image is not square");
        historyGo();
    } else {
        if (mysqli_query($connect, $querry)) {
            move_uploaded_file($employee_image_tmp, "uploads/employees/" . $employee_image);
            location("employeeView.php?employee_id=$employee_id");
        } else {
            alert("something went wrong");
            historyGo();
        }
    }
}
