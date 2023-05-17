<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'user') {
    header("location:../login.php"); 
} 


require_once '../functions/userfunctions.php';

$id = $_SESSION['sessionid'];

$sql = "SELECT * FROM users WHERE id = '$id' ";

$result = mysqli_query($conn,$sql);

$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_info'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

}
$query = "UPDATE users SET firstname = '$firstname',lastname = '$lastname',
email = '$email',phone = '$phone' WHERE id = '$id' ";

if (empty($firstname) || empty($lastname) || empty($email) || empty($phone)) {
    echo '<script>
    alert(Do not keep any field empty);
    window.location="profile.php";
    </script>';
} else {
    $result2 = mysqli_query($conn, $query);
    
    if ($result2) {
        echo '<script>
        alert("Profile update successful");
        window.location="profile.php";
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
        window.location="profile.php";
        </script>';
    } elseif ($newPassword != $confirmPassword) {
        echo '<script>
        alert(New password do not match);
        window.location="profile.php";
        </script>';
    }else {
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query2 = "UPDATE users SET password = '$hashPassword' WHERE id = '$id' ";
        $result3 = mysqli_query($conn, $query2);
    
        if ($result3) {
            echo '<script>
            alert("Password update successful");
            window.location="profile.php";
            </script>';
        }
    }
} else {
    echo '<script>
        alert(Old password incorrect);
        window.location="profile.php";
        </script>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Emmmapee Musicals</title>

    <meta name="title" content="Musical Equipments, Guitar, Piano and Keyboard,
    Pa Systems, Online Drums and Band,">
    <meta name="description" content="Emmapee Musical Emperium">
    <meta name="keywords" content="Emmapee Musical Emperium, Mile One, Diobu, 
    Musical Equipment, Music Instrument, Best Music Equipment Port Harcourt,
    Best Music Instrument in Port Harcourt, Music Instrument Shop Centre Near Me, 
    Music Equipment Shop Near Me">

    <link href="../images/apple-touch-icon.png" rel="icon"> 

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../admin/assets/css/styles.css">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- this is icons link -->
    <style>
        input {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="all-content">

      <div class="sticky-top">
        <div class="top-div px-5 py-2">
          <div>
          <a href="index.php">
              <img src="../images/de_absolute.png"class="de-absolute"  alt="">
            </a>
          </div>
          <div class="my-auto">
            <a href="profile.php"><img src="../icons/user-solid.svg" width="20px" height="20px" alt=""></a>
            <a href="cart.php"><img src="../icons/cart-shopping-solid.svg" class="mx-2" width="20px" height="20px" alt=""></a>
            <a href="wishlist.php"><img src="../icons/heart-regular.svg" width="20px" height="20px" alt=""></a>

          </div>
        </div>

          <!-- navbar start -->

          <nav class="navbar navbar-expand-lg" id="navbar">
              <div class="container-fluid">
                <a class="navbar-brand" href="index.php" id="logo"><img src="../images/emmapeelogo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span><i class="fa-solid fa-bars" style="color: black; font-size: 23px;"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="category.php">Categories</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="my-orders.php">Orders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                    </li>
                  </ul>
                  <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </nav>

          <!-- navbar end -->
        </div>

        <div class="py-3" style="background-color: #b2744c">
                    <div class="container ">
                                <h6 class="text-white"> 
                            <a class="text-white" href="index.php">Home</a> 
                            <a class="text-white" href="">/ Profile </a> 
                        </h6>
                    </div>
                </div>

                <section id="interface">
        <div class="navigation">

        <h3 class="i-name">Profile</h3>


        <div class="board">
        <h4>Change Email</h4>

        <div class="form">
            <form action="#" method="post">
            <label>Firstname: </label><input type="text" class="email1" name="firstname" 
                    value="<?php echo "{$info['firstname']}"; ?>"><br><br>
                    
                    <label>Lastname: </label><input type="text" class="email1" name="lastname" 
                    value="<?php echo "{$info['lastname']}"; ?>"><br><br>

                    <label>Email: </label><input type="email" class="email1" name="email" 
                    value="<?php echo "{$info['email']}"; ?>"><br><br>

                    <label>Phone no.: </label><input type="text" class="email1" name="phone" 
                    value="<?php echo "{$info['phone']}"; ?>"><br>

                    <div class="text-center">
                        <input type="submit" name="update_info" class="email1 bg-black text-white" value="Update" class="brown">
                    </div>
                </form>
        </div>

    
        <div class="form">
            <h4>Change Password</h4>
            <form action="#" method="post">
            <input type="password" class="email1" placeholder="Enter old password" name="oldpassword" ><br><br>
            <input type="password" class="email1" placeholder="Enter new password" name="newpassword" ><br><br>
            <input type="password" class="email1" placeholder="Confirm new password" name="confirmpassword" ><br><br>
            
            <div class="text-center">
                <input type="submit" name="change_pass" value="Update" class="email1 brown bg-black text-white">
            </div>

            </form>
        </div>
                
        </div>

    </section>

        
             
            <div class="icon-boxes-container" style="background: rgb(239, 235, 235);">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side d-flex">
                                            <span class="icon-box-icon text-dark mx-2">
                                                <img src="../icons/plane-solid.svg" width="40px" height="40px" alt="">
                                            </span>
                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                                <p>Orders ₦50 or more</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side d-flex">
                                            <span class="icon-box-icon text-dark mx-2">
                                                <img src="../icons/arrow-turn-up-solid.svg" width="40px" height="40px" alt="">
                                            </span>

                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                                <p>Within 30 days</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side d-flex">
                                            <span class="icon-box-icon text-dark mx-2">
                                                <img src="../icons/circle-info-solid.svg" width="40px" height="40px" alt="">
                                            </span>

                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                                <p>When you sign up</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side d-flex">
                                            <span class="icon-box-icon text-dark mx-2">
                                                <img src="../icons/phone-solid.svg" width="40px" height="40px" alt="">
                                            </span>

                                            <div class="icon-box-content">
                                                <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                                <p>24/7 amazing services</p>
                                            </div><!-- End .icon-box-content -->
                                        </div><!-- End .icon-box -->
                                    </div><!-- End .col-sm-6 col-lg-3 -->
                                </div><!-- End .row -->
                            </div><!-- End .container-fluid -->
                        </div><!-- End .icon-boxes-container -->

        <?php
        include 'includes/footer.php';
        ?>

        <a href="#" class="arrow"><i><img src="./images/up-arrow.png" alt="" width="50px"></i></a>

    </div>
    <?php
    include 'FAbutton/index.php';
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script src="js/main.js"></script>

</body>
</html>
