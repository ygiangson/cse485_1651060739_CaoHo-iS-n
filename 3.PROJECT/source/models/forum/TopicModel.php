<?php
require_once 'models/Model.php';
class TopicModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }
    // lay chu de theo danh muc

    public function getTopicByCategory($idCategory)
    {
        $sql = "SELECT * FROM forum_topic WHERE idCategory = $idCategory";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    public function addTopic($name, $content, $isChecked, $idUser, $idCategory)
    {
        $sql = "INSERT INTO `forum_topic` (`id`, `name`, `content`, `view`, `is_checked`, `create_at`, `idUser`, `idCategory`) 
                VALUES (NULL, '$name', '$content', '0', '$isChecked', current_timestamp(), '$idUser', '$idCategory')";
        $result = mysqli_query($this->connection, $sql);
        return $result;
        # code...
    }

    public function getTopicForAdmin()
    {
        $sql = "SELECT t.id, name,view,is_checked,create_at,u.username,c.content FROM forum_topic t 
                INNER JOIN forum_sub_category c ON t.idCategory = c.id 
                INNER JOIN users u ON t.idUser = u.id";
        $res = mysqli_query($this -> connection, $sql);
        return $res;
    }
}
