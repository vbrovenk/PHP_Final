<?php
class Color {
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = false;

	public function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			$this->red = (intval($kwargs['rgb']) & 0xFF0000) >> 16;
			$this->green = (intval($kwargs['rgb'] & 0x00FF00) >> 8);
			$this->blue = (intval($kwargs['rgb'] & 0x0000FF) >> 0);
		}
		if (array_key_exists('red', $kwargs)) {
			$this->red = intval($kwargs['red']) & 0x0000FF;
		}
		if (array_key_exists('green', $kwargs)) {
			$this->green = intval($kwargs['green']) & 0x0000FF;
		}
		if (array_key_exists('blue', $kwargs)) {
			$this->blue = intval($kwargs['blue']) & 0x0000FF;
		}
		if (self::$verbose == true) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.", $this->red, $this->green, $this->blue);
			print(PHP_EOL);
		}
	}

	public static function doc() {
		$str = file_get_contents("Color.doc.txt");
		echo $str . PHP_EOL;
	}

	public function add($inst) {
		$new_red = $this->red + $inst->red;
		$new_green = $this->green + $inst->green;
		$new_blue = $this->blue + $inst->blue;
		return new Color(array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue));
	}
	public function sub($inst) {
		$new_red = $this->red - $inst->red;
		$new_green = $this->green - $inst->green;
		$new_blue = $this->blue - $inst->blue;
		return new Color(array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue));
	}

	public function mult($coeff) {
		$new_red = $this->red * $coeff;
		$new_green = $this->green * $coeff;
		$new_blue = $this->blue * $coeff;
		return new Color(array('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue));
	}

	public function __toString() {
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	public function __destruct() {
		if (self::$verbose == true) {
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.", $this->red, $this->green, $this->blue);
			print(PHP_EOL);
		}
	}
}
?>