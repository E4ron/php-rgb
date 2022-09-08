<?php
require_once("connect.php");
$posts = mysqli_query($connect, "SELECT `post_id`, `title`, `content`, `id`, `login` FROM `posts` left join `users` on `posts`.`author` = `users`.`id` GROUP BY post_id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?
    echo "<header><div class=\"wrapper\"><h1 class=\"Text\">Лента новостей</h1><a class=\"Text\" href=\"../profile.php\">Профиль</a></div></header>";
    echo "<div class=\"wrapper card-wrapper\">";
    if ($posts) {
        echo "<div class=\"card\" style=\"width: 18rem;\">";
        foreach ($posts as $row) {

            echo "<div class=\"card-header\">";
            echo "<a href=\"/user?id=".$row["id"]."\" class=\"author\">".$row["login"]."</a>";
            echo "<h5 class=\"card-title\">".$row["title"]."</h5>";
            echo "</div>";
            if ($row["content"]) {
            
                echo "<div class=\"card-body\">";
                echo "<p class=\"card-text\" >".$row["content"]."</p>";
                echo "</div>";
                
            }
        }
        echo "</div>";
    } else {
        echo "Записей нет. Будьте первыми, кто опубликует здесь запись.";
    }
    echo "</div>";

    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }

    ?>
</body>

</html>