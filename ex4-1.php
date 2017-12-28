<?php

  $text = $dob = '';
  function data_input($data) {
    $data = trim($data); //delete whitspace infront and behind data input
    $data = stripslashes($data); //delete back-slash (\)
    $data = htmlspecialchars($data); // make var $data not affect to html

    return $data;
  }

  if (isset($_POST['submit'])) {
    $text = data_input($_POST['text']);
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ex4-1</title>
  </head>
  <body>
    <form method="post">
      <fieldset>
        <legend>Sample form for filter text input</legend>
        <label>ປ້ອນຂໍ້ມູນ</label>
        <br>
        <textarea rows="5" cols="50" name="text"><?= $text ?></textarea>
        <br>
        <input type="submit" name="submit" value="Submit">
      </fieldset>
    </form>
    <hr>
    <?= $text ?>
    <br>
    <?= $dob ?>
  </body>
</html>
