<?php
session_start();

require_once './functions/frontfunctions.php';

if (isset($_GET['product'])){
    $product_id = $_GET['product'];
    $product_data = getSlugActive("products", $product_id);
    $product= mysqli_fetch_array($product_data);

    if ($product){
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View | Emmmapee Musicals</title>

    <meta name="title" content="Musical Equipments, Guitar, Piano and Keyboard,
    Pa Systems, Online Drums and Band,">
    <meta name="description" content="Emmapee Musical Emperium">
    <meta name="keywords" content="Emmapee Musical Emperium, Mile One, Diobu, 
    Musical Equipment, Music Instrument, Best Music Equipment Port Harcourt,
    Best Music Instrument in Port Harcourt, Music Instrument Shop Centre Near Me, 
    Music Equipment Shop Near Me">

    <link href="./images/apple-touch-icon.png" rel="icon">

    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
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

    <?php
    include './FAbutton/index.php';
    ?>
    <a href="#" class="arrow"><i><img src="./images/up-arrow.png" style="z-index: -999;" alt="" width="50px"></i></a>

      <div class="sticky-top">
        <div class="top-div px-5 py-2">
          <div>
          <a href="index.php">
              <img src="./images/de_absolute.png"class="de-absolute"  alt="">
            </a>
          </div>
          <div class="my-auto">
          <a href="profile.php"><img src="./icons/user-solid.svg" width="20px" height="20px" alt=""></a>
            <a href="cart.php"><img src="./icons/cart-shopping-solid.svg" class="mx-2" width="20px" height="20px" alt=""></a>
            <a href="wishlist.php"><img src="./icons/heart-regular.svg" width="20px" height="20px" alt=""></a>

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

                <div class="py-3" style="background-color: #b2744c">
                    <div class="container ">
                                <h6 class="text-white"> 
                            <a class="text-white" href="index.php">Home</a> 
                            <a class="text-white" href="category.php">/ Categories / </a> 
                            <?= $product['name']; ?> 
                        </h6>
                    </div>
                </div>

                <div class="bg-light py-4">

                    <div class="container product_data mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="m-4" style="box-shadow: 3px 3px 10px gray">
                                    <img src="./uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 class="fw-bold"><?= $product['name']; ?>
                                <span class="float-end text-danger"><?php if ($product['trending']) { echo "Trending";} ?></span>
                                </h4>
                                <hr style="border: 1px solid black">
                                <p><?= $product['small_description']; ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class=" fs-3"><span style="color: green;font-weight: bold">&#8358;</span><span class="text-black"><?= $product['selling_price']; ?></span></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><span style="color: green;font-weight: bold">&#8358;</span><s class="text-danger"><?= $product['original_price']; ?></s></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3" style="width: 130px">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="text" class="form-control bg-white qty-input text-center" disabled value="1">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <button class="btn text-white addToCartBtn px-4" onclick="window.location.href='cart.php'" style="background-color: #b2744c"  value="<?= $product['id']; ?>"><img src="./icons/cart-shopping-solid1.svg" width="20px">Add to Cart</button>
                                    </div>
                                    <div class="col-md-6">
                                    <button class="btn btn-danger px-4" onclick="window.location.href='wishlist.php?id=<?= $product['id']; ?>'"><img src="./icons/heart-regular1.svg" width="20px">Add to Wishlist</a></button>
                                    </div>
                                </div>
                                <hr style="border: 1px solid black">
                                <h6>Product Description</h6>
                                <p><?= $product['description']; ?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <?php

            } else {
                echo '
            <script>
            alert("Something went wrong");
            window.location.href="category.php";
            </script>';
            }

            } else {
                echo '
                <script>
                alert("Something went wrong");
                window.location.href="category.php";
                </script>';
                }
            ?>

    <?php
        include './includes/footer1.php';
        ?>

        <a href="#" class="arrow"><i><img src="./images/up-arrow.png" alt="" width="50px"></i></a>

    </div>
    <?php
    include 'FAbutton/index.php';
    ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>

            
        </body>
        </html>