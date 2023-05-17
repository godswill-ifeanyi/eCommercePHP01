<?php

require_once '../config/dbcon.php';

if ($_GET['user_id']) {
    $user_id = $_GET['user_id'];
    $pid = $_GET['pid']; 

    $sql = "DELETE FROM wishlist WHERE uid='$user_id' AND pid='$pid' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("Wishlist delete is successful");
        window.location="./wishlist.php";
        </script>';
    }
}

?>