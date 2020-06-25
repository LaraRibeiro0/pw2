<!DOCTYPE html>
<html>
<head>
	<title>Arrays</title>
</head>
<body>
<?php 


$Populacaocidades = array ("Lisboa"=> 100000, "Porto"=> 80000 , "Braga"=> 50000,"Aveiro"=> 50000, "Coimbra"=> 100000);
//Ver o que está dentro do array
print_r($Populacaocidades);
echo " A populaçãp de Braga é mais ou menos " . $Populacaocidades["Braga"] . " pessoas.";

echo "<br><br>";
//Desclaraçao de arrays indexados
$nomes =  array("João", "Manuel", "Zé", "" , "Pedro" , "Maria" , "luisa" , "Joana" );
sort($nomes);
print_r($nomes);
 ?>
</body>
</html>