<?php
require("models/CategoryModel.php");
session_start();
class CategoryController
{

    public function index()
    {
        // b1: khoi tao doi tuong
        $cate = new CategoryModel();
        // b2: truy van qua phuong thuc
        $result = $cate->getAllCategoryNews();
        // Chuyen cho View xu ly;
        require("views/category/index.php");
    }
    public function addCategory()
    {
        if (isset($_POST['btnAddCategory'])) {
            $name = $_POST['nameCategory'];
            $cate = new CategoryModel();
            $result = $cate->addCategoryNews($name);
            if ($result) {
                header('Location:index.php?controller=category');
                exit();
            } else {
                echo "<script type='text/javascript'>alert('xay ra loi');</script>";
            }
        }
        require_once 'views/category/addCategory.php';
    }

    public function editCategory()
    {
        if ($_GET['id']) {
            $id = $_GET['id'];
            $cate = new CategoryModel();
            $row =mysqli_fetch_assoc( $cate->selectOneCategory($id));
            if($row){
                if(isset($_POST['btnEditCategory'])){
                    $name = $_POST['nameCategory'];
                    $result = $cate ->editCategory($id,$name);
                    if($result){
                        header("Location:index.php?controller=category");
                        exit();
                    }else{
                        echo "<script type='text/javascript'>alert('Loi truy van'.$result);</script>";
                    }
                }
            }else{
                echo "<script type='text/javascript'>alert('xay ra loi');</script>";
            }
            require_once 'views/category/editCategory.php';
        }else{
            echo "<script type='text/javascript'>alert('id khong ton tai!!');</script>";
        }
    }
}
