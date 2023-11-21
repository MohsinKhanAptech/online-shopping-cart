<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "add employee panel";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>add employee panel</h1>

    <form action="addEmployeeValid.php" method="post" enctype="multipart/form-data">
        <div><label for="employee_name">Employee Name</label></div>
        <div><input type="text" name="employee_name" id="employee_name" required></div>
        <div><label for="employee_email">Employee Email</label></div>
        <div><input type="email" name="employee_email" id="employee_email" required></div>
        <div><label for="employee_password">Employee Password</label></div>
        <div><input type="password" name="employee_password" id="employee_password" required></div>
        <div><label for="employee_contact">Employee Contact</label></div>
        <div><input type="text" name="employee_contact" id="employee_contact" required></div>
        <div><label for="employee_address">Employee Address</label></div>
        <div><textarea name="employee_address" id="employee_address" cols="30" rows="5" required></textarea></div>
        <div><label for="employee_image">Employee Image</label></div>
        <div><input type="file" name="employee_image" id="employee_image" required></div>
        <div><button type="submit" name="submit">Submit</button></div>
    </form>
</body>

</html>