<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    $product_id = $_POST["product_id"];

    $querry = "DELETE FROM `products` WHERE `product_id` = $product_id";

    if (mysqli_query($connect, $querry)) {
        alert('delte successful');
        location('editProduct.php');
    } else {
        alert('ERROR: something went wrong');
        location('editProduct.php');
    }
}
