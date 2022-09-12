<?php
require_once("session.php");
require_once("connect.php");
$limit = 10;
$offset = 1;
$myid = $_SESSION["user"]["id"];

$carts = mysqli_query($connect, "SELECT * FROM 
`cart` f LEFT JOIN 
(SELECT  `post_id`, `title`, `content`, `create_date`, `id`, `login`, `photo_url`
FROM 
    (SELECT  * 
     FROM `posts` 
         left join `users` 
             on `posts`.`author` = `users`.`id` 
     ) u
WHERE u.`delete_date` is NULL
ORDER BY `post_id` DESC) s
on f.product_id = s.post_id
WHERE f.user_id = '$myid'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Корзина</title>
</head>

<body>
    <header class="header">
        <div class="wrapper">
            <h1 class="Text">Корзина</h1>
            <div>            
                <a class="Text" href="../profile.php">Профиль</a>
            </div>
        </div>
    </header>
    <div class="card-wrapper">
    <?
        if ($carts) {
            foreach ($carts as $row) {
                require("carts.php");
            }
        } else {
            echo "Корзина пуста, добавь в неё умные мысли.";
        }
        ?>

    </div>
    </div>
</body>