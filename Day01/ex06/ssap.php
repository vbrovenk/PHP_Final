#!/usr/bin/php
<?php
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
    sort($result);
    foreach ($result as $elem) {
        echo "$elem\n";
    }
}
?>