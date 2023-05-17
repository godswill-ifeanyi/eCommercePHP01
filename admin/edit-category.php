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
                    $category = getByID("categories", $id);

                    if (mysqli_num_rows($category) > 0) {
                        $data = mysqli_fetch_array($category);
            ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
                <a href="category.php" class="btn btn-primary float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="script.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="category_id"  value="<?= $data['id']; ?>">
                        <label>Name</label>
                        <input type="text" name="name" required value="<?= $data['name']; ?>" placeholder="Enter Category" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label></label>
                        <input type="hidden" name="slug" required value="<?= $data['slug']; ?>" placeholder="Enter Slug" class="form-control">
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
                    <div class="col-md-6">
                        <label>Popular</label>
                        <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                    </div>
                </div>
                </form>
            </div>
          </div>
        </div>
        <?php
                    } else {
                        echo "Category not found";
                    }
                 } else {
                echo 'Url missing';
            }
        ?>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>