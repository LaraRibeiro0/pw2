<?php


	class User{
		public $userID;
		public $firstName;
		public $lastName;
		public $email;

		function __construct($userID, $firstName, $lastName, $email){
			$this->userID = $userID;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->email = $email;
		}
	}


	//Estabelecer a ligação à base de dados
	$mysqli = new mysqli("localhost", "root", "", "pw2");
	$mysqli->set_charset('utf8');

	if($mysqli->connect_error != ""){
		//Se aligação deu erro, o programa acaba aqui
		die("Could not connect! ".$mysqli->connect_error);
	}

	//A ligação não deu erro (senão não estavamos aqui)
	//console_log("Connection to DB established!");

	//Definir o SQL que vamos executar na base de dados
	$sql = "SELECT * FROM user";
	$result = $mysqli->query($sql);

	if($result->num_rows > 0){
		$users = array();
		//Existem resultados na base de dados
		while($row = $result->fetch_assoc()){
			$user = new User($row["userID"], $row["firstName"], $row["lastName"], $row["email"]);
			array_push($users, $user);
		}

		$usersJSON = json_encode($users, JSON_UNESCAPED_UNICODE);
		echo $usersJSON;
	}
	
	$mysqli->close();

?>