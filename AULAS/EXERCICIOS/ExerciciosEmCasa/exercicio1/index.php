<!DOCTYPE html>
<html>
<head>
	<title>Exercicio1</title>
</head>
<body>
	<?php 
	
	//cria 3 variaveis e mostra las no ecra
	$txt = "Hello world!";
	$x = 5;
	$y = 10.5;

	echo $txt;
	echo "<br>";
	echo $x;
	echo "<br>";
	echo $y;
	echo "<br>";
	//mostra o tipo de valor
	$s = 5985;
	var_dump($s);
	echo "<br>";

	//array de objetos e mostra de que tipo é o objeto
	$cars = array("Volvo","BMW","Toyota");
	var_dump($cars);
	echo "<br>";

	//cria se uma classe carros
	class Car {
		//dentro da clasw Car
		function Car() {
			//A o modelo temo como objeto VW
			$this->model = "VW";
		}
	}

	// Cria se um novo objeto
	$herbie = new Car();

	// mostrar a propriedade do objeto
	echo $herbie->model;
	echo "<br>";

	//Array de carros
	$cars=array("Volvo","BMW","Toyota"); 
	//Mostrar as posições dos elementos do array
	echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
	echo "<br>";

	//if and if else
	$t = date("H");

	if ($t < "20") {
		echo "Have a good day!";
	}else {
		echo "Have a good night!";
	}


	?>
</body>
</html>