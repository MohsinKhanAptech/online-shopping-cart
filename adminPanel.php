<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "admin panel";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>admin panel</h1>
    <div><a href="addProduct.php">Add Product</a></div>
    <div><a href="editProduct.php">Edit & Remove Product</a></div>
    <div><a href="addEmployee.php">Add Employee</a></div>
    <div><a href="editEmployee.php">Edit & Remove Employee</a></div>
</body>

</html>