<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} elseif ($_SESSION["user_type"] != "admin") {
    location("404.php");
} ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
$title = "Employee Edit";
$currentPage = "employeeEdit";
include "include/head.php";
?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include "include/aside.php"; ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include "include/navbar.php"; ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">Employees /</span><span> Employee Edit</span></h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <p class="card-title">Search the employee name or id you want to edit.</p>
                                <form action="employeeSearch.php" method="get">
                                    <div class="d-flex flex-sm-row flex-column align-items-center gap-3">
                                        <input name="search" type="search" value="" class="form-control w-100" placeholder="Search Employee" autocomplete="off" onkeyup="employeeView(this.value);">
                                        <button class="dt-button add-new btn btn-primary flex-shrink-0 flex-grow-0">
                                            <span><i class="bx bx-search-alt me-1"></i><span>Search Employee</span></span>
                                        </button>
                                        <div id="productViewSearch"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if (!empty($_GET["employee_id"])) {
                            $employee_id = $_GET["employee_id"];
                            $sql = "SELECT * FROM `employees` WHERE `employee_id` = $employee_id";
                            $row = mysqli_fetch_assoc(mysqli_query($connect, $sql)); ?>
                            <form action="employeeEditValid.php" method="post" id="employeeEditForm" enctype="multipart/form-data" autocomplete="off">
                                <div class="card mb-4">
                                    <div class="card-header d-flex flex-sm-row flex-column align-items-center justify-content-between gap-3">
                                        <h5 class="card-title text-capitalize m-0"><?php echo $row["employee_id"] . ". " . $row["employee_name"] ?></h5>
                                        <div class="flex-shrink-1 flex-grow-0 flex-wrap d-flex flex-column flex-sm-row gap-2">
                                            <button onclick="location.href='employeeEdit.php'" class="dt-button btn btn-light" type="button">
                                                <span><i class="bx bx-x-circle me-1"></i><span>Discard</span></span>
                                            </button>
                                            <button class="dt-button btn btn-primary" type="submit" name="submit">
                                                <span><i class="bx bx-check-circle me-1"></i><span>Save Changes</span></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mx-sm-4 my-sm-4 align-items-center">
                                            <div class="col-sm-4 col-12">
                                                <img id="uploadPreview" class="w-100 h-100 rounded" src="uploads/employees/<?php echo $row["employee_image"] ?>" alt="">
                                                <input type="file" name="employee_image" id="employee_image" class="form-control mt-3" onchange="PreviewImage();">
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="row mx-3 mx-sm-0 mx-lg-5 justify-content-center">
                                                    <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                        <span style="display: inline-block; width: 6em;">Id:</span>
                                                        <span class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0"><?php echo $row["employee_id"] ?></span>
                                                    </p>
                                                    <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                        <span style="display: inline-block; width: 6em;">Name:</span>
                                                        <input name="employee_name" id="employee_name" type="text" maxlength="100" class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0 form-control w-auto" value="<?php echo $row["employee_name"] ?>" required />
                                                    </p>
                                                    <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                        <span style="display: inline-block; width: 6em;">Email:</span>
                                                        <input type="text" name="employee_email" id="employee_email" class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0 form-control w-auto" value="<?php echo $row["employee_email"] ?>" step="0.01" maxlength="255" required>
                                                    </p>
                                                    <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                        <span style="display: inline-block; width: 6em;">Password:</span>
                                                        <input type="text" name="employee_password" id="employee_password" class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0 form-control w-auto" value="<?php echo $row["employee_password"] ?>" maxlength="255" required>
                                                    </p>
                                                    <p class="m-0 my-1 p-0 fs-5 text-capitalize">
                                                        <span style="display: inline-block; width: 6em;">Contact:</span>
                                                        <input type="number" name="employee_contact" id="employee_contact" class="d-block d-sm-inline-block fs-6 mx-2 mx-sm-0 form-control w-auto" value="<?php echo $row["employee_contact"] ?>" maxlength="255" required>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-1 mx-sm-5 mt-2">
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span>Time Added:</span>
                                                <span class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1"><?php echo $row["employee_timestamp"] ?></span>
                                            </p>
                                            <p class="row m-0 my-1 p-0 fs-5">
                                                <span>Address:</span>
                                                <textarea name="employee_address" id="employee_address" rows="5" class="fs-6 mx-2 mx-sm-3 mt-sm-2 mt-1 p-3 form-control flex-grow-1 w-auto" style="resize: none;" maxlength="500" required><?php echo $row["employee_address"] ?></textarea>
                                                <input type="hidden" name="employee_id" value="<?php echo $row["employee_id"] ?>">
                                            </p>
                                            <div class="row flex-column flex-sm-row flex-grow-1 p-0 m-0">
                                                <button onclick="location.href='employeeEdit.php'" class="dt-button btn btn-secondary flex-grow-1 w-auto my-4 mx-sm-5" type="button">
                                                    <span><i class="bx bx-x-circle me-1"></i><span>Discard</span></span>
                                                </button>
                                                <button onclick="location.href='employeeDelete.php?employee_id=<?php echo $employee_id ?>'" class="dt-button btn btn-danger flex-grow-1 w-auto my-4 mx-sm-5" type="button">
                                                    <span><i class="bx bx-trash me-1"></i><span>Delete Employee</span></span>
                                                </button>
                                                <button class="dt-button btn btn-primary flex-grow-1 w-auto my-4 mx-sm-5" type="submit" name="submit">
                                                    <span><i class="bx bx-check-circle me-1"></i><span>Save Changes</span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                        } ?>
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include "include/script.php"; ?>
</body>

</html>
<script>
    function employeeView(search, type = "edit") {
        if (search.length == 0) {
            document.getElementById("productViewSearch").innerHTML = "";
            document.getElementById("productViewSearch").classList.remove("searchResult");
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productViewSearch").innerHTML = this.responseText;
                document.getElementById("productViewSearch").classList.add("searchResult");
            }
        }
        xmlhttp.open("GET", "employeeSearch.php?search=" + search + "&type=" + type, true);
        xmlhttp.send();
    }

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("employee_image").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>