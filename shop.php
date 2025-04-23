<?php

include("inc/db.php");
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
        $message[] = 'Already Added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'Book Added to cart!';
    }

}

?>

<?php
include "inc/header.php";
?>


<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Books</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Books</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->



<div class="container-xxl">
    <div class="container ">
        <div class="row mt-2">
            <!-- Books Start -->
            <div class="col-12 wow fadeInUp overflow-auto" data-wow-delay="0.1s">

                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                        <h3 class="mb-2" style="color: #8e44ad;">All Books</h3>
                    </div>
                    <div class="py-4">
                        <?php
                        if (isset($message)) {
                            foreach ($message as $message) {
                                echo '
                                <div class="message alert alert-success d-flex justify-content-between">
                                    <span>' . $message . '</span>
                                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                                </div>
                                ';
                            }
                        }
                        ?>
                    </div>
                    <div class="row g-4">
                        <?php
                        include("inc/db.php");
                        $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                                ?>
                                <div class="col-lg-3 col-md-6 col-sm-12">

                                    <div class="card shadow">
                                        <a href="#">
                                            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="img-fluid"
                                                alt="..." style="height:400px;" width="100%">
                                        </a>
                                        <div class="card-body p-4">
                                            <h5 class="card-title"><a href="" class="text-dark">
                                                    <?php echo $fetch_products['name']; ?>
                                                </a></h5>
                                            <p>
                                                <?php echo $fetch_products['author']; ?>
                                            </p>


                                            <form action="" method="POST">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small class="py-1 px-1 fw-bold fs-6 text-center">₹
                                                        <?php echo $fetch_products['price']; ?>/-
                                                    </small>
                                                    <input type="number" min="1" name="product_quantity" value="1"
                                                        class="qty form-control" style="width:100px;">
                                                </div>
                                                <div>
                                                    <input type="hidden" name="product_name"
                                                        value="<?php echo $fetch_products['name']; ?>">
                                                    <input type="hidden" name="product_price"
                                                        value="<?php echo $fetch_products['price']; ?>">
                                                    <input type="hidden" name="product_image"
                                                        value="<?php echo $fetch_products['image']; ?>">
                                                    <input type="submit" value="Add to cart" name="add_to_cart"
                                                        class="btn text-white w-100 p-2">
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <?php
                            }
                        } else {
                            echo '<p class="empty">No products added yet!</p>';
                        }
                        ?>

                    </div>

                </div>

            </div>
            <!-- Books End -->

        </div>
    </div>
</div>

<?php
include "inc/footer2.php";
?>