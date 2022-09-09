<?php
require_once("connect.php");
$limit = 10;
$offset = 1;

$posts = mysqli_query($connect, "SELECT `post_id`, `title`, `content`, `create_date`, `id`, `login`
                                        FROM 
                                            (SELECT  * 
                                             FROM `posts` 
                                                 left join `users` 
                                                     on `posts`.`author` = `users`.`id` 
                                                     LIMIT $limit
                                             OFFSET $offset
                                             ) u
                                        WHERE u.`delete_date` is NULL
                                        ORDER BY `post_id` DESC
                                        ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="wrapper">
        <h1 class="Text">Лента новостей</h1>
        <a class="Text" href="../profile.php">Профиль</a>
    </div>
</header>
<div class="wrapper card-wrapper">
    <?
    if ($_SESSION['message']) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        sleep(5);
        $_SESSION["message"] = null;
    }

    if ($posts) {
        foreach ($posts as $row) {
            require("card_render.php");
        }
    } else {
        echo "Записей нет. Будьте первыми, кто опубликует здесь запись.";
    }
    ?>

</div>
</body>

</html>