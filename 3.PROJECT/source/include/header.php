<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <!-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css"
    /> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />

    <title>Title</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include("login.php");
            include("register.php");
            ?>
            <!-- logo -->
            <div class="col-md-12">
                <div class="container">
                    <a href="index.php">
                        <img alt="Bootstrap Image Preview" src="img/logo_cse.jpg" />
                    </a>
                </div>
                <!-- thanh điều hướng nav -->
                <nav class="navbar navbar-expand-lg navbar-light bg-custom">
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse container " id="bs-example-navbar-collapse-1">
                        <ul class="navbar-nav p-auto ul-nav">
                            <li style="display: flex; align-items: center" class="nav-item">
                                <a href="index.php"><i style="color: white; font-size: 20px" class="fa fa-home"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tin tức</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Diễn đàn</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Giới thiệu</a>
                            </li>
                        </ul>
                        <?php

                        if (isset($_SESSION['user'])) {

                        ?>
                            <div class="nav-item dropdown auth">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['user']['username'] ?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    if ($_SESSION['user']['role'] == 'admin') {
                                    ?>
                                        <a href="admin/admin.php" class="dropdown-item">Dashbrod</a>
                                    <?php
                                    }
                                    ?>

                                    <a href="logout.php" class="dropdown-item">Dang xuat</a>
                                </div>
                            </div>

                        <?php
                        } else {

                        ?>
                            <div class="nav-item dropdown auth">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Đăng nhập
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a data-toggle="modal" data-target="#modalLoginForm" href="login" class="dropdown-item">Đăng nhập</a>
                                    <a data-toggle="modal" data-target="#modalRegisterForm" class="dropdown-item" href="#">Đăng ký</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </nav>