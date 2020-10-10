<?php
    function saveSession($result){
        $user = mysqli_fetch_assoc(($result));
        session_start();
        $_SESSION['user'] = $user;
    }
?>