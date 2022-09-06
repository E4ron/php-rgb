<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_login) > 0) {

        $_SESSION['message'] = 'Такой герой уже существует';
        header('Location: ..\register.php');

        die();
    }
    
    $error_fields = [];
    
    if ($login === '') {
        $error_fields[] = 'login';
    }
    
    if ($password === '') {
        $error_fields[] = 'password';
    }
    
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }
    
    if ($password_confirm === '') {
        $error_fields[] = 'password_confirm';
    }
    
    
    if (!empty($error_fields)) {

        $_SESSION['message'] = 'Проверь правельность полей';
        header('Location: ..\register.php');
    
        die();
    }

    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);

    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['name'];
        if (!move_uploaded_file($_FILES['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ../register.php');
        }

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES (NULL, '$login', '$email', '$password')");

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "login" => $user['login'],
            "email" => $user['email']
        ];

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
