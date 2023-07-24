<?php
include './db.php';
session_start();

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
                <?php
                if (!isset($_GET['id'])) {
                    echo "<script>
                            window.open('./index.php', '_self');
                        </script>";
                }
                $category_id = $_GET['id'];
                $result2 = mysqli_query($conn, "SELECT  `name` FROM categories where id=$category_id LIMIT 1");
                while ($row = $result2->fetch_assoc()) {
                    $category_name = $row['name'];
                    echo "<h1 style='margin:20px'>$category_name</h1>";
                }
                ?>

                <div class="product-layout">

                    <?php
                    $category_id = $_GET['id'];
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    $page_first_result = ($page - 1) * $results_per_page;
                    $sql = "SELECT * FROM `products` WHERE category_id=$category_id LIMIT " . $page_first_result . "," . $results_per_page;
                    $result = $conn->query($sql);



                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $product_id = $row['id'];
                            $product_name = $row['name'];
                            $price = $row['price'];
                            $discount_price = $row['discount_price'];
                            $image_url = $row['image_url'];
                            $cust_id = 0;
                            if (isset($_SESSION['cust_id'])) {
                                $cust_id = $_SESSION['cust_id'];
                            }
                            $quantity = $row['quantity'];
                            // $cust_id = 1;
                            
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
                    } else {
                        echo "<p style='text-align: center; width: 100%;'>No product found in this category.</p>";
                    }

                    ?>
                </div>

                <!-- PAGINATION -->
                <ul class="pagination">
                    <?php

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `products` WHERE category_id=$id";
                    $result = $conn->query($sql);
                    $num = mysqli_num_rows($result);
                    $number_of_page = ceil($num / $results_per_page);
                    for ($i = 1; $i <= $number_of_page; $i++) {
                        echo "
                <span><a href='./subcollection.php?id=$id&page=$i'>$i</a></span>
            ";
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