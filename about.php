<?php

require_once './functions/frontfunctions.php';
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
          <img src="images/de_absolute.png"class="de-absolute"  alt="">
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
                <a class="navbar-brand" href="#" id="logo"><img src="./images/emmapeelogo.png" alt=""></a>
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

        <section id="about" class="mb-5">
            <div class="container">
                <div class="heading">About <span>Us</span></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="./images/gallery-1.jpg" alt="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3>Who We Are</h3>
                        <p>De Absolute sound company limited was established in 05-09-2012 with RC - 1261050 and has quickly become one of the Nigeria leading pro-audio and stage lighting equipments dealers in Nigeria.
                        <hr>Emmapeemusical emporium is an importer and exporter of musical instruments, we deal on suppliers of all kind of musical instruments, Electronic Gadgets, Stage lights and Accessories, we also sell in wholesales/retail
                         and also we set up stages and rentals of instruments and lights, we ship world wide.    
                        </p>
                        
                        <button id="about-btn" onclick="window.location.href='about.php'">Emmapee Musical</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end -->

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-6">
                <h3>Our Vision</h3>
                        <p>
                        Is to make Emmapeemusical go global and give great quality instruments that will interest people and encourage active involvement in creating and development of musical ideas using our instruments
                        </p>
                </div>
                <div class="col-md-6">
                <h3>Our Mission</h3>
                        <p>
                        Is to push boundaries & deliver quality and affordable product to our customers worldwide, and to make our company (Emmapeemusical) to expand with our growing product line.
                        </p>
                </div>
            </div>
        </div>
             
            <div class="icon-boxes-container" style="background: rgb(239, 235, 235);">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="icon-box icon-box-side d-flex">
                                            <span class="icon-box-icon text-dark mx-2">
                                                <img src="icons/plane-solid.svg" width="40px" height="40px" alt="">
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
                                                <img src="icons/arrow-turn-up-solid.svg" width="40px" height="40px" alt="">
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
                                                <img src="icons/circle-info-solid.svg" width="40px" height="40px" alt="">
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
                                                <img src="icons/phone-solid.svg" width="40px" height="40px" alt="">
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