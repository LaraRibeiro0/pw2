<!-- Teste Connecção-->
<?php require("connection.php"); ?>

<div id="well well-sm">
	<div id="panel">
		<form action="" method="POST" enctype="multipart/form-data">
			<p><input type="text" name="titulo" id="titulo" placeholder="Insira um título" class="form form-control" /></p>
			<!-- idUtilizador -->
			<p><input type="text" name="idUtilizador" id="idUtilizador" placeholder="Nome do utilizador" class="form form-control" /></p>
			<!-- Descrição -->
			<p><textarea name="descricao" id="descricao" placeholder="Diga algo sobre esta publicação." class="form form-control"></textarea></p>
			<!-- Imagem -->
			<p><input type="file" name="imagem" id="imagem" class="form form-control" /></p>
			<!-- Publicar -->
			<p align="right"><input type="submit" value="Publicar" class="btn btn-default" /></p>
			<input type="hidden" name="enviar" value="send" />
		</form>

		<?php
		 require("index.php");
		if (isset($_POST['enviar']) && $_POST['enviar'] == "send") {
			//Teste
			echo "Publicação inserida com sucesso!";
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];
			$idUtilizador = $_POST['idUtilizador'];

			date_default_timezone_set('Europe/Lisbon');
			$data = date("d/m/Y");
			$hora = date("H:i:s");

			//mudar idUtilizador para nomeUtilizador
			if (empty($titulo) || empty($idUtilizador)) {
				echo "É obrigatório ter um titulo e colocar o nome do utilizador.";
				/*
			} else if ($uploadfile != null) {
				//URL IMAGENS 
				//MUDAR NOME DE FICHEIROS
				//Teste
				$uploaddir = 'imagens/uploads/';
				$uploadfile = $uploaddir . basename($_FILES['imagem']['tmp_name']);
				$imagemname = $uploaddir . basename($_FILES['imagem']['name']);

				if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
					echo "Imagem enviada com sucesso";
					$query = "INSERT INTO posts (titulo, descricao, imagem, data, hora, idUtilizador) VALUES ('$titulo', '$descricao', '$imagem', '$data', '$hora', '$idUtilizador')";

					if (mysqli_query($connection, $query)) {
						echo "Publicação inserida com sucesso!";
					}
				} else {
					echo "Erro ao enviar a imagem";
				} */
			} else {
				$query = "INSERT INTO posts (titulo, descricao,data, hora, idUtilizador) VALUES ('$titulo', '$descricao', '$data', '$hora', '$idUtilizador')";

				if (mysqli_query($connection, $query)) {
					echo "Publicação inserida com sucesso!";
				}
			}
			//Teste
			echo $titulo;
			echo "<br>";
			echo $idUtilizador;
			echo "<br>";
			echo $descricao;
			echo "<br>";
			echo $data;
			echo "<br>";
			echo $hora;
		}

		?>
	</div>
</div>

