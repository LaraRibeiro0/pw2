
<?php

class User{
	public $userID;
	public $firstname;
	public $lastname;
	public $idade;

	function __construct($userID, $firstname, $lastname, $idade){
		$this->userID = $userID;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->idade = $idade;
	}
}

$users = array();
$pesquisaNome = "";

//Funcao pesquisar User
function SearchUsers($mysqli, $pesquisaNome){
		//Definir o SQL que vamos executar na base de dados
	if($pesquisaNome != ""){
			//O utilizador pesquisou um nome!
		$pesquisaNome = $mysqli->real_escape_string($pesquisaNome);
		$sql = "SELECT * FROM user WHERE firstName LIKE '%".$pesquisaNome."%' OR lastName LIKE '%".$pesquisaNome."%'";
	}else{
			//Não foi pesquisado nenhum nome
		$sql = "SELECT * FROM user";
	}


	global $users;

	$result = $mysqli->query($sql);

	if($result->num_rows > 0){
			//Existem resultados na base de dados
		while($row = $result->fetch_assoc()){
			$user = new User($row["userID"], $row["firstname"], $row["lastname"], $row["idade"]);
			array_push($users, $user);
		}
	}
}

	//Verificar se o formulário de pesquisa foi preenchido
if(isset($_GET["nome"]) && $_GET["nome"] != ""){
		//O utilizador fez uma pesquisa
	$pesquisaNome = $_GET["nome"];
}

	//Estabelecer a ligação à base de dados
$mysqli = new mysqli("localhost", "root", "", "pw2");
$mysqli->set_charset('utf8');

if($mysqli->connect_error != ""){
		//Se aligação deu erro, o programa acaba aqui
	die("Could not connect! ".$mysqli->connect_error);
}

	//A ligação não deu erro (senão não estavamos aqui)
echo "sucesso!";

if(isset($_POST["primeiroNome"]) && $_POST["primeiroNome"] != ""
	&& isset($_POST["ultimoNome"]) && $_POST["ultimoNome"] != ""
	&& isset($_POST["idade"]) && $_POST["idade"] != ""){
		
	//Foram preenchidos todos os campos do formulário de inserção
	$primeiroNome = $mysqli->real_escape_string($_POST["primeiroNome"]);
	$ultimoNome = $mysqli->real_escape_string($_POST["ultimoNome"]);
	$idade = $mysqli->real_escape_string($_POST["idade"]);

if (!filter_var($idade, FILTER_VALIDATE_EMAIL)) {
	echo "<br>ERRO: Idade inválida!";
}else{
	//A idade é válida, inserir na base de dados
	$sql = "INSERT INTO user (firstName, lastName, idade) VALUES ('$primeiroNome', '$ultimoNome', '$idade')";
	if($mysqli->query($sql)){
		echo "<br>Utilizador inserido com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível inserir na base de dados!";
	}
}
}

if(isset($_GET["eliminar"]) && $_GET["eliminar"]!=""){
		//Temos um userID para eliminar
	$userID = $mysqli->real_escape_string($_GET["eliminar"]);
	$sql = "DELETE FROM user WHERE userID=".$userID;
	if($mysqli->query($sql)){
		echo "<br>Utilizador eliminado com sucesso!";
	}else{
		echo "<br>ERRO: Não foi possível eliminar utilizador na base de dados!";
	}	
}

SearchUsers($mysqli, $pesquisaNome);


$mysqli->close();
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Utilizadores - CRUD</title>
	<style>
		h2{
			font-weight: 16px;
			font-family: arial;
		}
	body{
		font-family: arial;
		font-weight: 12;
	}
	</style>
</head>
<body>

	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<fieldset>
			<legend><h2>Inserir Utilizador</h2></legend>

			<label for="primeiroNome">Primeiro nome:</label><br>
			<input type="text" name="primeiroNome">
			<br>

			<label for="ultimoNome">Ultimo nome:</label><br>
			<input type="text" name="ultimoNome">
			<br>

			<label for="idade">Idade:</label><br>
			<input type="text" name="idade">
			<br><br>
			
			<button style="background-color: #d9e0ff">Submeter</button>
		</fieldset>
	</form>


<h2>Lista de Utilizadores</h2>
<?php

foreach($users as $user){
	echo "UserID: ". $user->userID ."<br>";
	echo "Name: ". $user->firstname ." ". $user->lastname ."<br>";
	echo "Idade: ". $user->idade ."<br>";
			//Link de eliminar - envia um pedido GET ao servidor
	echo "<a href=" . $_SERVER["PHP_SELF"] . "?eliminar=". $user->userID .">Eliminar</a>";
	echo "<br>";
	echo "- - - - - - - - - - - - - - - - - -";
	echo "<br><br>";

}
?>

</body>
</html>