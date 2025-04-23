<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}

if (isset($_POST['add_product'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $author = $_POST['author'];
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if (mysqli_num_rows($select_product_name) > 0) {
      $message[] = 'product name already added';
   } else {
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, author, price, image) VALUES('$name', '$author', '$price', '$image')") or die('query failed');

      if ($add_product_query) {
         if ($image_size > 2000000) {
            $message[] = 'image size is too large';
         } else {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      } else {
         $message[] = 'product could not be added!';
      }
   }
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/' . $fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if (isset($_POST['update_product'])) {

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/' . $update_image;
   $update_old_image = $_POST['update_old_image'];

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message[] = 'image file size is too large';
      } else {
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/' . $update_old_image);
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

   <div class="container-xxl py-5" style="min-height:90vh;">
      <div class="container">

         <div class="col-12 d-flex justify-content-between wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="">All Books</h1>
            <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#add">
               Add New Book
            </button>
         </div>

         <?php
         include("admin/messages.php");
         ?>

         <div class="row mt-5">

            <table class="table border">
               <thead>
                  <tr>
                     <th scope="col">Sr. No.</th>
                     <th scope="col">Image</th>
                     <th scope="col">Name</th>
                     <th scope="col">Author</th>
                     <th scope="col">Price</th>
                     <th scope="col" colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                  if (mysqli_num_rows($select_products) > 0) {
                     while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                        ?>

                        <tr>
                           <th scope="row" class="py-3">
                              <?php echo $fetch_products['id']; ?>
                           </th>

                           <td class="py-3 "><img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt=""
                                 width="60px"></td>

                           <td class="py-3 ">
                              <?php echo $fetch_products['name']; ?>
                           </td>
                           <td class="py-3">
                              <?php echo $fetch_products['author']; ?>
                           </td>
                           <td class="py-3">₹
                              <?php echo $fetch_products['price']; ?> /-
                           </td>

                           <td class="py-3"><a href="product_update.php?update=<?php echo $fetch_products['id']; ?>"
                                 class="option-btn"><i class="fa fa-edit"></i></a></td>

                           <td class="py-3"><a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>"
                                 class="text-danger" onclick="return confirm('delete this product?');"><i
                                    class="fa fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                     }
                  } else {
                     echo '<p class="empty">no products added yet!</p>';
                  }
                  ?>


               </tbody>
            </table>
         </div>

      </div>
   </div>


   <!-- Modal -->
   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
               <form method="POST" enctype="multipart/form-data">

                  <div class="row g-3">

                     <div class="col-12">
                        <div class="form-control">
                           <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating">
                           <input type="text" class="form-control" id="name" placeholder="Book Name" name="name"
                              required>
                           <label for="name">Book Name</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating">
                           <input type="text" class="form-control" id="author" placeholder="Author Name" name="author"
                              required>
                           <label for="author">Author Name</label>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-floating">
                           <input type="number" class="form-control" id="price" placeholder="Price" name="price"
                              required>
                           <label for="price">Price</label>
                        </div>
                     </div>
                     <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" name="add_product" type="submit">Add Book</button>
                     </div>

                  </div>
               </form>
            </div>


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