<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';
require_once 'Vector.class.php';

class Camera {

    public static $verbose = false;

    private $_origin;
    private $_orientation;
    private $_width;
    private $_height;
    private $_fov;
    private $_ratio;
    private $_near;
    private $_far;

    private $_tT;
    private $_tR;
    private $_TRmultTT;
    private $_proj;

    public function __construct(array $kwargs) {
        if (isset($kwargs['origin'])) {
            $this->_origin = $kwargs['origin'];
        }
        if (isset($kwargs['orientation'])) {
            $this->_orientation = $kwargs['orientation'];
        }
        if (isset($kwargs['width'])) {
            $this->_width = $kwargs['width'];
        }
        if (isset($kwargs['height'])) {
            $this->_height = $kwargs['height'];
        }
        if (isset($kwargs['fov'])) {
            $this->_fov = $kwargs['fov'];
        }
        if (isset($kwargs['near'])) {
            $this->_near = $kwargs['near'];
        }
        if (isset($kwargs['far'])) {
            $this->_far = $kwargs['far'];
        }

        $this->_ratio = $this->_width / $this->_height;

        $this->_tT = $this->_builtInverse();
        $this->_tR = $this->_builtRotation();
        $this->_TRmultTT = $this->_tR->mult($this->_tT);
        $this->_proj = new Matrix(array('preset' => Matrix::PROJECTION, 'fov' => $this->_fov,
                'ratio' => $this->_ratio, 'near' => $this->_near, 'far' => $this->_far));

        if (self::$verbose == true) {
            echo "Camera instance constructed" . PHP_EOL;
        }
    }


    private function _builtInverse() {
        $tempVtx = new Vertex(array('x' => -$this->_origin->getX(), 'y' => -$this->_origin->getY(), 'z' => -$this->_origin->getZ()));
        $tempVct = new Vector(array('dest' => $tempVtx));
        $matrixT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $tempVct));

        return $matrixT;
    }

    private function _builtRotation() {
        $symmetry = clone $this->_orientation;    

        $symmetry->_matrix[0] = [$this->_orientation->_matrix[0][0], $this->_orientation->_matrix[1][0], $this->_orientation->_matrix[2][0], $this->_orientation->_matrix[3][0]];
        $symmetry->_matrix[1] = [$this->_orientation->_matrix[0][1], $this->_orientation->_matrix[1][1], $this->_orientation->_matrix[2][1], $this->_orientation->_matrix[3][1]];
        $symmetry->_matrix[2] = [$this->_orientation->_matrix[0][2], $this->_orientation->_matrix[1][2], $this->_orientation->_matrix[2][2], $this->_orientation->_matrix[3][2]];
        $symmetry->_matrix[3] = [$this->_orientation->_matrix[0][3], $this->_orientation->_matrix[1][3], $this->_orientation->_matrix[2][3], $this->_orientation->_matrix[3][3]];
        
        return $symmetry;
    }

    public function __toString() {
        $str = "Camera( " . PHP_EOL . 
            "+ Origine: " . $this->_origin . PHP_EOL . "+ tT:" . PHP_EOL .
            $this->_tT . PHP_EOL .
            "+ tR:" . PHP_EOL . $this->_tR . PHP_EOL .
            "+ tR->mult( tT ):" . PHP_EOL . $this->_TRmultTT . PHP_EOL . 
            "+ Proj:" . PHP_EOL . $this->_proj . PHP_EOL .
            ")";
        return $str;
    }

    public function watchVertex( Vertex $worldVertex ) {
        
    }

    public static function doc() {
		$str = file_get_contents("Camera.doc.txt");
		echo $str . PHP_EOL;
    }

    public function __destruct() {
        if (self::$verbose == true) {
            echo "Camera instance destructed" . PHP_EOL;
        }
    }
}
?>