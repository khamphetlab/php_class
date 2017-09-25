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
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <br>
      <h3 style="color: red">ວຽກບ້ານ ການສ້າງແບບຟອມເພື່ອຄຳນວນເລກ</h3>
      <br>
      <form class="form-inline row" action="" method="post">
        <div class="form-check mb-2 mr-sm-2 mb-sm-0">
          <input class="form-control" type="number" name="x_value" value="<?= $x ?>" required="required">
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <label class="form-check-label" for="inlineFormInput">
            <input class="form-check-input" type="radio" name="operator" value="plus" required="required" <?php echo ($operator=="plus")?"checked":"" ?> >
             ບວກ(+)
          </label>
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <label class="form-check-label" for="inlineFormInput">
            <input class="form-check-input" type="radio" name="operator" value="minus" required="required" <?php echo ($operator=="minus")?"checked":"" ?> >
             ລົບ(-)
          </label>
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <label class="form-check-label" for="inlineFormInput">
            <input class="form-check-input" type="radio" name="operator" value="multiply" required="required" <?php echo ($operator=="multiply")?"checked":"" ?> >
             ຄູນ(x)
          </label>
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <label class="form-check-label" for="inlineFormInput">
            <input class="form-check-input" type="radio" name="operator" value="divide" required="required" <?php echo ($operator=="divide")?"checked":"" ?> >
             ຫານ(/)
          </label>
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <input class="form-control" type="number" name="y_value" value="<?= $y ?>" required="required">
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <input class="btn btn-success" type="submit" name="calculate" value="ຄຳນວນ">
        </div>
        <div class="form-group mb-2 mr-sm-2 mb-sm-0">
          <input class="btn btn-outline-warning" type="submit" name="reset" value="ຕັ້ງຄ່າໃໝ່">
        </div>
      </form>
    </div>
    <br><hr><br>
    <div class="container">
      <div class="row">
        <?php
        if (isset($_POST['calculate'])) {
          echo "<h3>ຜົນການຄິດໄລ່: <span style='color: blue'>$x $showOperator $y = </span> <span style='color: red;'>$showResult</span> </h3>";
        }
        ?>
      </div>
    </div>
  </body>
</html>
