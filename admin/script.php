<?php
session_start();
require_once '../config/dbcon.php';

if (isset($_POST['add_category_btn'])) {

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories (name,slug,description,status,popular,image)
    VALUES ('$name','$slug','$description','$status','$popular','$filename')";

    $cate_query_run = mysqli_query($conn, $cate_query);
    

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo '
        <script>
        alert("Added Successfully");
        window.location.href="add-category.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="add-category.php";
        </script>';
    }
}
elseif (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        # $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        $update_filename = time().'.'.$image_ext;

    } else {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE categories SET name='$name', slug='$slug',
    description='$description', status='$status', popular='$popular', image='$update_filename'
    WHERE id = '$category_id' ";

    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);

            if (file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        echo '
        <script>
        alert("Updated Successfully");
        window.location.href="category.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="edit-category.php";
        </script>';
    }
}
elseif (isset($_POST['delete_category_btn'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);    

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";

    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        
        echo '
        <script>
        alert("Category delete is successful");
        window.location.href="category.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="category.php";
        </script>';
    }


}
elseif (isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['subcategory_id'];
    $name = $_POST['name'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$image_ext;

    $product_query = "INSERT INTO products (category_id,name,sub_category_id,original_price,selling_price,qty,
    small_description,description,status,trending,image)
    VALUES ('$category_id','$name','$sub_category_id','$original_price','$selling_price','$qty','$small_description',
    '$description','$status','$trending','$filename') ";

    $product_query_run = mysqli_query($conn, $product_query);

    if ($product_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo '
        <script>
        alert("Added Successfully");
        window.location.href="add-product.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="add-product.php";
        </script>';
    }
}
elseif (isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $name = $_POST['name'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        # $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        $update_filename = time().'.'.$image_ext;

    } else {
        $update_filename = $old_image;
    }
    $update_product_query = "UPDATE products SET name='$name',category_id='$category_id',
    sub_category_id='$sub_category_id',qty='$qty',image='$update_filename',original_price='$original_price',
    selling_price='$selling_price',small_description='$small_description',status='$status',trending='$trending' 
    WHERE id = '$product_id' ";

    $update_product_query_run = mysqli_query($conn, $update_product_query);

    if ($update_product_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);

            if (file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        echo '
        <script>
        alert("Updated Successfully");
        window.location.href="product.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="edit-product.php";
        </script>';
    }
}
elseif (isset($_POST['delete_product_btn'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);    

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";

    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        
        echo '
        <script>
        alert("Product delete is successful");
        window.location.href="product.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="product.php";
        </script>';
    }

}
elseif (isset($_POST['add_subcategory_btn'])) {

    $name = $_POST['name'];
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$image_ext;

    $subcate_query = "INSERT INTO subcategories (name,category_name,description,status,image)
    VALUES ('$name','$category_name','$description','$status','$filename')";

    $subcate_query_run = mysqli_query($conn, $subcate_query);
    

    if ($subcate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo '
        <script>
        alert("Added Successfully");
        window.location.href="add-subcategory.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="add-subcategory.php";
        </script>';
    }
}
elseif (isset($_POST['update_subcategory_btn'])) {
    $category_name = $_POST['category_name'];
    $subcategory_id = $_POST['subcategory_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        # $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        $update_filename = time().'.'.$image_ext;

    } else {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE subcategories SET name='$name',description='$description', 
    status='$status', image='$update_filename'
    WHERE id = '$subcategory_id' ";

    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);

            if (file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        echo '
        <script>
        alert("Updated Successfully");
        window.location.href="subcategory.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="edit-subcategory.php";
        </script>';
    }
}
elseif (isset($_POST['delete_subcategory_btn'])) {
    $subcategory_id = mysqli_real_escape_string($conn, $_POST['subcategory_id']);    

    $subcategory_query = "SELECT * FROM subcategories WHERE id='$subcategory_id'";
    $subcategory_query_run = mysqli_query($conn, $subcategory_query);
    $subcategory_data = mysqli_fetch_array($subcategory_query_run);
    $image = $subcategory_data['image'];

    $delete_query = "DELETE FROM subcategories WHERE id='$subcategory_id' ";

    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        
        echo '
        <script>
        alert("Sub Category delete is successful");
        window.location.href="subcategory.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="subcategory.php";
        </script>';
    }


}
elseif (isset($_POST['update_order_btn'])){
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no' ";
    $updateOrder_query_run = mysqli_query($conn,$updateOrder_query);

    echo '
        <script>
        alert("Order Update is Successful");
        window.location.href="order.php";
        </script>';
}
elseif (isset($_POST['add_specialoffer_btn'])) {
    
    $name = $_POST['name'];
    $selling_price = $_POST['selling_price'];
    $original_price = $_POST['original_price'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $qty = $_POST['qty'];
    $special_offer = $_POST['special_offer'];
    
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$image_ext;

    $specialoffer_query = "INSERT INTO products (name,selling_price,original_price,small_description,description,qty,special_offer,image) 
    VALUES ('$name','$selling_price','$original_price','$small_description','$description','$qty','$special_offer','$filename') ";

    $specialoffer_query_run = mysqli_query($conn, $specialoffer_query);

    if ($specialoffer_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo '
        <script>
        alert("Added Successfully");
        window.location.href="add-special-offer.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="add-special-offer.php";
        </script>';
    }
}
elseif (isset($_POST['update_specialoffer_btn'])) {
    $specialoffer_id = $_POST['special_offer'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        # $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);

        $update_filename = time().'.'.$image_ext;

    } else {
        $update_filename = $old_image;
    }
    $update_specialoffer_query = "UPDATE special_offer SET name='$name',qty='$qty',price='$price',image='$update_filename' WHERE id = '$specialoffer_id' ";

    $update_specialoffer_query_run = mysqli_query($conn, $update_specialoffer_query);

    if ($update_specialoffer_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);

            if (file_exists("../uploads/".$old_image)) {
                unlink("../uploads/".$old_image);
            }
        }
        echo '
        <script>
        alert("Updated Successfully");
        window.location.href="special-offer.php";
        </script>';
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="edit-special-offer.php";
        </script>';
    }
}
elseif (isset($_POST['delete_specialoffer_btn'])) {
    $specialoffer_id = mysqli_real_escape_string($conn, $_POST['product_id']);    

    $specialoffer_query = "SELECT * FROM special_offer WHERE id='$specialoffer_id'";
    $specialoffer_query_run = mysqli_query($conn, $specialoffer_query);
    $specialoffer_data = mysqli_fetch_array($specialoffer_query_run);
    $image = $specialoffer_data['image'];

    $delete_query = "DELETE FROM special_offer WHERE id='$specialoffer_id' ";

    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        
        echo '
        <script>
        alert("Special Offer delete is successful");
        window.location.href="special-offer.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="special-offer.php";
        </script>';
    }


}
elseif (isset($_POST['add_gallery_btn'])) {
    
    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time().'.'.$image_ext;

    $gallery_query = "INSERT INTO gallery (image) VALUES ('$filename') ";

    $gallery_query_run = mysqli_query($conn, $gallery_query);

    if ($gallery_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        echo '
        <script>
        alert("Added Successfully");
        window.location.href="add-gallery.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="add-gallery.php";
        </script>';
    }
}
elseif (isset($_POST['delete_gallery_btn'])) {
    $gallery_id = mysqli_real_escape_string($conn, $_POST['gallery_id']);    

    $gallery_query = "SELECT * FROM gallery WHERE id='$gallery_id'";
    $gallery_query_run = mysqli_query($conn, $gallery_query);
    $gallery_data = mysqli_fetch_array($gallery_query_run);
    $image = $gallery_data['image'];

    $delete_query = "DELETE FROM gallery WHERE id='$gallery_id' ";

    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
        }
        
        echo '
        <script>
        alert("Gallery delete is successful");
        window.location.href="gallery.php";
        </script>';
        
    } else {
        echo '
        <script>
        alert("SQL Error");
        window.location.href="gallery.php";
        </script>';
    }


}
else {
    header('Location:../index.php');
}

$subcate_query = "INSERT INTO subcategories (category_name,sub_category1,sub_category2,sub_category3,sub_category4,sub_category5,sub_category6) 
VALUES ('$name','$sub_category1','$sub_category2','$sub_category3','$sub_category4','$sub_category5','$sub_category6')";
$subcate_query_run = mysqli_query($conn, $subcate_query);
?>