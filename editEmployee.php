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
    $employee_querry = "SELECT * FROM `employees`";
    $employee_querry_run = mysqli_query($connect, $employee_querry);

    if (mysqli_num_rows($employee_querry_run) > 0) {
        while ($row = mysqli_fetch_assoc($employee_querry_run)) { ?>
            <div class="card">
                <div class="imageContainer"><img class="image" src="<?php echo "uploads/employees/" . $row["employee_image"] ?>" alt="Employee Imgae"></div>
                <div class="employeeName">
                    employeeName:
                    <?php echo $row["employee_name"] ?>
                </div>
                <div class="employeeEmail">
                    employeeEmail:
                    <?php echo $row["employee_email"] ?>
                </div>
                <div class="employeePassword">
                    employeePassword:
                    <?php echo $row["employee_password"] ?>
                </div>
                <div class="employeeContact">
                    employeeContact:
                    <?php echo $row["employee_contact"] ?>
                </div>
                <div class="employeeAddress">
                    employeeAddress:
                    <?php echo $row["employee_address"] ?>
                </div>
                <form action="editEmployeeForm.php" method="post">
                    <div><input type="hidden" name="employee_id" value="<?php echo $row["employee_id"] ?>"></div>
                    <div><button type="submit" name="submit">edit employee</button></div>
                </form>
                <form action="deleteEmployee.php" method="post">
                    <div><input type="hidden" name="employee_id" value="<?php echo $row["employee_id"] ?>"></div>
                    <div><button type="submit" name="submit">delete</button></div>
                </form>
                <hr>
            </div>
    <?php
        }
    } ?>
</body>

</html>