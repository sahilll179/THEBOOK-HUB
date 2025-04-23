<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_messages.php');
 }


?>
<?php
include "admin/header.php";
?>

<div class="main">
<?php
include "admin/navbar.php";
?>


<!-- Admin Products Start -->

<div class="container-xxl py-5" style="height:90vh;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 text-center px-3">MESSAGES</h1>
            </div>

            <?php   
                include("admin/messages.php");
            ?>

        <div class="cards">
        <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
        ?>
            <div class="card shadow" style="width: 18rem;">
                
                <div class="card-body">
                    <h2 class="card-title text-capitalize"><?php echo $fetch_message['name']; ?></h2>
                    <p><b>Email :-</b> <?php echo $fetch_message['email']; ?><br>
                    <span><b>Phone No. :-</b><?php echo $fetch_message['number']; ?></span></p>
                    <p class="card-text"><b>Message :-</b><?php echo $fetch_message['message']; ?></p>
                    
                    <a href="admin_messages.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="btn text-center btn-danger w-100">Delete</a>
                </div>
            </div>
            <?php
      };
   }else{
      echo '<p class="text-center">You have no messages!</p>';
   }
   ?>

        </div>
            
        </div>
    </div>



<!-- Admin Products End -->



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