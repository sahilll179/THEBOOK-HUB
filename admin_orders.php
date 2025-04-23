<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}


if (isset($_POST['update_order'])) {

    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
    $message[] = 'Payment status has been updated!';

}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_orders.php');
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

    <main class="content px-3 py-2 ">
        <div class="container-fluid">
            <div class="mb-3 text-center mt-3">
                <h1 class="mb-5 text-center px-3">PLACED ORDERS</h1>
            </div>
            <?php
            include("admin/messages.php");
            ?>
            <div class="row">
                <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                if (mysqli_num_rows($select_orders) > 0) {
                    while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
                        ?>
                        <div class="col-12 ">
                            <div class="card shadow p-4 bg-light">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['user_id']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Placed On</th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['placed_on']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['name']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Phone No. </th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['number']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email </th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['email']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Address </th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['address']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Total Products</th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['total_products']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Total Price</th>
                                            <td scope="row">
                                            ₹ <?php echo $fetch_orders['total_price']; ?> /-
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Payment Method</th>
                                            <td scope="row">
                                                <?php echo $fetch_orders['method']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                    <select name="update_payment" class="form-select mb-3">
                                        <option value="" selected disabled>
                                            <?php echo $fetch_orders['payment_status']; ?>
                                        </option>
                                        <option value="pending">pending</option>
                                        <option value="completed">completed</option>
                                    </select>
                                    <input type="submit" value="update" name="update_order" class="btn btn-primary"
                                        style="float:right;">
                                    <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>"
                                        onclick="return confirm('delete this order?');" class="btn btn-danger"
                                        style="float:right; mar">delete</a>
                                </form>

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