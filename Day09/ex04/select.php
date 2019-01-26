<?php
$str = file_get_contents("list.csv");

$arr = explode("\n", $str);

for ($i=0; $i < count($arr); $i++) { 
	$arr[$i] = explode(";", $arr[$i]);
}
unset($arr[count($arr) - 1]);
$str = json_encode($arr);

echo $str;
?>