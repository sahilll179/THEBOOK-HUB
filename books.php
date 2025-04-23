

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
        <div class="row mt-5">
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
                                                alt="..." style="height:200px;">
                                        </a>
                                        <div class="card-body p-4">
                                            <h5 class="card-title"><a href="" class="text-dark">
                                                    <?php echo $fetch_products['name']; ?>
                                                </a></h5>
                                            <p>
                                                <?php echo $fetch_products['author']; ?>
                                            </p>


                                            <a href="login.php" class="btn text-white">Add To Cart</a>

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
include "inc/footer.php";
?>