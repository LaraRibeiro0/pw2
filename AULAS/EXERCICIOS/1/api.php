<?php 

    function CalcularCampos($num1, $num2){
        return $num1 + $num2;
    }

    if (isset($_POST['campos']) && !empty($_POST['campos'])) {
        $objJSON = $_POST['campos'];
        $obj = json_decode($objJSON);

        echo "{"total" : ".CalcularCampos($obj->campo1, $obj->campo2)."}";
    }

?>