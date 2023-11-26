<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold fs-1">OSC</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <?php if ($_SESSION["user_type"] == "admin") { ?>
            <!-- Dashboards -->
            <li class="menu-item  <?php echo $currentPage == "index" ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "index" ? "active" : ""; ?>">
                        <a href="index.php" class="menu-link">
                            <div>Home</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Product Pages -->
            <li class="menu-item <?php echo str_contains($currentPage, "product") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-store"></i>
                    <div>Products</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "productList" ? "active" : ""; ?>">
                        <a href="productList.php" class="menu-link">
                            <div>Product List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "productAdd" ? "active" : ""; ?>">
                        <a href="productAdd.php" class="menu-link">
                            <div>Product Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "productView" ? "active" : ""; ?>">
                        <a href="productView.php" class="menu-link">
                            <div>Product View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "productEdit" ? "active" : ""; ?>">
                        <a href="productEdit.php" class="menu-link">
                            <div>Product Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "productDelete" ? "active" : ""; ?>">
                        <a href="productDelete.php" class="menu-link">
                            <div>Product Remove</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Product Pages -->
            <!-- Order Pages -->
            <li class="menu-item <?php echo str_contains($currentPage, "order") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div>Orders</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "orderList" ? "active" : ""; ?>">
                        <a href="orderList.php" class="menu-link">
                            <div>Order List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "orderView" ? "active" : ""; ?>">
                        <a href="orderView.php" class="menu-link">
                            <div>Order View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "orderEdit" ? "active" : ""; ?>">
                        <a href="orderEdit.php" class="menu-link">
                            <div>Order Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "orderDelete" ? "active" : ""; ?>">
                        <a href="orderDelete.php" class="menu-link">
                            <div>Order Remove</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Order Pages -->
            <!-- Admin -->
            <li class="menu-item <?php echo str_contains($currentPage, "admin") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="bx bx-wrench me-1"></i>
                    <div>Admin</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "adminList" ? "active" : ""; ?>">
                        <a href="adminList.php" class="menu-link">
                            <div>Admin List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "adminAdd" ? "active" : ""; ?>">
                        <a href="adminAdd.php" class="menu-link">
                            <div>Admin Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "adminView" ? "active" : ""; ?>">
                        <a href="adminView.php" class="menu-link">
                            <div>Admin View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "adminEdit" ? "active" : ""; ?>">
                        <a href="adminEdit.php" class="menu-link">
                            <div>Admin Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "adminDelete" ? "active" : ""; ?>">
                        <a href="adminDelete.php" class="menu-link">
                            <div>Admin Remove</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Admin -->
            <!-- Employees -->
            <li class="menu-item <?php echo str_contains($currentPage, "employee") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="bx bx-hard-hat me-1"></i>
                    <div>Employees</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "employeeList" ? "active" : ""; ?>">
                        <a href="employeeList.php" class="menu-link">
                            <div>Employee List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "employeeAdd" ? "active" : ""; ?>">
                        <a href="employeeAdd.php" class="menu-link">
                            <div>Employee Add</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "employeeView" ? "active" : ""; ?>">
                        <a href="employeeView.php" class="menu-link">
                            <div>Employee View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "employeeEdit" ? "active" : ""; ?>">
                        <a href="employeeEdit.php" class="menu-link">
                            <div>Employee Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "employeeDelete" ? "active" : ""; ?>">
                        <a href="employeeDelete.php" class="menu-link">
                            <div>Employee Remove</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Employees -->
            <!-- Customers -->
            <li class="menu-item <?php echo str_contains($currentPage, "customer") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="bx bx-user me-1"></i>
                    <div>Customers</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "customerList" ? "active" : ""; ?>">
                        <a href="customerList.php" class="menu-link">
                            <div>Customer List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "customerView" ? "active" : ""; ?>">
                        <a href="customerView.php" class="menu-link">
                            <div>Customer View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "customerDelete" ? "active" : ""; ?>">
                        <a href="customerDelete.php" class="menu-link">
                            <div>Customer Remove</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Customers -->
            <!-- Misc -->
            <li class="menu-header small text-uppercase <?php echo $currentPage == "newsletter" ? "active open" : ""; ?>">
                <span class="menu-header-text">Misc</span>
            </li>
            <li class="menu-item <?php echo $currentPage == "newsletter" ? "active" : ""; ?>">
                <a href="newsletter.php" class="menu-link">
                    <i class="bx bx-news me-2"></i>
                    <div>Newsletter</div>
                </a>
            </li>
            <!-- / Misc -->
        <?php } elseif ($_SESSION["user_type"] == "employee") { ?>
            <!-- Order Pages -->
            <li class="menu-item <?php echo str_contains($currentPage, "order") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div>Orders</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "orderList" ? "active" : ""; ?>">
                        <a href="orderList.php" class="menu-link">
                            <div>Order List</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "orderView" ? "active" : ""; ?>">
                        <a href="orderView.php" class="menu-link">
                            <div>Order View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "orderEdit" ? "active" : ""; ?>">
                        <a href="orderEdit.php" class="menu-link">
                            <div>Order Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "orderDelete" ? "active" : ""; ?>">
                        <a href="orderDelete.php" class="menu-link">
                            <div>Order Remove</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Order Pages -->
        <?php } ?>
        <!-- Account -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Account</span>
        </li>
        <li class="menu-item <?php echo str_contains($currentPage, "account") ? "active open" : ""; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="bx bx-cog me-1"></i>
                <div>Account</div>
            </a>
            <?php if ($_SESSION["user_type"] == "admin") { ?>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "accountView" ? "active" : ""; ?>">
                        <a href="accountView-admin.php" class="menu-link">
                            <div>Account View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "accountEdit" ? "active" : ""; ?>">
                        <a href="accountEdit-admin.php" class="menu-link">
                            <div>Account Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "accountDelete" ? "active" : ""; ?>">
                        <a href="accountDelete-admin.php" class="menu-link">
                            <div>Account Delete</div>
                        </a>
                    </li>
                </ul>
            <?php } elseif ($_SESSION["user_type"] == "employee") { ?>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "accountView" ? "active" : ""; ?>">
                        <a href="accountView-employee.php" class="menu-link">
                            <div>Account View</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "accountEdit" ? "active" : ""; ?>">
                        <a href="accountEdit-employee.php" class="menu-link">
                            <div>Account Edit</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo $currentPage == "accountDelete" ? "active" : ""; ?>">
                        <a href="accountDelete-employee.php" class="menu-link">
                            <div>Account Delete</div>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        </li>
        <!-- / Account -->
        <!-- Log-out -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Log Out</span>
        </li>
        <li class="menu-item">
            <a href="logout.php" class="menu-link">
                <i class="bx bx-power-off me-2"></i>
                <div>Log Out</div>
            </a>
        </li>
        <!-- / Log-out -->
    </ul>
</aside>
<!-- / Menu -->