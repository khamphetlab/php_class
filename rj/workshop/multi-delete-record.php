<?php

ob_start();

include 'connect-db.php';

for ($i = 0; $i < count($_POST['chkDel']); $i++) {
    $sql = "DELETE FROM emp WHERE empno = '" . $_POST['chkDel'][$i] . "' ";
    $result = mysqli_query($link, $sql);
}
header('Location: delete-record.php');
?>
