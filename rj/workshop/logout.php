<?php

session_start();
if (session_destroy()) { // ລືບ session ທັງໝົດ
    header("Location: login.php"); // ໄປໜ້າ login.php
}
?>
