<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "login";
include "include/head.php";
?>

<body>
    <?php
    include "include/navbar.php";
    if (!isset($_SESSION["user"])) { ?>
        <h1>login panel</h1>
        <form action="loginValid.php" method="post">
            <div><label for="user_name">Name / Email</label></div>
            <div><input type="text" name="user_name" id="user_name" required></div>
            <div><label for="user_password">Password</label></div>
            <div><input type="password" name="user_password" id="user_password" required></div>
            <div><button type="submit" name="user_submit">Submit</button></div>
        </form>
    <?php
    } else {
        alert('a user is already loged in');
        location('index.php');
    } ?>
</body>

</html>