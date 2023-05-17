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
                    <h4>Gallery</h4>
                    <a href="add-gallery.php" class="btn btn-primary float-end">Add Gallery</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>   
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $gallery = getAll("gallery");

                                if (mysqli_num_rows($gallery) > 0) {
                                    foreach ($gallery as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="200px" height="200px" alt="">
                                            </td>
                                            <td>
                                                <form action="script.php" method="post" >
                                                    <input type="hidden" name="gallery_id" value="<?= $item['id']; ?>">
                                                <button type="submit" name="delete_gallery_btn" onclick="return confirm('Are you sure to delete this gallery?')" class="btn btn-sm btn-primary">Delete</button>
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