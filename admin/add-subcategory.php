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
                <h4>Add Sub Category</h4>
                <a href="add-category.php" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" required placeholder="Enter Sub Category" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Select Category</label>
                            <select name="category_name" required class="form-select">
                            <option selected>Select Category</option>
                                <?php
                                    $categories = getAll("categories");
                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach($categories as $item) {
                                            ?>
                                                <option value="<?= $item['name']; ?>"><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }
                                    
                                ?>
                            </select> 
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Upload Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_subcategory_btn">Save</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>