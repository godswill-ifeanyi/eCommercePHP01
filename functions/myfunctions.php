<?php
require_once '../config/dbcon.php';

function getAll($table) {
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAllProduct($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE special_offer = 0 ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAllSpecial($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE special_offer = 1 ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getByID($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return $query_run = mysqli_query($conn, $query);

}

function getAllActive($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status='1' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAllOrders() {
    global $conn;
    $query = "SELECT * FROM orders WHERE status='0' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getOrderHistory() {
    global $conn;
    $query = "SELECT * FROM orders WHERE status !='0' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function checkTrackingNo($trackingNo) {
    global $conn;

    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' ";
    return mysqli_query($conn, $query);
}
?>