<?php
class Tyrion extends Lannister {
    public function sleepWith($person) {
        if ($person instanceof Lannister) {
            parent::sleepWith($person);
        }
        else {
            echo "Let's do this." . PHP_EOL;
        }
    }
}
?>