<?php
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    require_once 'views/home/index.php';
    exit();
}
