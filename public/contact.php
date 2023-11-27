<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "FAQ | OSC - OnlineShoppingCart";
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
                    <h2>Contact</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Contact-Page -->
        <div class="page-contact u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="touch-wrapper">
                            <h1 class="contact-h1">Get In Touch With Us</h1>
                            <form>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="contact-name">Your Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="contact-name" class="text-field" placeholder="Name" required>
                                    </div>
                                    <div class="group-2">
                                        <label for="contact-email">Your Email
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="email" id="contact-email" class="text-field" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="contact-subject">Subject
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="contact-subject" class="text-field" placeholder="Subject" required>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="contact-message">Message:</label>
                                    <textarea class="text-area" id="contact-message" required></textarea>
                                </div>
                                <div class="u-s-m-b-30">
                                    <button type="submit" class="button button-outline-secondary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="information-about-wrapper">
                            <h1 class="contact-h1">Information About Us</h1>
                            <p>
                                At our store, we are passionate about providing our customers with unique and creative items that are not typically found in brick-and-mortar stores. Our team of experts works tirelessly to curate a collection of high-quality products that are sure to delight our customers.
                            </p>
                            <p>
                                We believe that every gift should be special and that every occasion deserves to be celebrated in style. Whether you’re looking for the perfect gift for a loved one or a unique piece of stationery to make your mark, we’ve got you covered. Thank you for choosing our store for all your gift and stationary needs!
                            </p>
                        </div>
                        <div class="contact-us-wrapper">
                            <h1 class="contact-h1">Contact Us</h1>
                            <div class="contact-material u-s-m-b-16">
                                <h6>Location</h6>
                                <span>A 563, Main Shahrah-e-Usman, Sector 11-A</span>
                                <span>North Karachi Twp, Karachi, Sindh 75850</span>
                            </div>
                            <div class="contact-material u-s-m-b-16">
                                <h6>Email</h6>
                                <span>contact@OSC.com</span>
                            </div>
                            <div class="contact-material u-s-m-b-16">
                                <h6>Telephone</h6>
                                <span>+111-444-989</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="u-s-p-t-80">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14466.136769377172!2d67.0652637!3d24.9819581!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340e584b891c3%3A0x29b2cbc198ba2dbd!2sAptech%20Computer%20Education%20North%20Karachi%20Center!5e0!3m2!1sen!2s!4v1700144406527!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- Contact-Page /- -->
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