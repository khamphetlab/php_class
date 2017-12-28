<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php

			$age = array("peter" => 32, "john" => 49, "TJ" => 23);

			echo "<br>";
			echo "Peter's age is ".$age['peter'];
			
			echo "<hr>";

			foreach ($age as $key => $value) {
				echo "<br> $key's age is $value";
			}

		?>
	</body>
</html>