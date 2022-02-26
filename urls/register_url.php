<?php
    require_once '../vendor/connect.php';
    $email = $_POST['mail'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $sql = "SELECT * FROM users";
    if ($connect->mysqli_query)
    if($password === $password_confirm){
        //ok
    }

?>