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
        <h1>USE OF CONTENT</h1>
        <br />
        <p>
            All logos, brands, marks headings, labels, names, signatures, numerals, shapes or any combinations thereof, appearing in this site, except as otherwise noted, are properties either owned, or used under licence, by the business and / or its associate entities who feature on this Website. The use of these properties or any other content on this site, except as provided in these terms and conditions or in the site content, is strictly prohibited.

            You may not sell or modify the content of this Website or reproduce, display, publicly perform, distribute, or otherwise use the materials in any way for any public or commercial purpose without the respective organisation’s or entity’s written permission.
        </p>
        <br />
        <br />
        <h1>
            ACCEPTABLE WEBSITE USE
        </h1>
        <br />

        <h3>
            (A) Security Rules

        </h3>
        <br />

        <p>

            Visitors are prohibited from violating or attempting to violate the security of the Web site, including, without limitation, (1) accessing data not intended for such user or logging into a server or account which the user is not authorised to access, (2) attempting to probe, scan or test the vulnerability of a system or network or to breach security or authentication measures without proper authorisation, (3) attempting to interfere with service to any user, host or network, including, without limitation, via means of submitting a virus or " Trojan horse" to the Website, overloading, "flooding" , "mail bombing" or "crashing" , or (4) sending unsolicited electronic mail, including promotions and/or advertising of products or services. Violations of system or network security may result in civil or criminal liability. The business and / or its associate entities will have the right to investigate occurrences that they suspect as involving such violations and will have the right to involve, and cooperate with, law enforcement authorities in prosecuting users who are involved in such violations. </p>
        <br />
        <br />

        <h3>
            (B) General Rules

        </h3>
        <br />

        <p>
            Visitors may not use the Web Site in order to transmit, distribute, store or destroy material (a) that could constitute or encourage conduct that would be considered a criminal offence or violate any applicable law or regulation, (b) in a manner that will infringe the copyright, trademark, trade secret or other intellectual property rights of others or violate the privacy or publicity of other personal rights of others, or (c) that is libellous, defamatory, pornographic, profane, obscene, threatening, abusive or hateful.

        </p>
        </h1>
    </section>

    <!-- Footer -->
    <?php

    include "./components/footer.php";

    ?>

</body>

</html>