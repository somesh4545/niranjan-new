<?php
include './db.php';
session_start();
$cust_id = 0;
if (isset($_SESSION['cust_id'])) {
    $cust_id = $_SESSION['cust_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- ======== Swiper Js ======= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css" />

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.8/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="./css/snackbar.css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/logo.png" type="image/png" />
    <title>Niranjan</title>
</head>

<body>


    <?php
    include "./components/nav.php";
    ?>


    <!-- Promotion -->

    <section class="section" style="margin: auto;
    max-width: 114rem;">
        <h1>Refund and Cancellation Policy</h1>
        <br />
        <p>Our focus is complete customer satisfaction. In the event, if you are displeased with the services provided,
            we will refund back the money, provided the reasons are genuine and proved after investigation.
            For refund purposes you can directly call this number <a href="tel://+919112330860">+91 9112330860</a>
        </p>
        <br />
        <br />
        <h1>
            Cancellation policy
        </h1>
        <br />

        <p>Once a order has been placed it cannot be canceled</p>
        <br />
        <br />

        <h1>
            Refund Policy
        </h1>
        <br />
        <p>In case any customer is not completely satisfied with our products we can provide a refund. For refund purposes you can directly call this number <a href="tel://+919112330860">+91 9112330860</a></p>
        </h1>
    </section>

    <!-- Footer -->
    <?php

    include "./components/footer.php";

    ?>

</body>

</html>