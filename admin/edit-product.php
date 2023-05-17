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
                $products = getByID("products",$id);

                if (mysqli_num_rows($products) > 0) {
                    $data = mysqli_fetch_array($products);
                    ?>
            
        <div class="card">
            <div class="card-header">
                <h4>Edit Product</h4>
                <a href="product.php" class="btn btn-primary float-end">Back</a>
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
                                                <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?>> <?= $item['name']; ?></option>
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
                            <select name="sub_category_id" required class="form-select">
                            <option selected>Select Sub Category</option>
                                <?php
                                    $subcategories = getAll("subcategories");
                                    if (mysqli_num_rows($subcategories) > 0) {
                                        foreach($subcategories as $item) {
                                            ?>
                                                <option value="<?= $item['id']; ?>" <?= $data['sub_category_id'] == $item['id']?'selected':'' ?>><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }
                                    
                                ?>
                            </select>
                    </div>
                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $data['name']; ?>" required placeholder="Enter Product Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Small Description</label>
                        <textarea rows="3" name="small_description" required placeholder="Enter Small Description" class="form-control"><?= $data['small_description']; ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control"><?= $data['description']; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Original Price</label>
                        <input type="text" name="original_price" value="<?= $data['original_price']; ?>" required placeholder="Enter Original Price" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Selling Price</label>
                        <input type="text" name="selling_price" value="<?= $data['selling_price']; ?>" required placeholder="Enter Selling Price" class="form-control">
                        </div>
                    <div class="col-md-12">
                        <label>Upload Image</label>
                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                        <input type="file" name="image" class="form-control"><br>
                        <label>Current Image</label>
                        <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Quantity</label>
                            <input type="number" name="qty" value="<?= $data['qty']; ?>" required placeholder="Enter Quantity" class="form-control">
                        </div>
                    <div class="col-md-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" <?= $data['status'] ? "checked":"" ?>>
                    </div>
                    <div class="col-md-3">
                        <label>Trending</label>
                        <input type="checkbox" name="trending" <?= $data['trending'] ? "checked":"" ?>>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
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