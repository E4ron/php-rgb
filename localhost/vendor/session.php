<?php
require_once 'connect.php';
    session_start();
    $session = $_COOKIE['session'];
    
    if(!empty($session)) {
        $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `session` = '$session'");
    
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user["id"],
            "photo" => $user["photo_url"],
            "login" => $user['login'],
            "email" => $user['email']
        ];
    }