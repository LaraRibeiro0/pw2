$(document).ready(function(){

	$.ajax({
		type:"GET",
		url: "index.php",
		cache: false,
		success:function(data){

			var obj=JSON.parse(data);

			console.log(obj);
			$("#userList").append("<br>");
			$.each(obj,function(key, value){
				console.log(value);
				var userID = document.creatElement("div");
				userID.innerHTML = "userID: " + value.userID;

				var name = document.creatElement("div");
				name.innerHTML = "Name: "  + value.firstname + "" + value.lastname;

				var email = document.creatElement("div");
				email.innerHTML = "Email: "  + value.email;

				$("#userList"). append(userID);
				$("#userList"). append(name);
				$("#userList"). append(email);
			});
			


		}
	});

};