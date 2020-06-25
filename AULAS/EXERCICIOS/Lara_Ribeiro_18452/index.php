<?php 
require("process.php");

if(isset($_REQUEST["firstname"]) && $_REQUEST["firstname"] != ""
	&& isset($_REQUEST["lastname"]) && $_REQUEST["lastname"] != ""
	&& isset($_REQUEST["anoN"]) && $_REQUEST["anoN"] != ""){

	//Foram preenchidos todos os campos do formulário de inserção
	//validar informação
	$firstname = $bd->real_escape_string($_REQUEST["firstname"]);
	$lastname = $bd->real_escape_string($_REQUEST["lastname"]);
	$anoN = $bd->real_escape_string($_REQUEST["anoN"]);

if (isset($_GET["alterarID"])) {
		//editar ultilizador
		//metodo editar utilizador
	editUser($firstname,$lastname,$anoN, $_GET['alterarID']);
}else{


	}
}

	//Eliminar USER
if (isset($_GET["eliminarID"])) {
	//remover utilizador
	deleteUser($_GET["eliminarID"]);
}

//Alterar USER
if (isset($_GET["alterarID"])) {
	$id = $_GET["alterarID"];
	$detalheUser = listUser($id)->fetch_assoc();
}
//Pesquisar User
if(isset($_GET['pesquisarNome'])){
	$pesquisarNome = mysqli_real_escape_string($bd, $_REQUEST['pesquisarNome']);
	SearchUsers($pesquisarNome);
}else{

	listUsers();
}


/*
// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
anoN VARCHAR(4),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($bd->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $bd->error;
}
*/



//Fechar base dados
$bd->close();

?>