<?php
require_once 'models/Model.php';
class SubCategoryModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }
    // get all big category
    public function getSubCategory($idCate)
    {
        $sql = "SELECT * FROM forum_sub_category WHERE idBigCate = $idCate";
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }
  
}
