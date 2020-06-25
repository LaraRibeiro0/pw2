
<?php 

function CalcularIdade($anoNascimento){
	return 2020 - $anoNascimento;
}
if(isset($_POST["dataNascimento"])&& $_POST["dataNascimento"] != ""){

	$objJSON=$_POST["dataNascimento"];
	$obj=json_decode($objJSON);

	echo "{\"idade\" :". CalcularIdade($obj->anoNascimento)."}";
}
?>