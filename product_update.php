<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}

 if(isset($_POST['update_product'])){
 
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_author = $_POST['update_author'];
    $update_price = $_POST['update_price'];
 
    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price', author = '$update_author' WHERE id = '$update_p_id'") or die('query failed');
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/'.$update_image;
    $update_old_image = $_POST['update_old_image'];
 
    if(!empty($update_image)){
       if($update_image_size > 2000000){
          $message[] = 'image file size is too large';
       }else{
          mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
          move_uploaded_file($update_image_tmp_name, $update_folder);
          unlink('uploaded_img/'.$update_old_image);
       }
    }
 
    header('location:admin_products.php');
 
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
            
            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-center">Update Book</h1>
            </div>

            <?php   
                include("admin/messages.php");
            ?>

            <div class="row mt-5">
             
            <?php
                if(isset($_GET['update'])){
                    $update_id = $_GET['update'];
                    $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
                    if(mysqli_num_rows($update_query) > 0){
                        while($fetch_update = mysqli_fetch_assoc($update_query)){
            ?>

                    <center>
                    <form method="POST" enctype="multipart/form-data" style="max-width:500px">

                        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">

                        <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">


                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-control">
                                <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="" width="100px">
                                <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Book Name"  name="update_name" value="<?php echo $fetch_update['name']; ?>" required>
                                    <label for="name">Book Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="author" placeholder="Author Name"  name="update_author" value="<?php echo $fetch_update['author']; ?>" required>
                                    <label for="author">Author Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="price" placeholder="Price"  name="update_price" value="<?php echo $fetch_update['price']; ?>" required>
                                    <label for="price">Price</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="update_product" type="submit">Update Book</button>
                            </div>
                        </div>
                        </form>
                    </center>
            <?php
                    }
                }
                }else{
                    echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
                }
            ?>
            
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