<?php
function ft_is_sort(array $tab) {
    if ($tab != null) {
        $temp = $tab;
        $temp_rev = $tab;
        
        sort($temp);
        rsort($temp_rev);
        
        if ($temp == $tab) {
            return true;
        }
        else if ($temp_rev == $tab) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>