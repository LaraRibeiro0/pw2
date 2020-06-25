<?php 

    function CalcularValores($valo1,$valor2){
        return $valo1 + $valor2;
    }

    if (isset($_POST['valor1']) && ($_POST['valor1']) != "" && isset($_POST['valor2']) && ($_POST['valor2']) != "") {

    	$objJSON1 = $_POST['valor1'];
    	$objJSON2 = $_POST['valor2'];

    	$obj1 = json_decode($objJSON1);
    	$obj2 = json_decode($objJSON2);

    	/*
        $objJSON = $_POST['valores'];
        $obj = json_decode($objJSON);
		*/
		
        echo "{\"total\" :" . CalcularValores($obj1->valor1, $obj2->valor2) . "}";
    }else
    {
    	echo "os campos nao se econtram preenchidos!";
    }
?>


