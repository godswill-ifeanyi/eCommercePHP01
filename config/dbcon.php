<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "ecomm";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database Connection Failed!".mysqli_connect_error());
}
?>