<?php

require_once './functions/frontfunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Emmmapee Musicals</title>

    <meta name="title" content="Musical Equipments, Guitar, Piano and Keyboard,
    Pa Systems, Online Drums and Band,">
    <meta name="description" content="Emmapee Musical Emperium">
    <meta name="keywords" content="Emmapee Musical Emperium, Mile One, Diobu, 
    Musical Equipment, Music Instrument, Best Music Equipment Port Harcourt,
    Best Music Instrument in Port Harcourt, Music Instrument Shop Centre Near Me, 
    Music Equipment Shop Near Me">

    <link href="images/apple-touch-icon.png" rel="icon">

    <link rel="stylesheet" href="css/style.css">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- this is icons link -->
</head>

<body>
    <div class="all-content">

      <div class="sticky-top">
        <div class="top-div px-5 py-2">
          <div>
            <a href="index.php">
              <img src="images/de_absolute.png"class="de-absolute"  alt="">
              </a>
          </div>
          <div class="my-auto">
            <a href="login.php"><img src="icons/user-solid.svg" width="20px" height="20px" alt=""></a>
            <a href="cart.php"><img src="icons/cart-shopping-solid.svg" class="mx-2" width="20px" height="20px" alt=""></a>
            <a href="wishlist.php"><img src="icons/heart-regular.svg" width="20px" height="20px" alt=""></a>

          </div>
        </div>

          <!-- navbar start -->

          <nav class="navbar navbar-expand-lg" id="navbar">
              <div class="container-fluid">
                <a class="navbar-brand" href="index.php" id="logo"><img src="./images/emmapeelogo.png" alt=""></a>
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
                      <a class="nav-link" href="login.php">Sign in/up</a>
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

        <div class="account-page ">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>

                        <form action="includes/loginscript.php" method="post" id="loginForm">
                            <input type="email" placeholder="Email" name="email">
                            <input type="password" placeholder="Password" name="password">
                            <button type="submit" name="submit" class="btn">Login</button>
                            <a href="">Forgot password?</a>
                        </form>

                        <form action="includes/registerscript.php" method="post" id="regForm">
                            <input type="text" placeholder="Firstname" name="firstname">
                            <input type="text" placeholder="Lastname" name="lastname">
                            <input type="email" placeholder="Email" name="email">
                            <input type="number" placeholder="Phone no." name="phone">
                            <input type="password" placeholder="Password" name="password">
                            <input type="password" placeholder="Confirm Password" name="cpassword">
                            <button type="submit" name="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <script>
      var menuItems = document.getElementById("menuitems");

    menuItems.style.maxHeight = "0px";

    function menuToggle() {
        if(menuItems.style.maxHeight == "0px") {
            menuItems.style.maxHeight = "200px";
        } else {
            menuItems.style.maxHeight = "10px";
        }
    }

    </script>

    <script>
      var loginForm = document.getElementById("loginForm");
      var regForm = document.getElementById("regForm");
      var indicator = document.getElementById("indicator");

      function register() {
          regForm.style.transform = "translateX(0px)";
          loginForm.style.transform = "translateX(0px)";
          indicator.style.transform = "translateX(100px)";
      }

      function login() {
          regForm.style.transform = "translateX(300px)";
          loginForm.style.transform = "translateX(300px)";
          indicator.style.transform = "translateX(0px)";
      }
    </script>

</body>
</html>