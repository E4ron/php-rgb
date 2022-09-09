<?php

    require_once 'connect.php';
    require("session.php");

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password_cash` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "login" => $user['login'],
            "email" => $user['email']
        ];

        $session = md5(time());
        echo $session;
        $id = $user["id"];

        mysqli_query($connect, "UPDATE `users` SET `session`='$session' WHERE `id`='$id'");

        setcookie("session", $session, time()+ 60 * 60 * 3600, "/", "localhost");

        header('Location: ../profile.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        
        header('Location: ../index.php');
    }