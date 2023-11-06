<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "edit employee panel";
include "include/head.php";
?>

<body>
    <?php include "include/navbar.php" ?>
    <h1>edit employee panel</h1>

    <?php
    if (isset($_POST["submit"])) {
        $employee_id = $_POST["employee_id"];

        $querry = "SELECT * FROM `employees` WHERE `employee_id` = $employee_id";
        $querry_run = mysqli_query($connect, $querry);

        if (mysqli_num_rows($querry_run) > 0) {
            while ($row = mysqli_fetch_assoc($querry_run)) { ?>
                <form action="editEmployeeValid.php" method="post" enctype="multipart/form-data">
                    <div><label for="employee_name">Employee Name</label></div>
                    <div><input type="text" name="employee_name" id="employee_name" value="<?php echo $row["employee_name"] ?>" required></div>
                    <div><label for="employee_email">Employee Email</label></div>
                    <div><input type="email" name="employee_email" id="employee_email" value="<?php echo $row["employee_email"] ?>" required></div>
                    <div><label for="employee_password">Employee Password</label></div>
                    <div><input type="password" name="employee_password" id="employee_password" value="<?php echo $row["employee_password"] ?>" required></div>
                    <div><label for="employee_contact">Employee Contact</label></div>
                    <div><input type="text" name="employee_contact" id="employee_contact" value="<?php echo $row["employee_contact"] ?>" required></div>
                    <div><label for="employee_address">Employee Address</label></div>
                    <div><textarea name="employee_address" id="employee_address" cols="30" rows="5" required><?php echo $row["employee_address"] ?></textarea></div>
                    <div class="imageContainer"><img src="uploads/employees/<?php echo $row["employee_image"] ?>" alt="" class="image"></div>
                    <div><label for="employee_image">Employee Image</label></div>
                    <div><input type="file" name="employee_image" id="employee_image" value="<?php echo $row["employee_image"] ?>" required></div>
                    <div><input type="hidden" name="emplyoee_id" value="<?php echo $row["employee_id"] ?>"></div>
                    <div><button type="submit" name="submit">Submit</button></div>
                </form>
    <?php
            }
        }
    };
    ?>
</body>

</html>