<?php 
/*
//Metodo GET
if (isset($_GET["primeironome"]) && $_GET["primeironome"] != " " && isset($_GET["apelido"]) && $_GET["apelido"] != " ") {
	# code...

	// var_dump($_GET);
	echo "Olá " . $_GET ["primeironome"] . " " .  $_GET ["apelido"].  "!";
}else{
	echo "Tens de preencher os dois campos";
}




//Metodo Post
if (isset($_POST["primeironome"]) && $_POST["primeironome"] != " " && isset($_POST["apelido"]) && $_POST["apelido"] != " ") {
	# code...

	// var_dump($POST);
	echo "Olá " . $_POST ["primeironome"] . " " .  $_POST ["apelido"].  "!";
}else{
	echo "Tens de preencher os dois campos";
}
*/

//Metodo REQUEST
if (isset($_REQUEST["primeironome"]) && $_REQUEST["primeironome"] != " " && isset($_REQUEST["apelido"]) && $_REQUEST["apelido"] != " ") {
	# code...

	// var_dump($POST);
	echo "Olá " . $_REQUEST ["primeironome"] . " " .  $_REQUEST ["apelido"].  "!";
}else{
	echo "Tens de preencher os dois campos";
}


 ?>
