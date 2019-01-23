<?php
class UnholyFactory {

	private $_absorbed = array();

	public function absorb($sold) {
		if ($sold instanceof Fighter) {
			if (!isset($this->_absorbed[$sold->getType()])) {
			$this->_absorbed[$sold->getType()] = $sold;
			echo "(Factory absorbed a fighter of type " . $sold->getType() . ")" . PHP_EOL;
			}
			else {
				echo "(Factory already absorbed a fighter of type " . $sold->getType() . ")" . PHP_EOL;
			}
		}
		else {
			echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
		}
	}

	public function fabricate($request_fighter) {
		if (isset($this->_absorbed[$request_fighter])) {
			echo "(Factory fabricates a fighter of type " . $request_fighter . ")" . PHP_EOL;
			return $this->_absorbed[$request_fighter];
		}
		else {
			echo "(Factory hasn't absorbed any fighter of type " . $request_fighter . ")" . PHP_EOL;
			return null;
		}
	}
}

?>