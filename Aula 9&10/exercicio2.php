<!DOCTYPE html>
<html>
<head>
	<title>Exercicio_2</title>
</head>
<body>
<?php 

$a=1;
while($a <= 9){
	$a++;
	echo "abc ";
}

echo "<br>";

$s=0;
do{
	echo "xyz ";
	$s++;
}
while ( $s < 10);

echo "<br>";

for ($i=1; $i < 9; $i++) { 
		echo $i . " ";
	}
echo "<br>";


$itens =  array("A", "B", "C" , "D" , "E" , "F");


//ciclo Foreach
foreach ($itens as $item) {
	echo "Item ".  $item . " ";
	echo "<br>";
}
 ?>
</body>
</html>