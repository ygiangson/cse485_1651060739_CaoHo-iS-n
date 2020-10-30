<?php
require("models/HomeModel.php");
require("models/NewsModel.php");
require ("models/CategoryModel.php");
session_start();
class HomeController
{

    public function index()
    {
        $news = new NewsModel();
        $category =new CategoryModel();
        $listNewsRand = $news -> getNewsRand();
        $listLatestNews = $news -> getLatestNews();
        $listHotNews =$news -> getHotNews();
        $listCategory = $category -> getAllCategoryNews();

        // Chuyen cho View xu ly;
        require("views/home/index.php");
    }

    public function login()
    {
        $errors = array();
        $username = $_POST['txt-username'];
        if (empty(trim($username))) {
            $errors[] = 'You forgot to enter your username.';
        }

        $password = $_POST['txt-password'];
        if (empty(trim($password))) {
            $errors[] = 'You forgot to enter your password.';
        }

        if (empty($errors)) {
            $homeModel = new HomeModel();
            $row = $homeModel->handle_login($username, $password);
            if ($row !== null) {

                $_SESSION['user'] = $row;
                header("Location:index.php");
            } else {
                echo "<script type='text/javascript'>alert('Tai khoan khong ton tai');javascript:history.go(-1)</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Tai khoan khong ton tai');javascript:history.go(-1)</script>";
        }
        // Chuyen cho View xu ly;

    }
    public function logout()
    {


        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        } else {
        }
        header("Location:index.php");
    }
    public function register()
    {
        $username = $_POST['txt-username'];
        $email = $_POST['txt-email'];
        $password = $_POST['txt-password'];
        $confirm_passwrod = $_POST['txt-confirm-password'];
        $error = array();


        if (empty($username)) {
            $error[] = 'empty username! <br>';
        }
        if (empty($email)) {
            $error[] = 'empty email!<br>';
        }

        if (empty($password)) {
            $error[] = 'empty password<br>';
        }
        if (empty($confirm_passwrod)) {
            $error[] = 'empty confirm password!<br>';
        }

        if (strlen($password) <= 8) {
            $error[] = 'password must lenght more 8 character!!<br>';
        }

        if ($password != $confirm_passwrod) {
            $error[] = 'password not matched!!!<br>';
        }

        if (empty($error)) {
            $homeModel = new HomeModel();
            $num_user = $homeModel->getUsername($username, $email);
            if (mysqli_num_rows($num_user)>0) {
                echo "<script type='text/javascript'>alert('Tai khoan da ton tai');javascript:history.go(-1)</script>";
            } else {
                $hashed_passcode = password_hash($password, PASSWORD_DEFAULT);
                $activation_code = substr(md5(uniqid(rand(), true)), 16, 16);
                if ($homeModel->handle_register($username, $email, 'user', $hashed_passcode, $activation_code)) {
                    require_once "assets/lib/contact.php";
                    $m = new sendMail();

                    $to = $email;
                    $tieudethu = "[CSE] Please verify your email address";
                    $noidungthu = "Bạn đã đăng kí tài khoản tại Web2Code2VN, để sử dụng tài khoản, vui lòng nhấp vào liên kết
            sau đây: <a href='http://localhost/cse485_1651060739_CaoHoaiSon/3.PROJECT/source/index.php?action=active&code=" . $activation_code . "'>Click Here</a>";

                    //dùng mail test, đừng dùng mail chính thức
                    $from = "ygiangson@gmail.com";

                    //pass email gmail
                    $p = "Chson2798"; //thay_mat_khau_cua_ban_vao_day
                    $m->sendMailFromLocalhost($to, $from, $tennguoigui = "CSE485-HoaiSon", $tieudethu, $noidungthu, $from, $p, $error);
                   require("views/home/register-page-successfully.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('loi truy van .$sql.');javascript:history.go(-1)</script>";
                }
            }

        } else {
            // echo '<pre>';
            //     print_r($error);
            // echo '</pre>';

            echo "<script type='text/javascript'>alert('Nhap day du thong tin!');javascript:history.go(-1)</script>";
        }

    }
    public function active(){
        if(isset($_GET['code'])){
            $homeModel =new HomeModel();
            $user = $homeModel -> activeAcc($_GET['code']);
            if($user!==null){
                $_SESSION['user'] = $user;
                header('Location:index.php');
            }else{
                echo "<script type='text/javascript'>alert('Ma code ko hop le!');javascript:history.go(-1)</script>";
            }
           
        }else{
            echo 'eo co j ca';
        }
    }
}
