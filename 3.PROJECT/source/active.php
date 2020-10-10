<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    // b1; truy van csdl
    require("include/config.php");
    //b2: truy van
    $sql = "SELECT * FROM users WHERE activation_code = '$code'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE users SET status = 1 WHERE activation_code = '$code'";

        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION['user'] = $user;

            if ($user['role'] == 'user')
                header("Location:index.php");
            else
                header("Location:admin/admin.php");
            exit();
        } else {
            echo 'co loi xay ra!';
        }
    }
}
