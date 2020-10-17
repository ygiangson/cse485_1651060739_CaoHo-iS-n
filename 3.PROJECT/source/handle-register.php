<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_passwrod = $_POST['confirm-password'];
$role = $_POST['role'];
$error = array();


if (empty($username)) {
    $error[] = 'empty username! <br>';
}
if (empty($email)) {
    $error[] = 'empty email!<br>';
}

if (empty($password)) {
    $error[] = 'empty password<br>';
}
if (empty($confirm_passwrod)) {
    $error[] = 'empty confirm password!<br>';
}

if (strlen($password) <= 8) {
    $error[] = 'password must lenght more 8 character!!<br>';
}

if ($password != $confirm_passwrod) {
    $error[] = 'password not matched!!!<br>';
}

if (empty($error)) {
    // b1: ket noi csdl
    require("include/config.php");
    // B2: Khai bao truy van
    $sql = "SELECT * FROM users WHERE email = '$email' AND username = '$username'";
    $result = mysqli_query($conn, $sql);
    // B3: Kiem tra ban ghi co ton tai
    if (mysqli_num_rows($result) > 0) {
        echo "Nguoi dung voi Email da ton  tai";
    } else {
        $hashed_passcode = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $activation_code = substr(md5(uniqid(rand(), true)), 16, 16);
        /**
         * INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`, `activation_code`, `status`)
         *  VALUES (NULL, 'dadsa', 'dasdas', 'user', '', current_timestamp(), NULL, 'asdadas', '0')
         */
        $sql = "INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `activation_code`, `status`) 
        VALUES (NULL, '$username',  '$email',  '$role', '$hashed_passcode', NOW(), '$activation_code', '0')";
        if (mysqli_query($conn, $sql)) {
            require_once "contact.php";
            $m = new sendMail();

            $to = $email;
            $tieudethu = "[CSE] Please verify your email address";
            $noidungthu = "Bạn đã đăng kí tài khoản tại Web2Code2VN, để sử dụng tài khoản, vui lòng nhấp vào liên kết
            sau đây: <a href='http://localhost/cse485_1651060739_CaoHoaiSon/3.PROJECT/source/active.php?code=" . $activation_code . "'>Click Here</a>";

            //dùng mail test, đừng dùng mail chính thức
            $from = "ygiangson@gmail.com";

            //pass email gmail
            $p = "Chson2798"; //thay_mat_khau_cua_ban_vao_day
            $m->sendMailFromLocalhost($to, $from, $tennguoigui = "Web2Code2Vn", $tieudethu, $noidungthu, $from, $p, $error);
            header("Location: register-page-successfully.php");
            exit();
        } else {
            echo "Loi. Kiem tra lai cau truy van: " . $sql;
        }
    }
} else {
    // echo '<pre>';
    //     print_r($error);
    // echo '</pre>';

    echo implode($error);
}
