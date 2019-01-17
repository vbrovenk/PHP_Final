#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Kiev');
$fd = fopen("/var/run/utmpx", "r");

fseek($fd, 1256);
$result = array();
while (true)
{
    $str = fread($fd, 628);
    if ($str == null) {
        break;
    }
    $arr = unpack("a256user/a4id/a32terminal/ipid/itype/itime/iend", $str);
    array_push($result, $arr);
}
foreach ($result as $arr) {
    $arr["terminal"] = trim($arr["terminal"]);
    if ($arr["terminal"] == "console" && $arr["type"] == 7) {
        printf("%s %s  %s\n", trim($arr["user"]), trim($arr["terminal"]), date("M d H:i", $arr["time"]));
    }
}
foreach ($result as $arr) {
    $arr["terminal"] = trim($arr["terminal"]);
    if ($arr["terminal"] != "console" && $arr["type"] == 7) {
        printf("%s %s  %s\n", trim($arr["user"]), trim($arr["terminal"]), date("M d H:i", $arr["time"]));
    }
}
fclose($fd);

?>