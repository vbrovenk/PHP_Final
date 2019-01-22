<?php
class Vertex {
	public static $verbose = false;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color;

	public function __construct(array $kwargs) {
		if (array_key_exists('x', $kwargs)) {
			$this->_x = $kwargs['x'];
		}
		if (array_key_exists('y', $kwargs)) {
			$this->_y = $kwargs['y'];
		}
		if (array_key_exists('z', $kwargs)) {
			$this->_z = $kwargs['z'];
		}
		if (array_key_exists('w', $kwargs)) {
			$this->_w = $kwargs['w'];
		}
		if (array_key_exists('color', $kwargs)) {
			$this->_color = $kwargs['color'];
		}
		else {
			$this->_color = new Color(array('rgb' => 0xFFFFFF));
		}
		if (self::$verbose == true) {
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed", 
			$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			echo PHP_EOL;
		}
	}

	public function getX() {
		return $this->_x;
	}
	public function getY() {
		return $this->_y;
	}
	public function getZ() {
		return $this->_z;
	}
	public function getW() {
		return $this->_w;
	}
	public function getColor() {
		return $this->_color;
	}

	public function setX($value) {
		$this->_x = $value;
	}
	public function setY($value) {
		$this->_y = $value;
	}
	public function setZ($value) {
		$this->_z = $value;
	}
	public function setW($value) {
		$this->_w = $value;
	}
	public function setColor($value) {
		$this->_color = $value;
	}

	public function __toString() {
		if (self::$verbose == true) {
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
			$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);			
		}
		else {
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}
	public static function doc() {
		$str = file_get_contents("Vertex.doc.txt");
		echo $str . PHP_EOL;
	}

	public function __destruct() {
		if (self::$verbose == true) {
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed", 
			$this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			echo PHP_EOL;
		}
	}
}
?>