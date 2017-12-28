<?php

    $host = "localhost:3306";
    $user = "root";
    $password = "root";
    $database = "com4_2";

    $link = mysqli_connect($host, $user, $password, $database);

    if ($link) {
        // echo "connect success";
    } else {
        // echo "error".mysqli_error($link);
    }

?>