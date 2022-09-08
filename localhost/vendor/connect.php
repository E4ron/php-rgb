<?php

    $connect = mysqli_connect('localhost', 'root', '', 'base');

    if (!$connect) {
        die('Error connect to DataBase');
    }