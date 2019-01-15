#!/usr/bin/php
<?php
while (true) {
    echo "Enter a number: ";
    $input = fgets(STDIN);
    if ($input == NULL) {
        echo "\n";
        exit();
    }
    $input = trim($input);
    if (is_numeric($input) == true) {
        if ($input % 2 == 0) {
            echo "The number $input is even\n";
        }
        else {
            echo "The number $input is odd\n";
        }
    }
    else {
        echo "'$input' is not a number\n";
    }
}
?>