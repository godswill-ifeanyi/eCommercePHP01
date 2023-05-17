<?php

session_start();
error_reporting(0); 
require_once '../config/dbcon.php';

if (isset($_GET['status'])) {
    if($_GET['status'] == 'cancelled') {
        echo '
        <script>
        alert("You cancelled the payment");
        window.location.href="index.php";
        </script>';
    } elseif($_GET['status'] == 'successful') {

        $txid = $_GET['transaction_id'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/transactions/'.$txid.'/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
              'Authorization: Bearer FLWSECK-f7bae09b7d63f64c94f670d489d89112-188292c609avt-X',
              'Content-Type: application/json'
            ),
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);

          $res = json_decode($response);
          if ($res->status == 'success') {
            $amountPaid = $res->data->charged_amount;
            $amountToPay = $res->data->meta->price;
            $tracking_no = $res->data->meta->tracking_no;
            $user_id = $res->data->meta->user_id;
            $name = $res->data->meta->name;
            $email = $res->data->meta->email;
            $phone = $res->data->meta->phone;
            $address = $res->data->meta->address;
            $pincode = $res->data->meta->pincode;
            $payment_mode = $res->data->meta->payment_mode;
            $payment_id = $res->data->meta->payment_id;

            $query2 = "INSERT INTO orders (tracking_no,user_id,name,email,phone,address,pincode,
            total_price,payment_mode,payment_id) VALUES ('$tracking_no','$user_id','$name','$email',
            '$phone','$address','$pincode','$amountToPay','$payment_mode','$payment_id')";
            $query2_run = mysqli_query($conn, $query2);

            if ($query2_run) {
                $order_id = mysqli_insert_id($conn);
                foreach($query_run as $item) {
                    $prod_id = $item['prod_id'];
                    $prod_qty = $item['prod_qty'];
                    $selling_price = $item['selling_price'];
                    $query3 = "INSERT INTO order_items (order_id,prod_id,qty,price) 
                    VALUES ('$order_id','$prod_id','$prod_qty','$price')";
                    $query3_run = mysqli_query($conn,$query3);

                    $product_query = "SELECT * FROM products WHERE id='$prod_id' LIMIT 1 ";
                    $product_query_run = mysqli_query($conn, $product_query);
                    $product_data = mysqli_fetch_array($product_query_run);
                    $current_qty = $product_data['qty'];

                    $new_qty = $current_qty - $prod_qty;

                    $update_qty = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id' ";
                    $update_qty_run = mysqli_query($conn,$update_qty);
            }
            $delete_cart_query = "DELETE FROM carts WHERE user_id='$user_id' ";
            $delete_cart_query_run = mysqli_query($conn, $delete_cart_query);

            if ($amountPaid >= $amountToPay) {
                echo '
                <script>
                alert("Payment Successful");
                window.location.href="my-orders.php";
                </script>';
                
            } else {
                echo '
                <script>
                alert("Incomplete Payment Detected");
                window.location.href="index.php";
                </script>';
            }
          } else {
            echo '
                <script>
                alert("Cannot Process Payment");
                window.location.href="index.php";
                </script>';
          }
    }
}
}
?>