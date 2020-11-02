<?php
require_once 'models/Model.php';
class BigCategoryModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }
    // get all big category
    public function getAllSubCategory()
    {
        $sql = "SELECT * FROM forum_sub_category";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
  
}
