<!DOCTYPE html>
<html>
<head>
	<title>Exercicio 3</title>
</head>
<body>

	<form method="GET" action="<?php echo $_SERVER["PHP_SELF"];?>">

		Preenche os Dados: <br>

		<label for="nome">Altura(metros):</label>
		<input type="text" name="altura">

		<br>

		<label for="nome">Peso(kg):</label>
		<input type="text" name="peso">

		<br>
		<button type="submit">Submeter</button>
	</form>

	<?php 
class calculator{
	//propriedades
		public $altura;
		public $peso;

		public function _construct($altura, $peso){
			$this->altura = $altura;
			$this->peso = $peso;
		}
	
        public function set_Altura($altura)
        {
            $this->altura = $altura;
        }

        public function set_Peso($peso)
        {
            $this->peso = $peso;
        }

		public function Bmi() {
			$Bmi =($this->peso / ($this->altura * $this->altura));
			return $Bmi;
		}
	}

	if (isset($_GET['altura'])) {
		$alturaGet = $_GET['altura'];
	}else{
		$alturaGet='';
	}

	if (isset($_GET['peso'])) {
		$pesoGet = $_GET['peso'];
	}else{
		$pesoGet='';
	}


	if($alturaGet != "" && $pesoGet != ""){
		$pessoa =  new calculator();

		$pessoa->set_altura($alturaGet);
		$pessoa->set_peso($pesoGet);
		echo $pessoa->bmi();
	}
	else echo "Ainda não preencheu os campos";

	?>
</body>
</html>