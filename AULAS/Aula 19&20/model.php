<?php 

require("connection.php");

//Funcao Inserir Utilizador
function insertUser($primeiroNome, $ultimoNome,$email){
	global $mysqli;

	$sql = "INSERT INTO user (firstName, lastName, email) VALUES ('$primeiroNome', '$ultimoNome', '$email')";
	//Executar na base dados;
	if($mysqli->query($sql)){
		echo "<br>Utilizador inserido com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível inserir na base de dados!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}
}

//Funcao Editar Utilizador
function EditUser($primeiroNome, $ultimoNome,$email, $userID){
	global $mysqli;

	$sql = "UPDATE user SET primeiroNome = '$primeiroNome', $ultimoNome = '$ultimoNome', email = '$email' WHERE userID =" . $userID;

	//Executar na base dados;
	if($mysqli->query($sql)){
		echo "<br>Utilizador editado com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível editar!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}

	header("location: view.php");
}

//Funcao Eliminar Utilizador
function deleteUser($userID){
	global $mysqli;

	$sql = "DELETE FROM user WHERE userID =" . $userID;

	//Executar na base dados;
	if($mysqli->query($sql)){
		echo "<br>Utilizador elinado com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível eliminar!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}
}

//Funcao Listar Utilizadores
function listUsers(){
	global $mysqli;
	global $userList;

	$sql = "SELECT * FROM user";
		//Executar na base dados;
	$userList = $mysqli->query($sql);
		//Executar na base dados;
	if($userList){
		echo "<br>lista de Utilizadoreacom sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível consultar dados!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}
}
//Funcao SerchUser;
//variavel users é array
$users = array();
	//variavel pesquisaNome é = vazio
$pesquisaNome = "";

//funcao procurarUser
function SearchUsers($mysqli, $pesquisaNome){
	global $mysqli;
	global $userList;

	$sql= "SELECT * FROM user WHERE primeiroNome Like '%" .$pesquisaNome ."%' OR ultimoNome LIKE '%" .$pesquisaNome ."%'";

	//Executar SQL
	$userList = $mysqli->query($sql);

	if($userList){
		echo "<br>Utilizadores pesquisados om sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível pesquisar dados!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}
}

//Funcao Listar Utilizador
function listUser($userID){
	global $mysqli;
	global $detalheUser;

	$sql = "SELECT * FROM user WHERE userID=" .$userID;
	return $mysqli->query($sql);
}

?>