<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

?>
<!DOCTYPE html>
<html lang="en">

<?php

$all_product_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products`"));
$orderby = isset($_GET["orderby"]) ? $_GET["orderby"] : "Latest";
$limit =  isset($_GET["limit"]) ? $_GET["limit"] : 8;
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$offset = $limit * $page;

$get_category = isset($_GET["category"]) ? $_GET["category"] : 0;
$category = empty($get_category) ? "`product_category` != ''" : "`product_category` = '$get_category'";
$get_price_min = isset($_GET["price_min"]) ? $_GET["price_min"] : 1;
$get_price_max = isset($_GET["price_max"]) ? $_GET["price_max"] : 5000000;
$price = "`product_price` >= $get_price_min AND `product_price` <= $get_price_max";
$get_rating = isset($_GET["rating"]) ? $_GET["rating"] : 0;
$rating = "`product_rating` >= $get_rating";
$get_search = isset($_GET["search"]) ? $_GET["search"] : "";
$search = "`product_name` LIKE '%$get_search%'";

$where = "$category AND $price AND $rating AND $search";

switch ($orderby) {
    case 'Latest':
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `timestamp` DESC LIMIT $limit OFFSET $offset;";
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
        $orderquerry = "SELECT * FROM `products` WHERE $where ORDER BY `timestamp` DESC LIMIT $limit OFFSET $offset;";
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

$five_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products` WHERE $category AND `product_rating` = 5"));
$four_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products` WHERE $category AND `product_rating` >= 4"));
$three_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products` WHERE $category AND `product_rating` >= 3"));
$two_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products` WHERE $category AND `product_rating` >= 2"));
$one_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products` WHERE $category AND `product_rating` >= 1"));

