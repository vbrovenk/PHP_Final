#!/usr/bin/php
<?php
if ($argc > 1) {
    $str = trim($argv[1]);
    while (strrpos($str, "  ")) {
        $str = str_replace("  ", " ", $str);
    }
    $words = explode(" ", $str);
    if ($words[0]) {
        for ($i = 1; $i < count($words); $i++) {
            echo "$words[$i] ";
        }
        echo $words[0] . "\n";
    }
}
?>