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

$all_employee_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`employee_id`) FROM `employees`"));
$orderby = isset($_GET["orderby"]) ? $_GET["orderby"] : "Newest";
$limit =  isset($_GET["limit"]) ? $_GET["limit"] : 8;
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$offset = $limit * $page;

$get_search = isset($_GET["search"]) ? $_GET["search"] : "";
$search = "(`employee_name` LIKE '%$get_search%' OR `employee_id` LIKE '%$get_search%')";

$where = "$search";

switch ($orderby) {
    case 'Newest':
        $orderquerry = "SELECT * FROM `employees` WHERE $where ORDER BY `employee_timestamp` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Oldest':
        $orderquerry = "SELECT * FROM `employees` WHERE $where ORDER BY `employee_timestamp` LIMIT $limit OFFSET $offset;";
        break;

    default:
        $orderquerry = "SELECT * FROM `employees` WHERE $where ORDER BY `employee_timestamp` DESC LIMIT $limit OFFSET $offset;";
        break;
}
$employee_count_querry = preg_replace("/SELECT \*/i", "SELECT COUNT(employee_id)", $orderquerry);
$employee_count_querry = preg_replace("/ORDER BY (`employee_timestamp` DESC|`employee_timestamp`) LIMIT $limit OFFSET $offset/i", "", $employee_count_querry);
$employee_count = mysqli_fetch_column(mysqli_query($connect, $employee_count_querry));

