<!DOCTYPE html>
<html>
<style>
	input[type=text], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		box-sizing: border-box;
	}

	input[type=submit] {
		width: 100%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	input[type=submit]:hover {
		background-color: #45a049;
	}

	div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
	}
</style>
<body>
	<h3>Insira o Nome</h3>
	<div>
		<form method="POST">
			<label for="username">Nome:</label>
			<input type="text" name="username" placeholder="escreva o seu nome.." required>

			<input type="submit" value="Submit">
		</form>
	</div>


	<?php

	if (isset($_POST['username'])){
		$cookie_name='nomeuser';
		$cookie_value=$_POST['username'];
		setcookie($cookie_name, $cookie_value , time() + (86400 * 30), "/");
	}

	?>

</body>
</html>

<!--
- Uma pagina com um formulario onde eu possa inserie o meu nome
- Quanso o formulario ´w submwtido, criar uma variavel de sessao para guardar esse nome
- Outra página em que vamor vuscar o nome a partir dessa variavel de sessao
-->

