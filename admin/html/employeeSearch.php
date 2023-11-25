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

$get_search = $_GET["search"];
$search = "`employee_name` LIKE '%$get_search%' OR `employee_id` LIKE '%$get_search%'";
$type = $_GET["type"];

location("employeeList.php?search=$get_search");

$sql = "SELECT `employee_id`,`employee_name` FROM `employees` WHERE $search LIMIT 20";
$search_employee_name = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_employee_name) > 0) {
    if ($type == "list") {
        while ($row = mysqli_fetch_assoc($search_employee_name)) {
            echo "<a href='employeeList.php?search={$row["employee_id"]}'><span class='col_id'>{$row["employee_id"]}</span>. {$row["employee_name"]}</a>";
        }
    } elseif ($type == "view") {
        while ($row = mysqli_fetch_assoc($search_employee_name)) {
            echo "<a href='employeeView.php?employee_id={$row["employee_id"]}'><span class='col_id'>{$row["employee_id"]}</span>. {$row["employee_name"]}</a>";
        }
    } elseif ($type == "edit") {
        while ($row = mysqli_fetch_assoc($search_employee_name)) {
            echo "<a href='employeeEdit.php?employee_id={$row["employee_id"]}'><span class='col_id'>{$row["employee_id"]}</span>. {$row["employee_name"]}</a>";
        }
    } elseif ($type == "delete") {
        while ($row = mysqli_fetch_assoc($search_employee_name)) {
            echo "<a href='employeeDelete.php?employee_id={$row["employee_id"]}'><span class='col_id'>{$row["employee_id"]}</span>. {$row["employee_name"]}</a>";
        }
    }
    echo "<a href='employeeList.php?search=$get_search' class='viewAll'>View All</a>";
} else {
    echo "no result found";
}
