<?php
session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'user') {
    header("location:../login.php"); 
} 

require_once '../config/dbcon.php';
require_once '../user/authenticate.php';

if (isset($_SESSION['sessionid'])) {
    $uid = $_SESSION['sessionid']; 
    $pid = $_GET['id'];

    $product_check = "SELECT * FROM wishlist WHERE pid='$pid' AND uid='$uid' ";
    $product_check_run = mysqli_query($conn,$product_check);

    if (mysqli_num_rows($product_check_run) > 0) {
        echo '
            <script>
            alert("Already in wishlist");
            window.location.href="../user/wishlist.php";
            </script>';
    } else {

        $insert_query = "INSERT INTO wishlist (pid, uid) VALUES ('$pid','$uid')";

        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            echo '
            <script>
            alert("Added to wishlist");
            window.location.href="../user/wishlist.php";
            </script>';
        }
    }
}



?>


