<?php
function ft_split($str) {
    if ($str != null) {
        $str = trim($str);
        while (strrpos($str, "  ")) {
            $str = str_replace("  ", " ", $str);
        }
        if ($str != null) {
            $words = explode(" ", $str);
            sort($words);
            return $words;
        }
    }
}
?>