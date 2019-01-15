#!/usr/bin/php
<?php
    if ($argc == 4) {
        $left = trim($argv[1]);
        $sign = trim($argv[2]);
        $right = trim($argv[3]);

        if (is_numeric($left) && is_numeric($right)) {
            if ($sign === "+") {
                print($left + $right . "\n");
            }
            else {
                echo "Incorrect Parameters\n";
            }
        }
        else {
            echo "Incorrect Parameters\n";
        }
    }
    else {
        echo "Incorrect Parameters\n";
    }
?>