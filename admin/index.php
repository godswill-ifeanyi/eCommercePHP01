<?php

session_start();

if (!isset($_SESSION['sessionuser'])) {
    header("location:../login.php");
} elseif ($_SESSION['sessionusertype'] != 'admin') {
    header("location:../login.php"); 
} 

include 'includes/header.php'; 
require_once '../config/dbcon.php';

?>

<section id="interface">
        <div class="navigation">
        <h3 class="i-name">Dashboard</h3>

        <div class="values">
            <div class="val-box" onclick="window.location.href='category.php'">
                <img src="assets/icons/table2.svg" alt="" class="icons">
                <div>
                    <h3>Categories</h3>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='product.php'">
                <img src="assets/icons/form2.svg" alt="" class="icons">
                <div>
                    <h3>Products</h3>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='order.php'">
                <img src="assets/icons/blog2.svg" alt="" class="icons">
                <div>
                    <h3>Orders</h3>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='settings.php'">
                <img src="assets/icons/settings2.svg" alt="" class="icons">
                <div>
                    <h3>Settings</h3>
                </div>
            </div>
        </div>

        <div class="board">
            <h3 style="margin: 2vmin;">REQUESTS</h3>
            <table width="100%">
                <thead>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Message</td>
                        <td></td> 
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM requests";
                    $result = mysqli_query($conn,$query);
                            while($info=$result->fetch_assoc()) {

            
                        ?>
                    <tr>
                        <td class="people">
                            <img src="../images/male-avater.png" alt="">
                            <div class="people-de">
                            <?php echo "{$info['name']}";  ?>
                            </div>
                        </td>
                        <td class="people-des">
                        <?php echo "{$info['phone']}";  ?>
                        </td>
                        <td>
                        <?php echo "{$info['email']}";  ?>
                        </td>
                        <td class="role">
                        <?php echo "{$info['message']}";  ?>
                        </td>
                        <td class="edit">
                        <?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this data?')\"
                        href='./delete-request.php?
                        request_id={$info['id']}'>Delete</a>";  ?>
                        </td>
                    </tr>
                    <?php

                            }

                        ?>
                </tbody>
            </table>
        </div>
    </section>


<?php include 'includes/footer.php'; ?>