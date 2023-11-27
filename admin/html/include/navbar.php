<?php
include "include/dbconfig.php";
if (isset($_SESSION["user"]) && $_SESSION["user_type"] == "admin") {
    $adminSQL = "SELECT * FROM `admins` WHERE `admin_id` = {$_SESSION["user_id"]}";
    $admin = mysqli_fetch_assoc(mysqli_query($connect, $adminSQL));
    $imgSRC = "uploads/admins/" . $admin["admin_image"];
} elseif (isset($_SESSION["user"]) && $_SESSION["user_type"] == "employee") {
    $employeeSQL = "SELECT * FROM `employees` WHERE `employee_id` = {$_SESSION["user_id"]}";
    $employee = mysqli_fetch_assoc(mysqli_query($connect, $employeeSQL));
    $imgSRC = "uploads/employees/" . $employee["employee_image"];
} ?>
<style>
    #livesearch,
    #productViewSearch,
    #productListSearch {
        display: none;
        position: absolute;
        z-index: 500;
        width: calc(100%);
        top: 3.69rem;
        left: 0;
        background: #ffffff;
        font-size: 13px;
        line-height: 24px;
        overflow: hidden;
        overflow-wrap: break-word;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 8px 0.375rem 0.25rem rgba(161, 172, 184, 0.15);
    }

    #productViewSearch {
        top: 7rem;
    }

    #livesearch.searchResult,
    #productViewSearch.searchResult,
    #productListSearch.searchResult {
        display: block;
        padding: 8px 16px;
    }

    .searchResult>a {
        display: block;
        text-transform: capitalize;
    }

    .viewAll {
        text-decoration: underline;
        margin-left: 3.5em;
    }

    .col_id {
        display: inline-block;
        width: 3em;
        text-align: end;
    }

    .password {
        -webkit-text-security: disc;
    }

    input#employee_contact::-webkit-outer-spin-button,
    input#employee_contact::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input#employee_contact[type=number] {
        -moz-appearance: textfield;
    }
</style>
<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center gap-lg-5 gap-md-4 gap-2" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav flex-row justify-content-start flex-grow-1">
            <div class="nav-item d-flex flex-row justify-content-start align-items-center flex-grow-1 gap-2 searchContainer">
                <i class="bx bx-search fs-4 lh-0 align-self-center w-auto"></i>
                <input type="text" name="search" id="searchBar" onkeyup="showResult(this.value,document.getElementById('searchTypeSelect').value);" class="form-control border-0 flex-grow-1 shadow-none ps-1 ps-sm-2 w-100" placeholder="Search..." aria-label="Search..." autocomplete="off" />
                <select name="searchType" id="searchTypeSelect" class="form-select w-auto" onchange="showResult(document.getElementById('searchBar').value,this.value);">
                    <option <?php echo $_SESSION["user_type"] == "employee" ? "hidden" : ""; ?> value="products">Products</option>
                    <option <?php echo $_SESSION["user_type"] == "employee" ? "hidden" : ""; ?> value="users">Users</option>
                    <option <?php echo $_SESSION["user_type"] == "employee" ? "hidden" : ""; ?> value="employees">Employees</option>
                    <option <?php echo $_SESSION["user_type"] == "employee" ? "selected" : ""; ?> value="orders">Orders</option>
                </select>
                <div id="livesearch"></div>
            </div>
        </div>
        <!-- /Search -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="<?php echo $imgSRC ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="<?php echo $_SESSION["user_type"] == "admin" ? "accountView-admin.php" : "accountView-employee.php"; ?>">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="<?php echo $imgSRC ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-medium d-block"><?php echo $_SESSION["user"] ?></span>
                                    <small class="text-muted text-capitalize"><?php echo $_SESSION["user_type"] ?></small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<!-- / Navbar -->
<script>
    function showResult(search, searchType) {
        if (search.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").classList.remove("searchResult");
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").classList.add("searchResult");
            }
        }
        xmlhttp.open("GET", "search.php?search=" + search + "&searchType=" + searchType, true);
        xmlhttp.send();
    }
</script>