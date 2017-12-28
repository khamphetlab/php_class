<?php

	$text = "";
	if (isset($_POST['submit'])) {
		$text = filter_input(INPUT_POST, 'text', FILTER_VALIDATE_EMAIL);
		echo $text;
	}

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<br>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label>Input: </label>
			<input type="text" name="text">
			<input type="submit" value="Submit" name="submit">
		</form>
	</body>
</html>