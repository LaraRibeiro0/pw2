<?php 
class user{
	private $utilizador;
	private $password;
}
public function_construct($utilizador, $password){

	$this->utilizador = $utilizador;
	$this->password = $password;
}
public function getUtilizador(){
	return $this->utilizador;
}
public function getPassword(){
	return $this->password;
}



$pessoa1= new user("lara", "3333");
$pessoa2= new user("pedro", "1111");
$pessoa3= new user("luis", "2222");
$pessoa4= new user("renata", "5555");
$pessoa5= new user("marco", "7777");
$pessoa6= new user("lara", "8888");

$users = array($pessoa1,$pessoa2,$pessoa3,$pessoa4,$pessoa5,$pessoa6);

$pessoa = new user($_REQUEST["utilizador"], $_REQUEST["password"]);

	verificar($users, $pessoa);

	function create($pessoa){
		array_push($GBOBALS("users"),$pessoa);

		return echo "criado com exito";

	}

	function verificar($users, $pessoa){
		foreach ($users as $user) {
			if ($pessoa == $user){
				return echo "Login Efetuado";

			}else {
				return create($pessoa);

			}
		}
	}
?>