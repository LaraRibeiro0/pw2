<!DOCTYPE html>
<html>
<head>
	<title>ARRAY EM PHP</title>
</head>
<body>

<?php
	$colors = array("Red", "Green", "Blue");
	echo $colors[0];
	echo "<br>";

	$color_codes = array (
		"sangue" => "Red",
		"relva" => "Green" ,
		"ceu" => "Blue" 
	);
	echo "<br>";
	//var_dump($color_codes);
	echo $color_codes["ceu"];

?>
</body>
</html>