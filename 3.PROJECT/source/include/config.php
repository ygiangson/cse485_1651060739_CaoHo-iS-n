<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db ='btl_web';
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        die('loi ket noi csdl!');
        exit();
    }
?>