<?php
require_once 'Model.php';
class CategoryModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }

    // get all user
    public function getAllCategoryNews()
    {
        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($this ->connection, $sql);
        return $result;
    }

    public function addCategoryNews($nameCategory)
    {
        $sql = "INSERT INTO `category` (`id`, `name`) VALUES (NULL, '$nameCategory')";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
    public function selectOneCategory($id)
    {
        $sql ="SELECT * FROM category WHERE id = $id";
        $result =mysqli_query($this ->connection,$sql);
        return $result;
    }
    public function editCategory($id,$name)
    {
        $sql = "UPDATE category SET `name` = '$name' WHERE `id` = $id";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
}
