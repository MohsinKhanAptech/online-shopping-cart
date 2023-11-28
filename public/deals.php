<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php
$product_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products`"));
$orderby = isset($_GET["orderby"]) ? $_GET["orderby"] : "Latest";
$limit =  isset($_GET["limit"]) ? $_GET["limit"] : 8;
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$offset = $limit * $page;

switch ($orderby) {
    case 'Latest':
        $orderquerry = "SELECT * FROM `products` ORDER BY `product_timestamp` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Best Selling':
        $orderquerry = "SELECT * FROM `products` ORDER BY `product_sold` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Best Rating':
        $orderquerry = "SELECT *,`product_rating`*`product_review_count` AS 'product_score' FROM `products` ORDER BY `product_score` DESC LIMIT $limit OFFSET $offset;";
        break;

    case 'Lowest Price':
        $orderquerry = "SELECT * FROM `products` ORDER BY `product_price` LIMIT $limit OFFSET $offset;";
        break;

    case 'Highest Price':
        $orderquerry = "SELECT * FROM `products` ORDER BY `product_price` DESC LIMIT $limit OFFSET $offset;";
        break;

    default:
        $orderquerry = "SELECT * FROM `products` ORDER BY `product_timestamp` DESC LIMIT $limit OFFSET $offset;";
        break;
}
switch ($orderby) {
    case 'Latest':
        $page_title = "New Arrivals | OSC - OnlineShoppingCart";
        break;

    case 'Best Selling':
        $page_title = "Best Selling Products | OSC - OnlineShoppingCart";
        break;

    case 'Best Rating':
        $page_title = "Best Rating Products | OSC - OnlineShoppingCart";
        break;


    case 'Lowest Price':
        $page_title = "Lowest Price Products | OSC - OnlineShoppingCart";
        break;


    case 'Highest Price':
        $page_title = "Highest Price Products | OSC - OnlineShoppingCart";
        break;

    default:
        $page_title = "New Arrivals | OSC - OnlineShoppingCart";
        break;
}

include "include/head.php";
?>

<body>
    <div id="app">
        <!-- Header -->
        <?php include "include/navbar.php" ?>
        <!-- Header /- -->
        <!-- Page Introduction Wrapper -->
        <div class="page-style-a">
            <div class="container">
                <div class="page-intro">
                    <h2><?php echo trim($page_title, " | OSC - OnlineShoppingCart") ?></h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="deals.php?orderby=<?php echo $orderby ?>"><?php echo trim($page_title, " | OSC - OnlineShoppingCart") ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Custom-Deal-Page -->
        <div class="page-deal u-s-p-t-80">
            <div class="container">
                <div class="deal-page-wrapper">
                    <h1 class="deal-heading"><?php echo trim($page_title, " | OSC - OnlineShoppingCart") ?></h1>
                    <h6 class="deal-has-total-items"><?php echo $product_count ?> Items</h6>
                </div>
                <!-- Page-Bar -->
                <div class="page-bar clearfix">
                    <div class="shop-settings">
                        <a id="list-anchor">
                            <i class="fas fa-th-list"></i>
                        </a>
                        <a id="grid-anchor" class="active">
                            <i class="fas fa-th"></i>
                        </a>
                    </div>
                    <!-- Toolbar Sorter 1  -->
                    <form action="deals.php" id="orderbyform" method="get">
                        <div class="toolbar-sorter">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="sort-by">Sort By</label>
                                <select name="orderby" onchange="document.getElementById('orderbyform').submit();" class="select-box" id="sort-by">
                                    <option <?php echo $orderby == "Latest" ? 'selected="selected"' : ''; ?> value="Latest">Sort By: Latest</option>
                                    <option <?php echo $orderby == "Best Selling" ? 'selected="selected"' : ''; ?> value="Best Selling">Sort By: Best Selling</option>
                                    <option <?php echo $orderby == "Best Rating" ? 'selected="selected"' : ''; ?> value="Best Rating">Sort By: Best Rating</option>
                                    <option <?php echo $orderby == "Lowest Price" ? 'selected="selected"' : ''; ?> value="Lowest Price">Sort By: Lowest Price</option>
                                    <option <?php echo $orderby == "Highest Price" ? 'selected="selected"' : ''; ?> value="Highest Price">Sort By: Highest Price</option>
                                </select>
                            </div>
                        </div>
                        <!-- //end Toolbar Sorter 1  -->
                        <!-- Toolbar Sorter 2  -->
                        <div class="toolbar-sorter-2">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="show-records">Show Records Per Page</label>
                                <select name="limit" onchange="document.getElementById('orderbyform').submit();" class="select-box" id="show-records">
                                    <option <?php echo $limit == "8" ? 'selected="selected"' : ''; ?> value="8">Show: 8</option>
                                    <option <?php echo $limit == "16" ? 'selected="selected"' : ''; ?> value="16">Show: 16</option>
                                    <option <?php echo $limit == "28" ? 'selected="selected"' : ''; ?> value="28">Show: 28</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->
                <!-- Row-of-Product-Container -->
                <div class="row product-container grid-style">
                    <?php
                    $product_select = mysqli_query($connect, $orderquerry);
                    if (mysqli_num_rows($product_select) > 0) {
                        while ($row = mysqli_fetch_assoc($product_select)) { ?>
                            <div class="product-item col-lg-3 col-md-6 col-sm-6">
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="product.php?product_id=<?php echo $row["product_id"] ?>">
                                            <img class="img-fluid" src="uploads/products/<?php echo $row["product_image"] ?>" alt="Product">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a href="shop.php">Shop</a>
                                                </li>
                                                <li>
                                                    <a href="shop.php?category=<?php echo $row["product_category"] ?>"><?php echo $row["product_category"] ?></a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="product.php?product_id=<?php echo $row["product_id"] ?>"><?php echo $row["product_name"] ?></a>
                                            </h6>
                                            <div class="item-description">
                                                <p><?php echo $row["product_description"] ?></p>
                                            </div>
                                            <div class="item-stars">
                                                <div class='star' title="<?php echo $row["product_rating"] ?> out of 5 - based on <?php echo $row["product_review_count"] ?> Reviews">
                                                    <span style='width:calc(15px *<?php echo $row["product_rating"] ?>)'></span>
                                                </div>
                                                <span>(<?php echo $row["product_review_count"] ?>)</span>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                $<?php echo $row["product_price"] ?>
                                            </div>
                                            <div class="item-old-price">
                                                $<?php
                                                    $old_price = round($row["product_price"] + (($row["product_price"] / 100) * ($row["product_price"] > 100 ? 5 : 15)), 2);
                                                    echo $old_price ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($row["product_price"] > 100) {
                                        echo
                                        '<div class="tag discount">
                                            <span>-15%</span>
                                        </div>';
                                    } elseif ($row["product_sold"] > 25) {
                                        echo
                                        '<div class="tag hot">
                                            <span>HOT</span>
                                        </div>';
                                    } else {
                                        echo
                                        '<div class="tag new">
                                            <span>NEW</span>
                                        </div>';
                                    } ?>
                                </div>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <!-- Product Not Found -->
                        <div class='product-not-found' style="flex-grow: 1;">
                            <div class='not-found'>
                                <h2>SORRY!</h2>
                                <h6>There is not any product in specific catalogue.</h6>
                            </div>
                        </div>
                        <!-- Product Not Found /- -->
                    <?php
                    } ?>
                </div>
                <!-- Row-of-Product-Container /- -->
                <!-- Shop-Pagination -->
                <div class="pagination-area">
                    <div class="pagination-number">
                        <ul>
                            <?php
                            $product_pages = ceil($product_count / $limit);
                            $str = preg_replace("/&page=$page/", "", $_SERVER['QUERY_STRING']);
                            if ($page > 0) {
                                $page--;
                                echo
                                "<li>
                                    <a href='deals.php?$str&page=$page' title='Previous'>
                                        <i class='fa fa-angle-left'></i>
                                    </a>
                                </li>";
                                $page++;
                            }
                            for ($i = 0; $i < $product_pages; $i++) {
                                $c = ($page == $i ? "class='active'" : "");
                                $p = $i + 1;
                                echo
                                "<li $c>
                                    <a href='deals.php?$str&page=$i'>$p</a>
                                </li>";
                            }
                            if ($page < $product_pages - 1) {
                                $page++;
                                echo
                                "<li>
                                    <a href='deals.php?$str&page=$page' title='Next'>
                                        <i class='fa fa-angle-right'></i>
                                    </a>
                                </li>";
                                $page--;
                            } ?>
                        </ul>
                    </div>
                </div>
                <!-- Shop-Pagination /- -->
            </div>
        </div>
        <!-- Custom-Deal-Page -->
        <!-- Footer -->
        <?php include "include/footer.php"; ?>
        <!-- Footer /- -->
        <!-- Dummy Selectbox -->
        <?php include "include/dummySelectbox.php"; ?>
        <!-- Dummy Selectbox /- -->
        <!-- Responsive-Search -->
        <?php include "include/responsiveSearch.php"; ?>
        <!-- Responsive-Search /- -->
        <!-- Quick-view-Modal -->
        <?php // include "include/quickViewModal.php"; 
        ?>
        <!-- Quick-view-Modal /- -->
    </div>
    <?php include "include/scripts.php" ?>
</body>