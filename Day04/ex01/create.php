<?php
if (file_exists("../private") == false) {
	mkdir("../private");
}
if (file_exists("../private/passwd") == false) {
	file_put_contents("../private/passwd", NULL);
}

function get_data() {
	$box = unserialize(file_get_contents("../private/passwd"));
	if ($box == NULL) {
		return NULL;
	}
	return $box;
}

if (!empty($_POST['login']) && !empty($_POST['passwd']) && $_POST['submit'] == "OK") {

	$box = get_data();
	if ($box == NULL) {
		$box = array();
	}
	$exist = false;
	if ($box != NULL) {
		foreach ($box as $arr) {
			foreach ($arr as $key => $value) {
				if ($key == "login" && $value == $_POST['login']) {
					$exist = true;
				}
			}
		}
	}
	if ($exist == false) {
		$box[] = array("login" => $_POST['login'], "passwd" => hash("whirlpool",$_POST['passwd']));
		$ser = serialize($box);
		file_put_contents("../private/passwd", $ser);
		echo "OK\n";
	}
	else {
		echo "ERROR\n";
	}
}
else {
	echo "ERROR\n";
}
?>