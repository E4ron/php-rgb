<?php
require_once("vendor\connect.php");
$id = $_GET["id"];

if (!$id) {
    $_SESSION["message"] = "ID публикации не может быть пустым";
    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    return;
}
if (!is_numeric($id)) {
    $_SESSION["message"] = "ID публикации должен бьть числом";
    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    return;
} else {
    $_SESSION["message"] = null;
}

$query =  "SELECT `post_id`, `title`, `content`, `create_date`, `id`, `login`
            FROM 
                (SELECT  * 
                FROM `posts` 
                    left join `users` 
                        on `posts`.`author` = `users`.`id` 
                ) u
            WHERE u.`delete_date` is NULL
            AND u.`post_id` = '$id'
            ORDER BY `post_id` DESC";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
if ($row) {
    $page_title = "Публикация пользователя " . $row["login"];
} else {
    $page_title = "Не удалось получить информацию об этой публикации";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?
        echo $page_title;
        ?></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
<!-- Профиль -->
<header style="position:fixed; top: 0; padding: 1em;">
    <div class="wrapper">
        <h1 class="Text">
            <?
            echo $page_title;
            ?>
        </h1>
        <nav>
            <a href="vendor/posts.php" class="Text">Новости</a>
        </nav>
    </div>
</header>
<?
if ($_SESSION['message']) {
    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
} else {
    require_once("./vendor/card_render.php");
}
?>


</body>

</html>