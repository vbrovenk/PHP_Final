<?php
if (($_SERVER['PHP_AUTH_USER'] == "zaz") && ($_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")) {
	$file = file_get_contents("../img/42.png");
	echo '<html><body>'."\n";
	echo 'Hello Zaz<br />'."\n";
	echo "<img src='data:image/png;base64,"  . base64_encode($file) . "'>" . "\n";
	echo '</body></html>'."\n";
}
else {
	header("WWW-Authenticate: Basic realm=''Member area''");
	header("Connection: close");
	echo "<html><body>That area is accessible for members only</body></html>" . "\n";
}
?>
