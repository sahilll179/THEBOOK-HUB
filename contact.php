<?php
include 'inc/db.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}



if (isset($_POST['send'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'Message already sent!';
    } else {
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'Message sent successfully!';
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
                <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp mb-2" data-wow-delay="0.1s">
            <h1 class="mb-5 bg-white text-center px-3">Contact Us</h1>
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
        <div class="row g-4 mt-2">
            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Get In Touch</h5>
                <p class="mb-4">I'm happy to help! If you're looking for contact information or details about
                    THEBOOKHUB's online book store website, I don't have real-time browsing capabilities to access
                    current websites or specific contact details.</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 50px; height: 50px; background-color: #8e44ad;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Office</h5>
                        <p class="mb-0">123 Street, Ghansoli , Navi Mumbai, Maharastra</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 50px; height: 50px; background-color: #8e44ad;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Mobile</h5>
                        <p class="mb-0">+91 8850180408</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 50px; height: 50px; background-color: #8e44ad;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5>Email</h5>
                        <p class="mb-0">THEBOOKHUB@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="name"
                                    required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    name="email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="number" placeholder="Mobile Number"
                                    name="number" required>
                                <label for="number">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message"
                                    style="height: 150px" name="message" required></textarea>
                                <label for="message"> Your Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" name="send" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<?php
include "inc/footer.php";
?>