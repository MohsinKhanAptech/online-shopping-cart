<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    alert("Only admin can access this page");
    historyGo();
}

$filter = $_GET["filter"];
$get_search = $_GET["search"];
$type = $_GET["type"];
switch ($filter) {
    case 'order':
        $search = "orders.order_id LIKE '%$get_search%'";
        break;

    case 'product':
        $search = "products.product_id LIKE '%$get_search%' OR products.product_name LIKE '%$get_search%'";
        break;

    case 'customer':
        $search = "customers.customer_id LIKE '%$get_search%' OR customers.customer_name LIKE '%$get_search%'";
        break;

    default:
        $search = "orders.order_id LIKE '%$get_search%'";
        break;
}

location("orderList.php?search=$get_search");

$sql =
    "SELECT orders.order_id,customers.customer_name,customers.customer_id,products.product_name,products.product_id
    FROM ((`orders`
    INNER JOIN `customers`
    ON orders.customer_id = customers.customer_id)
    INNER JOIN `products`
    ON orders.product_id = products.product_id)
    WHERE $search
    LIMIT 20;
";
$search_order_querry = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_order_querry) > 0) {
    if ($type == "list") {
        while ($row = mysqli_fetch_assoc($search_order_querry)) {
            echo "<a href='orderList.php?search={$row["order_id"]}'><span class='col_id'>{$row["order_id"]}</span>. <span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}: <span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]}</a>";
        }
    } elseif ($type == "delete") {
        while ($row = mysqli_fetch_assoc($search_order_querry)) {
            echo "<a href='orderDelete.php?order_id={$row["order_id"]}'><span class='col_id'>{$row["order_id"]}</span>. <span class='col_id'>{$row["customer_id"]}</span>. {$row["customer_name"]}: <span class='col_id'>{$row["product_id"]}</span>. {$row["product_name"]}</a>";
        }
    }
    echo "<a href='orderList.php?search=$get_search' class='viewAll'>View All</a>";
} else {
    echo "no result found";
}
