<?php
session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'user') {
    header("location:../login.php"); 
} 


require_once '../functions/userfunctions.php';
require_once 'authenticate.php';

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNo($tracking_no);

    if (mysqli_num_rows($orderData) < 0) {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    } else {
        $data = mysqli_fetch_array($orderData);
    }
} else {
    ?>
    <h4>Something went wrong</h4>
    <?php
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details | Emmmapee Musicals</title>

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
            <a class="text-white" href="my-orders.php">/ My Orders</a>
            <a class="text-white" href="">/ Order Details</a>  
        </h6>
    </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="card card-body shadow">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                View Order
                                <a href="my-orders.php" class="btn text-white float-end" style="background-color: #b2744c">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Delivery Details</h4>
                                        <hr style="border: 1px solid black;">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Name</label>
                                                <div class="border p-1">
                                                    <?= $data['name']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Email</label>
                                                <div class="border p-1">
                                                    <?= $data['email']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Phone</label>
                                                <div class="border p-1">
                                                    <?= $data['phone']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Tracking No</label>
                                                <div class="border p-1">
                                                    <?= $data['tracking_no']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Address</label>
                                                <div class="border p-1">
                                                    <?= $data['address']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Zip Code</label>
                                                <div class="border p-1">
                                                    <?= $data['pincode']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Order Details</h4>
                                        <hr style="border: 1px solid black;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $user_id = $_SESSION['auth_user']['user_id'];

                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, 
                                            products p WHERE o.user_id='$user_id' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                            AND o.tracking_no='$tracking_no' ";
                                            $order_query_run = mysqli_query($conn, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach($order_query_run as $item) {
                                                    ?>    
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="../uploads/<?= $item['image']; ?>" width="100vmin" height="100vmin" alt="<?= $item['name']; ?>">
                                                        <?= $item['name']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                    N<?= $item['selling_price']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                    x<?= $item['orderqty']; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <hr style="border: 1px solid black;">
                                        <h5>Total Price: <span class="float-end fw-bold">N<?= $data['total_price']; ?></span></h5>
                                        <hr style="border: 1px solid black;">
                                        <div class="border p-1 mb-3">
                                            <label class="fw-bold">Payment Mode:</label>
                                            <?= $data['payment_mode']; ?>
                                        </div>
                                        <div class="border p-1 mb-3">
                                            <label class="fw-bold">Status:</label>
                                            <?php 
                                            if ($data['status'] == 0) {
                                                echo "Processing";
                                            } elseif ($data['status'] == 1) {
                                                echo "Completed";
                                            } elseif ($data['status'] == 2) {
                                                echo "Cancelled";
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
    <script src="js/custom.js"></script>
</body>
</html>