<?php
  $showResult = $showOperator = $operator = $x = $y = "";
  if (isset($_POST['calculate'])) {
    $x = $_POST['x_value'];
    $y = $_POST['y_value'];
    $operator = $_POST['operator'];

    switch ($operator) {
      case 'plus':
        $showResult = $x + $y;
        $showOperator = "+";
        break;
      case 'minus':
        $showResult = $x - $y;
        $showOperator = "-";
        break;
      case 'multiply':
        $showResult = $x * $y;
        $showOperator = "x";
        break;
      case 'divide':
        $showResult = $x / $y;
        $showOperator = "/";
        break;
      default:
        break;
    }
  }

  if (isset($_POST['reset'])) {
    $showResult = $showOperator = $operator = $x = $y = "";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ວຽກບ້ານ 1</title>
    <style>
      body, input {
        font-family: Phetsarath OT
      }
      input {
        border-radius: 8px;
        border-color: #009900;
        font-size: 12px;
        margin: 5px;
      }
      input.calculate_button {
        border-color: #009900;
        font-size: 12px;
        color: #ffffff;
        background: #009900;
        padding-left: 10px;
        padding-right: 10px;
      }
      input.calculate_button:hover {
        background: #00e600;
      }
      input.reset_button {
        border-color: #3498db;
        font-size: 12px;
        color: #ffffff;
        background: #3498db;
        padding-left: 10px;
        padding-right: 10px;
      }
      input.reset_button:hover {
        background: #3cb0fd;
      }
    </style>
  </head>
  <body>
    <h3 style="color: red">ວຽກບ້ານ ການສ້າງແບບຟອມເພື່ອຄຳນວນເລກ</h3>
    <form action="" method="post">
        <input type="number" name="x_value" value="<?= $x ?>" required="required">
        ບວກ(+) <input type="radio" name="operator" value="plus" required="required" <?php echo ($operator=="plus")?"checked":"" ?> >
        ລົບ(-) <input type="radio" name="operator" value="minus" required="required" <?php echo ($operator=="minus")?"checked":"" ?> >
        ຄູນ(x) <input type="radio" name="operator" value="multiply" required="required" <?php echo ($operator=="multiply")?"checked":"" ?> >
        ຫານ(/) <input type="radio" name="operator" value="divide" required="required" <?php echo ($operator=="divide")?"checked":"" ?> >
        <input type="number" name="y_value" value="<?= $y ?>" required="required">
        <input class="calculate_button" type="submit" name="calculate" value="ຄຳນວນ">
        <input class="reset_button" type="submit" name="reset" value="ຕັ້ງຄ່າໃໝ່">
    </form>
    <br><hr><br>
    <?php
    if (isset($_POST['calculate'])) {
      echo "<h3>ຜົນການຄິດໄລ່: <span style='color: blue'>$x $showOperator $y = </span> <span style='color: red;'>$showResult</span> </h3>";
    }
    ?>
  </body>
</html>
