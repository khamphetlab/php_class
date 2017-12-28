<?php
    session_start(); // ເລີ້ມຕົ້ນ session
    if(empty($_SESSION['login_user'])){
        mysqli_close($link); // ປິດການເຊື່ອມຕໍ່
        header('Location: login.php'); // ໄປໜ້າ index.php
    }
?>