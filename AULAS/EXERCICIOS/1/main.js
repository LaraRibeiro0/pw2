$(document).ready(function(){

    $("form").on("submit", function (e) {

        //para não atualizar a página
        e.preventDefault();

        let campo1 = $("#campo1").val();
        let campo2 = $("#campo2").val();

        let serverObj = {"campo1": campo1, "campo2": campo2};
        let serverJSON = JSON.stringify(serverObj);

        $.ajax({
            type : "POST",
            url : "../servidor/api.php",
            data : {campos : serverJSON},
            cache : false,
            success: function(data){
                console.log(data);
                let obj = JSON.parse(data);
                $("#total").text(obj.total);

                console.log(obj);
            }
        });

    });

});