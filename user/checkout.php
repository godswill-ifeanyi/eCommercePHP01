<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['sessionuser'])) {
  header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'user') {
  header("location:../login.php"); 
} 


require_once '../functions/userfunctions.php';
require_once 'authenticate.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Emmmapee Musicals</title>

    <meta name="title" content="Musical Equipments, Guitar, Piano and Keyboard,
    Pa Systems, Online Drums and Band,">
    <meta name="description" content="Emmapee Musical Emperium">
    <meta name="keywords" content="Emmapee Musical Emperium, Mile One, Diobu, 
    Musical Equipment, Music Instrument, Best Music Equipment Port Harcourt,
    Best Music Instrument in Port Harcourt, Music Instrument Shop Centre Near Me, 
    Music Equipment Shop Near Me">

    <link href="../images/apple-touch-icon.png" rel="icon">

    <link rel="stylesheet" href="../css/style.css">
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
</head>

<body>
    <div class="all-content">
    <?php
    include './FAbutton/index.php';
    ?>
    <a href="#" class="arrow"><i><img src="../images/up-arrow.png" style="z-index: -999;" alt="" width="50px"></i></a>

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
    <div class="container">
        <h6 class="text-white"> 
            <a class="text-white" href="index.php">Home</a> 
            <a class="text-white" href="">/ Checkout</a>  
        </h6>
    </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="card">
            <div class="card-body shadow">
                <form action="placeorder.php" method="post">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr style="border: 1px solid black">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label></label>
                                    <input type="text" name="name" required placeholder="Enter fullname" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label></label>
                                    <input type="email" name="email" required placeholder="Enter email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label></label>
                                    <input type="text" name="phone" required class="form-control" placeholder="Enter phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label></label>
                                    <input type="text" name="pincode" required class="form-control" placeholder="Enter zip code">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea name="address" required placeholder="Enter your address" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr style="border: 1px solid black">
                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <h6>Products</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                            </div> 
                            
                                <?php $items = getCartItems(); 
                                $totalPrice = 0;
                                foreach($items as $item) {
                                    
                                    ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2 mt-2 mb-2">
                                                <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" class="w-50">
                                            </div>
                                            <div class="col-md-5">
                                                <h5><?= $item['name']; ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>N<?= $item['selling_price']; ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <h5>x<?= $item['prod_qty']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $totalPrice += $item['selling_price'] * $item['prod_qty']; 
                                }
                                ?>
                                <hr style="border: 1px solid black">
                                <h4>Total Price: <span class="float-end fw-bold">N<?= $totalPrice ?></span></h4>
                                <div class="">
                                    <input type="hidden" name="payment_mode" value="Cash On Delivery">
                                    <button type="submit" name="placeOrderBtn" class="btn text-white w-100" style="background-color: #b2744c">Place Order | Cash on Delivery</button>
                                </div>
                                <h5>OR</h5>
                                <div class="mt-3">
                            <input type="hidden" name="payment_mode2" value="Online Payment">
                            <button type="submit" name="onlinePayBtn" class="btn text-white w-100" style="background-color: #b2744c">Online Payment with flutterwave</button>
                        </div>
                        </div>
                        
                    </div>
                        
                </form>
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
    <script src="js/custom.js"></script>
</body>
</html>