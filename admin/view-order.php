<?php

session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

include 'includes/header.php'; 
require_once '../functions/myfunctions.php';

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNo($tracking_no);

    if (mysqli_num_rows($orderData) < 0) {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    } else {
        $data = mysqli_fetch_array($orderData);
    }
} else {
    ?>
    <h4>Something went wrong</h4>
    <?php
    die();
}
?>

        <div class="container">
            <div class="card card-body shadow">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="order.php" class="btn btn-primary float-end">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Delivery Details</h4>
                                        <hr style="border: 1px solid black;">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Name</label>
                                                <div class="border p-1">
                                                    <?= $data['name']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Email</label>
                                                <div class="border p-1">
                                                    <?= $data['email']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Phone</label>
                                                <div class="border p-1">
                                                    <?= $data['phone']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Tracking No</label>
                                                <div class="border p-1">
                                                    <?= $data['tracking_no']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Address</label>
                                                <div class="border p-1">
                                                    <?= $data['address']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="fw-bold">Zip Code</label>
                                                <div class="border p-1">
                                                    <?= $data['pincode']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Order Details</h4>
                                        <hr style="border: 1px solid black;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 

                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, 
                                            products p WHERE oi.order_id=o.id AND p.id=oi.prod_id 
                                            AND o.tracking_no='$tracking_no' ";
                                            $order_query_run = mysqli_query($conn, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach($order_query_run as $item) {
                                                    ?>    
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="../uploads/<?= $item['image']; ?>" width="100vmin" height="100vmin" alt="<?= $item['name']; ?>">
                                                        <?= $item['name']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                    N<?= $item['selling_price']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                    x<?= $item['orderqty']; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <hr style="border: 1px solid black;">
                                        <h5>Total Price: <span class="float-end fw-bold">N<?= $data['total_price']; ?></span></h5>
                                        <hr style="border: 1px solid black;">
                                        <div class="border p-1 mb-3">
                                            <label class="fw-bold">Payment Mode:</label>
                                            <?= $data['payment_mode']; ?>
                                        </div>
                                        <div class="border p-1 mb-3">
                                            <label class="fw-bold">Status:</label>
                                            <form action="script.php" method="post">
                                                <input type="hidden" name="tracking_no" value="<?= $data['tracking_no']; ?>">
                                                <select name="order_status" id="" class="form-select">
                                                    <option value="0" <?= $data['status'] == 0 ? "selected":"" ?>>Processing</option>
                                                    <option value="1" <?= $data['status'] == 1 ? "selected":"" ?>>Completed</option>
                                                    <option value="2" <?= $data['status'] == 2 ? "selected":"" ?>>Cancelled</option>
                                                </select>
                                                <button type="submit" name="update_order_btn" class="btn btn-primary float-end">Update Status</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>