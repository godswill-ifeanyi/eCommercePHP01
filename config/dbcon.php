<?php

$dbHost = "localhost";
$dbUser = "u112713895_ecommerce";
$dbPass = "##Pass22word##";
$dbName = "u112713895_ecommerce";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database Connection Failed!".mysqli_connect_error());
}
?>