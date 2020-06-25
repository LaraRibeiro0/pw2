<?php
include_once 'db.php';
require("index.php");

$comment_id = $_POST['comment_id'];

//tabela comentarios
$sql_del = "DELETE FROM comentarios WHERE id = $comment_id";

$stmt = $conn->prepare($sql_del);
$stmt->execute();

if (! empty($stmt)) {
    echo true;
}
?>