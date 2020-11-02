<?php
require("models/forum/ForumCategoryModel.php");
session_start();
class ForumController
{

    public function index()
    {

        // Chuyen cho View xu ly;
        require("views/forum/index.php");
    }

   
}
