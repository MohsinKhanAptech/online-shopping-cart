<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

$page = $_GET['page'];
$productId = $_GET['productId'];
$sortOrder = $_GET['sortOrder'];
$sortRating = $_GET['sortRating'];
$limit = 16 * $page;
$offsetCheck = $page;
$offsetCheck--;
$offset = $offsetCheck * 16;

switch ($sortOrder) {
  case 'Latest':
    $select_reviews = mysqli_query(
      $connect,
      "SELECT customers.customer_name,reviews.*
      FROM `customers` 
      INNER JOIN `reviews`
      ON customers.customer_id = reviews.customer_id AND reviews.product_id = {$productId}
      WHERE reviews.rating = {$sortRating}
      ORDER BY reviews.review_date DESC
      LIMIT {$limit}
      OFFSET {$offset};"
    );
    break;

  case 'Best Rating':
    $select_reviews = mysqli_query(
      $connect,
      "SELECT customers.customer_name,reviews.*
      FROM `customers` 
      INNER JOIN `reviews`
      ON customers.customer_id = reviews.customer_id AND reviews.product_id = {$productId}
      WHERE reviews.rating = {$sortRating}
      ORDER BY reviews.rating DESC
      LIMIT {$limit}
      OFFSET {$offset};"
    );
    break;

  case 'Worst Rating':
    $select_reviews = mysqli_query(
      $connect,
      "SELECT customers.customer_name,reviews.*
      FROM `customers` 
      INNER JOIN `reviews`
      ON customers.customer_id = reviews.customer_id AND reviews.product_id = {$productId}
      WHERE reviews.rating = {$sortRating}
      ORDER BY reviews.rating
      LIMIT {$limit}
      OFFSET {$offset};"
    );
    break;
}

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