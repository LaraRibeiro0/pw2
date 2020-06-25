<?php 

	//Estabelecer a ligação à base de dados
$mysqli = new mysqli("localhost", "root", "", "trabalhopratico");
$mysqli->set_charset('utf8');

if($mysqli->connect_error != ""){
		//Se aligação deu erro, o programa acaba aqui
	die("Erro: não foi possivel estabelecer ligação a base de dados ".$mysqli->connect_error);
}
	//A ligação não deu erro (senão não estavamos aqui)
echo "Estabelecida a ligação! <br><br>";

?>