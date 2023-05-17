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
                <h4>Add Product</h4>
                <a href="add-special-offer.php" class="btn btn-primary float-end">Add Special Offer</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label>Select Category</label>
                            <select name="category_id" required class="form-select">
                            <option selected>Select Category</option>
                                <?php
                                    $categories = getAll("categories");
                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach($categories as $item) {
                                            ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }
                                    
                                ?>
                            </select> 
                    </div>
                    <div class="col-md-6">
                        <label>Select Sub Category</label>
                            <select name="subcategory_id" required class="form-select">
                            <option selected>Select Sub Category</option>
                                <?php
                                    $subcategories = getAll("subcategories");
                                    if (mysqli_num_rows($subcategories) > 0) {
                                        foreach($subcategories as $item) {
                                            ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }
                                    
                                ?>
                            </select> 
                    </div>
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" required placeholder="Enter Product Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Small Description</label>
                        <textarea rows="3" name="small_description" required placeholder="Enter Small Description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Original Price</label>
                        <input type="text" name="original_price" required placeholder="Enter Original Price" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Selling Price</label>
                        <input type="text" name="selling_price" required placeholder="Enter Selling Price" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Upload Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" name="qty" required placeholder="Enter Quantity" class="form-control">
                        </div>
                    <div class="col-md-3">
                        <label>Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-3">
                        <label>Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>