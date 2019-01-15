<?php
function ft_is_sort(array $tab) {
    if ($tab != null) {
        $temp = $tab;
        sort($temp);
        if ($temp == $tab) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>