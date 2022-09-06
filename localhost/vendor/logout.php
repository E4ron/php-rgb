<?php
session_start();
unset($_SESSION['user']);
setcookie("login",$login, time() +0, "/");
header('Location: ../index.php');