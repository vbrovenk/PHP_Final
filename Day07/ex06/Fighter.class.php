<?php
class Fighter {

	private $_typeSold;

	public function getType() {
		return $this->_typeSold;
	}

	public function __construct($temp) {
		$this->_typeSold = $temp;
	}
}
?>