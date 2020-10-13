<?php

/**
 *DELETE FROM `employees` WHERE `employees`.`id` = 4
 */
if (isset($_GET['id'])) {
    $id =$_GET['id'];
   
    //b1 : ket noi csdl
    require("config.php");
    //b2: truy van csdl
    $sql = "DELETE FROM `employees` WHERE `employees`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('Location:index.php');
    }else{
        echo 'ko thanh cong';
    }
}
