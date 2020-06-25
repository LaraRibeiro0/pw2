<?php 

$db_user = "root";
$db_pass = "";
$db_name = "useraccount";

$bd = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bd = new mysqli("localhost", "root", "", "useraccount");

if($bd->connect_error != ""){
		//Se aligação deu erro, o programa acaba aqui
	die("Erro:Unable to connect to database ".$bd->connect_error);
}
	//A ligação não deu erro (senão não estavamos aqui)
echo "<script>alert( 'Connection established!');</script>";


?>