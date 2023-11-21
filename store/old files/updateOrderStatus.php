<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $order_id = $_POST["order_id"];
    $order_status_id = $_POST["order_status_id"];

    $querry = mysqli_query($connect, "UPDATE `orders` SET `order_status_id`='$order_status_id' WHERE `order_id` = '$order_id'");
    if ($querry) {
        alert('status update successful');
        location('employeePanel.php');
    } else {
        alert('ERROR: status update unsuccessful');
        location('employeePanel.php');
    }
}
