<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

$get_search = $_GET["search"];
$get_category = $_GET["category"];
$category = $get_category == 0 ? "`product_category` != '$get_category'" : "`product_category` = '$get_category'";
$search = "`product_name` LIKE '%$get_search%'";

$sql = "SELECT `product_id`,`product_name`,`product_category` FROM `products` WHERE $category AND $search LIMIT 20";
$search_product_name = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_product_name) > 0) {
    while ($row = mysqli_fetch_assoc($search_product_name)) {
        echo "<a href='product.php?product_id={$row["product_id"]}'>{$row["product_name"]} in {$row["product_category"]}</a>";
    }
    echo "<a href='shop.php?search=$get_search&category=$get_category' class='viewMore'>View more</a>";
} else {
    echo "no result found";
}
