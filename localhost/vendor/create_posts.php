<?php

require_once("connect.php");
require_once("session.php");

$title = $_POST["title"];
$content = $_POST["content"];
$id = $user["id"];

echo $id;
echo $title;
echo $content;

if ($result = mysqli_query($connect, "INSERT INTO `posts` (`title`, `content`, `author`) VALUES ( '$title', '$content', '$id')")) {
    $_SESSION['message'] = 'Запись опубликована успешно!';
    header('Location: posts.php');
} else {
    $_SESSION['message'] = 'Запись не была опубликована';
    header('Location: new_post.php');
}

$_SESSION['message'] = null;