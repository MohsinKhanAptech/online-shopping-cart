<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (!isset($_SESSION["user"])) {
    alert("Please log-in to gain access");
    location("login.php");
} ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php

$all_order_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`order_id`) FROM `orders`"));
$orderby = isset($_GET["orderby"]) ? $_GET["orderby"] : "Newest";
$limit =  isset($_GET["limit"]) ? $_GET["limit"] : 8;
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$offset = $limit * $page;

$get_status = isset($_GET["status"]) ? $_GET["status"] : "All";
$status = $get_status == "All" ? "`order_status` LIKE '%%'" : "`order_status` = '$get_status'";
$get_search = isset($_GET["search"]) ? $_GET["search"] : "";
$search = "(orders.order_id LIKE '%$get_search%' OR products.product_name LIKE '%$get_search%' OR products.product_id LIKE '%$get_search%' OR customers.customer_name LIKE '%$get_search%' OR customers.customer_id LIKE '%$get_search%')";

$where = "$status AND $search";

switch ($orderby) {
    case 'Newest':
        $orderquerry =
            "SELECT orders.*,customers.customer_name,products.product_name
            FROM ((`orders`
            INNER JOIN `customers`
            ON orders.customer_id = customers.customer_id)
            INNER JOIN `products`
            ON Orders.product_id = products.product_id)
            WHERE $where
            ORDER BY `order_timestamp` DESC LIMIT $limit OFFSET $offset;
        ";
        break;

    case 'Oldest':
        $orderquerry =
            "SELECT orders.*,customers.customer_name,products.product_name
            FROM ((`orders`
            INNER JOIN `customers`
            ON orders.customer_id = customers.customer_id)
            INNER JOIN `products`
            ON Orders.product_id = products.product_id)
            WHERE $where
            ORDER BY `order_timestamp` LIMIT $limit OFFSET $offset;
        ";
        break;

    default:
        $orderquerry =
            "SELECT orders.*,customers.customer_name,products.product_name
            FROM ((`orders`
            INNER JOIN `customers`
            ON orders.customer_id = customers.customer_id)
            INNER JOIN `products`
            ON orders.product_id = products.product_id)
            WHERE $where
            ORDER BY `order_timestamp` DESC LIMIT $limit OFFSET $offset;
        ";
        break;
}

$order_count_querry = preg_replace("/SELECT orders.\*,customers.customer_name,products.product_name/i", "SELECT COUNT(order_id)", $orderquerry);
$order_count_querry = preg_replace("/ORDER BY (`order_timestamp` DESC| `order_timestamp`) LIMIT $limit OFFSET $offset/i", "", $order_count_querry);
$order_count = mysqli_fetch_column(mysqli_query($connect, $order_count_querry));

