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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />

    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-dropdownhover.min.css" rel="stylesheet">

    <title>Title</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include("views/home/login.php");
            include("views/home/register.php");
            ?>
            <!-- logo -->
            <div class="col-md-12">
                <div class="container">
                    <a href="index.php">
                        <img alt="Bootstrap Image Preview" src="assets/img/logo_cse.jpg" />
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

                            <li class="dropdown">
                                <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tin tức
                                </a>
                                <div class="dropdown-menu drop-category" aria-labelledby="dropdownMenuButton">
                                    <?php
                                    if (!isset($iCate)) $isCate = -1;
                                    while ($rowCategory = mysqli_fetch_assoc($listCategory)) {
                                        $id = $rowCategory['id'];
                                        $title = $rowCategory['name'];


                                    ?>
                                        <a style="<?php echo $idCate == $id ? 'color: #FFFFFF !important;' : ''  ?>" class="dropdown-item <?php echo $idCate == $id ? 'active' : '' ?>" href='index.php?controller=news&action=listNewsWithCategory&idCate=<?php echo $id ?>'><?php echo $title ?></a>;
                                    <?php
                                    }
                                    ?>
                                </div>
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
                                        <a href="index.php?controller=Admin" class="dropdown-item">Dashbrod</a>
                                    <?php
                                    }
                                    ?>

                                    <a href="index.php?controller=Home&action=logout" class="dropdown-item">Dang xuat</a>
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