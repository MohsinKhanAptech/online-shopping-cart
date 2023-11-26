<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    location("404.php");
}

$get_search = $_GET["search"];
$search = "`customer_name` LIKE '%$get_search%' OR `customer_id` LIKE '%$get_search%'";
$type = $_GET["type"];

location("customerList.php?search=$get_search");

$sql = "SELECT `customer_id`,`customer_name` FROM `customers` WHERE $search LIMIT 20";
$search_customer_name = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_customer_name) > 0) {
    if ($type == "list") {
        while ($row = mysqli_fetch_assoc($search_customer_name)) {
            echo "<a href='customerList.php?search={$row["customer_id"]}'><span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}</a>";
        }
    } elseif ($type == "view") {
        while ($row = mysqli_fetch_assoc($search_customer_name)) {
            echo "<a href='customerView.php?customer_id={$row["customer_id"]}'><span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}</a>";
        }
    } elseif ($type == "delete") {
        while ($row = mysqli_fetch_assoc($search_customer_name)) {
            echo "<a href='customerDelete.php?customer_id={$row["customer_id"]}'><span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}</a>";
        }
    }
    echo "<a href='customerList.php?search=$get_search' class='viewAll'>View All</a>";
} else {
    echo "no result found";
}
