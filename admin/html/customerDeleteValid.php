<?php
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $customer_id = $_POST["customer_id"];

    $querry = "DELETE FROM `customers` WHERE `customer_id` = '$customer_id'";

    if (mysqli_query($connect, $querry)) {
        location("customerList.php");
    } else {
        alert("something went wrong");
        historyGo();
    }
}
