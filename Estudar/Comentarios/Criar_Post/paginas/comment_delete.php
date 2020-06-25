<?php
//ligar ao index.php
require("index.php");

$idComentario = $_POST['idComentario'];

//Tabela comentarios variavel idComentario
$sql_del = "DELETE FROM comentarios WHERE id = $idComentario";
$stmt = $conn->prepare($sql_del);
$stmt->execute();

if (! empty($stmt)) {
    echo true;
}
?>