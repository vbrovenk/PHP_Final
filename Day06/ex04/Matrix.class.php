<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';
require_once 'Vector.class.php';

class Matrix {

	public static $verbose = false;

	const IDENTITY = 'IDENTITY';
	const SCALE = 'SCALE';
	const RX = 'Ox ROTATION';
	const RY = 'Oy ROTATION';
	const RZ = 'Oz ROTATION';
	const TRANSLATION = 'TRANSLATION';
	const PROJECTION = 'PROJECTION';

	public $_matrix;

	private $_vector;
	private $_preset;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;

	public function __construct(array $kwargs = NULL) {
		if (isset($kwargs['preset'])) {
			$this->_preset = $kwargs['preset'];
			if (isset($kwargs['scale'])) {
				$this->_scale = $kwargs['scale'];
			}
			if (isset($kwargs['angle'])) {
				$this->_angle = $kwargs['angle'];
			}
			if (isset($kwargs['vtc'])) {
				$this->_vtc = $kwargs['vtc'];
			}
			if (isset($kwargs['fov'])) {
				$this->_fov = $kwargs['fov'];
			}
			if (isset($kwargs['ratio'])) {
				$this->_ratio = $kwargs['ratio'];
			}
			if (isset($kwargs['near'])) {
				$this->_near = $kwargs['near'];
			}
			if (isset($kwargs['far'])) {
				$this->_far = $kwargs['far'];
			}
		}
		if (self::$verbose == true) {
			if ($this->_preset == self::IDENTITY) {
				echo "Matrix " . $this->_preset . " instance constructed" . PHP_EOL;
			}
			else if ($this->_preset == NULL) {
				// echo "Matrix" . " instance constructed" . PHP_EOL;	
			}
			else {
				echo "Matrix " . $this->_preset . " preset instance constructed" . PHP_EOL;
			}
		}

		$this->_buildMatrix();
	}


	private function _buildMatrix() {
		if ($this->_preset == self::IDENTITY) {
			$this->_matrix[0] = [1, 0, 0, 0];
			$this->_matrix[1] = [0, 1, 0, 0];
			$this->_matrix[2] = [0, 0, 1, 0];
			$this->_matrix[3] = [0, 0, 0, 1];
		}
		else if ($this->_preset == self::TRANSLATION) {
			$this->_matrix[0] = [1, 0, 0, $this->_vtc->getX()];
			$this->_matrix[1] = [0, 1, 0, $this->_vtc->getY()];
			$this->_matrix[2] = [0, 0, 1, $this->_vtc->getZ()];
			$this->_matrix[3] = [0, 0, 0, 1];
		}
		else if ($this->_preset == self::SCALE) {
			$this->_matrix[0] = [$this->_scale, 0, 0, 0];
			$this->_matrix[1] = [0, $this->_scale, 0, 0];
			$this->_matrix[2] = [0, 0, $this->_scale, 0];
			$this->_matrix[3] = [0, 0, 0, 1];
		}
		else if ($this->_preset == self::RX) {
			$this->_matrix[0] = [1, 0, 0, 0];
			$this->_matrix[1] = [0, cos($this->_angle), -sin($this->_angle), 0];
			$this->_matrix[2] = [0, sin($this->_angle), cos($this->_angle), 0];
			$this->_matrix[3] = [0, 0, 0, 1];
		}
		else if ($this->_preset == self::RY) {
			$this->_matrix[0] = [cos($this->_angle), 0, sin($this->_angle), 0];
			$this->_matrix[1] = [0, 1, 0, 0];
			$this->_matrix[2] = [-sin($this->_angle), 0, cos($this->_angle), 0];
			$this->_matrix[3] = [0, 0, 0, 1];
		}
		else if ($this->_preset == self::RZ) {
			$this->_matrix[0] = [cos($this->_angle), -sin($this->_angle), 0, 0];
			$this->_matrix[1] = [sin($this->_angle), cos($this->_angle), 0, 0];
			$this->_matrix[2] = [0, 0, 1, 0];
			$this->_matrix[3] = [0, 0, 0, 1];
		}
		else if ($this->_preset == self::PROJECTION) {
			$this->_matrix[0] = [1 / tan(0.5 * deg2rad($this->_fov)) / $this->_ratio, 0, 0, 0];
			$this->_matrix[1] = [0, 1 / tan(0.5 * deg2rad($this->_fov)), 0, 0];
			$this->_matrix[2] = [0, 0, -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far), (2 * $this->_near * $this->_far) / ($this->_near - $this->_far)];
			$this->_matrix[3] = [0, 0, -1, 0];
		}
	} 

	public function mult(Matrix $rhs) {
		$result = new Matrix();
		for ($i = 0; $i < 4; $i++) {
        	for ($j = 0; $j < 4; $j++) {
        		$result->_matrix[$i][$j] = 0;
        		for ($k = 0; $k < 4; $k++){
        			$result->_matrix[$i][$j] += $this->_matrix[$i][$k] * $rhs->_matrix[$k][$j];
        		}
            }
        }
        return $result;
	}

	public function transformVertex(Vertex $vtx) {
		$result = array();
		$result['x'] = $this->_matrix[0][0] * $vtx->getX() + $this->_matrix[0][1] * $vtx->getY() + $this->_matrix[0][2] * $vtx->getZ() + $this->_matrix[0][3] * $vtx->getW();
		$result['y'] = $this->_matrix[1][0] * $vtx->getX() + $this->_matrix[1][1] * $vtx->getY() + $this->_matrix[1][2] * $vtx->getZ() + $this->_matrix[1][3] * $vtx->getW();
		$result['z'] = $this->_matrix[2][0] * $vtx->getX() + $this->_matrix[2][1] * $vtx->getY() + $this->_matrix[2][2] * $vtx->getZ() + $this->_matrix[2][3] * $vtx->getW();
		$result['w'] = $this->_matrix[3][0] * $vtx->getX() + $this->_matrix[3][1] * $vtx->getY() + $this->_matrix[3][2] * $vtx->getZ() + $this->_matrix[3][3] * $vtx->getW();
		return new Vertex($result);
	}


	public function __toString() {
		$str = "M | vtcX | vtcY | vtcZ | vtxO" . PHP_EOL .
				"-----------------------------" . PHP_EOL .
		sprintf("x | %.2f | %.2f | %.2f | %.2f", $this->_matrix[0][0], $this->_matrix[0][1], $this->_matrix[0][2], $this->_matrix[0][3]) . PHP_EOL .
		sprintf("y | %.2f | %.2f | %.2f | %.2f", $this->_matrix[1][0], $this->_matrix[1][1], $this->_matrix[1][2], $this->_matrix[1][3]) . PHP_EOL .
		sprintf("z | %.2f | %.2f | %.2f | %.2f", $this->_matrix[2][0], $this->_matrix[2][1], $this->_matrix[2][2], $this->_matrix[2][3]) . PHP_EOL .
		sprintf("w | %.2f | %.2f | %.2f | %.2f", $this->_matrix[3][0], $this->_matrix[3][1], $this->_matrix[3][2], $this->_matrix[3][3]);
		return $str;
	}
	public static function doc() {
		$str = file_get_contents("Matrix.doc.txt");
		echo $str . PHP_EOL;
	}

	public function __destruct() {
		if (self::$verbose == true) {
			echo "Matrix instance destructed" . PHP_EOL;	
		}
	}
}
?>