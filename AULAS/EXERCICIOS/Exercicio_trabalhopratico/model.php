<?php 
require("connection.php");

function inserirPessoa($primeiroNome,$ultimoNome,$anoNascimento){
	global $mysqli;

	$sql="INSERT INTO pessoas (primeiroNome, ultimoNome, anoNascimento) VALUES ('$primeiroNome','$ultimoNome','$anoNascimento')";
		//Executar na base dados;
	if($mysqli->query($sql)){
		echo "<br>Utilizador inserido com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível inserir dados!" . $mysqli->error;
		echo "<br><br>" ;
		echo $sql;
	}

}

function alterarPessoa($primeiroNome,$ultimoNome,$anoNascimento, $id){
	global $mysqli;

	$sql = "UPDATE pessoas SET primeiroNome = '$primeiroNome', ultimoNome = '$ultimoNome', anoNascimento = '$anoNascimento' WHERE id =" .$id;
//Executar na base dados;
	if($mysqli->query($sql)){
		echo "<br>Utilizador editado com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível editar!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}

	header("Location: view.php");
}

function eliminarPessoa($id){
	global $mysqli;
	$sql = "DELETE FROM pessoas WHERE id=" .$id;
	if($mysqli->query($sql)){
		echo "<br>Utilizador eliminado com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível eliminar!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}
}
function listarPessoas(){
	global $mysqli;
	global $listaPessoas;
	$sql = "SELECT * FROM pessoas";

	$listaPessoas = $mysqli->query($sql);

	if($listaPessoas){
		//echo "<br>Lista de Utilizadores com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível consultar dados!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}
}

function pesquisarPessoas($textoPesquisa){
	global $mysqli;
	global $listaPessoas;

	$sql = "SELECT * FROM pessoas WHERE primeiroNome LIKE '%" . $textoPesquisa . "%' . $textoPesquisa LIKE '%" . $textoPesquisa ."%'";
	$listaPessoas = $mysqli->query($sql);

	if($listaPessoas){
		echo "<br>Utilizadores pesquisados om sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível pesquisar dados!" . $mysqli->error;
		echo "<br>";
		echo $sql;
	}

}

function listarPessoa($id){
	global $mysqli;
	global $detalhePessoa;

	$sql = "SELECT * FROM pessoas WHERE id=" .$id;
	return $mysqli->query($sql);

}


 ?>