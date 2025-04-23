<?php

include 'inc/db.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

if (isset($_POST['update_cart'])) {
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>
<?php
include "inc/header.php";
?>
<!-- Header Start -->
<div class="container-fluid py-5 page-header">
   <div class="container py-5">
      <div class="row justify-content-center">
         <div class="col-lg-10 text-center wow fadeInUp">
            <h1 class="display-3 text-white animated slideInDown">Shopping Cart</h1>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                  <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- Header End -->



<!-- Cart Start -->
<div class="container-xxl py-4">
   <div class="container">
      <div class="text-center wow fadeInUp mb-2" data-wow-delay="0.1s">
         <h1 class="mb-5 bg-white text-center px-3">Shopping Cart</h1>
      </div>
      <div class="container shadow py-4 px-4">

         <div class="table-container  d-none d-sm-none d-md-none d-lg-block">
            <table class="table mt-4">
               <thead>
                  <tr>
                     <th class="text-center">Product</th>
                     <th scope="col">Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Total</th>
                     <th scope="col">Action</th>
               </thead>
               <tbody>
                  <?php
                  $grand_total = 0;
                  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                  if (mysqli_num_rows($select_cart) > 0) {
                     while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        ?>

                        <tr>


                           <td class="text-center">
                              <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="" width="100px"
                                 class="img-fluid">
                              <span style="margin-left:15px;">
                                 <?php echo $fetch_cart['name']; ?>
                              </span>
                           </td>


                           <td class="py-5">₹
                              <?php echo $fetch_cart['price']; ?> /-
                           </td>

                           <td class="py-5">
                              <form action="" method="post">
                                 <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                 <input type="number" min="1" name="cart_quantity"
                                    value="<?php echo $fetch_cart['quantity']; ?>" style="width:40px;">
                                 <input type="submit" name="update_cart" value="Update" class="text-white btn">
                              </form>
                           </td>

                           <td class="py-5">
                              <div class="sub-total"><span>₹
                                    <?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-
                                 </span> </div>
                           </td>

                           <td class="py-5">
                              <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-trash-alt text-danger"
                                 onclick="return confirm('Delete this from cart?');"></a>
                           </td>
                        </tr>


                        <?php
                        $grand_total += $sub_total;
                     }
                  } else {
                     echo '<p class="empty text-center">Your Cart is Empty</p>';
                  }
                  ?>


               </tbody>
            </table>
         </div>

         <div class="row g-3">
            <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select_cart) > 0) {
               while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                  ?>
                  <div class="col-md-6 col-sm-12 d-sm-block d-md-block d-lg-none text-center">
                     <center>
                        <div class="card text-center shadow">
                           <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="" class="img-fluid">
                           <div class="card-body">
                              <h5 class="card-title">
                                 <?php echo $fetch_cart['name']; ?>
                              </h5>
                              <h6 class="card-subtitle mb-2 text-muted">Price :- ₹
                                 <?php echo $fetch_cart['price']; ?> /-
                              </h6>

                              <div class="sub-total mb-2">Total Price :- <span>₹
                                    <?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-
                                 </span> </div>

                              <form action="" method="post">
                                 <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                 <input type="number" min="1" name="cart_quantity"
                                    value="<?php echo $fetch_cart['quantity']; ?>" style="width:40px;">
                                 <input type="submit" name="update_cart" value="Update" class="text-white btn">
                              </form>

                           </div>
                        </div>
                     </center>
                  </div>
                  <?php
                  $grand_total += $sub_total;
               }
            } else {
               echo '<p class="empty text-center">Your Cart is Empty</p>';
            }
            ?>

         </div>

         <div class="row ">
            <div class="col-12 mt-4">
               <center>
                  <a href="cart.php?delete_all"
                     class="btn btn-lg text-white <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"
                     onclick="return confirm('Delete all from cart?');">Delete All</a>
               </center>
            </div>
         </div>

         <div class="row p-4 mt-4">
            <div class="col-12">
               <h4 class="text-center mb-4">Grand Total :- <span>₹
                     <?php echo $grand_total; ?>/-
                  </span>
               </h4>
               <center>
                  <div class="text-center d-none d-sm-none d-md-none d-lg-block">
                     <a href="shop.php" class="btn-success text-white p-2">Continue Shopping</a>
                     <a href="checkout.php"
                        class="btn text-white p-2 <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">
                        Checkout</a>
                  </div>
                  <div class="text-center col-sm-12 d-sm-block d-md-block d-lg-none">
                     <a href="shop.php" class="btn-success text-white p-2">Continue Shopping</a><br><br>
                     <a href="checkout.php"
                        class="btn text-white p-2 <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">
                        Checkout</a>
                  </div>
               </center>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Cart End -->


<?php
include "inc/footer2.php";
?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>

</html>