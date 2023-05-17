<?php

if (isset($_POST['submit'])) {
    require_once '../config/dbcon.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (empty($name) || empty($phone) || empty($email) || empty($message)) {
        echo '<script>
        alert("Empty Fields");
        window.location="../user/index.php";
        </script>';
        exist();
    } else {
        $query = "INSERT INTO requests (name,email,phone,message) VALUES ('$name','$email','$phone','$message') ";
        $result = mysqli_query($conn,$query);

        if ($result) {
            echo '<script>
            alert("Sent Successfully, an admin will contact you ASAP.");
            window.location="../user/index.php";
            </script>';
        }
    }
}

?>