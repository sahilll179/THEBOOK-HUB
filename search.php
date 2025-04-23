<?php
include "inc/db.php";
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}


if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'Product added to cart!';
    }

}
;

?>

<?php
include "inc/header.php";

?>



<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Search</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="home.php">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Search</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Login Start -->
<div class="container-xxl py-2 mt-4">
    <div class="container">

        <div class="row g-4 wow fadeInUp" data-wow-delay="0.5s ">

            <form method="post" class="w-100 d-flex justify-content-between">
                <input type="text" name="search" placeholder="Search Books..." class="form-control p-2">
                <input type="submit" value="Submit" class="btn text-light" name="submit">
            </form>

            <div class="py-2">
                <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '<div class="message alert alert-success d-flex justify-content-between">
                    <span>' . $message . '</span>
                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>
                ';
                    }
                }
                ?>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <?php
                if (isset($_POST['submit'])) {
                    $search_item = $_POST['search'];
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('query failed');
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                            ?>

                            <div class="card shadow">
                                <a href="#">
                                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" class="img-fluid" alt="..."
                                        width="100%">
                                </a>
                                <div class="card-body p-4">
                                    <h5 class="card-title"><a href="" class="text-dark">
                                            <?php echo $fetch_product['name']; ?>
                                        </a></h5>
                                    <p>
                                        <?php echo $fetch_product['author']; ?>
                                    </p>
                                    <p>
                                        ₹
                                        <?php echo $fetch_product['price']; ?>/-
                                    </p>


                                    <form action="" method="POST">
                                        <input type="number" class="p-1" name="product_quantity" min="1" value="1"
                                            style="width:100px;">
                                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                        <input type="hidden" name="product_price" value="₹<?php echo $fetch_product['price']; ?>/-">
                                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                        <?php if (!isset($_SESSION["user_id"]) == true): ?>
                                            <a href="login.php" class="btn text-light">Add To Cart</a>
                                        <?php else: ?>
                                            <input type="submit" class="btn text-light" value="Add To Cart" name="add_to_cart">
                                        <?php endif; ?>
                                    </form>

                                </div>
                            </div>


                            <?php
                        }
                    } else {
                        echo '<center>
                        <img src="images/not_found.jpg" alt="not_found" class"img-fluid" style="width:500px;">
                        </center>';
                    }
                } else {
                    echo '<p class="empty">Search Something!</p>';
                }
                ?>
            </div>


        </div>
    </div>
</div>
<!-- Login End -->


<?php
include "inc/footer2.php";
?>