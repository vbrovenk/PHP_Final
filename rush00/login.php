<!DOCTYPE html>

<?php
require_once("database.php");

if (isset($_POST['login']) && isset($_POST['passwd']) && $_POST['submit'] == "OK") {
	$log = htmlspecialchars($_POST['login']);
	$pass = htmlspecialchars($_POST['passwd']);

	if ($log != '' && $pass != '') {
		$query = "SELECT * FROM `users` WHERE `login` = '$log' AND `password` = '$pass'";
		$query = mysqli_query($link, $query);

		if (mysqli_num_rows($query) == 1) {
			$row = mysqli_fetch_row($query);
			print_r($row);
			session_start();
			$_SESSION['login'] = $row[1];
			header("Location: http://localhost:8200/index.php");
		}
		else {
			echo "Doesn't exist. Try again";
		}
	}
}
else {
	echo "empty fields";
}
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div>
		<form method="POST">
			Username: <input type="text" name="login">
			<br>
			<br>
			Password:  <input type="text" name="passwd">
			<br>
			<br>			
			<input type="submit" name="submit" value="OK">
		</form>
	</div>
</body>
</html>