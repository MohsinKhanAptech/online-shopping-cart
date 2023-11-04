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
</body>

</html>