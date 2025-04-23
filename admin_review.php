<?php
include 'inc/db.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `review` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_review.php');
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

    <div class="container-xxl py-5" style="min-height:90vh;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 text-center px-3">REVIEWS</h1>
            </div>

            <?php
            include("admin/messages.php");
            ?>

            <div class="row">
                <?php
                $select_review = mysqli_query($conn, "SELECT * FROM `review`") or die('query failed');
                if (mysqli_num_rows($select_review) > 0) {
                    while ($fetch_review = mysqli_fetch_assoc($select_review)) {

                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card shadow" style="width: 18rem;">

                            <div class="card-body">
                                <h2 class="card-title text-capitalize">
                                    <?php echo $fetch_review['name']; ?>
                                </h2>

                                <p class="text-muted">
                                    <?php echo $fetch_review['review']; ?>
                                </p>

                                <a href="admin_review.php?delete=<?php echo $fetch_review['id']; ?>"
                                    onclick="return confirm('Delete this Review?');"
                                    class="btn text-center btn-danger w-100">Delete</a>
                            </div>
                        </div>
                        </div>
                        <?php
                    }
                    ;
                } else {
                    echo '<p class="text-center">You have no reviews!</p>';
                }
                ?>

            </div>

        </div>
    </div>



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
