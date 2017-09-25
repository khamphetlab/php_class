<?php

  $score = $result = "";

  if (isset($_POST["cal"])) {
    $score = $_POST["score"];

    if ($score > 70) {
      $result = "ຜ່ານ!ຍິນດີນຳ";
    } else {
      $result = "ຕົກຈະ~";
    }
  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exam Score Check</title>

    <style media="screen">
      body, input {
        font-family: Phetsarath OT;
      }
    </style>
  </head>
  <body>
    <h3 style="color: blue">ຕົວຢ່າງຟອມ</h3>
    <form action="" method="post">
      <fieldset>
        <legend>ກວດສອບຄະແນນຜົນສອບເສັງ</legend>

        <label>ປ້ອນຄະແນນ:</label>
        <input type="number" name="score" value="<?= $score ?>" min="0" max="100" required>

        <input type="submit" name="cal" value="ກວດສອບຜົນ">
        <br>
      </fieldset>
    </form>
    <hr>
    <?php
      echo $result;
    ?>
  </body>
</html>
