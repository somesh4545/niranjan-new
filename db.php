<?php

// localhost detials
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "niranjan";


// miles web detials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niranjan";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected";
}
