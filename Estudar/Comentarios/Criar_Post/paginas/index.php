<?php

	include_once("connection.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	</head>
	<body>
		<div id="body">
		<center>
			<?php
			//procurar uma pagina
				if(isset($_GET['pagina'])){
					//recebe a get página
					$do = ($_GET['pagina']);
				}else{
					//se nao recebe inicio
					$do = "inicio";
				}
				//se existir pagina
				if(file_exists("paginas/".$do.".php")){
					include("paginas/".$do.".php");
				}else{
					//se nao 
					print 'Página não encontrada';
				}
			?>
			</center>
		</div>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>

<!-- javascript -->
<script type="text/javascript"></script>
<script>
	//Eliminar Comentario
    function deletecomment(id) {

     if(confirm("Tem certeza de que deseja excluir este comentário?")) {

        $.ajax({
            url: "comment_delete.php",
            type: "POST",
            data: 'idComentario ='+id,
            success: function(data){
                if (data)
                {
                    $("#idComentario"+id).remove();
                    if($("#count-number").length > 0) {
                        var currentCount = parseInt($("#count-number").text());
                        var newCount = currentCount - 1;
                        $("#count-number").text(newCount)
                    }
                }
            }
        });
    }
}