<?php

session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

include 'includes/header.php'; 
require_once '../functions/myfunctions.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $special_offer = getByID("special_offer",$id);

                if (mysqli_num_rows($special_offer) > 0) {
                    $data = mysqli_fetch_array($special_offer);
                    ?>
            
        <div class="card">
            <div class="card-header">
                <h4>Edit Special Offer</h4>
                <a href="special-offer.php" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="specialoffer_id" value="<?= $data['id']; ?>">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $data['name']; ?>" required placeholder="Enter Product Name" class="form-control">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label>Price</label>
                        <input type="text" name="price" value="<?= $data['price']; ?>" required placeholder="Enter Original Price" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Quantity</label>
                        <input type="number" name="qty" value="<?= $data['qty']; ?>" required placeholder="Enter Quantity" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Upload Image</label>
                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                        <input type="file" name="image" class="form-control"><br>
                        <label>Current Image</label>
                        <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="update_specialoffer_btn">Update</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
                
        <?php
                } else {
                    echo "Product not found for given Id";
                }
            } else {
                echo "Id missing from URL";
            }
            ?>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>