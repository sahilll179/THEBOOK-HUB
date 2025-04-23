<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>THEBOOKHUB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="images/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">


    <script src="https://kit.fontawesome.com/a61c319403.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <section class="d-none d-lg-block d-sm-none">
        <div class="topnav py-2 px-5 bg-dark d-flex justify-content-between">
            <div>
                <a href="#" class="text-white"><i class="fa fa-envelope me-2"></i>THEBOOKHUB@gmail.com</a>
            </div>
            <div>
                <a href="#" class="text-white"><i class="fab fa-facebook-f me-2"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter me-2"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram me-2"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin me-2"></i></a>
            </div>

        </div>
    </section>
    <nav class="navbar navbar-expand-lg bg-white  navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <p class="m-0 fw-bold" style="font-size: 25px;"><img src="images/icon.png" alt="" height="50px">THEBO<span
                    style="color: #8e44ad;">OKHUB</span></p>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <?php if (!isset($_SESSION["user_id"]) == true): ?>
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                <?php else: ?>
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                <?php endif; ?>

                <a href="about.php" class="nav-item nav-link">About</a>

                <?php if (!isset($_SESSION["user_id"]) == true): ?>
                    <a href="login.php" class="nav-item nav-link">Shop</a>
                <?php else: ?>
                    <a href="shop.php" class="nav-item nav-link">Shop</a>
                <?php endif; ?>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>

                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>

                <a href="search.php" class="nav-item nav-link"><i class="fa fa-search"></i></a>

                <?php if (!isset($_SESSION["user_id"]) == true): ?>
                    <a href="login.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i></a>
                <?php else: ?>
                    <?php
                    $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                    $cart_rows_number = mysqli_num_rows($select_cart_number);
                    ?>
                    <a href="cart.php" class="nav-item nav-link"><i class="fa fa-shopping-cart"></i><span>(
                            <?php echo $cart_rows_number; ?>)
                        </span> </a>

                    <a href="user_page.php" class="nav-item nav-link"><i class="fa fa-user rounded-circle"></i>
                        <?php echo $_SESSION['user_name']; ?>
                    </a>

                <?php endif; ?>


            </div>

        </div>
    </nav>

    <!-- Navbar End -->