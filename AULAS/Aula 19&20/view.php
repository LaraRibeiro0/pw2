<!DOCTYPE html>
<html>
<head>
	<title>Trabalho Pratico II</title>
</head>
<body>
	<!-- Formulario-->
	<<?php 
		if(isset($_GET['alterarID'])){
			$action = "view.php?alterarID=".$_GET['alterarID'];
		}else{
			$action = "view.php";
		}
	 ?>

<form method="POST" action="<?php echo $action ?>">
	<label for="primeiroNome">Primeiro Nome:</label>
	<input type="text" name="primeiroNome" required value="<?php if(isset($detalheUser)){ echo $detalheUser['primeiroNome'];} ?>">

	<label for="ultimoNome">Ultimo Nome:</label>
	<input type="text" name="ultimoNome" required value="<?php if(isset($detalheUser)){ echo $detalheUser['ultimoNome'];} ?>">

	<label for="email">Email:</label>
	<input type="text" name="email" required value="<?php if(isset($detalheUser)){ echo $detalheUser['email'];} ?>">

	<?php if(isset($detalheUser)){ ?>
		<button>Atualizar</button>
	<?php } else {  ?>
		<button>Inserie</button>
	<?php ?>
</form>

</body>
</html>