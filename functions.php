<?php

include './db.php';

// function updateCart($cust_id, $p_id, $quantity, $total)
// {
// }

if (isset($_POST['updateCart'])) {
    $cart_id = $_POST['cart_id'];
    $p_id = $_POST['p_id'];
    $quantity = $_POST['quantity'];
    $newQuantity = $_POST['newQuantity'];

    $sql = "SELECT * FROM `products` WHERE id=$p_id and quantity>=$newQuantity";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $sql1 = "UPDATE `cart` SET quantity=$newQuantity where id=$cart_id";
        $result1 = $conn->query($sql1);
        echo "true";
    } else echo "false";
}

if (isset($_POST['removeFromCart'])) {
    $cust_id = $_POST['cust_id'];
    $p_id = $_POST['p_id'];

    $sql = "DELETE FROM `cart` WHERE cust_id=$cust_id and product_id=$p_id";
    $result = $conn->query($sql);

    if ($result) {
        echo "true";
    } else {
        echo "false";
    }
}

if (isset($_POST['performOnCart'])) {
    $cust_id = $_POST['cust_id'];
    $p_id = $_POST['p_id'];

    $sql = "SELECT * FROM `cart` WHERE cust_id=$cust_id and product_id=$p_id";
    // echo $sql;
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        $sql1 = "INSERT INTO `cart` (cust_id, product_id, quantity) VALUES ($cust_id, $p_id, 1)";
        $res1 = $conn->query($sql1);
        if (!$res1) {
            echo "false";
        } else echo "added";
    } else {
        $sql2 = "DELETE FROM `cart` where cust_id=$cust_id and product_id=$p_id";
        $res2 = $conn->query($sql2);
        if (!$res2) {
            echo "false";
        } else echo "remove";
    }
}

function insertIntoOrders($cust_id)
{
    // echo "SELECT * from `cart` where cust_id='$cust_id'";

    $sql_1 = "SELECT * from `cart` where cust_id='$cust_id'";

    $result_1 = $conn->query($sql_1);
    // print_r($result);
    if ($result_1->num_rows > 0) {
        while ($row_1 = $result_1->fetch_assoc()) {

            $product_id_1 = $row_1['product_id'];
            $quantity_1 = $row_1['quantity'];
            $sql_2 = "SELECT `discount_price` from `products` where id=$product_id_1";
            $result_2 = $conn->query($sql_2);
            $total_1 = 0;
            while ($row_2 = $result_2->fetch_assoc()) {
                $discount_price_1 = $row_2['discount_price'];
                $total_1 = $discount_price_1 * $quantity_1;
            }
            $sql_3 = mysqli_query($conn, "INSERT into orders ( `cust_id`, `product_id`, `quantity`, `amount`, `payment_mode`) values ('$cust_id', 
				 '$product_id_1', '$quantity_1', '$total_1', 'COD')");
        }
        $result_3 = mysqli_query($conn, "DELETE FROM cart where cust_id=$cust_id");
    }
}

if (isset($_POST['cod'])) {
    $cust_id = $_POST['cust_id'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $res = mysqli_query($conn, "UPDATE customer SET pincode='$pincode', address='$address', phone='$phone' WHERE id='$cust_id'");
    $sql = "SELECT * from cart where cust_id='$cust_id'";
    $result = $conn->query($sql);

    $total = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $sql2 = "SELECT discount_price from products where id=$product_id";

            $result2 = $conn->query($sql2);
            while ($row2 = $result2->fetch_assoc()) {
                $discount_price = $row2['discount_price'];
                $total += $discount_price * $quantity;
            }
        }

       

        $sql_1 = "SELECT * from `cart` where cust_id='$cust_id'";

        $result_1 = $conn->query($sql_1);
        // print_r($result);
        if ($result_1->num_rows > 0) {
            while ($row_1 = $result_1->fetch_assoc()) {

                $product_id_1 = $row_1['product_id'];
                $quantity_1 = $row_1['quantity'];
                $sql_2 = "SELECT `discount_price`, quantity from `products` where id=$product_id_1";
                $result_2 = $conn->query($sql_2);
                $total_1 = 0;
                while ($row_2 = $result_2->fetch_assoc()) {
                    $discount_price_1 = $row_2['discount_price'];
                    $total_1 = $discount_price_1 * $quantity_1;
                    $updatedQty = $row_2['quantity'] - $quantity_1;
                    $sql_4 = mysqli_query($conn, "UPDATE products SET quantity=$updatedQty where id=$product_id_1");
                }
                $sql_3 = mysqli_query($conn, "INSERT into orders ( `cust_id`, `product_id`, `quantity`, `amount`, `payment_mode`) values ('$cust_id', 
        				 '$product_id_1', '$quantity_1', '$total_1', 'COD')");
            }
            $result_3 = mysqli_query($conn, "DELETE FROM cart where cust_id=$cust_id");
            
            echo "true";
        }
        
    } else {
        echo "false";
    }
}



if (isset($_GET['logout'])) {
    session_start();
    unset($_SESSION['cust_id']);
    session_destroy();
    echo '<script>window.open("/index.php", "_self")</script>';
}
