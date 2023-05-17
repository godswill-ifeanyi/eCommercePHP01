<?php

if (isset($_POST['submit'])) {
    require_once '../config/dbcon.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPass = $_POST['cpassword'];

    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password) || empty($confirmPass)) {
        echo '<script>
        alert("Empty Fields");
        window.location="../login.php";
        </script>';
        exist();
    } elseif ($password !== $confirmPass) {
        echo '<script>
        alert("Passwords do not match");
        window.location="../login.php";
        </script>';
        exist();
    } else {
        $sql = "SELECT email FROM users WHERE  email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo '<script>
        alert("SQL Error");
        window.location="../login.php";
        </script>';
            exist();
        } else {    
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                echo '<script>
            alert("Email taken");
            window.location="../login.php";
            </script>';
                exist(); 
            } else {
                $sql = "INSERT INTO users (firstname, lastname, email, phone, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo '<script>
                alert("SQL Error");
                window.location="../login.php";
                </script>';
                    exist();
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $phone, $hashedPass);
                    mysqli_stmt_execute($stmt);
                    echo '<script>
                alert("Congratulations! Your account is ready, login to continue...");
                window.location="../user/index.php";
                </script>';
                    exist();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo '<script>
                alert("Forbidden access");
                window.location="../login.php";
                </script>';
    exist();
}
?>


