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
                    <h4>Special Offer</h4>
                    <a href="product.php" class="btn btn-primary float-end">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Image</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $special_offer = getAllSpecial("products");

                                if (mysqli_num_rows($special_offer) > 0) {
                                    foreach ($special_offer as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $item['name']; ?>
                                            </td>
                                            <td>
                                                N<?= $item['selling_price']; ?>
                                            </td>
                                            <td>
                                                <?= $item['qty']; ?>
                                            </td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?php $item['name']; ?>">
                                            </td>
                                            
                                            <td>
                                                <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="script.php" method="post">
                                                    <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                                <button type="submit" name="delete_product_btn" onclick="return confirm('Are you sure to delete this special offer?')" class="btn btn-sm btn-primary">Delete</button>
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