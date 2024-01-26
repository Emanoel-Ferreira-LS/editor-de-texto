<?php
    require('conn.php');

    if (isset($_POST['operacao']) && !empty($_POST['operacao'] )){
        $operacao = $_POST['operacao'];

        switch($operacao ){
            case 'cadastrar-publicacao': cadastrarPubli();
        }

    } else {
        die("ERROR: operação não identificada");
    }

    function cadastrarPubli(){
        global $conn;

        $data_publi = date("Y-m-d H:i:s");

        if (isset($_POST['conteudo']) && !empty($_POST['conteudo'])
         && isset($_POST['titulo']) && !empty($_POST['titulo'])){
            $conteudo = $_POST['conteudo'];
            $titulo = $_POST['titulo'];

            $query = "INSERT INTO conteudo (titulo, data, texto) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'sss', $titulo, $data_publi, $conteudo);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);


            if (!$result) {
                echo "A inserção falhou! Erro: " . mysqli_error($conn);
            }
            

        } else {
            echo "Digite algo a ser publicado";
        }

    }

    


?>