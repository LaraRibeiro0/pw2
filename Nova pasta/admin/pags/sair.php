<?php
	if(session_destroy()){
		header('Location: login');
	}else{
		echo "Erro ao deslogar.";
	}
?>
