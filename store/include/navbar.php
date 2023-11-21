<?php
if (isset($_SESSION["user"])) {
    $user_name = $_SESSION["user"];
    $cart_number = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`cart_id`) AS num FROM `cart_items` WHERE `customer_id` = '{$_SESSION["user_id"]}'"));
    $wishlist_number = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(`wishlist_id`) AS num FROM `wishlist` WHERE `customer_id` = '{$_SESSION["user_id"]}'"));
} else {
    $cart_number = 0;
    $wishlist_number = 0;
}
?>
<!-- Header -->
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+111444989">
                            <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                            Telephone:+111-444-989</a>
                    </li>
                    <li>
                        <a href="mailto:contact@OSC.com">
                            <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                            E-mail: contact@OSC.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a><?php echo isset($user_name) ? $user_name : "My Account" ?>
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="cart.php">
                                    <i class="fas fa-cog u-s-m-r-9"></i>
                                    My Cart</a>
                            </li>
                            <li>
                                <a href="wishlist.php">
                                    <i class="far fa-heart u-s-m-r-9"></i>
                                    My Wishlist</a>
                            </li>
                            <li>
                                <?php if (!isset($_SESSION["user"])) { ?>
                                    <a href="account.php">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Login / Signup</a>
                                <?php
                                } else { ?>
                                    <a href="logout.php">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Logout</a>
                                <?php
                                } ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="index.php">
                            <img src="include/images/main-logo/logo1.png" alt="OSC Brand Logo" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    <form class="form-searchbox" action="shop.php" method="get">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input name="search" id="search-landscape" onkeyup="showResult(this.value,document.getElementById('select-category').value);" type="text" class="text-field" placeholder="Search everything" maxlength="100" autocomplete="off">
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label>
                                <select name="category" onchange="showResult(document.getElementById('search-landscape').value,this.value);" class="select-box" id="select-category">
                                    <option selected="selected" value="0">All</option>
                                    <option value="Accessories">Accessories</option>
                                    <option value="Fragrances">Fragrances</option>
                                    <option value="Stationaries">Stationaries</option>
                                    <option value="Sweets">Sweets</option>
                                    <option value="Toys">Toys</option>
                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                    <div id="livesearch"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="index.php">
                                    <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li class="u-d-none-lg">
                                <a href="wishlist.php">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="cart.php">
                                    <i class="ion ion-md-basket"></i>
                                    <span class="item-counter"><?php echo $cart_number ?></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="wishlist.php">
                <i class="far fa-heart"></i>
                <span class="fixed-item-counter"><?php echo $wishlist_number ?></span>
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->
    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                        <span class="v-title">
                            <i class="ion ion-md-menu"></i>
                            All Categories
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    <li>
                                        <a href="shop.php?category=Accessories">
                                            <i class="fa fa-suitcase"></i>
                                            Accessories
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?category=Fragrances">
                                            <i class="fa fa-flask"></i>
                                            Fragrances
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?category=Stationaries">
                                            <i class="fa fa-pen"></i>
                                            Stationaries
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?category=Sweets">
                                            <i class="fa fa-cookie-bite"></i>
                                            Sweets
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop.php?category=Toys">
                                            <i class="fa fa-rocket"></i>
                                            Toys
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="deals.php?orderby=Latest">New Arrivals
                                <span class="superscript-label-new">NEW</span>
                            </a>
                        </li>
                        <li>
                            <a href="deals.php?orderby=Best Selling">Best Selling
                                <span class="superscript-label-hot">HOT</span>
                            </a>
                        </li>
                        <li>
                            <a href="deals.php?orderby=Best Rating">Best Rating
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>Pages
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">Home & Static Pages</li>
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.php">About</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    <li>
                                        <a href="faq.php">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="termsAndConditions.php">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="404.html">404</a>
                                    </li>
                                    <li class="menu-title">Single Product Page</li>
                                    <li>
                                        <a href="product.php">Single Product Fullwidth</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">Ecommerce Pages</li>
                                    <li>
                                        <a href="shop.php">Shop</a>
                                    </li>
                                    <li>
                                        <a href="cart.php">Cart</a>
                                    </li>
                                    <li>
                                        <a href="cartEmpty.php">Cart Empty</a>
                                    </li>
                                    <li>
                                        <a href="checkout.php">Checkout</a>
                                    </li>
                                    <li>
                                        <a href="account.php">My Account</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.php">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="wishlistEmpty.php">Wishlist Empty</a>
                                    </li>
                                    <li>
                                        <a href="trackOrder.php">Track your Order</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">Shop Variations</li>
                                    <li>
                                        <a href="shop.php">Shop Page</a>
                                    </li>
                                    <li>
                                        <a href="deals.php?orderby=Latest">Deal Page</a>
                                    </li>
                                    <li class="menu-title">My Account Variation</li>
                                    <li>
                                        <a href="lostPassword.php">Lost Your Password ?</a>
                                    </li>
                                    <li class="menu-title">Checkout Variation</li>
                                    <li>
                                        <a href="confirmation.html">Checkout Confirmation</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="deals.php?orderby=Highest Price">Super Sale
                                <span class="superscript-label-discount">-15%</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->
<script>
    function showResult(search, category) {
        if (search.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").classList.remove("searchResult");
            document.getElementById("responsiveSearch").innerHTML = "";
            document.getElementById("responsiveSearch").classList.remove("searchResult");
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").classList.add("searchResult");
                document.getElementById("responsiveSearch").innerHTML = this.responseText;
                document.getElementById("responsiveSearch").classList.add("searchResult");
            }
        }
        xmlhttp.open("GET", "search.php?search=" + search + "&category=" + category, true);
        xmlhttp.send();
    }
</script>