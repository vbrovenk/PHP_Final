<?php
class Vector {
	public static $verbose = false;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;

	public function __construct(array $kwargs) {
		if (isset($kwargs['orig']) && isset($kwargs['dest'])) {
			$this->_x = $kwargs['dest']->getX() - $kwargs['orig']->getX();
			$this->_y = $kwargs['dest']->getY() - $kwargs['orig']->getY();
			$this->_z = $kwargs['dest']->getZ() - $kwargs['orig']->getZ();
			$this->_w = $kwargs['dest']->getW() - $kwargs['orig']->getW();
		}
		else {
			$temp_ver = new Vertex(array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
			$this->_x = $kwargs['dest']->getX() - $temp_ver->getX();
			$this->_y = $kwargs['dest']->getY() - $temp_ver->getY();
			$this->_z = $kwargs['dest']->getZ() - $temp_ver->getZ();
			$this->_w = $kwargs['dest']->getW() - $temp_ver->getW();
		}
		if (self::$verbose == true) {
			echo $this . " constructed" . PHP_EOL;
		}
	}

	public function __toString() {
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
							$this->_x, $this->_y, $this->_z, $this->_w);
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

	public function magnitude() {
		return sqrt(($this->_x ** 2) + ($this->_y ** 2) + ($this->_z ** 2));
	}

	public function normalize() {
		$length = $this->magnitude();
		$new_x = $this->_x / $length;
		$new_y = $this->_y / $length;
		$new_z = $this->_z / $length;
		$temp_dest = new Vertex(array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z));
		return new Vector(array ('dest' => $temp_dest));
	}

	public function add($rhs) {
		$new_x = $this->_x + $rhs->getX();
		$new_y = $this->_y + $rhs->getY();
		$new_z = $this->_z + $rhs->getZ();
		$temp_dest = new Vertex(array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z));
		return new Vector(array ('dest' => $temp_dest));
	}

	public function sub($rhs) {
		$new_x = $this->_x - $rhs->getX();
		$new_y = $this->_y - $rhs->getY();
		$new_z = $this->_z - $rhs->getZ();
		$temp_dest = new Vertex(array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z));
		return new Vector(array ('dest' => $temp_dest));
	}

	public function opposite() {
		$new_x = -$this->_x;
		$new_y = -$this->_y;
		$new_z = -$this->_z;
		$temp_dest = new Vertex(array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z));
		return new Vector(array ('dest' => $temp_dest));
	}
	
	public function scalarProduct($k) {
		$new_x = $this->_x * $k;
		$new_y = $this->_y * $k;
		$new_z = $this->_z * $k;
		$temp_dest = new Vertex(array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z));
		return new Vector(array ('dest' => $temp_dest));
	}

	public function dotProduct($rhs) {
		$new_x = $this->_x * $rhs->getX();
		$new_y = $this->_y * $rhs->getY();
		$new_z = $this->_z * $rhs->getZ();
		return $new_x + $new_y + $new_z;
	}

	public function crossProduct($rhs) {
		$new_x = $this->_y * $rhs->getZ() - ($this->_z * $rhs->getY());
		$new_y = $this->_z * $rhs->getX() - ($this->_x * $rhs->getZ());
		$new_z = $this->_x * $rhs->getY() - ($this->_y * $rhs->getX());
		$temp_dest = new Vertex(array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z));
		return new Vector(array ('dest' => $temp_dest));
	}

	public function cos($rhs) {
		$cosine = $this->dotProduct($rhs) / (abs($this->magnitude() * abs($rhs->magnitude())));
		return $cosine;
    }
    
    public static function doc() {
		$str = file_get_contents("Vector.doc.txt");
		echo $str . PHP_EOL;
    }
    
	public function __destruct() {
		if (self::$verbose == true) {
			echo $this . " destructed" . PHP_EOL;
		}
	}
}
?>