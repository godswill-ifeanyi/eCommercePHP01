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

<style>
  /*trending*/
  .card > .card-body {
    height: 200px;
    margin-bottom: 40px;
  }
</style>
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
                      <a class="nav-link" href="#product">Product</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#gallary">Gallery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="login.php">Sign in/up</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact</a>
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

        <!-- home section start -->
        <section id="home ">
          <div class="container">
            <div class="row">
              <div class="col-md-3" style="box-shadow: 5px 5px 10px black; height: 80vmin;">
              <h3>Categories</h3>
              <?php
                        $categories = getAllActive("categories");

                        if (mysqli_num_rows($categories) > 0) {
                            foreach($categories as $item) {
                                ?>
                <ul>
                  <li><img src="icons/circle-check.svg" width="20px" height="20px" alt="">   
                  <a href="product.php?category=<?= $item['id']; ?>" class="fw-bold text-black text-decoration-none"><?= $item['name']; ?></a></li>
                </ul>
                <?php
                            }
                        } else {
                            echo "No Data Available";
                        }
                    ?>
              </div>
              <div class="col-md-9 mt-3 mb-5" id="slider">
              <div class="content" style="position: relative">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./images/01.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/02.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/03.png" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>  

              <span style="position: absolute; left: 1vmin; bottom: 5vmin;">
              <h3 class="text-white fw-bold">The New Way To Buy <br> Musical Instrument</h3>
                <p class="text-white fw-bold">Drum Set, Guitar Family, LED Lights, <br>PA Sytems, Stage Light, DJ Equipment, etc
                </p>
                <button id="btn">Shop Now</button>
              </span>
    </div>
              </div>
            </div>
          </div>
            
        </section>
        <!-- home section end -->

        <!-- trending product section start -->
        <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="heading2 mb-3">Trending <span>Products</span></h4>
                            <div class="row">
                                <div class="owl-carousel px-5">
                        
                                    <?php
                                        $trendingProducts = getAllTrending();

                                        if (mysqli_num_rows($trendingProducts) > 0) {
                                            foreach ($trendingProducts as $item) {
                                                ?>
                                                <div class="item">
                                                    <a href="product-view.php?product=<?= $item['id']; ?>" class="text-decoration-none">
                                                    <div class="card" style="box-shadow: 5px 5px 10px black">
                                                        <div class="card-body">
                                                            <img src="./uploads/<?= $item['image']; ?>" alt="Product Image" class="h-100 w-100">
                                                            <h6 class="text-center text-black"><?= $item['name']; ?></h6>
                                                        </div>
                                                        
                                                    </div> 
                                                    </a>
                                                    
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <p class="text-center mt-3"><i>Slide</i><img src="images/arrow-right.png" width="40px" height="20px" alt="" /></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- product section end -->

        

                        
        <!-- top card start -->
        <section id="top-cards mt-0">
          <div class="heading2">Popular <span>Categories</span></div>
          <div class="container">
            <div class="row">

            <?php
                  $popularCategories = getAllPopular();

                  if (mysqli_num_rows($popularCategories) > 0) {
                      foreach ($popularCategories as $item) {
                          ?>

              <div class="col-md-4 py-3 py-md-0">
              <a href="product.php?category=<?= $item['id']; ?>" class="text-decoration-none">
                <div class="card">
                  <img src="./uploads/<?= $item['image']; ?>" alt=""><br>
                  <h5 class="text-black text-decoration-none text-center"><?= $item['name']; ?></h5>
                </div>
                
                  <h6 style="color: #b2744c;">Sub Categories</h6>
                <?php
                            $category_name = $item['name'];
                            global $conn;
                            $sql = "SELECT * FROM subcategories WHERE category_name='$category_name' ";
                            $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $item) {
                                        ?>
                
                  <a href="#" class="text-decoration-none"><p><?= $item['name']; ?></p></a>
                
                <?php
                                    }
                                } else {
                                    echo 'No records found';
                                }
                            ?>
                </a>
              </div>
              <?php
                      }
                  } else {
                      echo "No Data Available";
                  }
              ?>

            </div>
          </div>
        </section>
        <!-- top card end -->

        <div class="container for-you my-5" id="product">
                <div class="heading heading-flex mb-3">
                <div class="container">
            <div class="heading3">Products</div>
          </div><!-- End .heading-left -->

                   <div class="heading-right">
                       <!-- <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>-->
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="products">
                    <div class="row justify-content-center">

                    <?php
                        $products = getAllActive("products");

                        if (mysqli_num_rows($products) > 0) {
                            foreach($products as $item) {
                                ?>

                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-2">
                                <figure class="product-media">
                                    
                                    <a href="javascript:;">
                                        <img src="./uploads/<?= $item['image']; ?>"  alt="Product image" class="h-100 w-100 product-image">
                                    </a>

                                    
                               <div class="product-action">
                                    <a href="cart.php" class="btn bg-black"><span class="text-white">Cart</span></a>
                                        
                                    <a href="checkout.php" class="btn bx bi-cash-coin" title="Buy" style="background-color: #b2744c; color: green;"><span style="color: #fff;font-weight: bold;">BUY</span></a><br><br>
                              </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body ">
                                   
                                    <h3 class="product-title fs-6"><?= $item['name']; ?></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price fs-5"><span style="color: green;font-weight: bold">&#8358;</span><?= $item['original_price']; ?></span>
                                        <span class="old-price">was <span style="color: green;font-weight: bold">&#8358;</span><span style='color: red;'><?= $item['selling_price']; ?></span></span></span>
                                    </div><!-- End .product-price -->
                                    
                                    <div class="star text-center">
                                      <i class="fa-regular fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                    </div><!-- End .rating-container -->

                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        <?php
                            }
                        } else {
                            echo "No Data Available";
                        }
                    ?>

                        
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div>

            <div class="container my-5 numbers">
              <h5>Special Offer</h5>
              <hr style="color: brown">
              <div style="width: 200px; height: 30px; background-color: rgb(240, 53, 53); color: white; border-radius: 10px;">
                        Deal of the Week
              </div>
              
              <div class="reminder">
                  <div class="time">
                      <div class="date">
                          <p class="p">6</p>
                          <p>Days</p>
                      </div>
                      <div class="date">
                          <p class="p">23</p>
                          <p>Hours</p>
                      </div>
                      <div class="date">
                          <p class="p">36</p>
                          <p>Minutes</p>
                      </div>
                      <div class="date">
                          <p class="p">58</p>
                          <p>Seconds</p>
                      </div>
                  </div>
              </div>
              
              <div class="row" style="margin-top: 30px;">
              <?php
                $specialOffer = getAllSpecial("products");

                if (mysqli_num_rows($specialOffer) > 0) {
                    foreach($specialOffer as $item) {
                        ?>
          
          <div class="col-md-6 py-3 py-md-0">
            <div class="card " style="position: relative">
              <img src="./uploads/<?= $item['image']; ?>" width="80%" alt="">
              <span style="position: absolute; top: 10px; right: 10px; width: 100px; height: 30px; background-color: rgb(240, 53, 53); color: white; border-radius: 10px;">
                Special Offer
              </span>
            </div>
            <div class="special-offer">
            <h6 style="color: #b2744c;"><?= $item['name']; ?></h6>
            <h6 class="new-price"><span style="color: green;font-weight: bold">&#8358;
          </span><?= $item['selling_price']; ?></h6>
            </div>
            <div style="margin-bottom: 10px;">
              <button onclick="window.location.href='cart.php'" class="btn bg-black text-white">Cart</button>
              <button onclick="window.location.href='checkout.php'" class="btn text-white" style="background-color: #b2744c">Buy</button>
            </div>
          </div>
          <?php
                            }
                        } else {
                            echo "No Data Available";
                        }
                    ?>
         
            
          

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
        

        <!-- our gallary start -->
        <div class="container" id="gallary">
          <div class="heading5"> Our <span>Gallary</span></div>

          <div class="row" style="margin-top: 30px;">
          <?php
          $gallery = getAll("gallery");
          $counter = 0;

          if (mysqli_num_rows($gallery) > 0) {
              foreach($gallery as $item) {
                if ($counter < 6) {
                  ?>
          
            <div class="col-md-4 py-3 py-md-0">
              <div class="card mb-2">
                <img src="./uploads/<?= $item['image']; ?>" alt="">
              </div>
            </div>
            <?php
              $counter++;} else {
             break;}
            }
            }
              ?>

          </div>
        <!-- our gallary end -->


          <!-- about section start -->
          <section id="about">
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
                        <button id="about-btn" onclick="window.location.href='about.php'">Learn More.</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end -->


        <!-- contact start -->
        <section id="contact">
          <div class="container">
            <div class="row">

              <div class="col-md-7">
                <div class="heading6">Contact <span>Us</span></div>
                <p>Send us a Message, an admin will reply as soon as possible...
                </p>
                <form action="includes/request.php" method="post">
                  <input type="text" name="name" class="form-control" placeholder="Name" aria-label="default input example"><br>
                  <input type="email" name="email" class="form-control" placeholder="Email" aria-label="default input example"><br>
                  <input type="number" name="phone" class="form-control" placeholder="Phone" aria-label="default input example"><br>
                  <textarea name="message" cols="35" rows="5" style="border: 1px solid #b2744c;" placeholder="Write short message..."></textarea><br>
                  <button type="submit" name="submit" id="contact-btn">Send Message</button>
                </form>
              </div>

              <div class="col-md-5" id="col">
                <h1>Info</h1>
                <p><img src="icons/email.svg" width="20px" height="20px">  emmapee4real@yahoo.com</p>
                <p><img src="icons/phone.svg" width="20px" height="20px">  +234 8067022284</p>
                <p><img src="icons/location.svg" width="20px" height="20px"></i>  76 EMENIKE STREET, MILE ONE (1) DIOBU, PORT HARCOURT, RIVERS STATE</p>
                <p>We're always here to help! If you have any questions, comments, or concerns, please don't hesitate to get 
                  in touch with us. You can reach us by phone or email. We look forward to hearing from you and will do our best to 
                  assist you in any way we can.</p>
              </div>

            </div>
          </div>
        </section>
        <!-- contact end -->

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