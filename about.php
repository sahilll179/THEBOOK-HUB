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
                <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="home.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start pe-3">About Us</h6>
                <h1 class="mb-4" style="color: #8e44ad;">Welcome to THEBOOKHUB</h1>
                <p class="mb-4">
                    Welcome to THEBOOKHUB , where the love for literature comes to life! Established in [Year], we are
                    more than just a bookstore; we are a haven for bibliophiles and a community dedicated to the written
                    word.
                </p>

                <h3 class="mb-4">Our Mission</h3>
                <p class="mb-4">At THEBOOKHUB , we are passionate about bringing the joy of reading to book enthusiasts
                    all around the world. Our mission is to curate a diverse collection of novels that captivate,
                    inspire, and transport readers to new worlds.</p>

                <h3 class="mb-4">Who We Are</h3>
                <p class="mb-4"> Founded in 2023, THEBOOKHUB is not just a bookstore; it's a community of avid readers,
                    writers, and storytellers. We believe in the power of books to foster imagination, empathy, and a
                    deeper understanding of the world around us.</p>

                <h3 class="mb-4">Our Collection</h3>

                <p class="mb-4">Explore our carefully curated selection of novels, spanning various genres from classic
                    literature to contemporary fiction, science fiction, mystery, romance, and more. Our shelves are
                    filled with timeless classics and hidden gems waiting to be discovered.</p>

                <h3 class="mb-4">Why Choose  THEBOOKHUB?</h3>
                <ul>
                    <li class="mb-2"><b>Diverse Selection :- </b>We pride ourselves on offering a diverse and inclusive
                        range of books that cater to readers of all tastes and preferences.</li>
                    <li class="mb-2"><b>Quality Service :- </b>Our team is dedicated to providing exceptional customer
                        service. Whether you need a book recommendation or assistance with your order, we're here to
                        help.</li>
                    <li class="mb-2"><b>Community Engagement :- </b>Join our reading community! Follow us on social
                        media, participate in book clubs, and stay updated on literary events happening both online and
                        in-store.</li>
                </ul>

                <h3 class="mb-4">Our Team</h3>

                <p class="mb-4">Meet the passionate individuals behind THEBOOKHUB. Our team is composed of book lovers
                    who are committed to creating an enriching reading experience for our customers. We value the love
                    of literature and are here to share that passion with you.</p>

                <h3 class="mb-4">Contact Us</h3>

                <p class="mb-4">Have a question or just want to say hello? We'd love to hear from you! Reach out to us
                    through our <a href="contact.php">Contact Page</a>.</p>


                <p class=" mt-5 mb-4">Thank you for being a part of the THEBOOKHUB family . Happy reading!</p>

            </div>

        </div>
    </div>
</div>
<!-- About End -->


<?php
include "inc/footer.php";
?>