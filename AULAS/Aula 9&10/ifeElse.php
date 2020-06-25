<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  

	$x = 2;
	$y= 2;
/*
	if ($x == $y) {
		echo "São iguais!";
	}else{
		echo "São diferentes!";
}

if ($x > $y) {
		echo "X é o maior!";
	}elseif ($x < $y) {
		echo "Y é o maior!";
	}else{
		echo "X é igual a X!";
	}
*/

function Compare($x, $y){
	if ($x > $y) {
		return "X é o maior!";
	}else{
		return "Y é o maior!";
	}
}




?>
</body>
</html>