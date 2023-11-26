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
$search = "`newsletter_gmail` LIKE '%$get_search%' OR `newsletter_id` LIKE '%$get_search%'";

location("newsletter.php?search=$get_search");

$sql = "SELECT `newsletter_id`,`newsletter_gmail` FROM `newsletters` WHERE $search LIMIT 20";
$search_newsletter = mysqli_query($connect, $sql);

if (mysqli_num_rows($search_newsletter) > 0) {
    while ($row = mysqli_fetch_assoc($search_newsletter)) {
        echo "<a href='newsletter.php?search={$row["newsletter_id"]}'><span class='col_id'>{$row["newsletter_id"]}</span>. {$row["newsletter_gmail"]}</a>";
    }
    echo "<a href='newsletter.php?search=$get_search' class='viewAll'>View All</a>";
} else {
    echo "no result found";
}
