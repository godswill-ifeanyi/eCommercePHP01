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
                    <h4>Sub Categories</h4>
                    <a href="category.php" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sub Category</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $subcategory = getAll("subcategories");
                                

                                if (mysqli_num_rows($subcategory) > 0) {
                                    foreach ($subcategory as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $item['name']; ?>
                                            </td>
                                            <td>
                                                <?= $item['category_name']; ?>
                                            </td>
                                            <td>
                                            <?= $item['description']; ?>
                                            </td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="100px" height="100px" alt="<?php $item['name']; ?>">
                                            </td>
                                            <td>
                                                <?= $item['status'] == '1' ? "Visible":"Hidden"; ?>
                                            </td>
                                            <td>
                                                <a href="edit-subcategory.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="script.php" method="post">
                                                    <input type="hidden" name="subcategory_id" value="<?= $item['id']; ?>">
                                                    <button type="submit" name="delete_subcategory_btn" onclick="return confirm('Are you sure to delete this sub category')" class="btn btn-sm btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo 'No records found';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'includes/footer.php'; ?>