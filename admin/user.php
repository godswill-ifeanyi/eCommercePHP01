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
        <h3 class="i-name">Users</h3>

        <div class="board">
            <h3 style="margin: 2vmin;">RECENT USERS</h3>
            <table width="100%">
                <thead>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td></td> 
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM users ORDER BY id DESC LIMIT 20";
                    $result = mysqli_query($conn,$query);
                            while($info=$result->fetch_assoc()) {

            
                        ?>
                    <tr>
                        <td class="people">
                            <img src="../images/male-avater.png" alt="">
                            <div class="people-de">
                            <?php echo "{$info['firstname']}";  ?>
                            <?php echo "{$info['lastname']}";  ?>
                            </div>
                        </td>
                        <td class="people-des">
                        <?php echo "{$info['phone']}";  ?>
                        </td>
                        <td>
                        <?php echo "{$info['email']}";  ?>
                        </td>
                        <td class="edit">
                        <?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this data?')\"
                        href='./delete-user.php?
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