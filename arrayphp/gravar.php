<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header("location:index.php");
}
$emails = $_SESSION['emails'];
$id = array_search($_SESSION['usuario'], $emails);
$nomes = $_SESSION['nomes'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="pt-br">
    <title>PHP / Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        /* Seu CSS mantido conforme enviado */
        button[name="BotaoSairModal"] { float: right; }
        .user { float: right; }
        body {
            background: linear-gradient(-45deg, #000000, #4F4F4F, #808080, #4F4F4F, #000000);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            color: BLACK;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .btn {
            color: CornflowerBlue;
            text-transform: uppercase;
            text-decoration: none;
            border: 2px solid CornflowerBlue;
            padding: 10px 20px;
            font-size: 17px;
            cursor: pointer;
            font-weight: bold;
            background: transparent;
            position: relative;
            transition: all 1s;
            overflow: hidden;
        }
        .btn:hover { color: white; }
        .btn::before {
            content: "";
            position: absolute;
            height: 100%;
            width: 0%;
            top: 0;
            left: -40px;
            transform: skewX(45deg);
            background-color: white;
            z-index: -1;
            transition: all 1s;
        }
        .btn:hover::before { width: 160%; }

        /* Botão circular com efeito texto */
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(255, 65, 65);
        }
        .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sign svg { width: 17px; }
        .sign svg path { fill: white; }
        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: .3s;
        }
        .Btn:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }
        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }
        .Btn:active {
            transform: translate(2px ,2px);
        }
       
        /* From Uiverse.io by Ratinax */ 
        .loader {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        cursor: not-allowed;
        scale: 0.7;
        }

        .central {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 10em;
        height: 10em;
        border-radius: 50%;
        box-shadow: 0.5em 1em 1em black,
            -0.5em 0.5em 1em black,
            0.5em -0.5em 1em black,
            -0.5em -0.5em 1em black;
        }

        .external-shadow {
        width: 10em;
        height: 10em;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        box-shadow: 0.5em 0.5em 3em blueviolet,
            -0.5em 0.5em 3em blue,
            0.5em -0.5em 3em purple,
            -0.5em -0.5em 3em cyan;
        z-index: 999;
        animation: rotate 3s linear infinite;
        background-color: #212121;
        }

        .intern {
        position: absolute;
        color: white;
        z-index: 9999;
        }

        .intern::before {
        content: "100%";
        animation: percent 2s ease-in-out infinite;
        }

        @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(180deg);
        }

        100% {
            transform: rotate(360deg);
        }
        }

        @keyframes percent {
        0% {
            content: '0%';
        }

        25% {
            content: '25%';
        }

        33% {
            content: '33%';
        }

        42% {
            content: '42%';
        }

        51% {
            content: '51%';
        }

        67% {
            content: '67%';
        }

        74% {
            content: '74%';
        }

        75% {
            content: '75%';
        }

        86% {
            content: '86%';
        }

        95% {
            content: '95%';
        }

        98% {
            content: '98%';
        }

        99% {
            content: '99%';
        }
        100% {
            content: '100%';
        }
        }
    </style>
</head>
<body>

    <center><h2><font color="black">PHP/ARRAY</font></h2></center>
    <hr>

    <nav>
        &nbsp;&nbsp;
        <a href="inicial.php" style="color: white; text-decoration: none">HOME |</a>
        <a href="listagem.php" style="color: white; text-decoration: none">LISTAGEM |</a>
        <a href="gravar.php" style="color: white; text-decoration: none">SALVAR DADOS</a>

        <div class="user" style="color: white;">
            &nbsp;&nbsp; <?php echo $nomes[$id]; ?> | 
            <a href="sair.php" style="color: white; text-decoration: none">SAIR</a>&nbsp;&nbsp;
        </div>
    </nav>

    <br/>

    <div class="row justify-content-center row-cols-1 row-cols-md-3 text-center">
        <div class="cols">
            <div class="card mb-4 rounded shadow-sw">
                <div class="card-header py-3">
                    <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="CornflowerBlue" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
                    <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
                    </svg>&nbsp;&nbsp;<b>SALVAMENTO DE DADOS</b>
                    </h3>
                </div>
                    <div class="card-body">
                        <?php
                        $porc = 0;
                        $dados = $_SESSION['nomes'];
                        $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                        file_put_contents("nome.json", $conteudo);
                        $porc = 25;
                        $dados = $_SESSION['emails'];
                        $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                        file_put_contents("email.json", $conteudo);
                        $porc = 50;
                        $dados = $_SESSION['generos'];
                        $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                        file_put_contents("genero.json", $conteudo);
                        $porc = 75;
                        $dados = $_SESSION['senhas'];
                        $conteudo = json_encode($dados, JSON_PRETTY_PRINT);
                        file_put_contents("senha.json", $conteudo);
                        $porc = 100;
                        echo "<div class='progress'>
                        <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: $porc%'></div>
                        </div>";
                        if ($porc === 100){
                            echo "<h2>DADOS GRAVADOS COM SUCESSO</h2>";
                        }
                        else{
                            echo "</br><h2><font color='red'>NEM TODOS OS DADOS FORAM GRAVADOS!</font></h2>";
                        }
                        ?>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>
