<?php
session_start();
unset($_SESSION['user']);
setcookie("session",$session, time() +0, "/");
header('Location: ../index.php');