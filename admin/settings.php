<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

include 'includes/header.php'; 
require_once '../config/dbcon.php';

$id = $_SESSION['sessionid'];

$sql = "SELECT * FROM users WHERE id = '$id' ";

$result = mysqli_query($conn,$sql);

$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_info'])) {
    $email = $_POST['email'];
}

$query = "UPDATE users SET email = '$email' WHERE id = '$id' ";

if (empty($email)) {
    echo '<script>
    alert(Field empty);
    window.location="settings.php";
    </script>';
} else {
    $result2 = mysqli_query($conn, $query);
    
    if ($result2) {
        echo '<script>
        alert("Email update successful");
        window.location="settings.php";
        </script>';
    }
}

if (isset($_POST['change_pass'])) {
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

}

$passCheck = password_verify($oldPassword, $info['password']);

if ($passCheck) {

    if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo '<script>
        alert(Do not keep any field empty);
        window.location="settings.php";
        </script>';
    } elseif ($newPassword != $confirmPassword) {
        echo '<script>
        alert(New password do not match);
        window.location="settings.php";
        </script>';
    }else {
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query2 = "UPDATE users SET password = '$hashPassword' WHERE id = '$id' ";
        $result3 = mysqli_query($conn, $query2);
    
        if ($result3) {
            echo '<script>
            alert("Password update successful");
            window.location="settings.php";
            </script>';
        }
    }
} else {
    echo '<script>
        alert(Old password incorrect);
        window.location="settings.php";
        </script>';
}

?>

    <section id="interface">
        <div class="navigation">

        <h3 class="i-name">Settings</h3>


        <div class="board">
        <h4>Change Email</h4>

        <div class="form">
            <form action="#" method="post">
                    <label>Email: </label><input type="text" class="email" name="email" 
                    value="<?php echo "{$info['email']}"; ?>">

                    <input type="submit" name="update_info" value="Update" class="brown">
            </form>
        </div>

    
        <div class="form">
            <h4>Change Password</h4>
            <form action="#" method="post">
            <input type="password" placeholder="Enter old password" name="oldpassword" ><br><br>
            <input type="password" placeholder="Enter new password" name="newpassword" ><br><br>
            <input type="password" placeholder="Confirm new password" name="confirmpassword" ><br><br>
            <input type="submit" name="change_pass" value="Update" class="brown">

            </form>
        </div>
                
        </div>

    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>