$title = "order List";
$currentPage = "orderList";
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
                        <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">orders /</span><span> order List</span></h4>
                        <!-- Product List Table -->
                        <form action="orderList.php" method="get" id="orderListForm">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Filter</h5>
                                    <div class="d-flex flex-row align-items-center py-3 gap-3">
                                        <div class="flex-grow-1">
                                            <select name="orderby" onchange="document.getElementById('orderListForm').submit()" id="ProductStock" class="form-select text-capitalize">
                                                <option <?php echo $orderby == "Newest" ? "selected" : ""; ?> value="Newest">Newest</option>
                                                <option <?php echo $orderby == "Oldest" ? "selected" : ""; ?> value="Oldest">Oldest</option>
                                            </select>
                                        </div>
                                        <div class="flex-grow-1">
                                            <select name="status" onchange="document.getElementById('orderListForm').submit()" id="ProductStock" class="form-select text-capitalize">
                                                <option <?php echo $get_status == "All" ? "selected" : ""; ?> value="All">Status</option>
                                                <option <?php echo $get_status == "Backorder" ? "selected" : ""; ?> value="Backorder">Backorder</option>
                                                <option <?php echo $get_status == "Completed" ? "selected" : ""; ?> value="Completed">Completed</option>
                                                <option <?php echo $get_status == "On Hold" ? "selected" : ""; ?> value="On Hold">On Hold</option>
                                                <option <?php echo $get_status == "Pending" ? "selected" : ""; ?> value="Pending">Pending</option>
                                                <option <?php echo $get_status == "Processing" ? "selected" : ""; ?> value="Processing">Processing</option>
                                                <option <?php echo $get_status == "Shipped" ? "selected" : ""; ?> value="Shipped">Shipped</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-datatable table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="card-header d-flex flex-column flex-sm-row border-top rounded-0 py-md-0">
                                            <div class="me-sm-5 ms-md-n2 pe-md-5 flex-grow-1">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label class="d-flex flex-column flex-sm-row gap-3">
                                                        <input name="search" type="search" id="orderSearch" value="<?php echo $get_search ?>" onkeyup="orderView(this.value,document.getElementById('filter').value)" class="form-control flex-grow-1 w-auto m-0" placeholder="Search Product" aria-controls="DataTables_Table_0" autocomplete="off">
                                                        <select onchange="orderView(document.getElementById('orderSearch').value,this.value)" class="form-select flex-grow-0 w-auto m-0" name="filter" id="filter">
                                                            <option value="order">Order Id</option>
                                                            <option value="product">Product</option>
                                                            <option value="customer">Customer</option>
                                                        </select>
                                                        <div id="productListSearch"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                                                <div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0">
                                                    <div class="dataTables_length mt-0 mt-md-3 me-3" id="DataTables_Table_0_length">
                                                        <label>
                                                            <select onchange="document.getElementById('orderListForm').submit()" name="limit" aria-controls="DataTables_Table_0" class="form-select">
                                                                <option <?php echo $limit == 8 ? "selected" : ""; ?> value="8">8</option>
                                                                <option <?php echo $limit == 16 ? "selected" : ""; ?> value="16">16</option>
                                                                <option <?php echo $limit == 24 ? "selected" : ""; ?> value="24">24</option>
                                                                <option <?php echo $limit == 32 ? "selected" : ""; ?> value="32">32</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="datatables-products table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th class="d-lg-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="id: activate to sort column ascending">id</th>
                                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="customer: activate to sort column descending" aria-sort="ascending">customer</th>
                                                    <th class="d-xlg-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="id: activate to sort column ascending">id</th>
                                                    <th class="d-md-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="product: activate to sort column descending" aria-sort="ascending">product</th>
                                                    <th class="d-xlg-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="id: activate to sort column ascending">id</th>
                                                    <th class="d-md-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="category: activate to sort column ascending">price</th>
                                                    <th class="d-lg-table-cell d-none" rowspan="1" colspan="1" aria-label="stock">qty</th>
                                                    <th rowspan="1" colspan="1" aria-label="stock">total</th>
                                                    <th class="d-xlg-table-cell d-none" rowspan="1" colspan="1" aria-label="stock">timestamp</th>
                                                    <th rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $order_select = mysqli_query($connect, $orderquerry);
                                                if (mysqli_num_rows($order_select) > 0) {
                                                    while ($row = mysqli_fetch_assoc($order_select)) { ?>
                                                        <tr>
                                                            <td class="d-lg-table-cell d-none"><span><?php echo $row["order_id"] ?></span></td>
                                                            <td>
                                                                <a href="orderView.php?order_id=<?php echo $row["order_id"] ?>">
                                                                    <h6 class="text-body text-nowrap mb-0 text-capitalize"><?php echo $row["customer_name"] ?></h6>
                                                                </a>
                                                            </td>
                                                            <td class="d-xlg-table-cell d-none"><span><?php echo $row["customer_id"] ?></span></td>
                                                            <td class="d-md-table-cell d-none">
                                                                <h6 class="text-body text-nowrap mb-0 text-capitalize"><?php echo $row["product_name"] ?></h6>
                                                            </td>
                                                            <td class="d-xlg-table-cell d-none"><span><?php echo $row["product_id"] ?></span></td>
                                                            <td class="d-md-table-cell d-none">$<span><?php echo $row["order_price"] ?></span></td>
                                                            <td class="d-lg-table-cell d-none"><span><?php echo $row["order_quantity"] ?></span></td>
                                                            <td>$<span><?php echo $row["order_total"] ?></span></td>
                                                            <td class="d-xlg-table-cell d-none"><span><?php echo $row["order_timestamp"] ?></span></td>
                                                            <td>
                                                                <div class="d-inline-block text-nowrap">
                                                                    <a href="orderEdit.php?order_id=<?php echo $row["order_id"] ?>"><button type="button" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button></a>
                                                                    <button type="button" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                                                        <a href="orderView.php?order_id=<?php echo $row["order_id"] ?>" class="dropdown-item">View</a>
                                                                        <a href="orderDelete.php?order_id=<?php echo $row["order_id"] ?>" class="dropdown-item">Remove</a>
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
                                                    $pgof = $pgofc > $order_count ? $order_count : $pgofc;
                                                    echo "Displaying $pg to $pgof of  $order_count entries" ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        <?php
                                                        $order_pages = ceil($order_count / $limit);
                                                        $str = trim($_SERVER['QUERY_STRING'], "&page=$page");
                                                        if ($page > 0) {
                                                            $page--;
                                                            echo
                                                            "<li class='paginate_button page-item previous disabled' id='DataTables_Table_0_previous'>
                                                                <a href='orderList.php?$str&page=$page' aria-controls='DataTables_Table_0' aria-disabled='true' role='link' data-dt-idx='previous' tabindex='0' class='page-link'>Previous</a>
                                                            </li>";
                                                            $page++;
                                                        }
                                                        for ($i = 0; $i < $order_pages; $i++) {
                                                            $c = ($page == $i ? "active" : "");
                                                            $p = $i + 1;
                                                            echo
                                                            "<li class='paginate_button page-item $c'>
                                                                <a href='orderList.php?$str&page=$i' aria-controls='DataTables_Table_0' role='link' aria-current='page' data-dt-idx='0' tabindex='0' class='page-link'>$p</a>
                                                            </li>";
                                                        }
                                                        if ($page < $order_pages - 1) {
                                                            $page++;
                                                            echo
                                                            "<li class='paginate_button page-item next' id='DataTables_Table_0_next'>
                                                                <a href='orderList.php?$str&page=$page' aria-controls='DataTables_Table_0' role='link' data-dt-idx='next' tabindex='0' class='page-link'>Next</a>
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
    function orderView(search, filter) {
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
        xmlhttp.open("GET", "orderSearch.php?search=" + search + "&type=list&filter=" + filter, true);
        xmlhttp.send();
    }
</script>