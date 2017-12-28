<?php
$host = "localhost:3306";
$user = "root";
$password = "root";
$database = "workshop";

$link = mysqli_connect($host, $user, $password, $database) or die("ບໍ່ສາມາດເຊື່ອມຕໍ່ຖານຂໍ້ມູນໄດ້". mysqli_error($link));

?>

