#!/usr/bin/php
<?php

function check_sign($sign) {
    if ($sign == "+" || $sign == "-" || $sign == "*" || $sign == "/" || $sign == "%") {
        return false;
    }
    else {
        return true;
    }
}

if ($argc == 2) {
    $str = trim($argv[1]);
    $i = 1;

    while ($i < strlen($str) && check_sign($str[$i])) {
        $i++;
    }
    $left = substr($str, 0, $i);
    $sign = $str[$i];
    $i++;
    $right = substr($str, $i);

    $left = trim($left);
    $right = trim($right);

    if (is_numeric($left) && is_numeric($right)) {
        if ($sign == "+") {
            print($left + $right . "\n");
        }
        else if ($sign == "-") {
            print($left - $right . "\n");
        }
        else if ($sign == "*") {
            print($left * $right . "\n");
        }
        else if ($sign == "/") {
            if ((float)$right === 0.0) {
                return;
            }
            print($left / $right . "\n");
        }
        else if ($sign == "%") {
            if ((float)$right === 0.0) {
                return;
            }
            print($left % $right . "\n");
        }
        else {
            echo "Syntax Error\n";
        }
    }
    else {
        echo "Syntax Error\n";
    }
}
else {
    echo "Incorrect Parameters\n";
}
?>