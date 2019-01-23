<?php
class Targaryen {
	public function resistsFire() {
		return False;
	}

	public function getBurned() {
		if ($this->resistsFire() == False) {
			return "burns alive";
		}
		else {
			return "Daenerys emerges naked but unharmed";
		}
	}
}

?>