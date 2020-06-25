<!DOCTYPE html>
<html>
<head>
	<title>Foreach</title>
</head>
<body>
<?php 
$nomes =  array("João", "Manuel", "Zé" , "Pedro" , "Maria" , "luisa" , "Joana" );


//ciclo Foreach
foreach ($nomes as $nome) {
	echo $nome . "; ";
	echo "<br>";
}
echo "<br>";

//Mesma coisa, ciclo for
for ($l=0; $l < count($nomes); $l++) { 
	echo $nomes[$l] . ";";
	echo "<br>";
}
echo "<br>";
$Populacaocidades = array ("Lisboa"=> 100000, "Porto"=> 80000 , "Braga"=> 50000,"Aveiro"=> 50000, "Coimbra"=> 100000);

foreach ($Populacaocidades as $cidade => $populacao) {
	echo $cidade . " tem " . $populacao . " habitantes.<br>";
}
 ?>
</body>
</html>