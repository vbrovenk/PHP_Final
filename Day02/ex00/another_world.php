#!/usr/bin/php
<?php
if ($argc > 1) {
    $str = $argv[1];
    $str = preg_replace("/^\s+/", "", $str);
    $str = preg_replace("/\s+$/", "", $str);
    $str = preg_replace("/\s\s+/", " ", $str);
    echo $str . "\n";
}
?>