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
          <img alt="Bootstrap Image Preview" src="image/logo_cse.jpg" />
        </div>
        <!-- thanh điều hướng nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
          <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse container " id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav p-auto ul-nav">
              <li style="display: flex; align-items: center" class="nav-item">
                <i style="color: white; font-size: 20px" class="fa fa-home"></i>
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

            <div class="nav-item dropdown auth">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Đăng nhập
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a data-toggle="modal" data-target="#modalLoginForm"href="login" class="dropdown-item">Đăng nhập</a>
                <a data-toggle="modal" data-target="#modalRegisterForm" class="dropdown-item" href="#">Đăng ký</a>
              </div>
            </div>
          </div>
        </nav>
        <!-- phần body -->
        <div class="row container main">
          <div class="col-md-3 body-left">
            <div class="row">
              <div class="col-md-12 search-box">
                <div class="form-group">
                  <label for="my-input">Text</label>
                  <input id="my-input" class="form-control" type="text" name="" />
                </div>
              </div>
            </div>

            <div class="row hot-news">
              <div class="col-md-12">hot news</div>
            </div>
          </div>
          <div class="col-md-9 body-main"></div>
        </div>
        <!-- phần footer -->
        <div class="row footer bg-custom">
          <div style="margin: auto;">
            <img class="img-fluid img-footer" src="image/img-01.png" alt="" />
            <p style="color: white; width:400px ; text-align: center;">
              © 2017 Khoa Công nghệ thông tin - Đại học Thủy lợi Địa chỉ:
              nhà C1, Đại học Thủy lợi, 175 Tây Sơn, Đống Đa, Hà Nội.
              Điện thoại: (+84)-024 3 5632211. Email: vpkcntt@tlu.edu.vn
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>