<!DOCTYPE html>
<html>
<head>
	<title>Exercicio 6</title>
</head>
<body>
<?php 

$paises = array("Tokyo" => "Japan", "Mexico City" => "Mexico", "New York City" => "USA", "Mumbai" => "India", "Shanghai" => "China", "Lagos" => "Nigeria", "Buenos Aires" => "Argentina", "Cairo" => "Egypt","London" => "England");

    echo array_search("Japan", $paises) . " - " . $paises["Tokyo"] . "<br>";
    echo array_search("Mexico", $paises) . " - " . $paises["Mexico City"] . "<br>";
    echo array_search("USA", $paises) . " - " . $paises["New York City"] . "<br>";
    echo array_search("India", $paises) . " - " . $paises["Mumbai"] . "<br>";
    echo array_search("China", $paises) . " - " . $paises["Shanghai"] . "<br>";
    echo array_search("Nigeria", $paises) . " - " . $paises["Lagos"] . "<br>";
    echo array_search("Argentina", $paises) . " - " . $paises["Buenos Aires"] . "<br>";
    echo array_search("Egypt", $paises) . " - " . $paises["Cairo"] . "<br>";
    echo array_search("England", $paises) . " - " . $paises["London"];

 ?>
</body>
</html>