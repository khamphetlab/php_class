<!-- cookie -->

<?php ob_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php 

			$cookie_name = "user";
			$cookie_value = "john";

			setcookie($cookie_name, $cookie_value, time()+30);
			echo "cookie created!";
		?>

		<a href="ex7-2.php">Click to check cookie value</a>
	</body>
</html>