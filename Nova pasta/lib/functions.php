<?php
	
	function carrega_pagina($con, $data){
		$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'login';
		$explode = explode('/', $url);
		$dir = "pags/";
		$ext = ".php";

		protegePagina($explode['0']);
		if(file_exists($dir.$explode['0'].$ext)){
			require_once($dir.$explode['0'].$ext);
		}else{
			echo "<div class='alert alert-danger'>Página não encontrada</div>";
		}
	}

	function gera_titulo($titulo){
		$url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'login';
		$explode = explode('/', $url);

		switch($explode['0']){
			case 'inicio':
				$titulo = "Inicio - ".$titulo;
				break;

			case 'login':
				$titulo = "Login - ".$titulo;
				break;

			case 'perfil':
				$titulo = "Perfil - ".$titulo;
				break;

			case 'editar-postagem':
				$titulo = "Editar Publicação - ".$titulo;
				break;

			case 'publicar':
				$titulo = "Publicar - ".$titulo;
				break;

			case 'deletar-postagem':
				$titulo = "Deletar Publicação - ".$titulo;
				break;
		}
		return $titulo;
	}


	function protegePagina($explode){
		$paginas_protegidas = array("inicio", "publicar");

		if(!isset($_SESSION['usuarioID']) && in_array($explode, $paginas_protegidas)){
			redireciona('login', false, 0, false);
			exit();
		}

		if(isset($_SESSION['usuarioID']) && $explode == "login"){
			redireciona('inicio', false, 0, false);
			exit();
		}
		
	}

	function redireciona($url, $tipo, $tempo, $mensagem){
		echo "<meta http-equiv='refresh' content='{$tempo};URL=admin/{$url}'>";

		if($tipo != false){
			echo "<div class='alert alert-{$tipo}'>{$mensagem}</div>";
		}

	}
?>