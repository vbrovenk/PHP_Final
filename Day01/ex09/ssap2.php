#!/usr/bin/php
<?php

function check($elem1, $elem2) {
	$pattern = "abcdefghijklmnoprstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
	for ($i = 0; $elem1[$i] && $elem2[$i]; $i++) {
		$pos1 = strpos($pattern, strtolower($elem1[$i]));
		$pos2 = strpos($pattern, strtolower($elem2[$i]));
		if ($pos1 > $pos2) {
			return true;
		}
		else if ($pos1 < $pos2) {
			return false;
		}
	}
	if ($elem1[$i] !== 0) {
		return true;
	}
	return false;
}

if ($argc > 1) {
    $i = 1;
    $result = array();
    while ($i < $argc) {
        $str = trim($argv[$i]);
        while (strrpos($str, "  ")) {
            $str = str_replace("  ", " ", $str);
        }
        $temp = explode(" ", $str);
        foreach ($temp as $elem) {
            $result[] = $elem;
        }
        $i++;
    }
    for ($i = 0; $i < count($result); $i++) {
		for ($j = $i + 1; $j < count($result); $j++) {
			if (check($result[$i], $result[$j])) {
				$temp = $result[$i];
				$result[$i] = $result[$j];
				$result[$j] = $temp;
			}
		}
    }
    if ($result[0]) {
        foreach ($result as $elem) {
            echo "$elem\n";
        }
    }
}
?>