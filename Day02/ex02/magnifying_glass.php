#!/usr/bin/php
<?php
if ($argc == 2) {
	$str = file_get_contents($argv[1]);

	function second($matches) {
		return strtoupper($matches[0]);
	}
	function third($matches) {
		$temp = str_replace($matches[1], strtoupper($matches[1]), $matches[0]);
		return $temp;
	}

	function first($matches) {
		$temp = preg_replace_callback("|>[^<]*<|", "second", $matches[0]);
		$temp = preg_replace_callback("|title=\"(.*)\"|", "third", $temp);
		return $temp;
	}
	$str = preg_replace_callback("|<a[^>]*>(.*?)</a>|is", "first", $str);
	print("$str\n");
}
?>