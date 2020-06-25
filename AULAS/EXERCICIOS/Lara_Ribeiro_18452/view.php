<?php
//chama ficheiro
require_once('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trabalho Pratico II</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Style -->
	<style>
		body{
			background-color: #FDFFE2;
		}
		
		.button {
			background-color: white; 
			color: black; 
			border: 2px solid #b10708;
			padding: 5px 90px;
		}

		.button:hover {
			background-color: #b10708;
			color: white;
		}
		.button_search{
			background-color: white; 
			border: 2px solid #b10708;
			padding: 3px 100px; 
			border-radius: 4px;
		}
		.button_search:hover {
			background-color: #b10708;
			color: white;
		}
		.btn-search{
			background-color: white; 
			border: 2px solid #b10708;
			padding: 3px 15px; 
			border-radius: 4px;

		}
		.btn-search:hover {
			background-color: #b10708;
			color: white;
		}
		.button_delete{
			background-color: white; color: black;
			border: 2px solid #b10708; 
			padding: 3px 100px; 
			border-radius: 4px;
		}
		.button_delete:hover {
			background-color: #b10708;
			color: white;
		}
		.btn-delete{
			background-color: white; color: black;
			border: 2px solid #b10708; 
			padding: 2.5px 14px; 
			border-radius: 4px;
		}
		.btn-delete:hover {
			background-color: #b10708;
			color: white;
		}
		p{
			font-size: 16px;
			text-align: center;
		}
		#table {
			font-family: "arial";
			border-collapse: collapse;
			width: 100%;
			font-size:14px;
			position: absolute;	
		}

		#table td, #table th {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}
		#table tr:hover {
			background-color: #b7d2bc;
		}
		#table tr:nth-child(even){background-color: #f2f2f2}

		#table th {
			background-color: #4CAF50;
			color: white;
		}


	</style>
</head>

<body>

	<div>
		<?php

		?>	
	</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #FDFFE2!important">
		<!-- LINK HOME -->
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand" href="view.php" style="font-family:Merriweather ">Home</a>
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<!-- BTN SEARCH-->
			<form class="form-inline my-2 my-lg-0">
				<input style="font-size:13px;" class="form-control mr-sm-2" type="text" class="form-control" name="pesquisaNome" placeholder="Search User" required value="<?php if(isset($_GET['pesquisaNome'])) { echo $_GET['pesquisaNome']; } ?>" />
				<button class="btn-search" type="submit" style="font-size: 14px;">Search</button>
				<?php 
					if(isset($_GET['pesquisaNome'])){
						?>
						<br><a href="view.php" class="btn-delete" style="font-size: 14px;">Delete</a> 
						<?php
					}
					?>
			</form>
		</div>
	</nav>
	
	<!-- Formulario-->
	<?php 
	if(isset($_GET['alterarID'])){
		$action = "view.php?alterarID=".$_GET['alterarID'];
	}else{
		$action = "view.php";
	}
	?>

	<div>
		<!-- Form -->
		<form action="<?php echo $action ?>" method="post">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<br><br>

						<h1 style="font-family:Merriweather">Registration</h1>
						<p>Fill up the form with correct values.</p>

						<hr class="mb-3">
						<label for="firstname"><b>First Name</b></label>
						<input class="form-control" id="firstname" type="text" name="firstname" required>

						<label for="lastname"><b>Last Name</b></label>
						<input class="form-control" id="lastname"  type="text" name="lastname" required>

						<label for="anoN"><b>Year of Birth</b></label>
						<input class="form-control" id="anoN"  type="anoN" name="anoN" required>


						<hr class="mb-3">
						<input class="button" type="submit" id="register" name="create" value="Insert User">

					</div>
				</div>
			</div>
		</form>
	</div>
	<br><br>

	<!-- Javascript , sweetalert-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- link alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script type="text/javascript">

		$(function(){
			$('#register').click(function(e){

				var valid = this.form.checkValidity();

				if(valid){


					var firstname 	= $('#firstname').val();
					var lastname	= $('#lastname').val();
					var anoN 		= $('#anoN').val();


					e.preventDefault();	

					$.ajax({
						type: 'POST',
						url: 'process.php',
						data: {firstname: firstname,lastname: lastname,anoN: anoN},
						success: function(data){
							Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
							})

						},
						error: function(data){
							Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
							})
						}
					});


				}else{

				}

			});		


		});

	</script>
	<br>
	<br>
	<!-- PESQUISAS DO UTILIZADOR -->
	<form method="GET" action="view.php">

		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<br>
					<br>
					<h1 style="font-family:Merriweather">Search</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">

					<label for="pesquisaNome"><b>Name</b></label><br>
					<input type="text" class="form-control" name="pesquisaNome" required value="<?php if(isset($_GET['pesquisaNome'])) { echo $_GET['pesquisaNome']; } ?>" />


					<br><button class="button_search">Search </button><br>
					<?php 
					if(isset($_GET['pesquisaNome'])){
						?>

						<br><a href="view.php" class="button_delete">Delete</a> 
						<hr class="mb-3">
						<br>
						<br>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</form>
	<br><br>

	<!-- Tabela-->
	<fieldset style ="border: 2px solid #b10708; ">
		<p style="color:#000; font-family:Georgia, serif"><b>TABELA COM OS DADOS INSERIDOS</b></p>
	</fieldset>
	<br>

	<table id="table" >
		<!-- Chamar tabela-->
		<?php include("userList.php"); ?>
	</table>


</body>
</html>