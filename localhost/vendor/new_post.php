<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новая запись</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <form action="create_posts.php" method="post">
        <input name="title" type="text" placeholder="title" maxlength="32" require/>
        <textarea name="content" type="text" placeholder="content" maxlength="1024" rows="3"></textarea>
        <img>
        <input type="submit"/>
        <?
            require("session.php");
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
        ?>
    </form>
</body>
</html>