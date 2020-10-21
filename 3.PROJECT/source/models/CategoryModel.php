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
}
