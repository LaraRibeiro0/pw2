$(document).ready(function(){

    $("form").on("submit",function(e){

        e.preventDefault();

        var anoNascimento= $("#anoNascimento").val();
        var serverObj = {"anoNascimento": anoNascimento};
        var serverJSON=JSON.stringify(serverObj);
        
        console.log(serverJSON);

        $.ajax({
            type:"POST",
            url: "api.php",
            data:{dataNascimento: serverJSON},
            cache: false,
            success:function(data){
                var obj=JSON.parse(data);
                $("#idade").text(obj.idade);
                console.log(obj);
            }
        });

    })

});