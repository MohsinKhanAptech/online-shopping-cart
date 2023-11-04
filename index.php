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
    <?php include "include/navbar.php" ?>
    <h1>home</h1>
    <?php
    $product_querry = "SELECT * FROM `products`";
    $product_querry_run = mysqli_query($connect, $product_querry);

    if (mysqli_num_rows($product_querry_run) > 0) {
        while ($row = mysqli_fetch_assoc($product_querry_run)) {
    ?>
            <div class="card">
                <div class="productImgContainer">
                    <?php
                    if ($row["product_image_1"] != "") {
                        echo "<img src='uploads/products/" . $row["product_image_1"] . "' class='productImg' alt=''>";
                        if ($row["product_image_2"] != "") {
                            echo "<img src='uploads/products/" . $row["product_image_2"] . "' class='productImg' alt=''>";
                            if ($row["product_image_3"] != "") {
                                echo "<img src='uploads/products/" . $row["product_image_3"] . "' class='productImg' alt=''>";
                                if ($row["product_image_4"] != "") {
                                    echo "<img src='uploads/products/" . $row["product_image_4"] . "' class='productImg' alt=''>";
                                    if ($row["product_image_5"] != "") {
                                        echo "<img src='uploads/products/" . $row["product_image_5"] . "' class='productImg' alt=''>";
                                    }
                                }
                            }
                        }
                    } else {
                        echo "<h3>products image not avaliable</h3>";
                    }
                    ?>
                </div>
                <div class="productName">
                    productName:
                    <?php echo $row["product_name"] ?>
                </div>
                <div class="productPrice">
                    productPrice:
                    <?php echo $row["product_price"] ?>
                </div>
                <div class="productStock">
                    productStock:
                    <?php echo $row["product_stock"] ?>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div><input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>"></div>
                    <div><input type="hidden" name="product_price" value="<?php echo $row["product_price"] ?>"></div>
                    <div><label for="cart_quantity">quantity</label></div>
                    <div><input type="number" name="cart_quantity" id="cart_quantity" value="1" min="1" max="10"> * <sup>for orders above 10 please contact us through email</sup></div>
                    <div><button type="submit" name="submit">add to cart</button></div>
                </form>
            </div>
            <hr width="80%">
    <?php
        };
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $customer_id = $_SESSION["user_id"];
        $product_id = $_POST["product_id"];
        $product_price = $_POST["product_price"];
        $cart_quantity = $_POST["cart_quantity"];
        $cart_total = $product_price * $cart_quantity;

        $cart_querry = "INSERT INTO `cart`(`customer_id`, `product_id`, `product_price`, `cart_quantity`, `cart_total`) VALUES ('$customer_id','$product_id','$product_price','$cart_quantity','$cart_total')";
        $cart_querry_run = mysqli_query($connect, $cart_querry);

        if ($cart_querry_run) {
            alert('success');
            location('index.php');
        } else {
            alert('ERROR');
        }
    }
    ?>
</body>

</html>