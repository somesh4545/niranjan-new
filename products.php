<?php
include './db.php';
session_start();
$cust_id = 0;
if (isset($_SESSION['cust_id'])) {
  $cust_id = $_SESSION['cust_id'];
}
$results_per_page = 8;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />


  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./styles.css" />
  <link rel="stylesheet" href="./css/snackbar.css" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="/images/logo.png" type="image/png" />
  <title>Niranjan</title>
</head>

<body>

  <!-- Navigation -->
  <?php
  include "./components/nav.php";
  ?>

  <!-- PRODUCTS -->

  <section class="section products">
    <div class="products-layout container">
      <div class="col-3-of-4">


        <div class="product-layout">

          <?php

          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page = $_GET['page'];
          }

          $page_first_result = ($page - 1) * $results_per_page;

          $query = mysqli_query($conn, "SELECT * FROM products LIMIT " . $page_first_result . "," . $results_per_page);
          while ($run = mysqli_fetch_array($query)) {
            $product_id = $run['id'];
            $image_url = $run['image_url'];
            $product_name = $run['name'];
            $price = $run['price'];
            $discount_price = $run['discount_price'];

            $id = $run['id'];
            // $cust_id = 1;
            $quantity = $run['quantity'];
            echo "
            <div class='product'>
              
                <div class='img-container'>
                  <a href='productDetails.php?id=$product_id'>
                     <img src="."$image_url"." alt='' />
                  </a>
                  ".($quantity <= 0  ? "<div class='outOfStock'>Out of stock</div>": "<button onclick='performOnCart($cust_id, $product_id)' style='z-index: 100; background: none; outline: none; border: none;'>
                    <div class='addCart'>
                      <i class='fas fa-shopping-cart'></i>
                    </div>
                  </button>")."
                  
                </div>
                <a href='productDetails.php?id=$product_id'>
                    <div class='bottom'>
                        <a href='productDetails.php?id=$product_id'>$product_name</a>
                        <div style='display: flex; flex-direction:row; align-items:center; justify-content:center; margin-top:10px'>
                            <div class='price'>
                              <span>₹$discount_price</span>
                            </div>
                            <div class='org_price'>₹$price</div>
                        </div>
                    </div>
                </a>
            </div>
            ";
          }
          ?>

        </div>

        <!-- PAGINATION -->
        <ul class="pagination">
          <?php
          $query = mysqli_query($conn, "SELECT * FROM `products`");
          $num = mysqli_num_rows($query);
          $number_of_page = ceil($num / $results_per_page);
          for ($i = 1; $i <= $number_of_page; $i++) {
            echo "<span><a href='./products.php?page=$i'>$i</a></span>";
          }
          ?>
        </ul>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
  include "./components/footer.php";
  ?>
  <!-- End Footer -->

  <!-- Custom Scripts -->
  <script src="./js/index.js"></script>
  <script src="./functions.js"></script>

</body>

</html>