<?php 
	header('Content-Type: application/json');
	
	function randomFloat($min = 0, $max = 1) {
    	return $min + mt_rand() / mt_getrandmax() * ($max - $min);
	}
	
	$x = array(randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1));
	$y = array(randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1),randomFloat(0,1));
	$tab =array("forme" => (array("x"=>$x, "y"=>$y) ));

	print(json_encode($tab));
	
?>
