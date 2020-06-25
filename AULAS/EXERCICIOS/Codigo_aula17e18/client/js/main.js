$(document).ready(function(){
	//O documento (DOM) está carregado

	//Pedido AJAX ao servidor
	$.ajax({
		type: "GET", //usamos GET porque apenas vamos receber informação do servidor
		url: "../../server/index.php", //URL da página php que vai processar o pedido
		cache: false,
		success: function(data){ 
			//Executado quando o servidor responde
			//Passar o JSON recebido do servidor para objeto JavaScript
			var obj = JSON.parse(data);	
			//Escrever para a consola o objeto que recebemos do servidor, para debug
			$("#usersList").append("<br>");
			$.each(obj, function(key, value){
				console.log(value);
				var userID = document.createElement("div");
				userID.innerHTML = "User ID: " + value.userID;
				var name = document.createElement("div");
				name.innerHTML = "Name: " + value.firstName + " "+ value.lastName;
				var email = document.createElement("div");
				email.innerHTML = "Email: " + value.email;

				$("#usersList").append(userID);
				$("#usersList").append(name);
				$("#usersList").append(email);
				$("#usersList").append("<br>");
			});
		}
	});

});