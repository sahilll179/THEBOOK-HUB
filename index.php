<?php

include("inc/db.php");
if (isset($_POST['subscribe'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $subscribe = mysqli_query($conn, "SELECT email FROM `subscriber` WHERE email = '$email'") or die('query failed');

    if (mysqli_num_rows($subscribe) > 0) {
        echo "<script>
                    alert('Email already exists!');
                  </script>";

    } else {
        $add_subscriber = mysqli_query($conn, "INSERT INTO `subscriber`(email) VALUES('$email')") or die('query failed');

        if ($add_subscriber) {
            echo "<script>
                    alert('Thanks for Subscribing Us!');
                  </script>";
        } else {
            echo "<script>
        alert('Something went wrong. Please try again!');
      </script>";
        }
    }
}
?>

<?php
include "inc/header.php";
?>

<style>
    .category:hover {
        background: #8e44ad;
        transition: all 0.5s;
        border-radius: 15px;
    }

    .icon {
        color: #8e44ad;
    }

    .category:hover .icon,
    .category:hover h5 {
        color: #fff;
    }

    .content {
        padding: 7rem 0;
    }

    h2 {
        font-size: 20px;
    }

    .bg-left-half {
        position: relative;
    }

    .bg-left-half:before {
        position: absolute;
        width: 50%;
        height: 100%;
        z-index: -1;
        content: "";
        left: 0;
        top: 0;
        background-color: #f8f9fa;
    }

    .media-29101 {
        padding: 10px;
    }

    .media-29101 img {
        margin-bottom: 10px;
    }

    .media-29101 h3 {
        font-size: 18px;
        font-weight: 900 !important;
    }

    .media-29101 h3 a {
        color: #6c757d;
    }

    .owl-2-style .owl-nav {
        display: none;
    }

    .owl-2-style .owl-dots {
        text-align: center;
        position: relative;
        bottom: -30px;
    }

    .owl-2-style .owl-dots .owl-dot {
        display: inline-block;
    }

    .owl-2-style .owl-dots .owl-dot span {
        display: inline-block;
        width: 15px;
        height: 3px;
        border-radius: 0px;
        background: #cccccc;
        -webkit-transition: 0.3s all cubic-bezier(0.32, 0.71, 0.53, 0.53);
        -o-transition: 0.3s all cubic-bezier(0.32, 0.71, 0.53, 0.53);
        transition: 0.3s all cubic-bezier(0.32, 0.71, 0.53, 0.53);
        margin: 3px;
    }

    .owl-2-style .owl-dots .owl-dot.active span {
        background: #007bff;
    }

    .owl-2-style .owl-dots .owl-dot:active,
    .owl-2-style .owl-dots .owl-dot:focus {
        outline: none;
    }

    .banner {
        background: url('images/banner-1.jpg');
        background-size: cover;
    }
</style>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-4">
    <div class="owl-carousel header-carousel position-relative">

        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="images/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">

                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Adventures in
                                Wonderland</h1>
                            <p class=" text-white mb-4 pb-2">Take a whimsical journey to Wonderland with this enchanting
                                children's book. Filled with colorful characters and imaginative landscapes, it's a tale
                                that sparks the imagination and instills the joy of storytelling in young minds.</p>
                            <a href="about.php"
                                class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft">Discover
                                More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="images/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">

                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Love in Bloom</h1>
                            <p class=" text-white mb-4 pb-2">Fall in love with this heartwarming romance that blooms
                                against all odds. Join the protagonists on a rollercoaster of emotions as they navigate
                                through life's challenges, proving that love can conquer even the toughest obstacles.
                            </p>
                            <a href="about.php"
                                class="btn text-white py-md-3 px-md-5 me-3 animated slideInLeft">Discover
                                More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="images/carousel-3.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">

                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Mysteries of Midnight
                            </h1>
                            <p class=" text-white mb-4 pb-2"> Uncover dark secrets and hidden agendas in this gripping
                                mystery thriller. As the clock strikes midnight, the plot thickens, and the characters
                                find themselves entangled in a web of intrigue that keeps readers on the edge of their
                                seats.</p>
                            <a href="about.php"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Discover
                                More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="images/carousel-4.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">

                            <h1 class="display-3 text-white animated slideInDown text-capitalize">Whispers of Time</h1>
                            <p class=" text-white mb-4 pb-2">Stay up-to-date with the latest literary treasures!
                                Discover fresh voices and exciting stories in our New Releases section. Be among the
                                first to experience these literary delights.</p>
                            <a href="about.php"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Discover
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Carousel End -->


<!-- Categories Start -->
<section class="py-5 py-md-11">
    <div class="container container-wd">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center px-3" style="background: #fdfdfd;">Categories</h6>
            <h1 class="mb-5" style="color: #8e44ad;">Popular Categories to Explore</h1>
        </div>

        <div class="mx-n3"
            data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true}'>
            <?php
            include("inc/db.php");
            $select_category = mysqli_query($conn, "SELECT * FROM `category`") or die('query failed');
            if (mysqli_num_rows($select_category) > 0) {
                while ($fetch_category = mysqli_fetch_assoc($select_category)) {
                    ?>
                    <div class="col-12 col-md-4 mw-xl-20 mb-md-6 my-4 px-3 ">
                        <!-- Card -->
                        <a href="shop.php"
                            class="card shadow px-md-5 pt-md-9 pb-md-5 px-4 py-5 text-center lift position-relative h-100 category">

                            <!-- Image -->
                            <div class="display-4 mb-4 icon">
                                <?php echo $fetch_category["cat_icon"]; ?>
                            </div>

                            <!-- Footer -->
                            <div class="px-0 pb-0 pt-6">
                                <h5 class="mb-0 line-clamp-1">
                                    <?php echo $fetch_category['cat_name']; ?>
                                </h5>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="empty">No categories added yet!</p>';
            }
            ?>
        </div>
    </div>
</section>
<!-- Categories End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="images/about-img.jpg" alt=""
                        style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start pe-3">About Us</h6>
                <h1 class="mb-4" style="color: #8e44ad;">Why Choose Us</h1>
                <p class="mb-4">Welcome to THEBOOKHUB , your go-to destination for a literary adventure! At THEBOOKHUB , we
                    believe in the transformative power of literature. Our passion for books has driven us to create a
                    haven where book enthusiasts can discover, explore, and indulge in the captivating world of stories.
                </p>
                <p class="mb-4">At THEBOOKHUB , we are committed to curating a diverse collection of novels that cater to
                    every reader's taste. Whether you are an avid fiction lover, a history buff, or someone seeking
                    self-discovery through insightful non-fiction, THEBOOKHUB has something special waiting for you. Our
                    mission is to foster a love for reading and to provide a haven for bookworms to immerse themselves
                    in the magic that only a well-crafted novel can offer. Join us in celebrating the written word at
                    THEBOOKHUB - where every page is a new adventure!

                </p>

                <a class="btn text-light py-3 px-5 mt-2" href="about.php">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Books Start -->

<div class="container-xxl py-5">
    <div class="site-section mb-5 ">
        <div class="container owl-2-style wow fadeInUp" data-wow-delay="0.1s">

            <div class="row text-center">
                <div class="col-12">
                    <h6 class="section-title bg-white text-center px-3">Best Sellers</h6>
                    <h1 class="mb-4" style="color: #8e44ad;">Best Selling Books Ever</h1>
                </div>
            </div>


            <div class="owl-carousel owl-2">

                <?php
                include("inc/db.php");
                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                        ?>
                        <div class="media-29101">
                            <a href="#">
                                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" class="img-fluid" alt="..."
                                    style="height:500px;">
                            </a>
                            <h3 class="card-title"><a href="" class="text-dark">
                                    <?php echo $fetch_products['name']; ?>
                                </a></h3>
                            <p>
                                <?php echo $fetch_products['author']; ?>
                            </p>
                            <div class="d-flex justify-content-between">
                                <small class="py-1 px-1 fw-bold fs-6 text-center">₹
                                    <?php echo $fetch_products['price']; ?>/-
                                </small>
                                <div>
                                    <a href="login.php" class="btn text-white">Add
                                        To Cart <i class="fa fa-chevron-right"></i></a>
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
</div>

<!-- Books End -->



<!-- Banner-1 Start -->
<div class="container-xxl py-5 pt-5 bg-light banner">
    <div class="container">
        <div class="row g-5 text-center">
            <div class="col-12 p-5 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="mb-2 text-white">BOOK DAY</h2>
                <h1 class="mb-2" style="color: #8e44ad;">SUPER SALES</h1>
                <h3 class="text-white">Limited offer online shop</h3>
                <p class="mb-4" style="color: #d1d1d1;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit, quas?</p>
                <a class="btn text-light py-3 px-5 mt-2" href="login.php">Shop Now</a>
            </div>

        </div>
    </div>
</div>
<!-- Banner-1 End -->



<!-- Banner-2 Start -->
<div class="container-xxl mt-5">
    <div class="container">
        <div class="row g-5 ">

            <div class="col-lg-6 col-md-12 p-5 wow fadeInUp" data-wow-delay="0.3s">
                <h4 class="mb-2">NEWSLETTER TO GET IN TOUCH</h4>
                <h1 class="mb-4" style="color: #8e44ad;">Join the Community</h1>
                <p class="mb-4" style="color: grey;">Recieve the latest offers & updates via emails</p>

                <form action="#" method="POST">
                    <div class="d-flex justify-content-between">
                        <input type="email" class="form-control p-3" placeholder="Your Email Address" name="email"
                            required>
                        <input type="submit" value="Subscribe" class="btn text-white" name="subscribe">
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                <img src="images/banner-2.png" alt="" class="img-fluid" width="400px">
            </div>

        </div>
    </div>
</div>
<!-- Banner-2 End -->


<?php
include "inc/footer.php";
?>

<script>
    $(function () {

        if ($('.owl-2').length > 0) {
            $('.owl-2').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                stagePadding: 0,
                margin: 20,
                smartSpeed: 1000,
                autoplay: true,
                nav: true,
                dots: true,
                pauseOnHover: false,
                responsive: {
                    600: {
                        margin: 20,
                        nav: true,
                        items: 2
                    },
                    1000: {
                        margin: 20,
                        stagePadding: 0,
                        nav: true,
                        items: 3
                    }
                }
            });
        }

    })
</script>