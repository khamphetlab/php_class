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
  </head>

  <style>
    body {
      font-family: Phetsarath OT;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    table, td {
      border: 1px black solid;
    }
    tr:hover {
      background-color: buttonface;
    }
  </style>
  <body>

    <form action="" method="post">
      <fieldset>
        <legend>Multiply table</legend>

        <label>Input Row number: </label>
        <input type="number" name="rowsNo" value="<?= $rowsNo ?>" min="1">
        <br>

        <label>Input Column number: </label>
        <input type="number" name="colsNo" value="<?= $colsNo ?>" min="1">
        <br>

        <input type="submit" name="submit" value="Calculate">
        <br>
        <button onclick="window.location.reload(true)">Reload</button>
      </fieldset>
    </form>
    <br><br>

    <?php

      if (isset($_POST['submit'])) {
        $rowsNo = $_POST['rowsNo'];
        $colsNo = $_POST['colsNo'];

        echo "<table border='1'>";
          echo "<thead>";
            echo "<tr>";
              for ($i=0; $i < $rowsNo; $i++) {
                echo "<th>", $i+1, "</th>";
              }
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
            for ($i=1; $i < $colsNo; $i++) {
              echo "<tr>";
              echo "<td>", $i + 1, "</td>";
              for ($j=1; $j < $rowsNo; $j++) {
                echo "<td>", ($i+1)*($j+1) , "</td>";
              }
              echo "</tr>";
            }
          echo "</tbody>";
        echo "</table>";

      }

    ?>

  </body>
</html>
