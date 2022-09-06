<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
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
    <script>
        let text = document.querySelector(".Text")
        let time = 1000
        setInterval(() => {
            console.log("Flame add")
            text.classList.toggle("Flame")
            setTimeout(() => {
                console.log("Flame remove")
                text.classList.toggle("Flame")
                time === 0 
                ? time = 1000
                : time = 0
            }, 1000)
        }, time)
    </script>

</body>
</html>