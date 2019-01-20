<?php
function auth($login, $passwd) {
	$box = unserialize(file_get_contents("../private/passwd"));
	if ($box) {
		foreach ($box as $account) {
			if ($account['login'] == $login && $account['passwd'] == hash("whirlpool", $passwd)) {
				return true;
			}
		}
	}
	return false;
}
?>