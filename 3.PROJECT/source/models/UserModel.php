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

    //get user with role user
    public function getUsersWithRole($role)
    {
        $sql ="SELECT * FROM users WHERE `role` = '$role'";
        $result = mysqli_query($this -> connection, $sql);
        return $result;
    }

}
