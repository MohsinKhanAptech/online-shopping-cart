<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $employee_id = $_POST["employee_id"];

    $querry = "DELETE FROM `employees` WHERE `employee_id` = $employee_id";

    if (mysqli_query($connect, $querry)) {
        alert('delte successful');
        location('editEmployee.php');
    } else {
        alert('ERROR: something went wrong');
        location('editEmployee.php');
    }
}
