<?php include_once 'connection.php'; ?> 
<!-- Procurar Post --> <!--
<div class="well well-sm">
	<?php /*
	$titulo = $_GET['titulo'];
	$seleciona = mysql_query("SELECT * FROM posts WHERE titulo = '$titulo'");
	$conta = mysql_num_rows($seleciona);

	if($conta <= 0){
		echo "Post não encontrado";
	}else{
		while($row = mysql_fetch_array($seleciona)){
			$id = $row['id'];
			$titulo = $row['titulo'];
			$descricao = $row['descricao'];
			$imagem = $row['imagem'];
			$data = $row['data'];
			$hora = $row['hora'];
			$quantidadeVotos = $row['quantidadeVotos'];
			$quantidadeComentarios = $row['quantidadeComentarios'];
			$idUtilizador = $row['idUtilizadores'];

			$sql = "SELECT * FROM utilizadores WHERE nomeUtilizador = '$idUtilizador'";
			$query = mysql_query($sql);
			$linha = mysql_fetch_assoc($query);
			?> 


			<div id="panel" align="left"> 
				<!-- ao cliclar no titulo entra no post -->
				<p><a href="" class="titulo"><?php echo $titulo;?></a></p>
				<?php if($descricao != null){?><p class="descricao"><?php echo $descricao;?></p><? }?>
				<?php if($imagem != null){?><p><img src="<?php echo $imagem;?>" class="imagem"/></p><? }?>
				<p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Postado em: <?php echo $data." às ".$hora;?></br> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Postado por: <?php echo $linha['nome'];?></p>
			</div>

		<?php }}*/ ?> 
	</div> -->


	<!-- F U N C I O N A -->
	<!-- C O M E N T A R I O -->

	<div id="panel" align="left">
		<h3>Diga algo sobre esta publicação</h3>
		<hr/>
		<form action="" method="POST" enctype="multipart/form-data">
			<!-- Nome do utilizador -->
			<p><label>Nome do Utilizador</label></br> <input type="text" name="idUtilizador" id="idUtilizador" placeholder="" class="form form-control"/></p>
			<!-- Comentario -->
			<p><label>Digite o comentario</label><br><textarea name="comentario" id="comentario" placeholder="" class="form form-control"></textarea></p>
			<!-- Botão Submit -->
			<p align="right"><input type="submit" value="Enviar comentário" class="btn btn-success"></p>
			<input type="hidden" name="comentar" value="comment">
		</form>

		<!-- Comentar -->
		<?php
		//include 'publicar.php';
		if(isset($_POST['comentar']) && $_POST['comentar'] == "comment"){
			$idPost = $_POST['idPost'];
			$idUtilizador = $_POST['idUtilizador'];
			$comentario = $_POST['comentario'];

		//Defenição data hora
			date_default_timezone_set('Europe/Lisbon');
			$data = date("d/m/Y");
			$hora = date("H:i");

		//Necessário Preencher todos os campos
			if(empty($idUtilizador) || empty($comentario)){
				echo "Preencha todos os campos!";
			}else{
				$comentar = "INSERT INTO comentarios (idPost,idUtilizador, comentario) VALUES ('$idPost','$idUtilizador', '$comentario')";

				if(mysql_query($comentar)){
					echo "Comentário enviado com sucesso!";
				}
			}
		}
		?>

		<hr>

		<?php
		include_once 'index.php';
		$seleciona = mysql_query("SELECT * FROM comentarios WHERE id = '$id' ORDER BY id DESC");
		$conta = mysql_num_rows($seleciona);

		if($conta <= 0){
			echo "Este post ainda não possui comentários";
		}else{
			while($row = mysql_fetch_array($seleciona)){
				$idPost = $_POST['idPost'];
				$idUtilizador = $row['idUtilizador'];
				$comentario = $row['comentario'];
				$data = $row['data'];
				$hora = $row['hora'];
				?>
				<div id="comentarios" class="well well-sm">
					<!-- imagem teste -->
					<p><img src="imagens/nophoto.jpg" class="foto-comment"/><b><?php echo $idUtilizador;?></b></p>
					<p class="list-group-item"><?php echo $comentario;?></p>
					<p class="list-group-item"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo $data." às ".$hora;?></p>
				</div>

				<?php 	
				echo $idUtilizador;
				echo "<br>";
				echo $comentario;
				echo "<br>";
				echo $data;
				echo "<br>";
				echo $hora;
				echo "<br>";
			}
		}
		//Teste
		?> 
	</div>

	