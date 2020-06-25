$(document).ready(function(){

    $("form").on("submit", function (e) {

        //para não atualizar a página
        e.preventDefault();

        var valor1 = $("#valor1").val();
        var valor2 = $("#valor2").val();

        var serverObj = {"valor1": valor1, "valor2": valor2};
        var serverJSON = JSON.stringify(serverObj);

        $.ajax({
            type: "POST",
            url: "api.php",
            data: {valor1 : serverJSON, valor2 : serverJSON},
            cache: false,
            success: function(data){
                
                var obj = JSON.parse(data);
                $("#total").text(obj.total);
                console.log(obj);
            }
        });

    });

});



