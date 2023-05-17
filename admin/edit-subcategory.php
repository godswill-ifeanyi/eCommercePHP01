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
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $subcategory = getByID("subcategories", $id);

                    if (mysqli_num_rows($subcategory) > 0) {
                        $data = mysqli_fetch_array($subcategory);
            ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit Sub Category</h4>
                <a href="subcategory.php" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="subcategory_id"  value="<?= $data['id']; ?>">
                        <label>Sub Category</label>
                        <input type="text" name="name" required value="<?= $data['name']; ?>" placeholder="Enter Category" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Category</label>
                        <input type="text" name="slug" required value="<?= $data['category_name']; ?>" placeholder="Enter Slug" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea rows="3" name="description" required placeholder="Enter Description" class="form-control"><?= $data['description']; ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="form-control"><br>
                        <label>Current Image</label>
                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                        <img src="../uploads/<?= $data['image']; ?>" width="50px" height="50px" alt="">
                    </div>
                    <div class="col-md-6">
                        <label>Status</label>
                        <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="update_subcategory_btn">Update</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
        <?php
                    } else {
                        echo "Sub Category not found";
                    }
                 } else {
                echo 'Url missing';
            }
        ?>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>