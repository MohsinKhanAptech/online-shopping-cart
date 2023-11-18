<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

$product_id = isset($_GET["product_id"]) ? $_GET["product_id"] : mysqli_fetch_column(mysqli_query($connect, "SELECT `product_id` FROM `products` ORDER BY `product_sold` DESC LIMIT 1"));
$select_product = mysqli_query($connect, "SELECT * FROM `products` WHERE `product_id` = '$product_id'");
$product = mysqli_fetch_assoc($select_product);

$reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`review_id`) FROM `reviews` WHERE `product_id` = '$product_id'"));

$five_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`review_id`) FROM `reviews` WHERE `product_id` = '$product_id' AND `rating` = 5"));
$four_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`review_id`) FROM `reviews` WHERE `product_id` = '$product_id' AND `rating` = 4"));
$three_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`review_id`) FROM `reviews` WHERE `product_id` = '$product_id' AND `rating` = 3"));
$two_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`review_id`) FROM `reviews` WHERE `product_id` = '$product_id' AND `rating` = 2"));
$one_star_reviews_count = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`review_id`) FROM `reviews` WHERE `product_id` = '$product_id' AND `rating` = 1"));

$wishlistExists = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(wishlist_id) FROM `wishlist` WHERE `product_id` = '{$product["product_id"]}' AND `customer_id` = '{$_SESSION["user_id"]}'"));
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = $product["product_name"] . " | OSC - OnlineShoppingCart";
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
                    <h2>Product Detail</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="has-separator">
                            <a href="index.php"><?php echo $product["product_category"] ?></a>
                        </li>
                        <li class="is-marked">
                            <a href="product.php?product_id=<?php echo $product["product_id"] ?>"><?php echo $product["product_name"] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Single-Product-Full-Width-Page -->
        <div class="page-detail u-s-p-t-80">
            <div class="container">
                <!-- Product-Detail -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- Product-zoom-area -->
                        <div class="zoom-area">
                            <img id="zoom-pro" class="img-fluid" src="uploads/products/<?php echo $product["product_image"] ?>" data-zoom-image="uploads/products/<?php echo $product["product_image"] ?>" alt="Zoom Image" />
                        </div>
                        <!-- Product-zoom-area /- -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- Product-details -->
                        <div class="all-information-wrapper">
                            <div class="section-1-title-breadcrumb-rating">
                                <div class="product-title">
                                    <h1>
                                        <a href="#"><?php echo $product["product_name"] ?></a>
                                    </h1>
                                </div>
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="shop.php">Shop</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="#"><?php echo $product["product_category"] ?></a>
                                    </li>
                                    <li class="is-marked">
                                        <a href="#"><?php echo $product["product_name"] ?></a>
                                    </li>
                                </ul>
                                <div class="product-rating">
                                    <div class="star" title="<?php echo "{$product["product_rating"]} out of 5 - based on {$product["product_review_count"]} Reviews" ?>">
                                        <span style="width: calc(15px * <?php echo $product["product_rating"] ?>)"></span>
                                    </div>
                                    <span>(<?php echo $product["product_review_count"] ?>)</span>
                                </div>
                            </div>
                            <div class="section-2-short-description u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">Description:</h6>
                                <p>
                                    <?php echo $product["product_description"] ?>
                                </p>
                            </div>
                            <div class="section-3-price-original-discount u-s-p-y-14">
                                <div class="price">
                                    <h4>$<?php echo $product["product_price"] ?></h4>
                                </div>
                                <div class="original-price">
                                    <span>Original Price:</span>
                                    <span>$
                                        <?php
                                        $old_price = round($product["product_price"] + (($product["product_price"] / 100) * ($product["product_price"] > 100 ? 5 : 15)), 2);
                                        echo $old_price ?>
                                    </span>
                                </div>
                                <div class="discount-price">
                                    <span>Discount:</span>
                                    <span><?php echo $product["product_price"] > 100 ? 5 : 15 ?>%</span>
                                </div>
                                <div class="total-save">
                                    <span>Save:</span>
                                    <span>$<?php echo $old_price - $product["product_price"] ?></span>
                                </div>
                            </div>
                            <div class="section-4-sku-information u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">
                                    Sku Information:
                                </h6>
                                <div class="availability">
                                    <span>Availability:</span>
                                    <span><?php echo $product["product_stock"] > 0 ? "In Stock" : "<span style='color:red;'>Out Of Stock</span>"; ?></span>
                                </div>
                                <div class="left">
                                    <span>Only:</span>
                                    <span><?php echo $product["product_stock"] ?> left</span>
                                </div>
                                <div class="left">
                                    <span>Sold:</span>
                                    <span><?php echo $product["product_sold"] ?></span>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                                <form action="cartAdd.php" method="post" class="post-form">
                                    <div class="quick-social-media-wrapper u-s-m-b-22">
                                        <span>Share:</span>
                                        <ul class="social-media-list">
                                            <li>
                                                <a href="https://www.facebook.com/" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.twitter.com/" target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.google.com/" target="_blank">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.pinterest.com/" target="_blank">
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="quantity-wrapper u-s-m-b-22">
                                        <span>Quantity:</span>
                                        <div class="quantity">
                                            <input type="hidden" name="product_id" value="<?php echo $product["product_id"] ?>">
                                            <input type="hidden" name="product_price" value="<?php echo $product["product_price"] ?>">
                                            <input name="cart_quantity" type="text" class="quantity-text-field" value="1" readonly />
                                            <a class="plus-a" data-max="100">&#43;</a>
                                            <a class="minus-a" data-min="1">&#45;</a>
                                        </div>
                                    </div>
                                    <div>
                                        <button name="submit" class="button button-outline-secondary" type="submit">
                                            Add to cart
                                        </button>
                                        <a href="wishlistAdd.php?product_id=<?php echo $product_id ?>" <?php echo $wishlistExists > 0 ? "style='color: #d90429'" : "style='color: black'"; ?> class="button button-outline-secondary far fa-heart u-s-m-l-6"></a>
                                        <a href="mailto:?subject=Amazing%20Product&body=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" style="color: black;" class="button button-outline-secondary far fa-envelope u-s-m-l-6" target="_blank"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Product-details /- -->
                    </div>
                </div>
                <!-- Product-Detail /- -->
                <!-- Detail-Tabs -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="detail-tabs-wrapper u-s-p-t-80">
                            <div class="detail-nav-wrapper u-s-m-b-30">
                                <ul class="nav single-product-nav justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#review">Reviews (<?php echo $product["product_review_count"] ?>)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <!-- Description-Tab -->
                                <div class="tab-pane fade active show" id="description">
                                    <div class="description-whole-container">
                                        <p class="desc-p u-s-m-b-26">
                                            <?php echo $product["product_description"] ?>
                                        </p>
                                        <img class="desc-img img-fluid u-s-m-b-26" src="uploads/products/<?php echo $product["product_image"] ?>" alt="Product" />
                                    </div>
                                </div>
                                <!-- Description-Tab /- -->
                                <!-- Reviews-Tab -->
                                <div class="tab-pane fade" id="review">
                                    <div class="review-whole-container">
                                        <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="total-score-wrapper">
                                                    <h6 class="review-h6">Average Rating</h6>
                                                    <div class="circle-wrapper">
                                                        <h1><?php echo round($product["product_rating"], 1) ?></h1>
                                                    </div>
                                                    <h6 class="review-h6">Based on <?php echo $product["product_review_count"] ?> Reviews</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="total-star-meter">
                                                    <div class="star-wrapper">
                                                        <span>5 Stars</span>
                                                        <div class="star">
                                                            <span style="width: calc(15px * <?php echo empty($five_star_reviews_count) ? 0 : $five_star_reviews_count / $reviews_count * 5; ?>)"></span>
                                                        </div>
                                                        <span>(<?php echo $five_star_reviews_count ?>)</span>
                                                    </div>
                                                    <div class="star-wrapper">
                                                        <span>4 Stars</span>
                                                        <div class="star">
                                                            <span style="width: calc(15px * <?php echo empty($four_star_reviews_count) ? 0 : $four_star_reviews_count / $reviews_count * 5; ?>)"></span>
                                                        </div>
                                                        <span>(<?php echo $four_star_reviews_count ?>)</span>
                                                    </div>
                                                    <div class="star-wrapper">
                                                        <span>3 Stars</span>
                                                        <div class="star">
                                                            <span style="width: calc(15px * <?php echo empty($three_star_reviews_count) ? 0 : $three_star_reviews_count / $reviews_count * 5; ?>)"></span>
                                                        </div>
                                                        <span>(<?php echo $three_star_reviews_count ?>)</span>
                                                    </div>
                                                    <div class="star-wrapper">
                                                        <span>2 Stars</span>
                                                        <div class="star">
                                                            <span style="width: calc(15px * <?php echo empty($two_star_reviews_count) ? 0 : $two_star_reviews_count / $reviews_count * 5; ?>)"></span>
                                                        </div>
                                                        <span>(<?php echo $two_star_reviews_count ?>)</span>
                                                    </div>
                                                    <div class="star-wrapper">
                                                        <span>1 Star</span>
                                                        <div class="star">
                                                            <span style="width: calc(15px * <?php echo empty($one_star_reviews_count) ? 0 : $one_star_reviews_count / $reviews_count * 5; ?>)"></span>
                                                        </div>
                                                        <span>(<?php echo $one_star_reviews_count ?>)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $review_check = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `customer_id` = '{$_SESSION["user_id"]}' AND `product_id` = '$product_id'");

                                        if (isset($_SESSION["user"]) && !mysqli_num_rows($review_check) > 0) { ?>
                                            <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                                <div class="col-lg-12">
                                                    <div class="your-rating-wrapper">
                                                        <h6 class="review-h6">Your Review matters.</h6>
                                                        <h6 class="review-h6">
                                                            What do you think of this product?
                                                        </h6>
                                                        <form action="reviewAdd.php" method="post">
                                                            <div class="star-wrapper u-s-m-b-8">
                                                                <label for="your-rating-value">Your Rating:</label>
                                                                <div class="star">
                                                                    <span id="your-stars" style="width: 0"></span>
                                                                </div>
                                                                <input name="rating" id="your-rating-value" type="number" class="text-field" placeholder="0" min="1" max="5" />
                                                                <span id="star-comment"></span>
                                                            </div>
                                                            <label for="review-title">Review Title
                                                                <span class="astk"> *</span>
                                                            </label>
                                                            <input name="review_title" id="review-title" type="text" class="text-field" placeholder="Review Title" maxlength="25" />
                                                            <label for="review-text-area">Review
                                                                <span class="astk"> *</span>
                                                            </label>
                                                            <textarea name="review" class="text-area u-s-m-b-8" id="review-text-area" placeholder="Review" maxlength="255"></textarea>
                                                            <div class="flex-justify-end">
                                                                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                                                <button type="submit" name="submit" class="button button-outline-secondary">
                                                                    Submit Review
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } elseif (isset($_SESSION["user"])) {
                                            $select_reviews = mysqli_query(
                                                $connect,
                                                "SELECT customers.customer_name,reviews.*
                                                FROM `customers` 
                                                INNER JOIN `reviews`
                                                ON customers.customer_id = reviews.customer_id AND reviews.product_id = {$product["product_id"]};"
                                            );
                                            $review = mysqli_fetch_assoc($select_reviews); ?>

                                            <div class="get-reviews u-s-p-b-22">
                                                <div class="review-options u-s-m-b-16">
                                                    <div class="review-option-heading">
                                                        <h6>Your Review</h6>
                                                    </div>
                                                </div>
                                                <div class="reviewers">
                                                    <div class="review-data">
                                                        <div class="reviewer-name-and-date">
                                                            <h6 class="reviewer-name"><?php echo $review["customer_name"] ?></h6>
                                                            <h6 class="review-posted-date"><?php echo date_format(date_create($review["review_date"]), "dS F Y") ?></h6>
                                                        </div>
                                                        <div class="reviewer-stars-title-body">
                                                            <div class="reviewer-stars">
                                                                <div class="star">
                                                                    <span style="width: calc(15px * <?php echo $review["rating"] ?>)"></span>
                                                                </div>
                                                                <span class="review-title"><?php echo $review["review_title"] ?></span>
                                                            </div>
                                                            <p class="review-body"><?php echo $review["review"] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="flex-justify-end">
                                                        <a onclick="document.getElementById('review_edit_id').classList.toggle('review_edit_height_toggle');" href="javascript:void(0);" class="button button-outline-secondary fas fa-pen"></a>
                                                        <a href="reviewDelete.php?review_id=<?php echo $review["review_id"] ?>" class="button button-outline-secondary fas fa-trash"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="review_edit_id" class="row r-2 u-s-m-b-26 u-s-p-b-22 height-0">
                                                <div class="col-lg-12">
                                                    <div class="your-rating-wrapper">
                                                        <h6 class="review-h6">
                                                            You have already reviewed this product.
                                                        </h6>
                                                        <form action="reviewUpdate.php" method="post">
                                                            <div class="star-wrapper u-s-m-b-8">
                                                                <label for="your-rating-value">Your Rating:</label>
                                                                <div class="star">
                                                                    <span id="your-stars" style="width: 0"></span>
                                                                </div>
                                                                <input name="rating" id="your-rating-value" type="number" class="text-field" placeholder="0" min="1" max="5" value="<?php echo $review["rating"] ?>" />
                                                                <span id="star-comment"></span>
                                                            </div>
                                                            <label for="review-title">Review Title
                                                                <span class="astk"> *</span>
                                                            </label>
                                                            <input name="review_title" id="review-title" type="text" class="text-field" placeholder="Review Title" maxlength="25" value="<?php echo $review["review_title"] ?>" />
                                                            <label for="review-text-area">Review
                                                                <span class="astk"> *</span>
                                                            </label>
                                                            <textarea name="review" class="text-area u-s-m-b-8" id="review-text-area" placeholder="Review" maxlength="255"><?php echo $review["review"] ?></textarea>
                                                            <div class="flex-justify-end">
                                                                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                                                <input type="hidden" name="review_id" value="<?php echo $review["review_id"] ?>">
                                                                <button type="submit" name="submit" class="button button-outline-secondary">
                                                                    Submit Review
                                                                </button>
                                                                <button onclick="document.getElementById('review_edit_id').classList.toggle('review_edit_height_toggle');" type="button" class="button button-outline-secondary">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                        } ?>
                                        <!-- Get-Reviews -->
                                        <div class="get-reviews u-s-p-b-22">
                                            <!-- Review-Options -->
                                            <div class="review-options u-s-m-b-16">
                                                <div class="review-option-heading">
                                                    <h6>
                                                        Reviews
                                                        <span> (<?php echo $product["product_review_count"] ?>) </span>
                                                    </h6>
                                                </div>
                                                <!-- <div class="review-option-box">
                                                    <div class="select-box-wrapper">
                                                        <label class="sr-only" for="review-sort">Review Sorter</label>
                                                        <select class="select-box" id="review-sort">
                                                            <option value="">Sort by: Best Rating</option>
                                                            <option value="">Sort by: Worst Rating</option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <!-- Review-Options /- -->
                                            <!-- All-Reviews -->
                                            <div class="reviewers">
                                                <?php
                                                //  $select_reviews = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `product_id` = '$product_id'");
                                                $select_reviews = mysqli_query(
                                                    $connect,
                                                    "SELECT customers.customer_name,reviews.*
                                                    FROM `customers` 
                                                    INNER JOIN `reviews`
                                                    ON customers.customer_id = reviews.customer_id AND reviews.product_id = {$product["product_id"]};"
                                                );

                                                if (mysqli_num_rows($select_reviews) > 0) {
                                                    while (($review = mysqli_fetch_assoc($select_reviews))) { ?>
                                                        <div class="review-data">
                                                            <div class="reviewer-name-and-date">
                                                                <h6 class="reviewer-name"><?php echo $review["customer_name"] ?></h6>
                                                                <h6 class="review-posted-date"><?php echo date_format(date_create($review["review_date"]), "dS F Y") ?></h6>
                                                            </div>
                                                            <div class="reviewer-stars-title-body">
                                                                <div class="reviewer-stars">
                                                                    <div class="star">
                                                                        <span style="width: calc(15px * <?php echo $review["rating"] ?>)"></span>
                                                                    </div>
                                                                    <span class="review-title"><?php echo $review["review_title"] ?></span>
                                                                </div>
                                                                <p class="review-body"><?php echo $review["review"] ?></p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                } else { ?>
                                                    <!-- Review Not Found -->
                                                    <div class='product-not-found'>
                                                        <div class='not-found'>
                                                            <h2>SORRY!</h2>
                                                            <h6>There is not any review of specific product.</h6>
                                                        </div>
                                                    </div>
                                                    <!-- Review Not Found /- -->
                                                <?php
                                                } ?>
                                            </div>
                                            <!-- All-Reviews /- -->
                                            <!-- Pagination-Review -->
                                            <!-- <div class="pagination-review-area">
                                                <div class="pagination-review-number">
                                                    <ul>
                                                        <li style="display: none">
                                                            <a href="single-product.html" title="Previous">
                                                                <i class="fas fa-angle-left"></i>
                                                            </a>
                                                        </li>
                                                        <li class="active">
                                                            <a href="single-product.html">1</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html">2</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html">3</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html">...</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html">10</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html" title="Next">
                                                                <i class="fas fa-angle-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                            <!-- Pagination-Review /- -->
                                        </div>
                                        <!-- Get-Reviews /- -->
                                    </div>
                                </div>
                                <!-- Reviews-Tab /- -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Detail-Tabs /- -->
                <!-- Different-Product-Section -->
                <div class="detail-different-product-section u-s-p-t-80">
                    <!-- Similar-Products -->
                    <section class="section-maker">
                        <div class="container">
                            <div class="sec-maker-header text-center">
                                <h3 class="sec-maker-h3">Similar Products</h3>
                            </div>
                            <?php
                            $product_querry = "SELECT * FROM `products` WHERE `product_category` = '{$product["product_category"]}' LIMIT 8";
                            $product_querry_run = mysqli_query($connect, $product_querry);

                            if (mysqli_num_rows($product_querry_run) > 0) { ?>
                                <div class="slider-fouc">
                                    <div class="products-slider owl-carousel" data-item="4">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($product_querry_run)) {  ?>
                                            <div class="item">
                                                <div class="image-container">
                                                    <a class="item-img-wrapper-link" href="product.php?product_id=<?php echo $row["product_id"] ?>">
                                                        <?php echo "<img class='img-fluid' src='uploads/products/{$row["product_image"]}' alt='Product'>" ?>
                                                    </a>
                                                    <div class="item-action-behaviors">
                                                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                                        </a>
                                                        <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                        <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                        <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="item-content">
                                                    <div class="what-product-is">
                                                        <ul class="bread-crumb">
                                                            <li>
                                                                <?php echo "<a href='shop-v3-sub-sub-category.html'> {$row["product_category"]} </a>" ?>
                                                            </li>
                                                        </ul>
                                                        <h6 class="item-title">
                                                            <?php echo "<a href='product.php?product_id={$row["product_id"]}'> {$row["product_name"]} </a>" ?>
                                                        </h6>
                                                        <div class="item-stars">
                                                            <?php
                                                            echo "<div class='star' title='{$row["product_rating"]} out of 5 - based on 0 Reviews'>
                                                                    <span style='width: calc(15px * {$row["product_rating"]});'></span>
                                                                </div>
                                                                <span>({$row["product_review_count"]})</span>"; ?>
                                                        </div>
                                                    </div>
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            <?php echo "$" . $row["product_price"] ?>
                                                        </div>
                                                        <div class="item-old-price">
                                                            <?php echo "$" . round($row["product_price"] + (($row["product_price"] / 100) * ($row["product_price"] > 100 ? 5 : 15)), 2) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tag discount">
                                                    <span><?php echo "-" . ($row["product_price"] > 100 ? 5 : 15) . "%" ?></span>
                                                </div>
                                            </div>
                                        <?php
                                        }; ?>
                                    </div>
                                </div>
                            <?php
                            } else { ?>
                                <!-- Product Not Found -->
                                <div class='product-not-found'>
                                    <div class='not-found'>
                                        <h2>SORRY!</h2>
                                        <h6>There is not any product in specific catalogue.</h6>
                                    </div>
                                </div>
                                <!-- Product Not Found /- -->";
                            <?php
                            } ?>
                        </div>
                    </section>
                    <!-- Similar-Products /- -->
                    <!-- Recently-View-Products  -->
                    <!-- <section class="section-maker">
                        <div class="container">
                            <div class="sec-maker-header text-center">
                                <h3 class="sec-maker-h3">Recently View</h3>
                            </div>
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="single-product.html">
                                                <img class="img-fluid" src="include/images/product/product@3x.jpg" alt="Product" />
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">
                                                        <a href="shop.php">Men's</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="shop-v2-sub-category.html">Outwear</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-v3-sub-sub-category.html">Jackets</a>
                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="single-product.html">Maire Battlefield Jeep Men's Jacket</a>
                                                </h6>
                                                <div class="item-stars">
                                                    <div class="star" title="0 out of 5 - based on 0 Reviews">
                                                        <span style="width: 0"></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                            <div class="price-template">
                                                <div class="item-new-price">$55.00</div>
                                                <div class="item-old-price">$60.00</div>
                                            </div>
                                        </div>
                                        <div class="tag hot">
                                            <span>HOT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
                    <!-- Recently-View-Products /- -->
                </div>
                <!-- Different-Product-Section /- -->
            </div>
        </div>
        <!-- Single-Product-Full-Width-Page /- -->
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