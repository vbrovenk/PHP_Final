<?php
class Jaime extends Lannister {
    public function sleepWith($person) {
        if ($person instanceof Cersei) {
            echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
        }
        else if ($person instanceof Lannister) {
            parent::sleepWith($person);
        }
        else {
            echo "Let's do this." . PHP_EOL;
        }
    }
}
?>