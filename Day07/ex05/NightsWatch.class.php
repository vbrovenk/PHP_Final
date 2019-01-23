<?php
class NightsWatch {
	private $_soldiers = array();

	public function recruit($sold) {
		if ($sold instanceof IFighter) {
			$this->_soldiers[] = $sold;
		}
	}

	public function fight() {
		foreach ($this->_soldiers as $sold) {
			$sold->fight();
		}
	}
}
?>