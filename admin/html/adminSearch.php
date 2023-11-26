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
$search = "`admin_name` LIKE '%$get_search%' OR `admin_id` LIKE '%$get_search%'";
$type = $_GET["type"];

location("adminList.php?search=$get_search");

$sql = "SELECT `admin_id`,`admin_name` FROM `admins` WHERE $search LIMIT 20";
$search_admin_name = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_admin_name) > 0) {
    if ($type == "list") {
        while ($row = mysqli_fetch_assoc($search_admin_name)) {
            echo "<a href='adminList.php?search={$row["admin_id"]}'><span class='col_id'>{$row["admin_id"]}</span>. {$row["admin_name"]}</a>";
        }
    } elseif ($type == "view") {
        while ($row = mysqli_fetch_assoc($search_admin_name)) {
            echo "<a href='adminView.php?admin_id={$row["admin_id"]}'><span class='col_id'>{$row["admin_id"]}</span>. {$row["admin_name"]}</a>";
        }
    } elseif ($type == "edit") {
        while ($row = mysqli_fetch_assoc($search_admin_name)) {
            echo "<a href='adminEdit.php?admin_id={$row["admin_id"]}'><span class='col_id'>{$row["admin_id"]}</span>. {$row["admin_name"]}</a>";
        }
    } elseif ($type == "delete") {
        while ($row = mysqli_fetch_assoc($search_admin_name)) {
            echo "<a href='adminDelete.php?admin_id={$row["admin_id"]}'><span class='col_id'>{$row["admin_id"]}</span>. {$row["admin_name"]}</a>";
        }
    }
    echo "<a href='adminList.php?search=$get_search' class='viewAll'>View All</a>";
} else {
    echo "no result found";
}
