<?php

/**
 *UPDATE `employees` SET `name` = 'test', `description` = 'dsdadasdasasdasda',
 * `gender` = '0', `salary` = '200000', `birthday` = '2020-10-15' WHERE `employees`.`id` = 5
 */
if (isset($_GET['id'])) {
    $id =$_GET['id'];
    $name = $_POST['name'];
    $des = $_POST['des'];
    $salary =$_POST['salary'];
    $gender= intval($_POST['sex']);
    $birthday = $_POST['birthday'];
    //b1 : ket noi csdl
    require("config.php");
    //b2: truy van csdl
    $sql = "UPDATE `employees` SET `name` = '$name', `description` = '$des', `gender` = '$gender', `salary` = '$salary', `birthday` = '$birthday' 
        WHERE `employees`.`id` = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
      
        header('Location:index.php');
    }else{
        echo 'ko thanh cong';
    }
}