$product_count_querry = $orderquerry;
$product_count = mysqli_fetch_column(mysqli_query($connect, str_replace("*", "COUNT(product_id)", $product_count_querry)));

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
                    <h2>Shop</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="shop.php?orderby=<?php echo $orderby ?>"><?php echo trim($page_title, " | OSC - OnlineShoppingCart") ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Shop-Page -->
        <div class="page-shop u-s-p-t-80">
            <div class="container">
                <!-- Search-Results -->
                <?php
                if (empty($get_search)) {
                } else {
                    echo
                    "<div class='search-results-wrapper u-s-p-b-80'>
                        <h4 style='text-transform:capitalize;'>WE FOUND $product_count RESULTS FOR
                            <i>$get_search</i>" .
                        ($x = $get_category == 0 ? "" : " IN $get_category")
                        . "</h4>
                    </div>";
                }
                ?>
                <!-- Search-Results /- -->
                <!-- Shop-Intro -->
                <div class="shop-intro">
                    <h3>Men's Clothing</h3>
                </div>
                <!-- Shop-Intro /- -->
                <div class="row">
                    <!-- Shop-Left-Side-Bar-Wrapper -->
                    <div class="col-lg-3 col-md-3 col-sm-12 pt-4 mt-2">
                        <div class="page-bar clearfix pt-1">
                            <!-- Fetch-Categories-from-Root-Category  -->
                            <div class="fetch-categories">
                                <h3 class="title-name">Browse Categories</h3>
                                <!-- Level 3 -->
                                <ul class="fetch-categories">
                                    <li <?php echo empty($get_category) ? 'class="fetch-mark-category"' : ''; ?>>
                                        <a href="shop.php">All
                                            <span class="total-fetch-items">(<?php echo $all_product_count; ?>)</span>
                                        </a>
                                    </li>
                                    <?php
                                    $category_fetch = mysqli_query($connect, "SELECT `category_name` FROM `categories`");
                                    while ($cat = mysqli_fetch_row($category_fetch)) {
                                        $n = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`product_id`) FROM `products` WHERE `product_category` = '$cat[0]'"));
                                        $c = $cat[0] == $get_category ? 'class="fetch-mark-category"' : '';
                                        echo
                                        "<li $c>
                                            <a href='shop.php?category=$cat[0]'>$cat[0]
                                                <span class='total-fetch-items'>($n)</span>
                                            </a>
                                        </li>";
                                    } ?>
                                </ul>
                                <!-- //end Level 3 -->
                            </div>
                            <!-- Fetch-Categories-from-Root-Category  /- -->
                            <form action="shop.php" method="get" id="shopFilterForm">
                                <!-- Filters -->
                                <input type="hidden" name="category" value="<?php echo $get_category ?>">
                                <!-- Filter-Price -->
                                <div class="facet-filter-by-price">
                                    <h3 class="title-name">Price ($)</h3>
                                    <!-- Range  -->
                                    <div class="price-filter amount-result clearfix d-grid">
                                        <input type="number" name="price_min" id="" min="1" max="99999999999" value="<?php echo $get_price_min ?>" step="0.01">
                                        <input type="number" name="price_max" id="" min="1" max="99999999999" value="<?php echo $get_price_max ?>" step="0.01">
                                        <button type="submit" class="button button-primary">
                                            Filter
                                        </button>
                                    </div>
                                    <!-- Range /- -->
                                </div>
                                <!-- Filter-Price /- -->
                                <!-- Filter-Rating -->
                                <div class="facet-filter-by-rating">
                                    <h3 class="title-name">Rating</h3>
                                    <div class="facet-form">
                                        <!-- 5 Stars -->
                                        <div class="facet-link">
                                            <input type="radio" onclick="document.getElementById('shopFilterForm').submit()" name="rating" id="fiveStar" value="5" style="display: none;">
                                            <label <?php echo $get_rating == 5 ? "class='activeRating'" : ''; ?> for="fiveStar">
                                                <div class="item-stars">
                                                    <div class="star">
                                                        <span style="width: 75px"></span>
                                                    </div>
                                                </div>
                                                <span class="total-fetch-items">(<?php echo $five_star_reviews_count ?>)</span>
                                            </label>
                                        </div>
                                        <!-- 5 Stars /- -->
                                        <!-- 4 & Up Stars -->
                                        <div class="facet-link">
                                            <input type="radio" onclick="document.getElementById('shopFilterForm').submit()" name="rating" id="fourStar" value="4" style="display: none;">
                                            <label <?php echo $get_rating == 4 ? "class='activeRating'" : ''; ?> for="fourStar">
                                                <div class="item-stars">
                                                    <div class="star">
                                                        <span style="width: 60px"></span>
                                                    </div>
                                                </div>
                                                <span class="total-fetch-items">& Up (<?php echo $four_star_reviews_count ?>)</span>
                                            </label>
                                        </div>
                                        <!-- 4 & Up Stars /- -->
                                        <!-- 3 & Up Stars -->
                                        <div class="facet-link">
                                            <input type="radio" onclick="document.getElementById('shopFilterForm').submit()" name="rating" id="threeStar" value="3" style="display: none;">
                                            <label <?php echo $get_rating == 3 ? "class='activeRating'" : ''; ?> for="threeStar">
                                                <div class="item-stars">
                                                    <div class="star">
                                                        <span style="width: 45px"></span>
                                                    </div>
                                                </div>
                                                <span class="total-fetch-items">& Up (<?php echo $three_star_reviews_count ?>)</span>
                                            </label>
                                        </div>
                                        <!-- 3 & Up Stars /- -->
                                        <!-- 2 & Up Stars -->
                                        <div class="facet-link">
                                            <input type="radio" onclick="document.getElementById('shopFilterForm').submit()" name="rating" id="twoStar" value="2" style="display: none;">
                                            <label <?php echo $get_rating == 2 ? "class='activeRating'" : ''; ?> for="twoStar">
                                                <div class="item-stars">
                                                    <div class="star">
                                                        <span style="width: 30px"></span>
                                                    </div>
                                                </div>
                                                <span class="total-fetch-items">& Up (<?php echo $two_star_reviews_count ?>)</span>
                                            </label>
                                        </div>
                                        <!-- 2 & Up Stars /- -->
                                        <!-- 1 & Up Stars -->
                                        <div class="facet-link">
                                            <input type="radio" onclick="document.getElementById('shopFilterForm').submit()" name="rating" id="oneStar" value="1" style="display: none;">
                                            <label <?php echo $get_rating == 1 || !isset($_GET["rating"]) ? "class='activeRating'" : ''; ?> for="oneStar">
                                                <div class="item-stars">
                                                    <div class="star">
                                                        <span style="width: 15px"></span>
                                                    </div>
                                                </div>
                                                <span class="total-fetch-items">& Up (<?php echo $one_star_reviews_count ?>)</span>
                                            </label>
                                        </div>
                                        <!-- 1 & Up Stars /- -->
                                    </div>
                                </div>
                                <!-- Filter-Rating -->
                                <!-- Filters /- -->
                            </form>
                        </div>
                    </div>
                    <!-- Shop-Left-Side-Bar-Wrapper /- -->
                    <!-- Shop-Right-Wrapper -->
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <!-- Page-Bar -->
                        <div class="page-bar clearfix">
                            <div class="shop-settings">
                                <a id="list-anchor" class="active">
                                    <i class="fas fa-th-list"></i>
                                </a>
                                <a id="grid-anchor">
                                    <i class="fas fa-th"></i>
                                </a>
                            </div>
                            <!-- Toolbar Sorter 1  -->
                            <form action="shop.php" id="orderbyform" method="get">
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
                        <div class="row product-container list-style">
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
                                                            <a href="shop-v2-sub-category.html"><?php echo $row["product_category"] ?></a>
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
                    </div>
                    <!-- Shop-Right-Wrapper /- -->
                    <!-- Shop-Pagination -->
                    <div class="pagination-area">
                        <div class="pagination-number">
                            <ul>
                                <?php
                                $product_pages = ceil($product_count / $limit);
                                $str = trim($_SERVER['QUERY_STRING'], "&page=$page");
                                if ($product_pages == 1) {
                                    echo
                                    "<li class='active'>
                                        <a href='shop.php?$str&page=$page'>1</a>
                                    </li>";
                                } else {
                                    if ($page > 0) {
                                        $page--;
                                        echo
                                        "<li>
                                            <a href='shop.php?$str&page=$page' title='Previous'>
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
                                            <a href='shop.php?$str&page=$i'>$p</a>
                                        </li>";
                                    }
                                    if ($page < $product_pages - 1) {
                                        $page++;
                                        echo
                                        "<li>
                                            <a href='shop.php?$str&page=$page' title='Next'>
                                                <i class='fa fa-angle-right'></i>
                                            </a>
                                        </li>";
                                        $page--;
                                    }
                                } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Shop-Pagination /- -->
                </div>
            </div>
        </div>
        <!-- Shop-Page /- -->
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

</html>