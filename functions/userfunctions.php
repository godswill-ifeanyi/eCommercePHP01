<?php

require_once '../config/dbcon.php'; 

function getAllActive($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status='1' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAll($table) {
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAllSpecial($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE special_offer = 1 ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAllTrending() {
    global $conn;
    $query = "SELECT * FROM products WHERE trending='1' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function getAllPopular() {
    global $conn;
    $query = "SELECT * FROM categories WHERE popular='1' ORDER BY id DESC LIMIT 3";
    return $query_run = mysqli_query($conn, $query);

}

function getSlugActive($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);

}

function getProductByCategory($category_id) {
    global $conn;
    $query = "SELECT * FROM products WHERE category_id = '$category_id' and status='1' ";
    return $query_run = mysqli_query($conn, $query);
}

function getIDActive($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id' and status='1' ";
    return $query_run = mysqli_query($conn, $query);

}
function getCartItems() {
    global $conn;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
    FROM carts c, products p WHERE c.prod_id=p.id AND user_id='$user_id' ORDER BY c.id DESC";
    return $query_run = mysqli_query($conn, $query);
}

function getOrders() {
    global $conn;
    $user_id = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC ";
    return $query_run = mysqli_query($conn, $query);
}

function checkTrackingNo($trackingNo) {
    global $conn;
    $user_id = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$user_id' ";
    return mysqli_query($conn, $query);
}
?>  