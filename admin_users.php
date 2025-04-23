<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_users.php');
 }
 


?>
<?php
include "admin/header.php";
?>

<div class="main">
<?php
include "admin/navbar.php";
?>


<!-- Admin Users Start -->

<div class="container-xxl py-5" style="height:90vh;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 text-center px-3">USER ACCOUNTS</h1>
            </div>

            <?php   
                include("admin/messages.php");
            ?>

            <div class="row">
             
            <table class="table border">
            <thead>
                <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                while($fetch_users = mysqli_fetch_assoc($select_users)){
            ?>

                <tr>
                <th scope="row" class="py-3"><?php echo $fetch_users['id']; ?></th>

                <td class="py-3"></b><?php echo $fetch_users['name']; ?></td>

                <td class="py-3"><?php echo $fetch_users['email']; ?></td>
                
                <td class="py-3"><?php if($fetch_users['user_type'] == 'admin')?><?php echo $fetch_users['user_type']; ?></td>

                <td class="py-3"><a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" title="Delete" onclick="return confirm('delete this user?');"><i class="fa fa-trash text-danger"></i></a></td>
                </tr>
                <?php
                    };
                ?>


            </tbody>
        </table>
            </div>
            
        </div>
    </div>



<!-- Admin Users End -->



<a href="#" class="theme-toggle">
      <i class="fa-regular fa-moon"></i>
      <i class="fa-regular fa-sun"></i>
   </a>

<?php
include "admin/footer.php";
?>
  
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>