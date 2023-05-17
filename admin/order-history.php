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
                                <h4>Orders <span style="font-size: 14px;">(Completed/Cancelled)</h4>
                                <a href="order.php" class="btn btn-primary float-end">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card card-body shadow">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Tracking No</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $orders = getOrderHistory();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach($orders as $item) {
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <td><?= $item['tracking_no']; ?></td>
                                        <td>N<?= $item['total_price']; ?></td>
                                        <td><?= $item['created_at']; ?></td>
                                        <td>
                                            <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">Order Details</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                    <tr>
                                        <td colspan="5">No Order Yet!</td>
                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>