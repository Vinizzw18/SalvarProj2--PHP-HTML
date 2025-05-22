<?php

    session_start();
    $receberPesq = $_GET['buscarEmailouNome'];
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $genero = $_SESSION['generos'];
    $reg = count($_SESSION['nomes' && 'emails']);
    for ($i= 0; $i <= $reg - 1; $i++){
     echo "<tr>";
    echo "<td>$i</td>";
    }
    $nomes = json_decode(file_get_contents("nome.json"), true);
    $emails = json_decode(file_get_contents("email.json"), true);
    $indiceNome = array_search($nome, $nomes);
    $indiceEmail = array_search($email, $emails);
    if (array_search($receberPesq, $nomes)){


    }
?>