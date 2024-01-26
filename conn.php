<?php
    $local = 'localhost';
    $user = 'root';
    $senha = 'e2f0l0s5';
    $bd = 'editor-texto';

    $conn = mysqli_connect($local,$user,$senha,$bd,3306);

    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
?>