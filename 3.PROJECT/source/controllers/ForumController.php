<?php
require("models/forum/ForumCategoryModel.php");
require("models/forum/ForumSubCategoryModel.php");
require("models/forum/TopicModel.php");
require("models/forum/PostModel.php");
require("models/CategoryModel.php");
session_start();
class ForumController
{

    public function index()
    {
        // danh muc tin tuc
        $category = new CategoryModel();
        $listCategory = $category->getAllCategoryNews();
        // truy van danh sach 
        $forumCategory = new ForumCategoryModel();
        $forumSubCategory = new SubCategoryModel();
        $listCategoryForum = $forumCategory->getAllCategory();

        // lay chu de theo danh muc
        $topic = new TopicModel();

        //lay post theo danh muc
        $post = new PostModel();

        // Chuyen cho View xu ly;
        require("views/forum/index.php");
    }
    public function listTopic()
    {
        if (isset($_GET['idCate'])) {
            $idCate = $_GET['idCate'];
            $topic = new TopicModel();
            $post = new PostModel();
            $listTopic = $topic->getTopicByCategory($idCate);
           
        }
        require("views/forum/listTopic.php");
    }

    public function addTopic()
    {
        # code...
        if(isset($_POST['btn-add-topic'])){
            $title = $_POST['txt-title'];
            $content = $_POST['txt-content'];
            
        }
        require("views/forum/addTopic.php");
    }
}
