<html>
<head>
    <title>Adicionar e remover</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery-3.2.1.min.js"></script>

</head>
<body>
	<div class="demo-container">
		<form action=" " id="frmComment" method="post">
			<div class="row">
                <!-- Utilizador -->
                <label> Nome do Utilizador/ID Uilizador</label> <span id="user-info"></span><input class="form-field" id="user"
                type="text" name="user"> 
            </div>
            <div class="row">
             <!-- Comentario -->
             <label for="mesg"> Comentario : <span id="descricao-info"></span></label>
             <textarea class="form-field" id="descricao" name="descricao" rows="4"></textarea>

         </div>
         <div class="row">
            <input type="hidden" name="add" value="post" />
            <!-- btn-add-comment -->
            <button type="submit" name="submit" id="submit" class="btn-add-comment">Adicionar Comentário</button>
            <!-- btn-loading demora  -->
            <img src="LoaderIcon.gif" id="loader" />
        </div>
    </form>
    <?php
    //base dados
    include_once 'db.php';
    //Tabela comentarios
    $sql_sel = "SELECT * FROM comentarios ORDER BY id DESC";
    $result = $conn->query($sql_sel);
    $count = $result->num_rows;

    if($count > 0) {
        ?>
        <div id="comment-count">
            <span id="count-number"><?php echo $count;?></span> Comentario(s)
        </div>
    <?php } ?>
    <div id="response">
        <?php
while ($row = $result->fetch_array(MYSQLI_ASSOC)) // using prepared staement
{
    ?>
    <div id="comment-<?php echo $row["id"];?>" class="comment-row">
     <!-- idUtilizador(base dados) -->
     <div class="comment-user"><?php echo $row["idUtilizador"];?></div>
     <!-- Descricao(base dados) -->
     <div class="comment-msg" id="msgdiv-<?php echo $row["id"];?>"><?php echo $row["descricao"];?></div>
     <!-- Delete -->
     <div class="delete" name="delete"
     id="delete-<?php echo $row["id"];?>"
     onclick="deletecomment(<?php echo $row["id"];?>)">Remover</div>
 </div>
 <?php 
}
?>
</div>
</div>

<script type="text/javascript"></script>
<script>
    //Funcao eliminar Comentario
    function deletecomment(id) {

       if(confirm("Tem certeza de que deseja excluir este comentário?")) {

        $.ajax({
            //URL PAGINA ELIMINAR
            url: "eliminarCom.php",
            type: "POST",
            data: 'comment_id='+id,
            success: function(data){
                if (data)
                {
                    $("#comment-"+id).remove();
                    if($("#count-number").length > 0) {
                        var currentCount = parseInt($("#count-number").text());
                        var newCount = currentCount - 1;
                        $("#count-number").text(newCount)
                    }
                }
            }
        });
    }
}

$(document).ready(function() {

    $("#frmComment").on("submit", function(e) {
      $(".error").text("");
      $('#user-info').removeClass("error");
      $('#descricao-info').removeClass("error");
      e.preventDefault();
            //mudar name e message
            var user = $('#user').val();
            var descricao = $('#descricao').val();
            
            if(user == ""){
              $('#user-info').addClass("error");
          }
          if(descricao == ""){
              $('#descricao-info').addClass("error");
          }
          $(".error").text("Campo Obrigatório");
          if(user && descricao){
             $("#loader").show();
             $("#submit").hide();
             $.ajax({

                 type:'POST',
               //URL PAGINA ADICIONAR
               url: 'adicionarCom.php',
               data: $(this).serialize(),
               success: function(response)
               {
                  $("#frmComment input").val("");
                  $("#frmComment textarea").val("");
                  $('#response').prepend(response);

                  if($("#count-number").length > 0) {
                     var currentCount = parseInt($("#count-number").text());
                     var newCount = currentCount + 1;
                     $("#count-number").text(newCount)
                 }
                 $("#loader").hide();
                 $("#submit").show();
             }
         });
         }
     });
});
</script>
</body>
</html>