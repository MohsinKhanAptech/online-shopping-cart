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
$search = "`product_name` LIKE '%$get_search%' OR `product_id` LIKE '%$get_search%'";
$type = $_GET["type"];

location("productList.php?search=$get_search");

$sql = "SELECT `product_id`,`product_name`,`product_category` FROM `products` WHERE $search LIMIT 20";
$search_product_name = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_product_name) > 0) {
    if ($type == "list") {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='productList.php?search={$row["product_id"]}'><span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]} in {$row["product_category"]}</a>";
        }
    } elseif ($type == "view") {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='productView.php?product_id={$row["product_id"]}'><span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]} in {$row["product_category"]}</a>";
        }
    } elseif ($type == "edit") {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='productEdit.php?product_id={$row["product_id"]}'><span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]} in {$row["product_category"]}</a>";
        }
    } elseif ($type == "delete") {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='productDelete.php?product_id={$row["product_id"]}'><span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]} in {$row["product_category"]}</a>";
        }
    }
    echo "<a href='productList.php?search=$get_search' class='viewAll'>View All</a>";
} else {
    echo "no result found";
}
