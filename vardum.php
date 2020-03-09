<!DOCTYPE html>
<html>
<head>
	<title>php var dump()</title>
</head>
<body>
<?php
	$texto="Hello World!";
	$numeroInteiro= 123;

	var_dump($texto); //mostra que é string e a quantidade de carateres
	echo "<br>";
	var_dump($numeroInteiro);//mostra que é inteiro e a quantidade de carateres
	echo "<br>";
	echo "<br>";

//Outro exercicio com verdadeiro e falso
	$booleanaTexto= true;
	$booleanaNumero=1;
	var_dump($booleanaTexto);
	echo "<br>";
	var_dump($booleanaNumero);
	echo "<br>";
	echo ($booleanaTexto == $booleanaNumero);
	echo "<br>";
	var_dump($booleanaTexto == $booleanaNumero);
?>
</body>
</html>