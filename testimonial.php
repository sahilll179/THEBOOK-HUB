<?php
include 'inc/db.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
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
                <h1 class="display-3 text-white animated slideInDown">Testimonial</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Testimonial Start -->
<div class="container-xxl py-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center mb-2">
            <h1 class=" bg-white text-center px-3" style="color: #8e44ad;">Customers Reviews</h1>
        </div>
        <div class="py-4">
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
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
            include("inc/db.php");
            $select_review = mysqli_query($conn, "SELECT * FROM `review`") or die('query failed');
            if (mysqli_num_rows($select_review) > 0) {
                while ($fetch_review = mysqli_fetch_assoc($select_review)) {
                    ?>
                    <div class="testimonial-item text-center">

                        <h4 class="mb-3">
                            <?php echo $fetch_review["name"]; ?>
                        </h4>
                        <div class="testimonial-text bg-light text-center p-4 mt-4">
                            <p class="mb-0">
                                <?php echo $fetch_review["review"]; ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center">No Reviews added yet!</p>';
            }
            ?>
        </div>
        <div class="row mt-5">
            <div class="col-12 mt-2">
                <center>
                    <?php if (!isset($_SESSION["user_id"]) == true): ?>
                    <?php else: ?>
                        <a href="add_review.php" class="btn text-white p-2">Add Your Review</a>
                    <?php endif; ?>
                </center>
            </div>
        </div>
    </div>
</div>


<!-- Testimonial End -->


<?php
include "inc/footer.php";
?>