<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
}

$search = $_GET["search"];
$type = $_GET["searchType"];

if ($type == "products") {
    $sql = "SELECT `product_id`,`product_name`,`product_category` FROM `products` WHERE `product_name` LIKE '%$search%' OR `product_id` LIKE '%$search%' LIMIT 20";
    $search_product_name = mysqli_query($connect, $sql);
    if (mysqli_num_rows($search_product_name) > 0) {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='productView.php?product_id={$row["product_id"]}'><span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]} in {$row["product_category"]}</a>";
        }
        echo "<a href='productList.php?search=$search' class='viewAll'>View All</a>";
    } else {
        echo "no result found";
    }
} elseif ($type == "users") {
    $sql = "SELECT `customer_id`,`customer_name` FROM `customers` WHERE `customer_name` LIKE '%$search%' OR `customer_id` LIKE '%$search%' LIMIT 20";
    $search_product_name = mysqli_query($connect, $sql);
    if (mysqli_num_rows($search_product_name) > 0) {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='customerView.php?customer_id={$row["customer_id"]}'><span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}</a>";
        }
        echo "<a href='customerList.php?search=$search' class='viewAll'>View All</a>";
    } else {
        echo "no result found";
    }
} elseif ($type == "employees") {
    $sql = "SELECT `employee_id`,`employee_name` FROM `employees` WHERE `employee_name` LIKE '%$search%' OR `employee_id` LIKE '%$search%' LIMIT 20";
    $search_product_name = mysqli_query($connect, $sql);
    if (mysqli_num_rows($search_product_name) > 0) {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='employeeView.php?employee_id={$row["employee_id"]}'><span class='col_id'>{$row["employee_id"]}</span>. {$row["employee_name"]}</a>";
        }
        echo "<a href='employeeList.php?search=$search' class='viewAll'>View All</a>";
    } else {
        echo "no result found";
    }
} elseif ($type == "orders") {
    $sql =
        "SELECT orders.order_id,customers.customer_name,customers.customer_id,products.product_name,products.product_id
        FROM ((`orders`
        INNER JOIN `customers`
        ON orders.customer_id = customers.customer_id)
        INNER JOIN `products`
        ON orders.product_id = products.product_id)
        WHERE (orders.order_id LIKE '%$search%' OR products.product_id LIKE '%$search%' OR products.product_name LIKE '%$search%' OR customers.customer_id LIKE '%$search%' OR customers.customer_name LIKE '%$search%')
        LIMIT 20;
    ";
    $search_product_name = mysqli_query($connect, $sql);
    if (mysqli_num_rows($search_product_name) > 0) {
        while ($row = mysqli_fetch_assoc($search_product_name)) {
            echo "<a href='orderView.php?order_id={$row["order_id"]}'><span class='col_id'>{$row["order_id"]}</span>. <span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}: <span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]}</a>";
        }
        echo "<a href='orderList.php?search=$search' class='viewAll'>View All</a>";
    } else {
        echo "no result found";
    }
}
