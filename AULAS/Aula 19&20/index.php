<?php
	//Class user
	class User{
		//coloco publico se nao nao da
		//variaveis
		public $userID;
		public $firstName;
		public $lastName;
		public $email;

		//funcoes contruct fazendo o $this
		function __construct($userID, $firstName, $lastName, $email){
			$this->userID = $userID;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->email = $email;
		}
	}

	//variavel users é array
	$users = array();
	//variavel pesquisaNome é = vazio
	$pesquisaNome = "";

	//funcao procurarUser
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
				$user = new User($row["userID"], $row["firstName"], $row["lastName"], $row["email"]);
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
	$mysqli = new mysqli("localhost", "root", "", "Aula1819");
	$mysqli->set_charset('utf8');

	if($mysqli->connect_error != ""){
		//Se aligação deu erro, o programa acaba aqui
		die("Could not connect! ".$mysqli->connect_error);
	}

	//A ligação não deu erro (senão não estavamos aqui)
	echo "Connection to DB established!";

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
	}

	if(isset($_GET["eliminar"]) && $_GET["eliminar"]!=""){
		//Temos um userID para eliminar
		$userID = $mysqli->real_escape_string($_GET["eliminar"]);
		//Fazemos o delete do userID
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
</head>
<body>
	<h1>Utilizadores registados: </h1>
	<p>Consulte em baixo a lista de utilizadores registados no nosso site.</p>

	<h2>Inserir Utilizador</h2>
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<label for="primeiroNome">Primeiro nome:</label>
		<input type="text" name="primeiroNome">
		<br>
		<label for="ultimoNome">Último nome:</label>
		<input type="text" name="ultimoNome">
		<br>
		<label for="email">Email:</label>
		<input type="text" name="email">
		<br><br>
		<button>Inserir</button>
	</form>

	<h2>Pesquisar</h2>
	<form method="GET" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" value="<?php echo $pesquisaNome; ?>">
		<br><br>
		<button>Pesquisar</button>
	</form>
	
	<h2>Lista de Utilizadores</h2>
	<?php
	foreach($users as $user){
			echo "userID: ". $user->userID ."<br>";
			echo "Name: ". $user->firstName ." ". $user->lastName ."<br>";
			echo "Email: ". $user->email ."<br>";
			//Link de eliminar - envia um pedido GET ao servidor
			echo "<a href=" ./* Devolve o url da pagina que estamos*/ $_SERVER["PHP_SELF"] . "?eliminar=". $user->userID .">Eliminar</a>";
			echo "<br><br>";
		}
	?>

</body>
</html>