<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	class Autor{
		public $nome;
		public $email;

		public function _construct($nome, $email){
			$this ->nome = $nome;
			$this ->email = $email;
		}
		public function getautor(){
			$this ->nome;
		}
		public function getEmail(){
			$this ->email;
		}
	}
	class livro{
		private $titulo;
		private $lista_autores = array();
		private $preco;

		public function _construct($nome,$lista_autores,$preco){
			$this ->nome = $titulo;
			$this ->lista_autores = $autores;
			$this ->preco = $preco;
		}

		public function getautor(){
			return $this->nome;
		}
		public function getlistautores(){

			return $this->autores;
		}

		public function getNomeAutores() {

			$array =array();

			for ($i=0; $i <count($this ->autores) ; $i++) { 
				array_push($array, $this ->autores[$i] -> getautor());
			}
			return $array;
			
		}
		public function getpreco(){
			echo $this -> $preco;
		}
	}


	$autor1 = new Autor("Lara" , "a18452@alunos.ipca.pt");
	$autor2 = new Autor("Sofia" , "a18452@alunos.ipca.pt");
	

	$arrayautor = array($autor1, $autor2);

	$livro1 = new livro ("Quarentena", $arrayautor, 20);
	$livro2 = new livro ("Quarentena2", $arrayautor, 10);

	echo $livro->getautor() . "<br>";
	$livro->getlistautores();
	$livro->getNomeAutores();

	foreach ($livro1 -> getNomeAutores() as $nome) {
		echo "Autor do livro: " . $nome  . "<br>";
	}
	?>
</body>
</html>