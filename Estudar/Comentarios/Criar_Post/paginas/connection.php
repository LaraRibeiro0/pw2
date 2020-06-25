<!-- conectar à BD -->

<?php
// iniciar conexão
$connection = new mysqli("localhost", "root", "", "Kll");
$connection->set_charset("utf8");

// verificar conexão
if ($connection->connect_error) {
    die("Erro: " . $connection->error);
}else{
	echo  "teste Conecçao";
}
?>