<?php
require_once 'Model.php';
class UserModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }

    // get all user
    public function getAllUser()
    {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($this ->connection, $sql);
        return $result;
    }
}
