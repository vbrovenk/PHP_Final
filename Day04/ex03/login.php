<?php
include_once("auth.php");

if (!empty($_GET['login']) && !empty($_GET['passwd'])) {
	session_start();

	if (auth($_GET['login'], $_GET['passwd'])) {
		echo "OK\n";
		$_SESSION['loggued_on_user'] =  $_GET['login'];
	}
	else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
}
else {
	echo "ERROR\n";
}
?>