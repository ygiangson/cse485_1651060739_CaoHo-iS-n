<?php
    // Kiem tra va phan tich URL de xac dinh Controller va Action
    // http://localhost/prac11/?controller=A&action=B
    // 1. Xac dinh Controller va Action
    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';   
    // 2. Chuyen ?controller=user => User
    $controller = ucfirst($controller);
    //nối thêm chuỗi Controller vào
    $controller .= "Controller";
    // 3. Kiem tra FILE co ton tai hay ko
    $pathController = "controllers/$controller.php";
    // echo $pathController;
    if (!file_exists($pathController)) {
    die("Trang bạn tìm không tồn tại");
    }
    require_once "$pathController";
    // 4. Chuyen quyen xu ly tiep theo cho Controller cụ thể.
    $object = new $controller();
    $object->$action();


?>