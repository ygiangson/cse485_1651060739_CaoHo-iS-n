<?php
require_once 'Model.php';
class NewsModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }

    public function addNews($title, $content, $img, $category, $hot, $public, $userID)
    {
        $sql = "INSERT INTO `news` (`id`, `title`, `content`, `view`, `hot`, `image`, `published`, `create_at`, `update_at`, `idCategory`, `idUser`) 
            VALUES (NULL, '$title', '$content', '0', '$hot', '$img', '$public', NOW(), NOW(), '$category', '$userID')";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }
    public function getAllNews($userID)
    {
        $sql = "SELECT news.id, news.title,news.published, news.create_at, category.name, users.username FROM news INNER JOIN category ON news.idCategory = category.id 
                INNER JOIN users ON news.idUser =users.id 
                WHERE users.id = $userID";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function deleteNews($idNews)
    {
        $sql = "DELETE FROM `news` WHERE `news`.`id` = $idNews";
        $result = mysqli_query($this->connection, $sql);
        // echo $sql;
        return $result;
    }

    public function selectOneNews($idNews)
    {
        $sql = "SELECT * FROM news WHERE id = $idNews";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function editNews($idNews, $title, $content, $hot, $img, $public, $userID, $category)
    {
        $sql = "UPDATE `news` 
                SET `title` = '$title', `content` = '$content',  `hot` = '$hot', `image` = '$img', `published` = '$public',  `update_at` = NOW(), `idCategory` = '$category', `idUser` = '$userID' 
                WHERE `news`.`id` = $idNews";
                echo $sql;
        $result = mysqli_query($this -> connection, $sql);
        return $result;
    }
}
