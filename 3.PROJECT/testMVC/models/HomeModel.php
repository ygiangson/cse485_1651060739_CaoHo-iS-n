<?php
require_once 'Model.php';
class HomeModel extends Model
{
    public $connection;


    public function __construct()
    {
        $this->connection = $this->openConnect();
    }

    public function handle_login($username, $password)
    {
        $sql = "SELECt * FROM users WHERE email = '$username' OR username = '$username' AND status = 1";

        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                return $row;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    // check only username or email
    public function getUsername($username, $email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email' AND username = '$username'";
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

    public function handle_register($username, $email, $role, $hashed_passcode, $activation_code)
    {

        $sql = "INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `activation_code`, `status`) 
        VALUES (NULL, '$username',  '$email',  '$role', '$hashed_passcode', NOW(), '$activation_code', '0')";
        if (mysqli_query($this->connection, $sql)) {
            return true;
        }
        return false;
    }


    public function activeAcc($code)
    {
        $sql = "SELECT * FROM users WHERE activation_code = '$code'";
        $result = mysqli_query($this->connection, $sql);
        $user = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $sql = "UPDATE users SET status = 1 WHERE activation_code = '$code'";

            if (mysqli_query($this->connection, $sql)) {
                return $user;
            } else {
                return null;
            }
        }
    }
}
