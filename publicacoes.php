<?php
    require('conn.php');

    global $conn;

    $query = 'SELECT * FROM conteudo';

    $result = mysqli_query($conn, $query);

    while($dados = mysqli_fetch_assoc($result)){
        echo $dados['id'] . " - " . $dados['titulo'] . "<br>";
        echo "Data Publicação: " . $dados['data'];
        echo $dados['texto'] . "<br>";
        ?>
        <form action="acoes.php" method="post">
            <input type="hidden" name="operacao" value="deletar">
            <input type="hidden" name="idDel" value="<?php $dados['id']?>">
            <input type="submit" value="Deletar">
        </form>

        <form action="editor.php" method="get">
            <input type="hidden" name="operacao" value="editar">
            <input type="hidden" name="idEdit" value="<?php $dados['id']?>">
            <input type="submit" value="Editar">
        </form>
        <?php
        echo "<hr>";    
    }
?>