<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


    </body>
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div class="wrapper">

        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="index.php" class="navbar-brand d-flex align-items-center">
                        <p class="m-0 fw-bold text-white" style="font-size: 25px;"><img src="images/icon.png" alt=""
                                height="50px">THEBO<span style="color: #fb873f;">OkHUB</span></p>
                    </a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="user_page.php" class="sidebar-link">
                            <i class="fa fa-dashboard pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="orders.php" class="sidebar-link">
                            <i class="fas fa-tags pe-2"></i>
                            Your Orders
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="logout.php" class="sidebar-link">
                            <i class="fa fa-sign-out pe-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </aside>