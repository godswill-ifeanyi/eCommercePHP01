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
        <div class="card">
            <div class="card-header">
                <h4>Add Special Offer</h4>
                <a href="add-product.php" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="hidden" name="special_offer" value="1">
                        <input type="text" name="name" required placeholder="Enter Product Name" class="form-control">
                    </div>
                    <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" name="qty" required placeholder="Enter Quantity" class="form-control">
                        </div>
                        </div>
                    <div class="row"> 
                    <div class="col-md-6">
                        <label>Discount Price</label>
                        <input type="number" name="selling_price" required placeholder="Enter Discount Price" class="form-control">
                    </div>
                        <div class="col-md-6">
                            <label>Original Price</label>
                            <input type="number" name="original_price" required placeholder="Enter Original Price" class="form-control">
                        </div>
                        <div class="col-md-12">
                        <label>Small Description</label>
                        <textarea rows="3" name="small_description" required placeholder="Enter Small Description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Upload Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_specialoffer_btn">Save</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>