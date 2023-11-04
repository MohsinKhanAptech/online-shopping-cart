<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "signup";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>signup panel</h1>
    <form action="signupValid.php" method="post" enctype="multipart/form-data">
        <div><label for="user_name">Full Name * <sup>please enter you full name</sup></label></div>
        <div><input type="text" name="user_name" id="user_name" required></div>
        <div><label for="user_email">Email</label></div>
        <div><input type="email" name="user_email" id="user_email" required></div>
        <div><label for="user_password">Password</label></div>
        <div><input type="password" name="user_password" id="user_password" required></div>
        <div><label for="user_contact">Contact</label></div>
        <div><input type="tel" name="user_contact" id="user_contact" required></div>
        <div><label for="user_address">Address</label></div>
        <div><textarea name="user_address" id="user_address" cols="30" rows="10" required></textarea></div>
        <div><label for="user_image">Image</label></div>
        <div><input type="file" name="user_image" id="user_image" required></div>
        <div><button type="submit" name="submit">Submit</button></div>
    </form>
</body>

</html>