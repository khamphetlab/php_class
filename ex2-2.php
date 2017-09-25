<?php

  $customer = $price = $percent = $discount = $pay = "";

  if (isset($_POST['process'])) {
    $customer = $_POST['customer'];
    $price = $_POST['price'];

    if ($price <= 100000) {
      $percent = 2;
    } elseif ($price <= 200000) {
      $percent = 3;
    } elseif ($price <= 500000) {
      $percent = 5;
    } else {
      $percent = 7;
    }

    // calculate discount and final price to pay
    $discount = $price * $percent / 100;
    $pay = $price - $discount;

  }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Find Discount</title>

    <style media="screen">
      body, input {
        font-family: Phetsarath OT;
      }
    </style>
  </head>
  <body>
    <h3 style="color: blue">ຫາສ່ວນຫຼຸດຂອງສິນຄ້າຈາກລາຄາສິນຄ້າທັງໝົດ</h3>
    <form action="" method="post">
      <fieldset>
        <legend>ແບບຟອມກວດສອບ</legend>

        <label>ຊື່ລູກຄ້າ:</label>
        <input type="text" name="customer" value="" size="30">
        <br><br>

        <label>ລາຄາທັງໝົດ:</label>
        <input type="number" name="price" value="" min="0" required>
        <br><br>

        <input type="submit" name="process" value="ປະມວນຜົນ">
      </fieldset>
    </form>
    <br><br>
    <hr>

    <?php
        echo "ລູກຄ້າ: $customer <br>";
        echo "ລາຄາສິນຄ້າທັງໝົດ ", number_format(doubleval($price), 2), "ກີບ<br>";
        echo "ສ່ວນຫຼຸດ: $percent%: ", number_format(doubleval($discount), 2), "ກີບ<br>";
        echo "ລາຄາທີ່ຕ້ອງຈ່າຍ: ", number_format(doubleval($pay), 2), "ກີບ<br>";
        echo "<br><br>";
        echo "<span style=' color: blue; font-size: 20px; font-weight:bold'> ຂອບໃຈທີ່ໃຊ້ບໍລິການ </span>";

    ?>

  </body>
</html>
