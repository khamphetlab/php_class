<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php

			if (isset($_COOKIE['user'])) {
				echo "Hello, ".$_COOKIE['user'];
			} else {
				header("Location: ex7-1.php");
			}

		?>
	</body>
</html>