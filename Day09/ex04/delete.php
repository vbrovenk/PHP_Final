<?php
$fd = fopen("list.csv", 'r');

$arr = array();

while (($line = fgetcsv($fd))) {
	$arr[] = $line;	
}

$id = $_GET['id'];

for ($i = 0; $i < count($arr); $i++) {
	$pair = explode(";", $arr[$i][0]);

	if ($pair[0] == $id) {
		unset($arr[$i]);
	}
}

file_put_contents("list.csv", "");

foreach ($arr as $line) {
	file_put_contents("list.csv", $line[0] . "\n", FILE_APPEND);
}
?>