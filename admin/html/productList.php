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

$all_product_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products`"));
$orderby = isset($_GET["orderby"]) ? $_GET["orderby"] : "Latest";
$limit =  isset($_GET["limit"]) ? $_GET["limit"] : 8;
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$offset = $limit * $page;

$get_category = isset($_GET["category"]) ? $_GET["category"] : 0;
$category = empty($get_category) ? "`product_category` != ''" : "`product_category` = '$get_category'";
$get_stock = isset($_GET["stock"]) ? $_GET["stock"] : 1;
$stock = $get_stock == 0 ? "`product_stock` = $get_stock" : "`product_stock` >= $get_stock";
$get_search = isset($_GET["search"]) ? $_GET["search"] : "";
$search = "(`product_name` LIKE '%$get_search%' OR `product_id` LIKE '%$get_search%')";

$where = "$category AND $stock AND $search";

switch ($orderby) {
    case 'Latest':
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `product_timestamp` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Oldest':
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `product_timestamp` LIMIT $limit OFFSET $offset;";
        break;

    case 'Best Selling':
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `product_sold` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Best Rating':
        $orderquerry = "SELECT *,`product_rating`*`product_review_count` AS 'product_score' FROM `products` WHERE $where ORDER BY `product_score` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Lowest Price':
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `product_price` LIMIT $limit OFFSET $offset;";
        break;

    case 'Highest Price':
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `product_price` DESC LIMIT $limit OFFSET $offset;";
        break;

    default:
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `product_timestamp` DESC LIMIT $limit OFFSET $offset;";
        break;
}
$product_count_querry = preg_replace("/SELECT \*/i", "SELECT COUNT(product_id)", $orderquerry);
$product_count_querry = preg_replace("/ ORDER BY (`product_timestamp`|`product_sold`|'product_score'|`product_price`) DESC LIMIT $limit OFFSET $offset/i", "", $product_count_querry);
$product_count = mysqli_fetch_column(mysqli_query($connect, $product_count_querry));
$title = "Product List | Admin Panel | OSC";
$currentPage = "productList";
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
                        <h4 class="py-3 mb-4 text-capitalize"><span class="text-muted fw-light">Products /</span><span> Product List</span></h4>
                        <!-- Product List Table -->
                        <form action="productList.php" method="get" id="productListForm">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Filter</h5>
                                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                        <div class="col-md-4 product_category">
                                            <select name="category" onchange="document.getElementById('productListForm').submit()" id="ProductCategory" class="form-select text-capitalize">
                                                <option <?php echo $get_category == 0 ? "selected" : ""; ?> value="">All Category</option>
                                                <option <?php echo $get_category == "Accessories" ? "selected" : ""; ?> value="Accessories">Accessories</option>
                                                <option <?php echo $get_category == "Fragrances" ? "selected" : ""; ?> value="Fragrances">Fragrances</option>
                                                <option <?php echo $get_category == "stationaries" ? "selected" : ""; ?> value="stationaries">stationaries</option>
                                                <option <?php echo $get_category == "Sweets" ? "selected" : ""; ?> value="Sweets">Sweets</option>
                                                <option <?php echo $get_category == "Toys" ? "selected" : ""; ?> value="Toys">Toys</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 product_order">
                                            <select name="stock" onchange="document.getElementById('productListForm').submit()" id="ProductStock" class="form-select text-capitalize">
                                                <option <?php echo $get_stock == 1 ? "selected" : ""; ?> value="1">In Stock</option>
                                                <option <?php echo $get_stock == 0 ? "selected" : ""; ?> value="0">Out of Stock</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 product_stock">
                                            <select name="orderby" onchange="document.getElementById('productListForm').submit()" id="ProductStock" class="form-select text-capitalize">
                                                <option <?php echo $orderby == "Latest" ? "selected" : ""; ?> value="Latest">Latest</option>
                                                <option <?php echo $orderby == "Oldest" ? "selected" : ""; ?> value="Oldest">Oldest</option>
                                                <option <?php echo $orderby == "Best Selling" ? "selected" : ""; ?> value="Best Selling">Best Selling</option>
                                                <option <?php echo $orderby == "Best Rating" ? "selected" : ""; ?> value="Best Rating">Best Rating</option>
                                                <option <?php echo $orderby == "Highest Price" ? "selected" : ""; ?> value="Highest Price">Highest Price</option>
                                                <option <?php echo $orderby == "Lowest Price" ? "selected" : ""; ?> value="Lowest Price">Lowest Price</option>
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
                                                        <input name="search" type="search" value="<?php echo $get_search ?>" onkeyup="productView(this.value);" class="form-control w-100" placeholder="Search Product" aria-controls="DataTables_Table_0" autocomplete="off">
                                                        <div id="productListSearch"></div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                                                <div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0">
                                                    <div class="dataTables_length mt-0 mt-md-3 me-3" id="DataTables_Table_0_length">
                                                        <label>
                                                            <select onchange="document.getElementById('productListForm').submit()" name="limit" aria-controls="DataTables_Table_0" class="form-select">
                                                                <option <?php echo $limit == 8 ? "selected" : ""; ?> value="8">8</option>
                                                                <option <?php echo $limit == 16 ? "selected" : ""; ?> value="16">16</option>
                                                                <option <?php echo $limit == 24 ? "selected" : ""; ?> value="24">24</option>
                                                                <option <?php echo $limit == 32 ? "selected" : ""; ?> value="32">32</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="dt-buttons d-flex">
                                                        <button onclick="location.href='productAdd.php'" class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-md-inline-block">Add Product</span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="datatables-products table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr>
                                                    <th class="d-lg-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="id: activate to sort column ascending">id</th>
                                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="product: activate to sort column descending" aria-sort="ascending">product</th>
                                                    <th class="d-lg-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="category: activate to sort column ascending">category</th>
                                                    <th class="d-sm-table-cell d-none" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="price: activate to sort column ascending">price</th>
                                                    <th class="d-md-table-cell d-none" rowspan="1" colspan="1" aria-label="stock">stock</th>
                                                    <th rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $product_select = mysqli_query($connect, $orderquerry);
                                                if (mysqli_num_rows($product_select) > 0) {
                                                    while ($row = mysqli_fetch_assoc($product_select)) { ?>
                                                        <tr>
                                                            <td class="d-lg-table-cell d-none"><span><?php echo $row["product_id"] ?></span></td>
                                                            <td class="sorting_1">
                                                                <a href="productView.php?product_id=<?php echo $row["product_id"] ?>">
                                                                    <div class="d-flex justify-content-start align-items-center product-name">
                                                                        <div class="avatar-wrapper">
                                                                            <div class="avatar avatar me-2 rounded-2 bg-label-secondary">
                                                                                <img src="../../public/uploads/products/<?php echo $row["product_image"] ?>" alt="Product-9" class="rounded-2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-column">
                                                                            <h6 class="text-body text-nowrap mb-0 text-capitalize"><?php echo $row["product_name"] ?></h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <?php
                                                            if ($row["product_category"] == "Accessories") {
                                                                echo
                                                                "<td class='d-lg-table-cell d-none'>
                                                                    <a href='productList.php?category=Accessories'>
                                                                        <span class='text-truncate text-body d-flex align-items-center'>
                                                                            <span class='avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-dark me-2'>
                                                                                <i class='bx bxs-watch'></i>
                                                                            </span>Accessories
                                                                        </span>
                                                                    </a>
                                                                </td>";
                                                            } elseif ($row["product_category"] == "Fragrances") {
                                                                echo
                                                                "<td class='d-lg-table-cell d-none'>
                                                                    <a href='productList.php?category=Fragrances'>
                                                                        <span class='text-truncate text-body d-flex align-items-center'>
                                                                            <span class='avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-2'>
                                                                                <i class='bx bxs-spray-can'></i>
                                                                            </span>Fragrances
                                                                        </span>
                                                                    </a>
                                                                </td>";
                                                            } elseif ($row["product_category"] == "Stationaries") {
                                                                echo
                                                                "<td class='d-lg-table-cell d-none'>
                                                                    <a href='productList.php?category=Stationaries'>
                                                                        <span class='text-truncate text-body d-flex align-items-center'>
                                                                            <span class='avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-warning me-2'>
                                                                                <i class='bx bxs-pencil'></i>
                                                                            </span>Stationaries
                                                                        </span>
                                                                    </a>
                                                                </td>";
                                                            } elseif ($row["product_category"] == "Sweets") {
                                                                echo
                                                                "<td class='d-lg-table-cell d-none'>
                                                                    <a href='productList.php?category=Sweets'>
                                                                        <span class='text-truncate text-body d-flex align-items-center'>
                                                                            <span class='avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-danger me-2'>
                                                                                <i class='bx bxs-cake'></i>
                                                                            </span>Sweets
                                                                        </span>
                                                                    </a>
                                                                </td>";
                                                            } elseif ($row["product_category"] == "Toys") {
                                                                echo
                                                                "<td class='d-lg-table-cell d-none'>
                                                                    <a href='productList.php?category=Toys'>
                                                                        <span class='text-truncate text-body d-flex align-items-center'>
                                                                            <span class='avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2'>
                                                                                <i class='bx bxs-bot'></i>
                                                                            </span>Toys
                                                                        </span>
                                                                    </a>
                                                                </td>";
                                                            }
                                                            ?>
                                                            <td class="d-sm-table-cell d-none"><span>$<?php echo $row["product_price"] ?></span></td>
                                                            <td class="d-md-table-cell d-none"><span><?php echo $row["product_stock"] ?></span></td>
                                                            <td>
                                                                <div class="d-inline-block text-nowrap">
                                                                    <a href="productEdit.php?product_id=<?php echo $row["product_id"] ?>"><button type="button" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button></a>
                                                                    <button type="button" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                                                        <a href="productView.php?product_id=<?php echo $row["product_id"] ?>" class="dropdown-item">View</a>
                                                                        <a href="productDelete.php?product_id=<?php echo $row["product_id"] ?>" class="dropdown-item">Remove</a>
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
                                                            <h6>There is not any product in specific catalogue.</h6>
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
                                                    $pgof = $pgofc > $product_count ? $product_count : $pgofc;
                                                    echo "Displaying $pg to $pgof of  $product_count entries" ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        <?php
                                                        $product_pages = ceil($product_count / $limit);
                                                        $str = trim($_SERVER['QUERY_STRING'], "&page=$page");
                                                        if ($page > 0) {
                                                            $page--;
                                                            echo
                                                            "<li class='paginate_button page-item previous disabled' id='DataTables_Table_0_previous'>
                                                                <a href='productList.php?$str&page=$page' aria-controls='DataTables_Table_0' aria-disabled='true' role='link' data-dt-idx='previous' tabindex='0' class='page-link'>Previous</a>
                                                            </li>";
                                                            $page++;
                                                        }
                                                        for ($i = 0; $i < $product_pages; $i++) {
                                                            $c = ($page == $i ? "active" : "");
                                                            $p = $i + 1;
                                                            echo
                                                            "<li class='paginate_button page-item $c'>
                                                                <a href='productList.php?$str&page=$i' aria-controls='DataTables_Table_0' role='link' aria-current='page' data-dt-idx='0' tabindex='0' class='page-link'>$p</a>
                                                            </li>";
                                                        }
                                                        if ($page < $product_pages - 1) {
                                                            $page++;
                                                            echo
                                                            "<li class='paginate_button page-item next' id='DataTables_Table_0_next'>
                                                                <a href='productList.php?$str&page=$page' aria-controls='DataTables_Table_0' role='link' data-dt-idx='next' tabindex='0' class='page-link'>Next</a>
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
    function productView(search, type = "list") {
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
        xmlhttp.open("GET", "productSearch.php?search=" + search + "&type=" + type, true);
        xmlhttp.send();
    }
</script>