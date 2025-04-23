<?php
include("inc/db.php");
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
?>

<?php
include("user/header.php"); ?>
<div class="wrapper">

    <div class="main">
        <?php
        include("user/navbar.php");
        ?>

        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3 text-center mt-3">
                    <h2 class="text-center p-4 fw-bold">Placed Orders</h2>
                </div>
                <div class="row">
                    <?php
                    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
                    if (mysqli_num_rows($order_query) > 0) {
                        while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
                            ?>
                            <div class="col-12">
                                <div class="card shadow p-4 bg-light">

                                    <table class="table">
                                        <tr>
                                            <th>Placed on :</th>
                                            <td>
                                                <?php echo $fetch_orders['placed_on']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Name :</th>
                                            <td>
                                                <?php echo $fetch_orders['name']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Number :</th>
                                            <td>
                                                <?php echo $fetch_orders['number']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email :</th>
                                            <td>
                                                <?php echo $fetch_orders['email']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Address :</th>
                                            <td>
                                                <?php echo $fetch_orders['address']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method :</th>
                                            <td>
                                                <?php echo $fetch_orders['method']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Your Orders :</th>
                                            <td>
                                                <span>
                                                    <?php echo $fetch_orders['total_products']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total Price :</th>
                                            <td>
                                                ₹
                                                <?php echo $fetch_orders['total_price']; ?>/-
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status :</th>
                                            <td>
                                                <span style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {
                                                    echo 'red';
                                                } else {
                                                    echo 'green';
                                                } ?>;">
                                                    <?php echo $fetch_orders['payment_status']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </table>


                                </div>
                                <?php
                        }
                    } else {
                        echo '<p class="text-center">No Orders Placed yet!</p>';
                    }
                    ?>
                    </div>
                </div>
        </main>
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>

        <?php
        include "user/footer.php";
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>