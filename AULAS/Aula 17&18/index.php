<?php 

class User{
	public $userID;
	public $firstname;
	public $lastname;
	public $email;

	function __construct($userID, $firstname, $lastname, $email){
		$this->userID = $userID;
		$this->firstname = $firstname;
		$this->lastname= $lastname;
		$this->email = $email;
	}

}


//Estabelecer ligação
$mysqli = new mysqli ("localhost","root","","pw2");
$mysqli->set_charset('utf8');

//var_dump($mysqli);

if ($mysqli->connect_error != "") {

	die("Nao esta correto" . $mysqli->connect_error);
}
//ligacao nao deu erro(se nao nao estavamos aqui)
//echo "sucesso";

//definir a SQL que vamos executar na tabela de dados
$sql = " SELECT * FROM user";
$result = $mysqli->query($sql);

if ($result->num_rows > 0){
	
	$users = array();

	//Existem resultados na base de dados
	while ($row = $result->fetch_assoc()){

		$user = new User($row["userID"], $row["firstname"], $row["lastname"], $row["email"]);
		array_push($users, $user);
	}

	$usersJSON= json_encode($users, JSON_UNESCAPED_UNICODE);
	echo $usersJSON;

}

//Fechar base dados
$mysqli->close();
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Utilizadores-Crud</title>
</head>
<body>
	<h1>Utilizadores registados:</h1>
	<p>COnsulte em baixo a lista de utilizadores registados no nosso site.</p>

	<br>
	<h2>Inserir Utilizadores</h2>
	<form method="POST" action ="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<label form="nome">Nome:</label>
		<input type="text" name="nome" value ="<?php echo $pesquisaNome; ?>">
		<br><br>
		<button>Pesquisar</button>
	</form>

	<h2>Lista de Utilizadores</h2>
	<?php
	foreach ($users as $user) {
		echo "userID: ". $user->userID . "<br>";
		echo "name: ". $user->firstname . " " . $user->lastname .  "<br>";
		echo "email: ". $user->email . "<br>";

	}
	?>

</body>
</html>
