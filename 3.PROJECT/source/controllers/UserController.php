<?php
require("models/UserModel.php");
session_start();
class UserController
{

    public function index()
    {
        $user =new UserModel();
        $result = $user -> getAllUser();

        // Chuyen cho View xu ly;
        require("views/user/index.php");
    }

    public function getListUser()
    {
        $user = new UserModel();
        $result = $user -> getUsersWithRole('user');
        require_once 'views/user/users/index.php';
    }
    public function getListAdmin()
    {
        $user = new UserModel();
        $result = $user -> getUsersWithRole('admin');
        require_once 'views/user/admin/index.php';
    }

   
}
