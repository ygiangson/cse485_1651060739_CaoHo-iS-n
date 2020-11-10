<?php
require_once 'models/Model.php';
class PostModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }
    // lay chu de theo danh muc

    public function getPostByTopic($idTopic)
    {
        $sql = "SELECT * FROM posts WHERE idTopic = $idTopic";
        $result = mysqli_query($this -> connection, $sql);
        return $result;
    }
  
}
