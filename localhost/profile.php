<?php
if (!$_COOKIE['session']) {
    header('Location: /');
    return;
}
require("vendor\connect.php");
require("vendor\session.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <!-- Профиль -->

    <form>
        <h2 style="margin: 10px 0;"><?="<div class=\"Text\">Привет, ".$_SESSION['user']['login']."</div>"?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>
</body>
</html>