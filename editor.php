<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trumbowyg Event Listener</title>
  <link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
</head>
<body>
    
    <?php 
    require_once('conn.php');
    
    if (isset($_GET['idEdit']) && !empty($_GET['idEdit'])) {
        global $conn;

        $id = $_GET['idEdit'];
        $query = "SELECT * FROM conteudo WHERE id=$id";
        $result = mysqli_query($conn,$query);
        $dados = mysqli_fetch_assoc($result);
    ?>

    <label for="conteudo">Conteúdo</label>
    <form method="post" action="acoes.php" id="editor">
        <input type="hidden" name="operacao" value="editar-publicacao">

        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" value="<?php $dados['titulo']?>">

        <textarea name="conteudo" id="conteudo">
            <?php $dados['texto']?>
        </textarea>
        
        <input type="submit" value="Publicar">
    </form>

  <?php } else { ?>
        <label for="conteudo">Conteúdo</label>
        <form method="post" action="acoes.php" id="editor">
            <input type="hidden" name="operacao" value="cadastrar-publicacao">

            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo">

            <textarea name="conteudo" id="conteudo"></textarea>
            
            <input type="submit" value="Publicar">
        </form>
  <?php } ?>

        <a href="publicacoes.php">Ver Publicações</a>

      <div id="mostrar-conteudo"></div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="dist/trumbowyg.min.js"></script>

  <script>
    const conteudo = document.getElementById('conteudo');
    const mostrarConteudo = document.getElementById('mostrar-conteudo');

    $('#conteudo').trumbowyg({
      btns: [
        ['viewHTML'],
        ['undo', 'redo'],
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
      ],
      autogrow: true
    });

    /*$('#conteudo').on('tbwchange', function() {
      mostrarConteudo.innerHTML = conteudo.value;
    });*/


  </script>

</body>
</html>