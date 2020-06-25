<!DOCTYPE html>
<html>
<head>
	<title>Exercicio 5</title>
</head>
<body>
<?php 

 $cidades = array("Tokyo", "Mexico","City", "New York City","Mumbai", "Seoul","Shanghai", "Lagos","Buenos Aires", "Cairo", "London");

 foreach ($cidades as $cidade) {
	echo $cidade . ", ";
	echo "<br>";
}
rsort($cidades);
echo "<br>";
foreach ($cidades as $cidade) {
	echo $cidade. ", ";
}
array_push($cidades,"Los Angeles", "Cakcutta", "Osaka", "Beijing");
sort($cidades);
echo"<br>";
foreach($cidades as $cidade){
	echo $cidade . ", ";
}


 ?>
</body>
</html>