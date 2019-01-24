<?php
function rollDice() {
	$value = rand(1, 6);

	if ($value == 1) {
		return "https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/U%2B2680.svg/240px-U%2B2680.svg.png";	
	}
	else if ($value == 2) {
		return "https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/U%2B2681.svg/240px-U%2B2681.svg.png";	
	}
	else if ($value == 3) {
		return "https://upload.wikimedia.org/wikipedia/commons/thumb/a/af/U%2B2682.svg/240px-U%2B2682.svg.png";	
	}
	else if ($value == 4) {
		return "https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/U%2B2683.svg/240px-U%2B2683.svg.png";	
	}
	else if ($value == 5) {
		return "https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/U%2B2684.svg/240px-U%2B2684.svg.png";	
	}
	else if ($value == 6) {
		return "https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/U%2B2685.svg/240px-U%2B2685.svg.png";	
	}
}

?>