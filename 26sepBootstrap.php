<?php
  $rowsNo = $colsNo = "";
  if (isset($_POST['submit'])) {
    $rowsNo = $_POST['rowsNo'];
    $colsNo = $_POST['colsNo'];
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>For Loop</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </head>
  <body>
    <br>
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <fieldset>
            <legend>Multiply table</legend><br>

            <label>Input Row number: </label>
            <input type="number" name="rowsNo" value="<?= $rowsNo ?>" min="1">
            <br>

            <label>Input Column number: </label>
            <input type="number" name="colsNo" value="<?= $colsNo ?>" min="1">
            <br>
            <br>

            <input class="btn btn-primary" type="submit" name="submit" value="Calculate">
            <br><br>
            <button class="btn btn-outline-warning" onclick="window.location.reload(true)">Reload</button>
          </fieldset>
        </form>
      </div>
    </div>
    <br><hr><br>

    <div class="container">
      <div class="row">
        <?php

          if (isset($_POST['submit'])) {
            $rowsNo = $_POST['rowsNo'];
            $colsNo = $_POST['colsNo'];

            echo "<table class='table table-bordered table-hover'>";
              echo "<thead>";
                echo "<tr class='table-warning'>";
                  for ($i=0; $i < $rowsNo; $i++) {
                    echo "<th>", $i+1, "</th>";
                  }
                echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
                for ($i=1; $i < $colsNo; $i++) {
                  echo "<tr>";
                  echo "<th class='table-warning'>", $i + 1, "</th>";
                  for ($j=1; $j < $rowsNo; $j++) {
                    echo "<td>", ($i+1)*($j+1) , "</td>";
                  }
                  echo "</tr>";
                }
              echo "</tbody>";
            echo "</table>";

          }

        ?>
      </div>
    </div>

  </body>
</html>
