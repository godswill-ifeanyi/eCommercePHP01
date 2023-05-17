<?php

session_start();
error_reporting(0); 
require_once '../config/dbcon.php';

    if (isset($_SESSION['auth'])) {

        if (isset($_POST['placeOrderBtn'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
            $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

            if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
                echo '
                <script>
                alert("Empty fields");
                window.location.href="checkout.php";
                </script>';
                exit(0);
            }
            
            $user_id = $_SESSION['auth_user']['user_id'];
            $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
            FROM carts c, products p WHERE c.prod_id=p.id AND user_id='$user_id' ORDER BY c.id DESC";
            $query_run = mysqli_query($conn, $query);

                    $totalPrice = 0;
                    foreach($query_run as $item) {
                    $totalPrice += $item['selling_price'] * $item['prod_qty'];
                }
                
                $tracking_no = "trkid".rand(1111,9999).substr($phone,2);
                $query2 = "INSERT INTO orders (tracking_no,user_id,name,email,phone,address,pincode,
                total_price,payment_mode,payment_id) VALUES ('$tracking_no','$user_id','$name','$email',
                '$phone','$address','$pincode','$totalPrice','$payment_mode','$payment_id')";
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

                echo '
                <script>
                alert("Order Placed Successfully");
                window.location.href="my-orders.php";
                </script>';
                die();
            }
        } else {
            echo '
            <script>
            alert("Something went wrong");
            window.location.href="checkout.php";
            </script>';
        }

        
        if (isset($_POST['onlinePayBtn'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode2']);
            $payment_id = "pyid".rand(1111,9999);
            $tracking_no = "trkid".rand(1111,9999).substr($phone,2);

            $user_id = $_SESSION['auth_user']['user_id'];
            $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
            FROM carts c, products p WHERE c.prod_id=p.id AND user_id='$user_id' ORDER BY c.id DESC";
            $query_run = mysqli_query($conn, $query);

            $totalPrice = 0;
                    foreach($query_run as $item) {
                    $totalPrice += $item['selling_price'] * $item['prod_qty'];
                }

            $request = [
                'tx_ref' => $tracking_no,
                'amount' => $totalPrice,
                'currency' => 'NGN',
                'payment_options' =>'card',
                'redirect_url' => 'https://emmapeemusical.com/user/process.php',
                'customer' => [
                    'email' => $email,
                    'phonenumber' => $phone,
                    'name' => $name
                ],
                'meta' => [
                    'pincode' => $pincode,
                    'price' => $totalPrice,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'tracking_no' => $tracking_no,
                    'user_id' => $user_id,
                    'address' => $address,
                    'payment_mode' => $payment_mode,
                    'payment_id' => $payment_id,
                ],
                'customizations' => [
                    'title' => 'Emmapee Musical Emperium',
                    'description' => 'Online payment for goods and services'
                ]
            ];

        // Call Flutterwave endpoint

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK-f7bae09b7d63f64c94f670d489d89112-188292c609avt-X',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response);
        if ($res->status == "success") {
            $link = $res->data->link;
            header('Location: '.$link);
        } else {
            echo "We can not process your payment";
        }

        }
    

    } else {
        header('Location: ../login.php');
    }

?>