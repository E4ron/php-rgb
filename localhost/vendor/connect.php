<?php

    $connect = mysqli_connect('localhost', 'root', '', 'base-db');

    if (!$connect) {
        die('Error connect to DataBase');
    }