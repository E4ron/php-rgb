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
    <title>Мой профиль</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <!-- Профиль -->
    <header style="position:fixed; top: 0; padding: 1em;">
        <div class="wrapper">
            <h1 class="Text">Лента новостей</h1>
            <nav>
                <a href="vendor/posts.php" class="Text">Новости</a>
                <a href="vendor/new_post.php" class="Text">Поделиться мыслями</a>
            </nav>
        </div>
    </header>

    <form method="post" action="vendor/upload.php" enctype="multipart/form-data">
        <div>
            <h2 style="margin: 10px 0;"><?= "<div>Привет, " . $_SESSION['user']['login'] . "</div>" ?></h2>
            <?
                if ($_SESSION["user"]["photo"]) {
                    echo '<img class="avatar" src="vendor/uploaded_files/' . $_SESSION["user"]["photo"] . '" alt="Фото профиля">';
                }
            ?>
        </div>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <div>
            <span>Upload a File:</span>
            <input type="file" name="uploadedFile" />
            <input type="submit" name="uploadBtn" value="Upload" />
        </div>
        <a href="vendor/logout.php" class="logout">Выход</a>
        <?
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        ?>
    </form>
</body>

</html>