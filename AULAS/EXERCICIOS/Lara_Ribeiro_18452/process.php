<?php
//ligacoes
require_once('view.php');
require_once('index.php');
?>
<?php

if(isset($_POST)){
	

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$anoN 			= $_POST['anoN'];
	

		$sql = "INSERT INTO users (firstname, lastname, anoN) VALUES(?,?,?)";
		$stmtinsert = $bd->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $anoN]);

		if($result){

			echo "<script>alert( 'Successfully saved!');</script>";
			

		}else{

			echo "<script>alert( 'There were erros while saving the data!');</script>";

		}
}else{
	
	echo 'No data';
}

//ligacao connection
//require("connection.php");

//Funcao Editar Utilizador
function editUser($firstname, $lastname,$anoN,$id){
	global $bd;

	$sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', anoN = '$anoN' WHERE id=" .$id;

	//Executar na base dados;
	if($bd->query($sql)){
		echo "<script>alert('User edited successfully');</script>";

	}else{

		echo "<br>ERROR: Couldn't edit!" . $bd->error;
		echo "<br>";
		echo $sql;
	}

	header("Location: view.php");
}


//Funcao Eliminar Utilizador
function deleteUser($id){
	global $bd;

	$sql = "DELETE FROM users WHERE id =" .$id;

	//Executar na base dados;
	if($bd->query($sql)){
		echo "<script>alert('User successfully deleted');</script>";
	}else{
		echo "<br>ERROR: Could not delete!" . $bd->error;
		echo "<br>";
		echo $sql;
	}
}

//Funcao Listar Utilizadores
function listUsers(){
	global $bd;
	global $listaUtilizadores;

	$sql = "SELECT * FROM users";
		//Executar na base dados;
	$listaUtilizadores = $bd->query($sql);
		//Executar na base dados;
	if($listaUtilizadores){
		//echo "<br>Lista de Utilizadores com sucesso!";
	}else{
		echo "<br>ERROR: Could not query data!" . $bd->error;
		echo "<br>";
		echo $sql;
	}
}


//$pesquisaNome = "";

//funcao procurarUser
function SearchUsers($pesquisaNome){
	global $bd;
	global $listaUtilizadores;

	$sql= "SELECT * FROM users WHERE firstname Like '%" .$pesquisaNome ."%' OR lastname LIKE '%" .$pesquisaNome ."%'";

	//Executar SQL
	$listaUtilizadores = $bd->query($sql);

	if($listaUtilizadores){
		echo "<br>Successful users searched!";
	}else{
		echo "<br>ERROR: Data could not be searched!" . $bd->error;
		echo "<br>";
		echo $sql;
	}
}

//Funcao Listar Utilizador
function listUser($id){
	global $bd;
	global $detalheUser;

	$sql = "SELECT * FROM users WHERE id=" .$id;
	return $bd->query($sql);
}



 ?>