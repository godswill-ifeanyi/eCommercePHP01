<?php

session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

include 'includes/header.php'; 

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                    <a href="add-subcategory.php" class="btn btn-primary float-end">Add Sub Category</a>
                </div>
                <div class="card-body">
                    <form action="script.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" required placeholder="Enter Category" class="form-control">
                            <input type="hidden" name="slug">
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
                        <div class="col-md-6">
                            <label>Popular</label>
                            <input type="checkbox" name="popular">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>