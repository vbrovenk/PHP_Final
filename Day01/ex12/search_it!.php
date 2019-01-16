#!/usr/bin/php
<?php
if ($argc > 2) {
    $result = null;
   for ($i = 2; $i < $argc; $i++) {
       $pair = trim($argv[$i]);
       $pair = explode(":", $pair);
       if (count($pair) == 2 && $argv[1] === $pair[0]) {
            $result = $pair[1];
       }
   }
   if ($result !== null) {
       echo $result . "\n";
   }
}
?>