<?php
include 'inc/db.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
if (isset($_POST['add_review'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);

    $select_name = mysqli_query($conn, "SELECT name FROM `review` WHERE name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_name) > 0) {
        $message[] = 'Review already added';
    } else {
        $add_query = mysqli_query($conn, "INSERT INTO `review`(name,review) VALUES('$name','$review')") or die('query failed');

        if ($add_query) {
            $message[] = 'Thanks for your review!';
            header('location:testimonial.php');
        } else {
            $message[] = 'Something went wrong. Please try again!';
            header('location:add_review.php');
        }
    }
}

?>
<?php
    include "inc/header.php";
?>


<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Add Your Review</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Add Your Review</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Review Start -->
<div class="container-xxl">
    <div class="container">

        <div class="row g-5">

            <div>
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

            <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                <center>
                    <form method="POST" style="max-width:500px;">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name"
                                        name="name" value="<?php echo $_SESSION['user_name']; ?>" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a review here" id="review"
                                        style="height: 150px" name="review" required></textarea>
                                    <label for="review"> Your Review</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="add_review" type="submit">Add
                                    Review</button>
                            </div>
                        </div>
                    </form>
                </center>
            </div>

        </div>
    </div>
</div>
<!-- Review End -->


<?php
include "inc/footer.php";
?>
