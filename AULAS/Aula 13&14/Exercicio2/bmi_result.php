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

	$alturaGet = $_GET['altura'];
	$pesoGet = $_GET['peso'];
	$pessoa = new calculator();
	$pessoa->set_altura($alturaGet);
	$pessoa->set_peso($pesoGet);

	echo $pessoa->bmi();

 ?>