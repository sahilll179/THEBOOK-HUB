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
                <div class="mb-3">
                    <h2 class="fw-bold text-center p-3">User Dashboard</h2>
                </div>
                <div class="row text-center">
                    <div class="col-12 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100 align-items-center">
                                    <div class="col-6">
                                        <?php if (isset($_SESSION["user_id"]) == true): ?>
                                            <div class="p-3 m-1">

                                                <h4>Welcome Back,
                                                    <span style="text-transform:uppercase;">
                                                        <?php echo $_SESSION['user_name']; ?>
                                                    </span>
                                                </h4>
                                                <p class="mb-0">

                                                </p>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="col-6 align-self-end text-end">
                                        <img src="images/customer-support.jpg" class="img-fluid illustration-img"
                                            alt="">
                                    </div>
                                </div>
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
        include "user/footer.php";
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>