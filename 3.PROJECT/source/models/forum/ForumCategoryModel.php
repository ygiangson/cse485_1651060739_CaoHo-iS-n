<?php
require_once 'models/Model.php';
class ForumCategoryModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }
    // get all big category
    public function getAllCategory()
    {
        $sql = "SELECT * FROM forum_category";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
  
}
