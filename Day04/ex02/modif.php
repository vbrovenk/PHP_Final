<?php
if (!empty($_POST['login']) && !empty($_POST['oldpw']) && !empty($_POST['newpw']) && $_POST['submit'] == "OK") {
	$box = unserialize(file_get_contents("../private/passwd"));
	if ($box != NULL) {
		foreach ($box as $key => $account) {
			if ($account['login'] == $_POST['login']) {
				if ($account['passwd'] == hash("whirlpool", $_POST['oldpw'])) {
					$box[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
					file_put_contents("../private/passwd", serialize($box));
					echo "OK\n";
					return ;
				}
			}
		}
		echo "ERROR\n";
	}
	else {
		echo "ERROR\n";
	}
}
else {
	echo "ERROR\n";
}
?>