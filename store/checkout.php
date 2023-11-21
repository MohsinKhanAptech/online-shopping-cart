<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
$customer_id = $_SESSION["user_id"];
$cart_check = mysqli_fetch_column(mysqli_query($connect, "SELECT COUNT(cart_id) FROM `cart_items` WHERE `customer_id` = '$customer_id'"));

if (isset($_SESSION["user"])) {
    if ($cart_check > 0) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <?php
        $page_title = "Checkout | OSC - OnlineShoppingCart";
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
                            <h2>Checkout</h2>
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <i class="ion ion-md-home"></i>
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="checkout.php">Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Page Introduction Wrapper /- -->
                <!-- Checkout-Page -->
                <div class="page-checkout u-s-p-t-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <!-- First-Accordion -->
                                <!-- <div>
                                <div class="message-open u-s-m-b-24">
                                    Returning customer?
                                    <strong>
                                        <a class="u-c-brand" data-toggle="collapse" href="#showlogin">Click here to login
                                        </a>
                                    </strong>
                                </div>
                                <div class="collapse u-s-m-b-24" id="showlogin">
                                    <h6 class="collapse-h6">Welcome back! Sign in to your account.</h6>
                                    <h6 class="collapse-h6">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</h6>
                                    <form>
                                        <div class="group-inline u-s-m-b-13">
                                            <div class="group-1 u-s-p-r-16">
                                                <label for="user-name-email">Username or Email
                                                    <span class="astk">*</span>
                                                </label>
                                                <input type="text" id="user-name-email" class="text-field" placeholder="Username / Email">
                                            </div>
                                            <div class="group-2">
                                                <label for="password">Password
                                                    <span class="astk">*</span>
                                                </label>
                                                <input type="text" id="password" class="text-field" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-13">
                                            <button type="submit" class="button button-outline-secondary">Login</button>
                                            <input type="checkbox" class="check-box" id="remember-me-token">
                                            <label class="label-text" for="remember-me-token">Remember me</label>
                                        </div>
                                        <div class="page-anchor">
                                            <a href="#" class="u-c-brand">Lost your password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                                <!-- First-Accordion /- -->
                                <!-- Second Accordion -->
                                <!-- <div>
                                <div class="message-open u-s-m-b-24">
                                    Have a coupon?
                                    <strong>
                                        <a class="u-c-brand" data-toggle="collapse" href="#showcoupon">Click here to enter your code</a>
                                    </strong>
                                </div>
                                <div class="collapse u-s-m-b-24" id="showcoupon">
                                    <h6 class="collapse-h6">
                                        Enter your coupon code if you have one.
                                    </h6>
                                    <div class="coupon-field">
                                        <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                        <input id="coupon-code" type="text" class="text-field" placeholder="Coupon Code">
                                        <button type="submit" class="button">Apply Coupon</button>
                                    </div>
                                </div>
                            </div> -->
                                <!-- Second Accordion /- -->
                                <form action="checkoutSubmit.php" method="post">
                                    <div class="row">
                                        <!-- Billing-&-Shipping-Details -->
                                        <?php
                                        $detail_select = mysqli_query($connect, "SELECT * FROM `customer_details` WHERE `customer_id` = {$_SESSION["user_id"]}");
                                        if (mysqli_num_rows($detail_select) > 0) {
                                            $detail = mysqli_fetch_assoc($detail_select) ?>
                                            <div class="col-lg-6">
                                                <h4 class="section-h4">Billing & Shipping Details</h4>
                                                <!-- Form-Fields -->
                                                <div class="group-inline u-s-m-b-13">
                                                    <div class="group-1 u-s-p-r-16">
                                                        <label for="first-name">First Name
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="first_name" type="text" id="first-name" class="text-field" value="<?php echo $detail["first_name"] ?>" required>
                                                    </div>
                                                    <div class="group-2">
                                                        <label for="last-name">Last Name
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="last_name" type="text" id="last-name" class="text-field" value="<?php echo $detail["last_name"] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="select-country">Country
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <div class="select-box-wrapper">
                                                        <select name="country" class="select-box" id="select-country" required>
                                                            <option <?php echo $detail["country"] == "Pakistan" ? "selected" : "" ?> value="Pakistan">Pakistan (PK)</option>
                                                            <option <?php echo $detail["country"] == "United States" ? "selected" : "" ?> value="United States">United States (US)</option>
                                                            <option <?php echo $detail["country"] == "United Kingdom" ? "selected" : "" ?> value="United Kingdom">United Kingdom (UK)</option>
                                                            <option <?php echo $detail["country"] == "United Arab Emirates" ? "selected" : "" ?> value="United Arab Emirates">United Arab Emirates (UAE)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="street-address u-s-m-b-13">
                                                    <label for="req-st-address">Street Address
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <input name="street_address" type="text" id="req-st-address" class="text-field" placeholder="House name and street name" value="<?php echo $detail["street_address"] ?>" required>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="town-city">Town
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <input name="town" type="text" id="town-city" class="text-field" value="<?php echo $detail["town"] ?>" required>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="select-state">State
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <div class="select-box-wrapper">
                                                        <select name="state" class="select-box" id="select-state" required>
                                                            <option <?php echo $detail["state"] == "Sindh" ? "selected" : "" ?> value="Sindh">Sindh</option>
                                                            <option <?php echo $detail["state"] == "Punjab" ? "selected" : "" ?> value="Punjab">Punjab</option>
                                                            <option <?php echo $detail["state"] == "Khyeber Pakhtunkhwa" ? "selected" : "" ?> value="Khyeber Pakhtunkhwa">Khyeber Pakhtunkhwa</option>
                                                            <option <?php echo $detail["state"] == "Balouchistan" ? "selected" : "" ?> value="Balouchistan">Balouchistan</option>
                                                            <option <?php echo $detail["state"] == "Azad Kashmir" ? "selected" : "" ?> value="Azad Kashmir">Azad Kashmir</option>
                                                            <option <?php echo $detail["state"] == "Gilgit Baltistan" ? "selected" : "" ?> value="Gilgit Baltistan">Gilgit Baltistan</option>
                                                            <option <?php echo $detail["state"] == "Alabama" ? "selected" : "" ?> value="Alabama">Alabama</option>
                                                            <option <?php echo $detail["state"] == "Alaska" ? "selected" : "" ?> value="Alaska">Alaska</option>
                                                            <option <?php echo $detail["state"] == "Arizona" ? "selected" : "" ?> value="Arizona">Arizona</option>
                                                            <option <?php echo $detail["state"] == "Arkansas" ? "selected" : "" ?> value="Arkansas">Arkansas</option>
                                                            <option <?php echo $detail["state"] == "California" ? "selected" : "" ?> value="California">California</option>
                                                            <option <?php echo $detail["state"] == "Colorado" ? "selected" : "" ?> value="Colorado">Colorado</option>
                                                            <option <?php echo $detail["state"] == "Connecticut" ? "selected" : "" ?> value="Connecticut">Connecticut</option>
                                                            <option <?php echo $detail["state"] == "Delaware" ? "selected" : "" ?> value="Delaware">Delaware</option>
                                                            <option <?php echo $detail["state"] == "Florida" ? "selected" : "" ?> value="Florida">Florida</option>
                                                            <option <?php echo $detail["state"] == "Georgia" ? "selected" : "" ?> value="Georgia">Georgia</option>
                                                            <option <?php echo $detail["state"] == "Hawaii" ? "selected" : "" ?> value="Hawaii">Hawaii</option>
                                                            <option <?php echo $detail["state"] == "Idaho" ? "selected" : "" ?> value="Idaho">Idaho</option>
                                                            <option <?php echo $detail["state"] == "Illinois" ? "selected" : "" ?> value="Illinois">Illinois</option>
                                                            <option <?php echo $detail["state"] == "Indiana" ? "selected" : "" ?> value="Indiana">Indiana</option>
                                                            <option <?php echo $detail["state"] == "Iowa" ? "selected" : "" ?> value="Iowa">Iowa</option>
                                                            <option <?php echo $detail["state"] == "Kansas" ? "selected" : "" ?> value="Kansas">Kansas</option>
                                                            <option <?php echo $detail["state"] == "Kentucky" ? "selected" : "" ?> value="Kentucky">Kentucky</option>
                                                            <option <?php echo $detail["state"] == "Louisiana" ? "selected" : "" ?> value="Louisiana">Louisiana</option>
                                                            <option <?php echo $detail["state"] == "Maine" ? "selected" : "" ?> value="Maine">Maine</option>
                                                            <option <?php echo $detail["state"] == "Maryland" ? "selected" : "" ?> value="Maryland">Maryland</option>
                                                            <option <?php echo $detail["state"] == "Massachusetts" ? "selected" : "" ?> value="Massachusetts">Massachusetts</option>
                                                            <option <?php echo $detail["state"] == "Michigan" ? "selected" : "" ?> value="Michigan">Michigan</option>
                                                            <option <?php echo $detail["state"] == "Minnesota" ? "selected" : "" ?> value="Minnesota">Minnesota</option>
                                                            <option <?php echo $detail["state"] == "Mississippi" ? "selected" : "" ?> value="Mississippi">Mississippi</option>
                                                            <option <?php echo $detail["state"] == "Missouri" ? "selected" : "" ?> value="Missouri">Missouri</option>
                                                            <option <?php echo $detail["state"] == "Montana" ? "selected" : "" ?> value="Montana">Montana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="postcode">Postcode / Zip
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <input name="postcode" type="text" id="postcode" class="text-field" value="<?php echo $detail["postcode"] ?>" required>
                                                </div>
                                                <div class="group-inline u-s-m-b-13">
                                                    <div class="group-1 u-s-p-r-16">
                                                        <label for="email">Email address
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="email" type="email" id="email" class="text-field" value="<?php echo $detail["email"] ?>" required>
                                                    </div>
                                                    <div class="group-2">
                                                        <label for="phone">Phone
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="phone" type="text" id="phone" class="text-field" value="<?php echo $detail["phone"] ?>" pattern="[0-9]{11}" maxlength="20" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else { ?>
                                            <div class="col-lg-6">
                                                <h4 class="section-h4">Billing & Shipping Details</h4>
                                                <!-- Form-Fields -->
                                                <div class="group-inline u-s-m-b-13">
                                                    <div class="group-1 u-s-p-r-16">
                                                        <label for="first-name">First Name
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="first_name" type="text" id="first-name" class="text-field" required>
                                                    </div>
                                                    <div class="group-2">
                                                        <label for="last-name">Last Name
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="last_name" type="text" id="last-name" class="text-field" required>
                                                    </div>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="select-country">Country
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <div class="select-box-wrapper">
                                                        <select name="country" class="select-box" id="select-country" required>
                                                            <option selected value="Pakistan">Pakistan (PK)</option>
                                                            <option value="United States">United States (US)</option>
                                                            <option value="United Kingdom">United Kingdom (UK)</option>
                                                            <option value="United Arab Emirates">United Arab Emirates (UAE)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="street-address u-s-m-b-13">
                                                    <label for="req-st-address">Street Address
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <input name="street_address" type="text" id="req-st-address" class="text-field" placeholder="House name and street name" required>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="town-city">Town
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <input name="town" type="text" id="town-city" class="text-field" required>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="select-state">State
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <div class="select-box-wrapper">
                                                        <select name="state" class="select-box" id="select-state" required>
                                                            <option selected value="Sindh">Sindh</option>
                                                            <option value="Punjab">Punjab</option>
                                                            <option value="Khyeber Pakhtunkhwa">Khyeber Pakhtunkhwa</option>
                                                            <option value="Balouchistan">Balouchistan</option>
                                                            <option value="Azad Kashmir">Azad Kashmir</option>
                                                            <option value="Gilgit Baltistan">Gilgit Baltistan</option>
                                                            <option value="Alabama">Alabama</option>
                                                            <option value="Alaska">Alaska</option>
                                                            <option value="Arizona">Arizona</option>
                                                            <option value="Arkansas">Arkansas</option>
                                                            <option value="California">California</option>
                                                            <option value="Colorado">Colorado</option>
                                                            <option value="Connecticut">Connecticut</option>
                                                            <option value="Delaware">Delaware</option>
                                                            <option value="Florida">Florida</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Hawaii">Hawaii</option>
                                                            <option value="Idaho">Idaho</option>
                                                            <option value="Illinois">Illinois</option>
                                                            <option value="Indiana">Indiana</option>
                                                            <option value="Iowa">Iowa</option>
                                                            <option value="Kansas">Kansas</option>
                                                            <option value="Kentucky">Kentucky</option>
                                                            <option value="Louisiana">Louisiana</option>
                                                            <option value="Maine">Maine</option>
                                                            <option value="Maryland">Maryland</option>
                                                            <option value="Massachusetts">Massachusetts</option>
                                                            <option value="Michigan">Michigan</option>
                                                            <option value="Minnesota">Minnesota</option>
                                                            <option value="Mississippi">Mississippi</option>
                                                            <option value="Missouri">Missouri</option>
                                                            <option value="Montana">Montana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <label for="postcode">Postcode / Zip
                                                        <span class="astk">*</span>
                                                    </label>
                                                    <input name="postcode" type="text" id="postcode" class="text-field" required>
                                                </div>
                                                <div class="group-inline u-s-m-b-13">
                                                    <div class="group-1 u-s-p-r-16">
                                                        <label for="email">Email address
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="email" type="email" id="email" class="text-field" required>
                                                    </div>
                                                    <div class="group-2">
                                                        <label for="phone">Phone
                                                            <span class="astk">*</span>
                                                        </label>
                                                        <input name="phone" type="text" id="phone" class="text-field" pattern="[0-9]{11}" maxlength="20" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } ?>
                                        <!-- Billing-&-Shipping-Details /- -->
                                        <!-- Checkout -->
                                        <div class="col-lg-6">
                                            <h4 class="section-h4">Your Order</h4>
                                            <div class="order-table">
                                                <table class="u-s-m-b-13">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $checkout_querry = mysqli_query(
                                                            $connect,
                                                            "SELECT products.product_name,cart_items.cart_quantity,cart_items.cart_total
                                                            FROM `cart_items`
                                                            INNER JOIN `products`
                                                            ON cart_items.product_id = products.product_id AND cart_items.customer_id = {$_SESSION["user_id"]};"
                                                        );
                                                        $cart_total_sum = mysqli_fetch_column(mysqli_query($connect, "SELECT SUM(cart_total) FROM `cart_items` WHERE `customer_id` = {$_SESSION["user_id"]}"));

                                                        if (mysqli_num_rows($checkout_querry) > 0) {
                                                            while ($row = mysqli_fetch_assoc($checkout_querry)) {
                                                                echo
                                                                "<tr>
                                                                <td>
                                                                    <h6 class='order-h6'>" . $row["product_name"] . "</h6>
                                                                    <span class='order-span-quantity'>x " . $row["cart_quantity"] . "</span>
                                                                </td>
                                                                <td>
                                                                    <h6 class='order-h6'>$" . $row["cart_total"] . "</h6>
                                                                </td>
                                                            </tr>";
                                                            }
                                                        } ?>
                                                        <tr>
                                                            <td>
                                                                <h3 class="order-h3">Subtotal</h3>
                                                            </td>
                                                            <td>
                                                                <h3 class="order-h3">$<?php echo $cart_total_sum ?></h3>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h3 class="order-h3">Shipping</h3>
                                                            </td>
                                                            <td>
                                                                <h3 class="order-h3">$0.00</h3>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h3 class="order-h3">Tax</h3>
                                                            </td>
                                                            <td>
                                                                <h3 class="order-h3">$0.00</h3>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h3 class="order-h3">Total</h3>
                                                            </td>
                                                            <td>
                                                                <h3 class="order-h3">$<?php echo $cart_total_sum ?></h3>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="u-s-m-b-13">
                                                    <input type="radio" class="radio-box" name="payment-method" id="cash-on-delivery" required>
                                                    <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                                </div>
                                                <div class="u-s-m-b-13">
                                                    <input type="checkbox" class="check-box" id="accept" required>
                                                    <label class="label-text no-color" for="accept">I’ve read and accept the
                                                        <a href="termsAndConditions.php" class="u-c-brand">terms & conditions</a>
                                                    </label>
                                                </div>
                                                <button type="submit" name="submit" class="button button-outline-secondary">Place Order</button>
                                            </div>
                                        </div>
                                        <!-- Checkout /- -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout-Page /- -->
                <!-- Footer -->
                <?php include "include/footer.php"; ?>
                <!-- Footer /- -->
                <!-- Dummy Selectbox -->
                <?php include "include/dummySelectbox.php"; ?>
                <!-- Dummy Selectbox /- -->
                <!-- Responsive-Search -->
                <?php include "include/responsiveSearch.php"; ?>
                <!-- Responsive-Search /- -->
            </div>
            <?php include "include/scripts.php" ?>
        </body>

        </html>
<?php
    } else {
        alert("your cart is empty");
        location("index.php");
    }
} else {
    alert("No User Logged-in");
    location("account.php");
} ?>