<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php

			$cars = array(
				array("Volvo", 30, 25),
				array("BMW", 15, 10),
				array("Toyota", 20, 18)
			);

			echo "<table border='1'>";
				echo "<thead>";
				echo "<th>Company</th>";
				echo "<th>...</th>";
				echo "<th>...</th>";
				echo "</thead>";
				echo "<tbody>";

			foreach ($cars as $rowKey => $rowValue) {
				echo "<tr>";
				foreach ($rowValue as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";

		?>
	</body>
</html>