<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php 

			$cars = array("Jaguar", "BMW", "Porsche");

			echo "cars[0] = $cars[0]";
			echo "<br>cars[1] = $cars[1]";
			echo "<br>cars[2] = $cars[2]";

			echo "<hr>";

			// count(element) return number of index of element
			for ($i=0; $i < count($cars); $i++) { 
				echo "<br>cars[$i] = $cars[$i]";
			}

			echo "<hr>";

			foreach ($cars as $key => $value) {
				echo "<br>cars[$key] = $value";
			}

			echo "<hr>";

			foreach ($cars as $value) {
				echo "<br>\$cars = $value";
			}

		?>
	</body>
</html>