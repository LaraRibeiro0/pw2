<?php

require("model.php");

if(isset($_REQUEST["primeiroNome"]) && $_REQUEST["primeiroNome"] != ""
	&& isset($_REQUEST["ultimoNome"]) && $_REQUEST["ultimoNome"] != ""
	&& isset($_REQUEST["anoNascimento"]) && $_REQUEST["anoNascimento"] != ""){

	$primeiroNome = $mysqli->real_escape_string($_REQUEST["primeiroNome"]);
	$ultimoNome = $mysqli->real_escape_string($_REQUEST["ultimoNome"]);
	$anoNascimento = $mysqli->real_escape_string($_REQUEST["anoNascimento"]);

if (isset($_GET["alterarID"])) {
		//editar ultilizador
		//metodo editar utilizador
		alteraPessoa($primeiroNome,$ultimoNome,$anoNascimento, $_GET['alterarID']);
	}else{
		//inserir utilizador
		//metodo inserir utilizador
		inserirPessoa($primeiroNome,$ultimoNome,$anoNascimento);
	}
}

if (isset($_GET["eliminarID"])) {
	//remover utilizador
	eliminarPessoa($_GET["eliminarID"]);
}

if (isset($_GET["alterarID"])) {
	$id = $_GET["alterarID"];
	$detalhePessoa = listarPessoa($id)->fetch_assoc();
}

if(isset($_GET['textoPesquisa'])){
	$textoPesquisa = mysqli_real_escape_string($mysqli, $_REQUEST['textoPesquisa']);
	pesquisarPessoas($textoPesquisa);
}else{

	listarPessoas();
}

//Fechar base dados
$mysqli->close();






  ?>