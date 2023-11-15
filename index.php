<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Home";
include "include/head.php";
?>

<body>
    <div id="app">
        <?php include "include/navbar.php" ?>
        <!-- Main-Slider -->
        <div class="default-height ph-item">
            <div class="slider-main owl-carousel">
                <div class="bg-image one">
                    <div class="slide-content slide-animation">
                        <h1>Premium Fragrances</h1>
                        <h2>lifestyle / fashion / hype</h2>
                    </div>
                </div>
                <div class="bg-image two">
                    <div class="slide-content-2 slide-animation">
                        <h2 class="slide-2-h2-a" style="color:#0e4cb3">Back</h2>
                        <h2 class="slide-2-h2-b" style="color:#dd1424">To</h2>
                        <h1>School</h1>
                    </div>
                </div>
                <div class="bg-image three">
                    <div class="slide-content slide-animation">
                        <h1>Valentine's Day
                            <span style="color:#e55451">Deals</span>
                        </h1>
                        <h2 style="color:#333"># Valentine's Day</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main-Slider /- -->
        <!-- Banner-Layer -->
        <div class="banner-layer">
            <div class="container">
                <div class="image-banner">
                    <a href="shop-v1-root-category.html" class="mx-auto banner-hover effect-dark-opacity">
                        <img class="img-fluid" src="include/images/banners/bts.jpg" alt="Winter Season Banner">
                    </a>
                </div>
            </div>
        </div>
        <!-- Banner-Layer /- -->
        <!-- Stationary -->
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <h3 class="sec-maker-h3">STATIONARY</h3>
                    <!-- <ul class="nav tab-nav-style-1-a justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#men-latest-products">Latest Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Best Selling</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#men-top-rating-products">Top Rating</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#men-featured-products">Featured Products</a>
                        </li>
                    </ul> -->
                </div>
                <div class="wrapper-content">
                    <div class="outer-area-tab">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="men-latest-products">
                                <?php
                                $product_querry = "SELECT * FROM `products` WHERE `product_category` = 'Stationary' LIMIT 8";
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
                                                                <?php echo "<a href='product.php'> {$row["product_name"]} </a>" ?>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <?php
                                                                echo "<div class='star' title='{$row["product_rating"]} out of 5 - based on 0 Reviews'>
                                                                    <span style='width: calc(15px * {$row["product_rating"]});'></span>
                                                                </div>
                                                                <span>({$row["product_rating_number"]})</span>"; ?>
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
                                    <!-- Product Not Found /- -->
                                <?php
                                } ?>
                            </div>
                            <div class="tab-pane fade" id="men-best-selling-products">
                                <!-- Product Not Found -->
                                <div class="product-not-found">
                                    <div class="not-found">
                                        <h2>SORRY!</h2>
                                        <h6>There is not any product in specific catalogue.</h6>
                                    </div>
                                </div>
                                <!-- Product Not Found /- -->
                            </div>
                            <div class="tab-pane fade" id="men-top-rating-products">
                                <div class="slider-fouc">
                                    <div class="products-slider owl-carousel" data-item="4">
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="product.php?product_id=<?php echo $row["product_id"] ?>">
                                                    <img class="img-fluid" src="include/images/product/product@3x.jpg" alt="Product">
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
                                                        <li class="has-separator">
                                                            <a href="shop-v1-root-category.html">Men's</a>
                                                        </li>
                                                        <li class="has-separator">
                                                            <a href="shop-v2-sub-category.html">Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-v3-sub-sub-category.html">Suits</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="product.php?product_id=<?php echo $row["product_id"] ?>">Black Maire Full Men Suit</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span>(23)</span>
                                                    </div>
                                                </div>
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        $55.00
                                                    </div>
                                                    <div class="item-old-price">
                                                        $60.00
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tag sale">
                                                <span>SALE</span>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="product.php?product_id=<?php echo $row["product_id"] ?>">
                                                    <img class="img-fluid" src="include/images/product/product@3x.jpg" alt="Product">
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
                                                        <li class="has-separator">
                                                            <a href="shop-v1-root-category.html">Men's</a>
                                                        </li>
                                                        <li class="has-separator">
                                                            <a href="shop-v2-sub-category.html">Outwear</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-v3-sub-sub-category.html">Jackets</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="product.php?product_id=<?php echo $row["product_id"] ?>">Woodsmoke Rookie Parka Jacket</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span>(23)</span>
                                                    </div>
                                                </div>
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        $55.00
                                                    </div>
                                                    <div class="item-old-price">
                                                        $60.00
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="product.php?product_id=<?php echo $row["product_id"] ?>">
                                                    <img class="img-fluid" src="include/images/product/product@3x.jpg" alt="Product">
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
                                                        <li class="has-separator">
                                                            <a href="shop-v1-root-category.html">Men's</a>
                                                        </li>
                                                        <li class="has-separator">
                                                            <a href="shop-v2-sub-category.html">Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-v3-sub-sub-category.html">Ties</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="product.php?product_id=<?php echo $row["product_id"] ?>">Blue Zodiac Boxes Reg Tie</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span>(23)</span>
                                                    </div>
                                                </div>
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        $55.00
                                                    </div>
                                                    <div class="item-old-price">
                                                        $60.00
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="product.php?product_id=<?php echo $row["product_id"] ?>">
                                                    <img class="img-fluid" src="include/images/product/product@3x.jpg" alt="Product">
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
                                                        <li class="has-separator">
                                                            <a href="shop-v1-root-category.html">Men's</a>
                                                        </li>
                                                        <li class="has-separator">
                                                            <a href="shop-v2-sub-category.html">Bottoms</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-v3-sub-sub-category.html">Shoes</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="product.php?product_id=<?php echo $row["product_id"] ?>">Zambezi Carved Leather Business Casual Shoes
                                                        </a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span>(23)</span>
                                                    </div>
                                                </div>
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        $55.00
                                                    </div>
                                                    <div class="item-old-price">
                                                        $60.00
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tag discount">
                                                <span>-15%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="men-featured-products">
                                <!-- Product Not Found -->
                                <div class="product-not-found">
                                    <div class="not-found">
                                        <h2>SORRY!</h2>
                                        <h6>There is not any product in specific catalogue.</h6>
                                    </div>
                                </div>
                                <!-- Product Not Found /- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Toys Section -->
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <span class="sec-maker-span-text">Toys</span>
                    <h3 class="sec-maker-h3 u-s-m-b-22">Hot Deals</h3>
                    <span class="sec-maker-span-text">Ends in</span>
                    <!-- Timing-Box -->
                    <div class="section-timing-wrapper dynamic">
                        <span class="fictitious-seconds" style="display:none;">18000</span>
                        <div class="section-box-wrapper box-days">
                            <div class="section-box">
                                <span class="section-key">120</span>
                                <span class="section-value">Days</span>
                            </div>
                        </div>
                        <div class="section-box-wrapper box-hrs">
                            <div class="section-box">
                                <span class="section-key">54</span>
                                <span class="section-value">HRS</span>
                            </div>
                        </div>
                        <div class="section-box-wrapper box-mins">
                            <div class="section-box">
                                <span class="section-key">3</span>
                                <span class="section-value">MINS</span>
                            </div>
                        </div>
                        <div class="section-box-wrapper box-secs">
                            <div class="section-box">
                                <span class="section-key">32</span>
                                <span class="section-value">SEC</span>
                            </div>
                        </div>
                    </div>
                    <!-- Timing-Box /- -->
                </div>
                <!-- Carousel -->
                <?php
                $product_querry = "SELECT * FROM `products` WHERE `product_category` = 'Toys' LIMIT 8";
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
                                                <?php echo "<a href='product.php'> {$row["product_name"]} </a>" ?>
                                            </h6>
                                            <div class="item-stars">
                                                <?php
                                                echo "<div class='star' title='{$row["product_rating"]} out of 5 - based on 0 Reviews'>
                                                                    <span style='width: calc(15px * {$row["product_rating"]});'></span>
                                                                </div>
                                                                <span>({$row["product_rating_number"]})</span>"; ?>
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
                                    <div class="tag hot">
                                        <span>HOT</span>
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
                <!-- Carousel /- -->
            </div>
        </section>
        <!-- Toys Section /- -->
        <!-- Banner-Image & View-more -->
        <div class="banner-image-view-more">
            <div class="container">
                <div class="image-banner u-s-m-y-40">
                    <a href="shop-v1-root-category.html" class="mx-auto banner-hover effect-dark-opacity">
                        <img class="img-fluid" src="include/images/banners/toy.jpg" alt="Banner Image">
                    </a>
                </div>
                <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
                    <a class="redirect-link" href="store-directory.html">
                        <span>View more on this category</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Banner-Image & View-more /- -->
        <!-- Men-Clothing /- -->
        <!-- Fragrances -->
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <h3 class="sec-maker-h3">FRAGRANCES</h3>
                </div>
                <div class="wrapper-content">
                    <div class="outer-area-tab">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="women-latest-products">
                                <?php
                                $product_querry = "SELECT * FROM `products` WHERE `product_category` = 'Fragrances' LIMIT 8";
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
                                                                <?php echo "<a href='product.php'> {$row["product_name"]} </a>" ?>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <?php
                                                                echo "<div class='star' title='{$row["product_rating"]} out of 5 - based on 0 Reviews'>
                                                                    <span style='width: calc(15px * {$row["product_rating"]});'></span>
                                                                </div>
                                                                <span>({$row["product_rating_number"]})</span>"; ?>
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
                        </div>
                    </div>
                </div>
                <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
                    <a class="redirect-link" href="store-directory.html">
                        <span>View more on this category</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Fragrances /- -->
        <!-- Sweets -->
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <h3 class="sec-maker-h3">SWEETS</h3>
                </div>
                <div class="wrapper-content">
                    <div class="outer-area-tab">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="books-latest-products">
                                <?php
                                $product_querry = "SELECT * FROM `products` WHERE `product_category` = 'Sweets' LIMIT 8";
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
                                                                <?php echo "<a href='product.php'> {$row["product_name"]} </a>" ?>
                                                            </h6>
                                                            <div class="item-stars">
                                                                <?php
                                                                echo "<div class='star' title='{$row["product_rating"]} out of 5 - based on 0 Reviews'>
                                                                    <span style='width: calc(15px * {$row["product_rating"]});'></span>
                                                                </div>
                                                                <span>({$row["product_rating_number"]})</span>"; ?>
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
                        </div>
                    </div>
                </div>
                <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
                    <a class="redirect-link" href="store-directory.html">
                        <span>View more on this category</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- Sweets /- -->
        <!-- Continue-Link -->
        <div class="continue-link-wrapper u-s-p-b-80">
            <a class="continue-link" href="store-directory.html" title="View all products on site">
                <i class="ion ion-ios-more"></i>
            </a>
        </div>
        <!-- Continue-Link /- -->
        <!-- Site-Priorities -->
        <section class="app-priority">
            <div class="container">
                <div class="priority-wrapper u-s-p-b-80">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-item-wrapper">
                                <div class="single-item-icon">
                                    <i class="ion ion-md-star"></i>
                                </div>
                                <h2>
                                    Great Value
                                </h2>
                                <p>We offer competitive prices on our 100 million plus product range</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-item-wrapper">
                                <div class="single-item-icon">
                                    <i class="ion ion-md-cash"></i>
                                </div>
                                <h2>
                                    Shop with Confidence
                                </h2>
                                <p>Our Protection covers your purchase from click to delivery</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-item-wrapper">
                                <div class="single-item-icon">
                                    <i class="ion ion-ios-card"></i>
                                </div>
                                <h2>
                                    Safe Payment
                                </h2>
                                <p>Pay with the world’s most popular and secure payment methods</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-item-wrapper">
                                <div class="single-item-icon">
                                    <i class="ion ion-md-contacts"></i>
                                </div>
                                <h2>
                                    24/7 Help Center
                                </h2>
                                <p>Round-the-clock assistance for a smooth shopping experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Site-Priorities /- -->
        <!-- Footer -->
        <?php include "include/footer.php"; ?>
        <!-- Footer /- -->
        <!-- Dummy Selectbox -->
        <div class="select-dummy-wrapper">
            <select id="compute-select">
                <option id="compute-option">All</option>
            </select>
        </div>
        <!-- Dummy Selectbox /- -->
        <!-- Responsive-Search -->
        <div class="responsive-search-wrapper">
            <button type="button" class="button ion ion-md-close" id="responsive-search-close-button"></button>
            <div class="responsive-search-container">
                <div class="container">
                    <p>Start typing and press Enter to search</p>
                    <form class="responsive-search-form">
                        <label class="sr-only" for="search-text">Search</label>
                        <input id="search-text" type="text" class="responsive-search-field" placeholder="PLEASE SEARCH">
                        <i class="fas fa-search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- Responsive-Search /- -->
        <!-- Quick-view-Modal -->
        <div id="quick-view" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="button dismiss-button ion ion-ios-close" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!-- Product-zoom-area -->
                                <div class="zoom-area">
                                    <img id="zoom-pro-quick-view" class="img-fluid" src="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg" alt="Zoom Image">
                                    <div id="gallery-quick-view" class="u-s-m-t-10">
                                        <a class="active" data-image="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg">
                                            <img src="include/images/product/product@2x.jpg" alt="Product">
                                        </a>
                                        <a data-image="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg">
                                            <img src="include/images/product/product@2x.jpg" alt="Product">
                                        </a>
                                        <a data-image="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg">
                                            <img src="include/images/product/product@2x.jpg" alt="Product">
                                        </a>
                                        <a data-image="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg">
                                            <img src="include/images/product/product@2x.jpg" alt="Product">
                                        </a>
                                        <a data-image="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg">
                                            <img src="include/images/product/product@2x.jpg" alt="Product">
                                        </a>
                                        <a data-image="include/images/product/product@4x.jpg" data-zoom-image="include/images/product/product@4x.jpg">
                                            <img src="include/images/product/product@2x.jpg" alt="Product">
                                        </a>
                                    </div>
                                </div>
                                <!-- Product-zoom-area /- -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <!-- Product-details -->
                                <div class="all-information-wrapper">
                                    <div class="section-1-title-breadcrumb-rating">
                                        <div class="product-title">
                                            <h1>
                                                <a href="product.php?product_id=<?php echo $row["product_id"] ?>">Casual Hoodie Full Cotton</a>
                                            </h1>
                                        </div>
                                        <ul class="bread-crumb">
                                            <li class="has-separator">
                                                <a href="index.php">Home</a>
                                            </li>
                                            <li class="has-separator">
                                                <a href="shop-v1-root-category.html">Men's Clothing</a>
                                            </li>
                                            <li class="has-separator">
                                                <a href="shop-v2-sub-category.html">Tops</a>
                                            </li>
                                            <li class="is-marked">
                                                <a href="shop-v3-sub-sub-category.html">Hoodies</a>
                                            </li>
                                        </ul>
                                        <div class="product-rating">
                                            <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                <span style='width:67px'></span>
                                            </div>
                                            <span>(23)</span>
                                        </div>
                                    </div>
                                    <div class="section-2-short-description u-s-p-y-14">
                                        <h6 class="information-heading u-s-m-b-8">Description:</h6>
                                        <p>This hoodie is full cotton. It includes a muff sewn onto the lower front, and (usually) a drawstring to adjust the hood opening. Throughout the U.S., it is common for middle-school, high-school, and college students to wear this sweatshirts—with or without hoods—that display their respective school names or mascots across the chest, either as part of a uniform or personal preference.
                                        </p>
                                    </div>
                                    <div class="section-3-price-original-discount u-s-p-y-14">
                                        <div class="price">
                                            <h4>$55.00</h4>
                                        </div>
                                        <div class="original-price">
                                            <span>Original Price:</span>
                                            <span>$60.00</span>
                                        </div>
                                        <div class="discount-price">
                                            <span>Discount:</span>
                                            <span>8%</span>
                                        </div>
                                        <div class="total-save">
                                            <span>Save:</span>
                                            <span>$5</span>
                                        </div>
                                    </div>
                                    <div class="section-4-sku-information u-s-p-y-14">
                                        <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                                        <div class="availability">
                                            <span>Availability:</span>
                                            <span>In Stock</span>
                                        </div>
                                        <div class="left">
                                            <span>Only:</span>
                                            <span>50 left</span>
                                        </div>
                                    </div>
                                    <div class="section-5-product-variants u-s-p-y-14">
                                        <h6 class="information-heading u-s-m-b-8">Product Variants:</h6>
                                        <div class="color u-s-m-b-11">
                                            <span>Available Color:</span>
                                            <div class="color-variant select-box-wrapper">
                                                <select class="select-box product-color">
                                                    <option value="1">Heather Grey</option>
                                                    <option value="3">Black</option>
                                                    <option value="5">White</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sizes u-s-m-b-11">
                                            <span>Available Size:</span>
                                            <div class="size-variant select-box-wrapper">
                                                <select class="select-box product-size">
                                                    <option value="">Male 2XL</option>
                                                    <option value="">Male 3XL</option>
                                                    <option value="">Kids 4</option>
                                                    <option value="">Kids 6</option>
                                                    <option value="">Kids 8</option>
                                                    <option value="">Kids 10</option>
                                                    <option value="">Kids 12</option>
                                                    <option value="">Female Small</option>
                                                    <option value="">Male Small</option>
                                                    <option value="">Female Medium</option>
                                                    <option value="">Male Medium</option>
                                                    <option value="">Female Large</option>
                                                    <option value="">Male Large</option>
                                                    <option value="">Female XL</option>
                                                    <option value="">Male XL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                                        <form action="#" class="post-form">
                                            <div class="quick-social-media-wrapper u-s-m-b-22">
                                                <span>Share:</span>
                                                <ul class="social-media-list">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-google-plus-g"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fas fa-rss"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-pinterest"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="quantity-wrapper u-s-m-b-22">
                                                <span>Quantity:</span>
                                                <div class="quantity">
                                                    <input type="text" class="quantity-text-field" value="1">
                                                    <a class="plus-a" data-max="1000">&#43;</a>
                                                    <a class="minus-a" data-min="1">&#45;</a>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                                <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                                <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Product-details /- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick-view-Modal /- -->
    </div>
    <?php include "include/scripts.php" ?>
</body>

</html>