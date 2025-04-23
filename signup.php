<?php
include("inc/db.php");
// include("inc/functions.php");


if (isset($_POST['signup'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['password2']));
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'user already exist!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:login.php');
        }
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
                <h1 class="display-3 text-white animated slideInDown">Signup</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Signup</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Signup Start -->
<div class="container-xxl py-2 mt-4">
    <div class="container signup">

        <div class="row g-4 wow fadeInUp" data-wow-delay="0.5s ">



            <center>
                <form class="shadow p-4" style="max-width: 550px;" method="POST" action="signup.php">


                    <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <h1 class="mb-2 bg-white text-center px-3">Signup</h1>

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
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email Address">
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password2"
                                    placeholder="Confirm Password">
                                <label for="password">Confirm Password</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <select name="user_type" id="" class="form-select">
                                    <option value="user">User</option>
                                    <!-- <option value="admin">Admin</option> -->
                                </select>

                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn text-light w-100 py-3" type="submit" name="signup">Signup</button>
                        </div>

                        <div class="col-12 text-center">
                            <p>Already have an account? <a class="text-decoration-none" href="login.php">Login</a>
                            </p>
                        </div>
                    </div>
                </form>
            </center>

        </div>
    </div>
</div>
<!-- Signup End -->

<?php
include "inc/footer.php";
?>