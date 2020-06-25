<?php
//index.php input - add
if (isset($_POST['add'])) {
    include_once 'db.php';

    //idUtilizador
    $idUtilizador = $_POST['user'];
    //descricao
    $descricao = $_POST['descricao'];
    //Defenição data hora
    date_default_timezone_set('Europe/Lisbon');
    $data = date("d/m/Y");
    $hora = date("H:i");

    //Tabela comentarios
    $sql = "INSERT INTO comentarios (idUtilizador, descricao) VALUES ('$idUtilizador', '$descricao')";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $comment_id = $stmt->insert_id;
    ?>
    
    <?php
    //Tabela comentarios
    $sql_sel = "SELECT * FROM comentarios WHERE id = $comment_id";
    
    $result = $conn->query($sql_sel);
    
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) // using prepared staement
    {
        ?>

        <div id="comment-<?php echo $row["id"];?>" class="comment-row">
            <!-- idUtilizador -->
            <div class="comment-user"><?php echo $row["idUtilizador"];?></div>
            <!-- descriçao -->
            <div class="comment-msg" id="msgdiv"><?php echo $row["descriçao"];?></div>
            <!-- delete -->
            <div class="delete" name="delete" id="delete"
            onclick="deletecomment(<?php echo $row["id"];?>)">Delete</button>

        </div>

        <?php
    }
}
?>
