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
        <div class="profile">
            <div class="profile-name-photo">
                <h2 style="margin: 10px 0;"><?= "Привет, " . $_SESSION['user']['login']  ?></h2>
                <?
                if ($_SESSION["user"]["photo"]) {
                    echo '<img class="avatar" src="vendor/uploaded_files/' . $_SESSION["user"]["photo"] . '" alt="Фото профиля">';
                }
                ?>
            </div>
            <div class="profile-email">
                <a href="#"><?= $_SESSION['user']['email'] ?></a>
            </div>
            <div class="avatar-uploud">
                <input type="file" name="uploadedFile" id="file" />
                <input type="submit" name="uploadBtn" value="Загрузить фото профиля" id="submit" />
            </div>
            <a href="vendor/logout.php" class="logout">Выход</a>
            <?
            if ($_SESSION['message']) {
                echo '<div class="msg alert alert-important' ,'">'. $_SESSION['message'] .'</div>';
            }
            ?>
    </form>
    <script>
        let file = document.querySelector("#file");
        let submit = document.querySelector("#submit");

        file.addEventListener("input", submitEND);

        function submitEND() {
            if (file.value == "") {
                submit.disabled = true;
            } else {
                submit.disabled = false;
            }
        }
        submitEND()

        $('div.alert').not('.alert-important').delay(3000).slideUp(300)
    </script>

</body>

</html>