$title = "employee List | Admin Panel | OSC";
$currentPage = "employeeList";
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
                        <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">Employees /</span><span> Employee List</span></h4>
                        <!-- Product List Table -->
                        <form action="employeeList.php" method="get" id="employeeListForm">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Filter</h5>
                                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                        <div class="product_stock">
                                            <select name="orderby" onchange="document.getElementById('employeeListForm').submit()" id="ProductStock" class="form-select text-capitalize">
                                                <option <?php echo $orderby == "Newest" ? "selected" : ""; ?> value="Newest">Newest</option>
                                                <option <?php echo $orderby == "Oldest" ? "selected" : ""; ?> value="Oldest">Oldest</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-datatable table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="card-header d-flex flex-column flex-sm-row border-top rounded-0 py-md-0">
                                            <div class="me-sm-5 me-3 ms-md-n2 pe-md-5 flex-grow-1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label class="w-100">
                                                        <input name="search" type="search" value="<?php echo $get_search ?>" onkeyup="employeeView(this.value);" class="form-control w-100" placeholder="Search Employee" aria-controls="DataTables_Table_0" autocomplete="off">
                                                        <div id="productListSearch"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                                                <div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0">
                                                    <div class="dataTables_length mt-0 mt-md-3 me-3" id="DataTables_Table_0_length">
                                                        <label>
                                                            <select onchange="document.getElementById('employeeListForm').submit()" name="limit" aria-controls="DataTables_Table_0" class="form-select">
                                                                <option <?php echo $limit == 8 ? "selected" : ""; ?> value="8">8</option>
                                                                <option <?php echo $limit == 16 ? "selected" : ""; ?> value="16">16</option>
                                                                <option <?php echo $limit == 24 ? "selected" : ""; ?> value="24">24</option>
                                                                <option <?php echo $limit == 32 ? "selected" : ""; ?> value="32">32</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="dt-buttons d-flex">
                                                        <button onclick="location.href='employeeAdd.php'" class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-md-inline-block">Add Employee</span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="datatables-products table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th class="d-lg-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="id: activate to sort column ascending">id</th>
                                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="product: activate to sort column descending" aria-sort="ascending">employee</th>
                                                    <th class="d-sm-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="category: activate to sort column ascending">email</th>
                                                    <th class="d-md-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="price: activate to sort column ascending">contact</th>
                                                    <th class="d-md-table-cell d-none" rowspan="1" colspan="1" aria-label="stock">added</th>
                                                    <th rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $employee_select = mysqli_query($connect, $orderquerry);
                                                if (mysqli_num_rows($employee_select) > 0) {
                                                    while ($row = mysqli_fetch_assoc($employee_select)) { ?>
                                                        <tr>
                                                            <td class="d-lg-table-cell d-none"><span><?php echo $row["employee_id"] ?></span></td>
                                                            <td class="sorting_1">
                                                                <a href="employeeView.php?employee_id=<?php echo $row["employee_id"] ?>">
                                                                    <div class="d-flex justify-content-start align-items-center employee-name">
                                                                        <div class="avatar-wrapper">
                                                                            <div class="avatar avatar me-2 rounded-2 bg-label-secondary">
                                                                                <img src="uploads/employees/<?php echo $row["employee_image"] ?>" alt="employee-9" class="rounded-2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-column">
                                                                            <h6 class="text-body text-nowrap mb-0 text-capitalize"><?php echo $row["employee_name"] ?></h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <td class="d-sm-table-cell d-none"><span><?php echo $row["employee_email"] ?></span></td>
                                                            <td class="d-md-table-cell d-none"><span><?php echo $row["employee_contact"] ?></span></td>
                                                            <td class="d-md-table-cell d-none"><span><?php echo $row["employee_timestamp"] ?></span></td>
                                                            <td>
                                                                <div class="d-inline-block text-nowrap">
                                                                    <a href="employeeEdit.php?employee_id=<?php echo $row["employee_id"] ?>"><button type="button" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button></a>
                                                                    <button type="button" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                                                        <a href="employeeView.php?employee_id=<?php echo $row["employee_id"] ?>" class="dropdown-item">View</a>
                                                                        <a href="employeeDelete.php?employee_id=<?php echo $row["employee_id"] ?>" class="dropdown-item">Remove</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    echo
                                                    "<!-- Product Not Found -->
                                                    <tr>
                                                        <td colspan='10' class='text-center p-5'>
                                                            <h2>SORRY!</h2>
                                                            <h6>Result not found.</h6>
                                                        </td>
                                                    </tr>
                                                    <!-- Product Not Found /- -->";
                                                } ?>
                                            </tbody>
                                        </table>
                                        <!-- pagination -->
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                                    <?php
                                                    $pg = $offset + 1;
                                                    $pgofc = $limit * ($page + 1);
                                                    $pgof = $pgofc > $employee_count ? $employee_count : $pgofc;
                                                    echo "Displaying $pg to $pgof of  $employee_count entries" ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        <?php
                                                        $employee_pages = ceil($employee_count / $limit);
                                                        $str = trim($_SERVER['QUERY_STRING'], "&page=$page");
                                                        if ($page > 0) {
                                                            $page--;
                                                            echo
                                                            "<li class='paginate_button page-item previous disabled' id='DataTables_Table_0_previous'>
                                                                <a href='employeeList.php?$str&page=$page' aria-controls='DataTables_Table_0' aria-disabled='true' role='link' data-dt-idx='previous' tabindex='0' class='page-link'>Previous</a>
                                                            </li>";
                                                            $page++;
                                                        }
                                                        for ($i = 0; $i < $employee_pages; $i++) {
                                                            $c = ($page == $i ? "active" : "");
                                                            $p = $i + 1;
                                                            echo
                                                            "<li class='paginate_button page-item $c'>
                                                                <a href='employeeList.php?$str&page=$i' aria-controls='DataTables_Table_0' role='link' aria-current='page' data-dt-idx='0' tabindex='0' class='page-link'>$p</a>
                                                            </li>";
                                                        }
                                                        if ($page < $employee_pages - 1) {
                                                            $page++;
                                                            echo
                                                            "<li class='paginate_button page-item next' id='DataTables_Table_0_next'>
                                                                <a href='employeeList.php?$str&page=$page' aria-controls='DataTables_Table_0' role='link' data-dt-idx='next' tabindex='0' class='page-link'>Next</a>
                                                            </li>";
                                                            $page--;
                                                        } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / pagination -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- / Product List Table -->
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout container -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <?php include "include/script.php"; ?>
</body>

</html>
<script>
    function employeeView(search, type = "list") {
        if (search.length == 0) {
            document.getElementById("productListSearch").innerHTML = "";
            document.getElementById("productListSearch").classList.remove("searchResult");
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productListSearch").innerHTML = this.responseText;
                document.getElementById("productListSearch").classList.add("searchResult");
            }
        }
        xmlhttp.open("GET", "employeeSearch.php?search=" + search + "&type=" + type, true);
        xmlhttp.send();
    }
</script>