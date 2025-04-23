<?php
include "inc/db.php";

session_start();

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');

        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');

        }

    } else {
        $message[] = 'incorrect email or password!';
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
                <h1 class="display-3 text-white animated slideInDown">Login</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Login</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Login Start -->
<div class="container-xxl py-2 mt-4">
    <div class="container">

        <div class="row g-4 wow fadeInUp" data-wow-delay="0.5s ">
            <center>
                <form class="shadow p-4" style="max-width: 550px;" method="POST">


                    <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <h1 class="mb-2 bg-white text-center px-3">Login</h1>
                        <?php
                        if (isset($message)) {
                            foreach ($message as $message) {
                                echo '
                                <div class="message alert alert-danger d-flex justify-content-between mt-4">
                                    <span>' . $message . '</span>
                                    <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                                </div>
                                ';
                            }
                        }
                        ?>

                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email Address"
                                    name="email">
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <p><a href="#">Forgot password?</a></p>
                        </div>

                        <div class="col-12">
                            <button class="btn text-light w-100 py-3" type="submit" name="login">Login</button>
                        </div>

                        <div class="col-12 text-center">
                            <p>Don't have an account? <a class="text-decoration-none" href="signup.php">Signup</a></p>
                        </div>
                    </div>
                </form>
            </center>


        </div>
    </div>
</div>
<!-- Login End -->


<?php
include "inc/footer.php";
?>