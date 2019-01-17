#!/usr/bin/php
<?php
$week = "([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)";
$months = "(([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre))";

if ($argc == 2) {
    date_default_timezone_set('Europe/Paris');
    $patter = "/^" . $week . " \d{1,2} " . $months . " \d{4} \d{2}:\d{2}:\d{2}$/";
    if (preg_match($patter, $argv[1])) {
       $fr = array (
            "/[Ll]undi/" => "Monday",
            "/[Mm]ardi/" => "Tuesday",
            "/[Mm]ercredi/" => "Wednesday",
            "/[Jj]eudi/" => "Thursday",
            "/[Vv]endredi/" => "Friday",
            "/[Ss]amedi/" => "Saturday",
            "/[Dd]imanche/" => "Sunday",
            "/[Jj]anvier/" => "January",
            "/[Ff]évrier/" => "February",
            "/[Mm]ars/" => "March",
            "/[Aa]vril/" => "April",
            "/[Mm]ai/" => "May",
            "/[Jj]uin/" => "June",
            "/[Jj]uillet/" => "July",
            "/[Aa]out/" => "August",
            "/[Ss]eptembre/" => "September",
            "/[Oo]ctobre/" => "October",
            "/[Nn]ovembre/" => "November",
            "/[Dd]écembre/" => "December"
        );
       $time = $argv[1];
        foreach ($fr as $temp => $en) {
            $time = preg_replace($temp, $en, $time);
        }      
       echo strtotime($time) . "\n";
   }
   else {
       echo "Wrong Format\n";
   }
}
?>