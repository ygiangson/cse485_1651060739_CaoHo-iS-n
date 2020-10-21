<?php
require("models/NewsModel.php");
require("models/CategoryModel.php");
session_start();
class NewsController
{

    public function index()
    {
        $news = new NewsModel();
        $result = $news->getAllNews($_SESSION['user']['id']);
        // Chuyen cho View xu ly;
        require("views/news/index.php");
    }
    public function addNews()
    {
        $category = new CategoryModel();
        $listCategory = $category->getAllCategoryNews();
        if (isset($_POST['save-add'])) {
            $errors = array();
            $title = $_POST['txt-title'];
            $content = $_POST['txt-content'];
            $img = $_FILES['txt-img'];
            $category = $_POST['s-category'];
            $hot = $_POST['ck-hot'];
            $public = $_POST['ck-public'];
            $userID = $_SESSION['user']['id'];
            if (empty(trim($title))) {
                $errors[] = 'You forgot to enter title.';
            }


            if (empty(trim($content))) {
                $errors[] = 'You forgot to enter your password.';
            }

            if (empty(($img))) {
                $errors[] = 'You forgot chorme image.';
            }

            if (empty(($category))) {
                $errors[] = 'You forgot chorme image.';
            }

            if (empty($errors)) {
                // echo $public;
                $news = new NewsModel();
                $result = $news->addNews($title, $content, $img['name'], $category, $hot, $public, $userID);
                if ($result) {
                    move_uploaded_file($img['tmp_name'], 'assets/img/' . $img['name']);
                    header("Location:index.php?controller=news");
                } else {
                    echo "<script type='text/javascript'>alert('xay ra loi'.$result);</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
            }
        }
        require("views/news/addNews.php");
    }
    public function deleteNews()
    {
        if (isset($_GET['idDelete'])) {
            $id = $_GET['idDelete'];
            $news = new NewsModel();

            $result =  $news->deleteNews($id);
            echo $id;
            if ($result) {
                header("Location: index.php?controller=news");
            } else {
                echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
                require("views/news/index.php");
            }
        }
    }
    public function editNews()
    {
        $category = new CategoryModel();
        $listCategory = $category->getAllCategoryNews();
        $news = new NewsModel();
        // hien thi thong 1 ban ghi co san
        if (isset($_GET['idNews'])) {
            $id =$_GET['idNews'];
            $row = mysqli_fetch_assoc($news->selectOneNews($id));
            if (isset($_POST['btn-edit'])) {
                $errors = array();
                $title = $_POST['txt-title'];
                $content = $_POST['txt-content'];
                $img = $_FILES['txt-img'];
                $category = $_POST['s-category'];
                $hot = $_POST['ck-hot'];
                $public = $_POST['ck-public'];
                $userID = $_SESSION['user']['id'];
                if (empty(trim($title))) {
                    $errors[] = 'You forgot to enter title.';
                }
    
    
                if (empty(trim($content))) {
                    $errors[] = 'You forgot to enter your password.';
                }
    
                if (empty(($img))) {
                    $errors[] = 'You forgot chorme image.';
                }
    
                if (empty(($category))) {
                    $errors[] = 'You forgot chorme image.';
                }
    
                if (empty($errors)) {
                    echo 'ko co loi';
                    $result = $news -> editNews($id,$title,$content,$hot,$img['name'],$public,$userID,$category);
                    if($result){
                        header("Location: index.php?controller=news");
                    }else{
                        echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
                    }
                    
                } else {
                    echo "<script type='text/javascript'>alert('xay ra loi!!');</script>";
                }
            }
        }
       
        require("views/news/editNews.php");
    }
}
