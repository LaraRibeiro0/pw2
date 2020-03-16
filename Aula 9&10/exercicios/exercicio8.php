<!DOCTYPE html>
<html>
<head>
	<title>Exercicio 7</title>
</head>
<body>
<?php 

$cargo = "mod";

    switch ($cargo) {
        case "admin":
            echo "Bom dia " . $cargo . "!";
            break;
        case "mod":
            echo "Bom dia " . $cargo . "!";
            break;
        case "op":
            echo "Bom dia " . $cargo . "!";
            break;
        case "user":
            echo "Bom dia " . $cargo . "!";
            break;
        default:
            echo "Cargo inválido!";
            break;
    }
 ?>
</body>
</html>