<?php
require_once("vendor\connect.php");
require_once("vendor\session.php");
$id = $_GET["id"];

if (!$id) {
    $_SESSION["message"] = "ID пользователя не может быть пустым";
    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    return;
}
if (!is_numeric($id)) {
    $_SESSION["message"] = "ID пользователя должен бьть числом";
    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    return;
} else {
    $_SESSION["message"] = null;
}
if ($user_id = $_SESSION["user"]["id"]) {
    if ($id == $user_id) {
        header("Location: /profile.php");
    }
}
$query =  "SELECT login, email FROM users WHERE id = '$id' LIMIT 1";
$result = mysqli_query($connect, $query);
$current_user = mysqli_fetch_assoc($result);
if ($current_user) {
    $page_title = "Профиль " . $current_user["login"];
} else {
    $page_title = "Не удалось получить информацию об этом пользователе";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?
            echo $page_title;
            ?></title>
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
    }
    ?>
    <form>
        <h2 style="margin: 10px 0;"><?= "<div>" . $current_user['login'] . "</div>" ?></h2>
        <?
        echo "<a href=\"mailto:" . $current_user["email"] . "\">" . $current_user['email'];
        ?>
        </a>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>

</body>

</html>