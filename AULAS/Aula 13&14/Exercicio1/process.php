<?php 


function CalcularIdade($ano){
	$idade = date("Y") - $ano;
	return $idade;
}
if(isset($_REQUEST["primeironome"]) && $_REQUEST["primeironome"] != "" 
	&& isset($_REQUEST["apelido"]) && $_REQUEST["apelido"] != "" 
	&& isset($_REQUEST["anonascimento"]) && $_REQUEST["anonascimento"] != ""){

	$anoIdade= CalcularIdade($_REQUEST["anonascimento"]);

echo $_REQUEST["primeironome"] . " " . $_REQUEST["apelido"] . " tem " . $anoIdade . " anos";

}else "Tens de preencher os campos";





?>
