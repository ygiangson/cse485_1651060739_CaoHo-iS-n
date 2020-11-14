<?php
require("models/UserModel.php");
session_start();
class UserController
{

    public function index()
    {
        $user = new UserModel();
        $result = $user->getAllUser();

        // Chuyen cho View xu ly;
        require("views/user/index.php");
    }

    public function getListUser()
    {
        $user = new UserModel();
        $result = $user->getUsersWithRole('user');
        require_once 'views/user/users/index.php';
    }
    public function getListAdmin()
    {
        $user = new UserModel();
        $result = $user->getUsersWithRole('admin');
        require_once 'views/user/admin/index.php';
    }

    // thêm ngươi dùng
    public function addUser()
    {

        if (isset($_POST['btn-add-user'])) {
            $error = array();
            $username = $_POST['txt-username'];
            $password = $_POST['txt-password'];
            $confirm = $_POST['txt-confirm'];
            $email = $_POST['txt-email'];
            // $role = $_POST['slt-role'];
            // echo $role;
            $status = $_POST['slt-status'];
            $activation_code = substr(md5(uniqid(rand(), true)), 16, 16);
            $hashed_passcode = password_hash($password, PASSWORD_DEFAULT);

            if ($password != $confirm) {
                $error[] = 'mật khẩu không trùng khớp';
            }
            if (strlen($password) <= 8) {
                $error[] = 'mật khẩu dài hơn 8 kí tự ';
            }
            if (empty($error)) {
                $user = new UserModel();
                $result = $user->addUserModel($username, $email, 'user', $hashed_passcode, $activation_code,  $status);
                if ($result) {
                    header("Location: index.php?controller=user&action=getListUser");
                } else {
                    echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('loi mat khau');</script>";
            }
        }

        require "views/user/users/addUser.php";
    }
    // Admin

    public function addAdmin()
    {

        if (isset($_POST['btn-add-user'])) {
            $error = array();
            $username = $_POST['txt-username'];
            $password = $_POST['txt-password'];
            $confirm = $_POST['txt-confirm'];
            $role = 'admin';
            $email = $_POST['txt-email'];
            $status = '1';
            $activation_code = substr(md5(uniqid(rand(), true)), 16, 16);
            $hashed_passcode = password_hash($password, PASSWORD_DEFAULT);

            if ($password != $confirm) {
                $error[] = 'mật khẩu không trùng khớp';
            }
            if (strlen($password) <= 8) {
                $error[] = 'mật khẩu dài hơn 8 kí tự ';
            }
            if (empty($error)) {
                $user = new UserModel();
                $result = $user->addAdminModel($username, $email, $role, $hashed_passcode, $activation_code,  $status);
                if ($result) {
                    //echo "loooo";
                    header("Location: index.php?controller=user&action=getListAdmin");
                } else {
                    echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('xay ra loi');</script>";
            }
        }

        require "views/user/admin/addAdmin.php";
    }

    public function editUser()
    {
        if (isset($_GET['idUser'])) {
            $idUser = $_GET['idUser'];
            $user = new UserModel();
            $rowUser = mysqli_fetch_assoc($user->selectOnerUser($idUser));

            if (isset($_POST['btn-save-user'])) {
                $error = array();
                $username = $_POST['txt-username'];
                $email = $_POST['txt-email'];
                $role = $_POST['slt-role'];
                $userID = $_SESSION['user']['id'];
                // echo $role;
                $status = $_POST['slt-status'];
                // $activation_code = $rowUser['activation_code'];
                // $hashed_passcode = password_hash($password, PASSWORD_DEFAULT);


                if (empty($error)) {

                    $result = $user->updateUser($username, $email, $status, $role, $userID);
                    if ($result) {
                        header("Location: index.php?controller=user&action=getListUser");
                    } else {
                        echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('xay ra loi');</script>";
                }
            }
        }
        require "views/user/users/editUser.php";
    }
    public function deleteUser()
    {
        if (isset($_GET['idUser'])) {
            $idUser = $_GET['idUser'];
            $user = new UserModel();
            $is_delete = $user->deleteUser($idUser);
            if($is_delete){
                header("Location: index.php?controller=user&action=getListUser");
            }else{
                echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
            }
        } else {
        }
    }
}
