<?php
    $name = $_POST['name'];
    $description =$_POST['description'];
    $salary =$_POST['salary'];
    $gender = intval($_POST['sex']);
    $birthday = $_POST['birthday'];

    // b1: ket noi
    require("config.php");
    // b2: truy van csdl
    /**
     * INSERT INTO `employees` (`id`, `name`, `description`, `gender`, `salary`, `birthday`, `created_at`) 
     * VALUES (NULL, 'ddsaasd', 'dasdsadasdas', '1', '222222', '1998-27-10', current_timestamp())
     */
    $sql = "INSERT INTO `employees` (`id`, `name`, `description`, `gender`, `salary`, `birthday`, `created_at`) 
            VALUES (NULL, '$name', '$description', '$gender', '$salary', '$birthday', current_timestamp())";
    
    $result = mysqli_query($conn,$sql);
    if($result){
        header('Location:index.php');
    }else{
        echo 'loi cau lenh truy van '. $sql;
    }

?>