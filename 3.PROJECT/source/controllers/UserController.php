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

   
}
