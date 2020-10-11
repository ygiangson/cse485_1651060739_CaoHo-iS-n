<?php
include("include/save-session.php");
$errors = array();

$username = $_POST['username'];
if (empty($username)) {
    $errors[] = 'You forgot to enter your username.';
}

$password = $_POST['password'];
if (empty($password)) {
    $errors[] = 'You forgot to enter your password.';
}

if (empty($errors)) {

    require("include/config.php");
    // B2: Khai bao truy van

    $sql = "SELECt * FROM users WHERE email = '$username' OR username = '$username' AND status = 1";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($_POST['password'], $row['password'])) {

            session_start();
            $_SESSION['user'] = $row;
            $role = $_SESSION['user']['role'];
            // if ($role === 'user')
            //     header("Location:index.php");
            // else header("Location:admin/admin.php");
            header("Location:index.php");
            exit();
        } else {
            echo $_POST['password'];
            echo "Mat khau ko chinh xac";
        }
    } else {
        echo "Ko ton tai Tai khoan hoac Tai khoan chua duoc kich hoat";
    }
} else {
    echo "Hien thi loi";
}
