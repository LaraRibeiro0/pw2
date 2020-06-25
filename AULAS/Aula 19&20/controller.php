<?php 
require("model.php");

if(isset($_POST["primeiroNome"]) && $_POST["primeiroNome"] != ""
	&& isset($_POST["ultimoNome"]) && $_POST["ultimoNome"] != ""
	&& isset($_POST["email"]) && $_POST["email"] != ""){
		//Foram preenchidos todos os campos do formulário de inserção

	$primeiroNome = $mysqli->real_escape_string($_POST["primeiroNome"]);
$ultimoNome = $mysqli->real_escape_string($_POST["ultimoNome"]);
$email = $mysqli->real_escape_string($_POST["email"]);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "<br>ERRO: Email inválido!";
}else{
			//O email é válido, inserir na base de dados
	$sql = "INSERT INTO user (firstName, lastName, email) VALUES ('$primeiroNome', '$ultimoNome', '$email')";
	if($mysqli->query($sql)){
		echo "<br>Utilizador inserido com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível inserir na base de dados!";
	}
}

if (isset($_GET["alterarID"])) {
	editUser($primeiroNome,$ultimoNome,$email, $_GET['alterarID']);
}else{
	insertUser($primeiroNome,$ultimoNome,$email);
}
}

	//Eliminar USER
if (isset($_GET["eliminarID"])) {
	deleteUser($_GET["eliminarID"]);
}

//Alterar USER
if (isset($_GET["alterarID"])) {
	$userID = $_GET["alterarID"];
	$detalheUser = listUser($userID)->fetch_assoc();
}
//Pesquisar User
if(isset($_GET['pesquisarNome'])){
	$pesquisarNome = mysqli_real_escape_string($mysqli, $_REQUEST['pesquisarNome']);
	pesquisarNomes($pesquisarNome);
}else{

	listUsers();
}

//Fechar base dados
$mysqli->close();

?>