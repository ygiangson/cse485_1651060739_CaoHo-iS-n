<?php
require("models/HomeModel.php");
session_start();
class AdminController
{

    public function index()
    {

        // Chuyen cho View xu ly;
        require("views/admin/index.php");
    }

   
}
