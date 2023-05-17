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
                <h4>Add Gallery</h4>
                <a href="gallery.php" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 mb-3">
                        <label>Upload Image</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="add_gallery_btn">Save</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>