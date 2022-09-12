<?php
require_once("connect.php");
$limit = 5;
$offset = 0;

$posts = mysqli_query($connect, "SELECT `post_id`, `title`, `content`, `create_date`, `id`, `login`, `photo_url`
                                        FROM 
                                            (SELECT  * 
                                             FROM `posts` 
                                                 left join `users` 
                                                     on `posts`.`author` = `users`.`id` 
                                             ) u
                                        WHERE u.`delete_date` is NULL
                                        ORDER BY `post_id` DESC
                                        LIMIT $limit
                                        OFFSET $offset
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
    <!-- <div class="content"> -->
    <header class="header">
        <div class="wrapper">
            <h1 class="Text">Лента новостей</h1>
            <div>            
                <a class="Text" href="../profile.php">Профиль</a>
                <a class="Text" href="cart.php">Корзина</a>
            </div>
        </div>
    </header>
    <div class="card-wrapper">
        <?
        if ($_SESSION['message']) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            sleep(5);
            $_SESSION["message"] = null;
        }

        if ($posts) {
            foreach ($posts as $row) {
                
                require("news.php");
            }
        } else {
            echo "Записей нет. Будьте первыми, кто опубликует здесь запись.";
        }
        ?>

    </div>
    <!-- </div> -->

</body>

</html>