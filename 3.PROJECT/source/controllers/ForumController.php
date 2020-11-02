<?php
require("models/forum/BigCategoryModel.php");
session_start();
class ForumController
{

    public function index()
    {

        // Chuyen cho View xu ly;
        require("views/forum/index.php");
    }

   
}
