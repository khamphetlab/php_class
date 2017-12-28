<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border='1'>
      <thead>
        <tr>
          <?php
            echo "<th></th>";
            for ($i=0; $i < 9; $i++) {
              echo "<th>", $i+1, "</th>";
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
          for ($j=0; $j < 9; $j++) {
            echo "<tr>";
              echo "<th>", $j+1,"</th>";
              for ($i=0; $i < ($j+1); $i++) {
                echo "<td>", ($i+1)*($j+1), "</td>";
              }
              for ($k=($j+1); $k < 9; $k++) {
                echo "<td></td>";
              }
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
