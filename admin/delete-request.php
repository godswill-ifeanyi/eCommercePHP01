<?php

require_once '../config/dbcon.php';

if ($_GET['request_id']) {
    $request_id = $_GET['request_id'];

    $sql = "DELETE FROM requests WHERE id = '$request_id' ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("Data delete is successful");
        window.location="./index.php";
        </script>';
    }
}

?>