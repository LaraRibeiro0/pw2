<?php 
//chama o controler
require("controller.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trabalho Pratico II</title>
	<style type="text/css">
		body{
			background-color: #f5fffa;
		}
		#table {
			font-family: "arial";
			border-collapse: collapse;
			width: 58%;
			font-size:14px;
			position: absolute;

			
		}

		#table td, #table th {
			border: 1px solid #ddd;
			padding: 8px;

		}
		#table tr:hover {background-color: #b7d2bc;}

		p{
			font-size: 16px;
			text-align: center;
		}
		* {
			box-sizing: border-box;
		}


		.column1 {
			float: left;
			width: 40%;
			padding: 10px;
			height: 300px; 
		}
		.column2 {
			float: left;
			width: 60%;
			padding: 10px;
			height: 300px;
		}

		
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
	</style>

</head>
<body>
	<!-- Formulario-->
	<?php 
	if(isset($_GET['alterarID'])){
		$action = "view.php?alterarID=".$_GET['alterarID'];
	}else{
		$action = "view.php";
	}
	?>

	<div class="row">
		<div class="column1">
			<fieldset style ="border: 2px solid #e61500;">
				<p>PREENCHA OS SEGUINTES CAMPOS</p>
			</fieldset>
			<br>

			<!-- INSERIR UTILIZADOR -->
			<form method="POST" action="<?php echo $action ?>">
				<fieldset style ="border: 2px solid #e61500;">
					<legend>Insira um Utilizador:</legend>
					<label for="primeiroNome">Primeiro Nome:</label><br>
					<input type="text" name="primeiroNome" required value="<?php if(isset($detalhePessoa)){ echo $detalhePessoa['primeiroNome'];} ?>" />

					<br> <label for="ultimoNome">Ultimo Nome:</label><br>
					<input type="text" name="ultimoNome" required value="<?php if(isset($detalhePessoa)){ echo $detalhePessoa['ultimoNome'];} ?>" />

					<br> <label for="anoNacimento">Ano Nacimento:</label><br>
					<input type="text" name="anoNacimento" required value="<?php if(isset($detalhePessoa)){ echo $detalhePessoa['anoNacimento'];} ?>" />

					<?php if(isset($detalhePessoa)){ ?>
						<button style ="background-color: white; color: black;
						border: 2px solid #e61500; padding: 3px 20px; border-radius: 4px;">Atualizar</button>
					<?php } else {  ?>
						<button style ="background-color: white; color: black;
						border: 2px solid #e61500; padding: 3px 20px; border-radius: 4px;">Inserir</button>
					<?php } ?>
				</form>
			</fieldset>
			<br>

			<!-- PESQUISAS DO UTILIZADOR -->
			<form method="GET" action="view.php">
				<fieldset style ="border: 2px solid #e61500;" >
					<legend>Insira o Nome:</legend>
					<label for="textoPesquisa">Nome:</label>
					<input type="text" name="textoPesquisa" required value="<?php if(isset($_GET['textoPesquisa'])) { echo $_GET['textoPesquisa']; } ?>" />
					<button style ="background-color: white; color: black;
					border: 2px solid #e61500; padding: 3px 20px; border-radius: 4px;">Pesquisar</button>
					<?php 
					if(isset($_GET['textoPesquisa'])){
						?>
						<a href="view.php" style ="background-color: white; color: black;
						border: 2px solid #e61500; padding: 1.5px 20px; border-radius: 4px;" 
						>Apagar</a> 
						<?php
					}
					?>
				</form>
			</fieldset>
			<br>
		</div>

		<!-- Resultados -->
		<div class="column2">
			<!-- Tabela -->
			<fieldset style ="border: 2px solid #e61500;">
				<p>TABELA COM OS DADOS</p>
			</fieldset>
			<br>

			<table id="table" >
				<?php include("userList.php"); ?>
			</table>
		</div>
	</div>
</body>
</html>