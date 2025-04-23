<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:login.php');
}
?>
<?php
include "admin/header.php";
?>

<div class="main">
   <?php
   include "admin/navbar.php";
   ?>
   <main class="content px-3 py-2">
      <div class="container-fluid">
         <div class="mb-3">
            <h4>Admin Dashboard</h4>
         </div>
         <div class="row">
            <div class="col-12 d-flex">
               <div class="card flex-fill border-0 illustration">
                  <div class="card-body p-0 d-flex flex-fill">
                     <div class="row g-0 w-100 align-items-center">
                        <div class="col-6">
                           <?php if (isset($_SESSION["admin_id"]) == true): ?>
                              <div class="p-3 m-1">

                                 <h4>Welcome Back,
                                    <span style="text-transform:uppercase;">
                                       <?php echo $_SESSION['admin_name']; ?>
                                    </span>
                                 </h4>
                                 <p class="mb-0">

                                 </p>
                              </div>
                           <?php endif; ?>
                        </div>
                        <div class="col-6 align-self-end text-end">
                           <img src="images/customer-support.jpg" class="img-fluid illustration-img" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="container-fluid">

         <div class="row align-items-center">
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $total_pendings = 0;
                     $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                     if (mysqli_num_rows($select_pending) > 0) {
                        while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                           $total_price = $fetch_pendings['total_price'];
                           $total_pendings += $total_price;
                        }
                        ;
                     }
                     ;
                     ?>
                     <h1>₹
                        <?php echo $total_pendings; ?>/-
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Total Pendings</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $total_completed = 0;
                     $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                     if (mysqli_num_rows($select_completed) > 0) {
                        while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                           $total_price = $fetch_completed['total_price'];
                           $total_completed += $total_price;
                        }
                        ;
                     }
                     ;
                     ?>
                     <h1>₹
                        <?php echo $total_completed; ?>/-
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Complete Payments</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                     $number_of_orders = mysqli_num_rows($select_orders);
                     ?>
                     <h1>
                        <?php echo $number_of_orders; ?>
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Order Placed</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                     $number_of_products = mysqli_num_rows($select_products);
                     ?>
                     <h1>
                        <?php echo $number_of_products; ?>
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Products Added</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                     $number_of_users = mysqli_num_rows($select_users);
                     ?>
                     <h1>
                        <?php echo $number_of_users; ?>
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Normal Users</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                     $number_of_admins = mysqli_num_rows($select_admins);
                     ?>
                     <h1>
                        <?php echo $number_of_admins; ?>
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Admin Users</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                     $number_of_account = mysqli_num_rows($select_account);
                     ?>
                     <h1>
                        <?php echo $number_of_account; ?>
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">Total Accounts</p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <div class="card border-0 illustration py-4 text-center">
                  <div class="card-body p-0">
                     <?php
                     $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                     $number_of_messages = mysqli_num_rows($select_messages);
                     ?>
                     <h1>
                        <?php echo $number_of_messages; ?>
                     </h1><br>
                     <p class="btn btn-primary btn-sm text-white p-2">New Messages</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>
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