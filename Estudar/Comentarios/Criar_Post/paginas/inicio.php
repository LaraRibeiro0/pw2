<?php require("connection.php"); ?>
<?php include_once 'index.php' ?>
<div class="well well-sm">
	<?php	
	if(isset($_GET['posts'])){
		$pg = (int)$_GET['posts'];
	}else{
		$pg = 1;
	}
	//Divide os Posts por paginas
	$maximo = 2;
	$inicio = ($pg * $maximo) - $maximo;

	//Ordena o resultado Desc
	$sql = mysql_query("SELECT * FROM posts ORDER BY id");
	$conta = @mysql_num_rows($sql);

	if($conta <= 0){
		//Nao tem nenhuma 
		echo "Nenhuma publicação.";
	}else{
		//Aparece o Post
		while($row = mysql_fetch_array($sql)){
			$id = $row['id'];
			$titulo = $row['titulo'];
			$descricao = $row['descricao'];
			$foto = $row['foto'];
			$data = $row['data'];
			$hora = $row['hora'];
			$quantidadeVotos = $row['quantidadeVotos'];
			$quantidadeComentarios = $row['quantidadeComentarios'];
			$idUtilizador= $row['idUtilizador'];

			$sql = "SELECT * FROM utilizadores WHERE nomeUtilizador = '$idUtilizador'";
			$query = mysql_query($sql) or die (mysql_error());
			$linha = mysql_fetch_assoc($query);
			?>
			<div id="panel" align="left">
				<p><a href="#" class="titulo"><?php echo $titulo;?></a></p>
				<?php if($descricao != null){?><p class="descricao"><?php echo $descricao;?></p><?php }?>
				<!-- Foto refere-se foto de perfil -->
				<?php if($foto != null){?><p><img src="<?php echo $foto;?>" class="foto"/></p><?php }?>
				<p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Postado em: <?php echo $data." às ".$hora;?></br> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Postado por: <?php echo $linha['nomeUtilizador'];?></p>
			</div>


		<?php }}?>
	</div>

	<nav align="center">
		<ul class="pagination">
			<?php
			$seleciona = mysql_query("SELECT * FROM posts");
			$totalPosts = mysql_num_rows($seleciona);
			//Divisao dos posts por paginas
			$pags = ceil($totalPosts/$maximo);
			$links = 2;

			//Seleção de paginas (primeira pagina)
			echo '<li><a href="?pagina=inicio&posts=1" aria-label="Página Inicial"><span aria-hidde="true">&laquo;</span></a></li>';


			for($i = $pg - $links; $i <= $pg -1; $i++){
				if($i <= 0){}else{
					echo '<li><a href="?pagina=inicio&posts='.$i.'">'.$i.'</a></li>';
				}
			}

			echo '<li><a href="?pagina=inicio&posts='.$pg.'">'.$pg.'</a></li>';

			for($i = $pg + 1; $i <= $pg + $links; $i++)
				if($i > $pags){}else{
					echo '<li><a href="?pagina=inicio&posts='.$i.'">'.$i.'</a></li>';
				}
				//Seleção de paginas (ultima pagina)
				echo '<li><a href="?pagina=inicio&posts='.$pags.'" aria-label="Última página"><span aria-hidde="true">&raquo;</span></a></li>';
				?>
			</ul>
		</nav> 