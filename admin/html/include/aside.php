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
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?php echo $currentPage == "index" ? "active" : ""; ?>">
                        <a href="index.php" class="menu-link">
                            <div data-i18n="Home">Home</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Product Pages -->
            <li class="menu-item <?php echo str_contains($currentPage, "product") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-store"></i>
                    <div data-i18n="Front Pages">Products</div>
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
                    <div data-i18n="Front Pages">Orders</div>
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
            <!-- Employees -->
            <li class="menu-item <?php echo str_contains($currentPage, "employee") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="bx bx-hard-hat me-1"></i>
                    <div data-i18n="Layouts">Employees</div>
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
                    <div data-i18n="Layouts">Customers</div>
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
            <!-- Pages -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item">
                <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-envelope"></i>
                    <div data-i18n="Email">Email</div>
                </a>
            </li>
            <!-- / Pages -->
        <?php } elseif ($_SESSION["user_type"] == "employee") { ?>
            <!-- Order Pages -->
            <li class="menu-item <?php echo str_contains($currentPage, "order") ? "active open" : ""; ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-package"></i>
                    <div data-i18n="Front Pages">Orders</div>
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
        <!-- Log-out -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Log Out</span>
        </li>
        <li class="menu-item">
            <a href="logout.php" class="menu-link">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Kanban">Log Out</div>
            </a>
        </li>
        <!-- / Log-out -->
    </ul>
</aside>
<!-- / Menu -->