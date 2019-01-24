<?php
	session_start();
	require_once 'rollDice.php';
	require_once 'RedShip.class.php';
	if ($_SESSION['start'] == "StartGame") {
		echo "hewwdsa";	
		$redShip = new RedShip();
		print_r($redShip);
		$_SESSION['RedShip'] = serialize($redShip);
		$_SESSION['start'] = "StartedGame";
	}

	if (isset($_POST['go'])) {
		echo "OKOK232";
		$temp = unserialize($_SESSION['RedShip']);
		$temp->x += 20;
		$_SESSION['RedShip'] = serialize($temp);
		print_r($temp);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Battles</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		if ($_GET['page'] == 2) {
	?>
	<div class="content" style="background-color: black;">
		<div class="field">
			<img src="https://previews.123rf.com/images/praewpailin/praewpailin1606/praewpailin160600020/60968140-football-field-or-soccer-field-pattern-and-texture-abstract-soccer-field-or-football-field-backgroun.jpg">
		</div>
		<div class="player1">
			<p>Player1</p>
			<form method="POST">
				<input type="submit" name="go" value="GO">
			</form>
			<img src="https://i.stack.imgur.com/rsH6n.png" style="left:<?php echo unserialize($_SESSION['RedShip'])->x; ?>;">
		</div>
		<div class="player2">
			<p>Player2</p>
			<img src="https://opengameart.org/sites/default/files/ship5.png">
		</div>
		<div class="dice">
			<img src="<?php 
				if (isset($_POST['roll'])) { echo rollDice(); } ?>">
			<form method="POST">
				<input type="submit" name="roll" value="ROLL">
			</form>
		</div>
	</div>
	<?php
		} 
		else {
			$_SESSION['start'] = "StartGame";
			echo "<a href=\"?page=2\">Start</a>";
		}
	?>
</body>
</html>
