<?php
        session_start();
        if(!isset($_SESSION['nomes'])){
            $emails = json_decode(file_get_contents("email.json"), true);
            $senhas = json_decode(file_get_contents("senha.json"), true);
            $nomes = json_decode(file_get_contents("nome.json"), true);
            $generos = json_decode(file_get_contents("genero.json"), true);
            $id = array_search($_SESSION['usuario'], $emails);
            $_SESSION['nomes'] = $nomes;
            $_SESSION['emails'] = $emails;
            $_SESSION['generos'] = $generos;
            $_SESSION['senhas'] = $senhas;
        }
        else{
            $emails = $_SESSION['emails'];
            $id = array_search($_SESSION['usuario'], $emails);
            $nomes = $_SESSION['nomes'];
        }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initical-scale-1">
        <meta http-equiv="content-language" content="pt-br">
        <title>PHP / Array</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
        button[name="BotaoSairModal"]{
            float: right;
        }
        .user{
            float: right;
        }
        
        body {
            background: linear-gradient(-45deg, #000000, #4F4F4F, #808080, #4F4F4F, #000000);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            color: BLACK;
        }

        @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
     50% {
          background-position: 100% 50%;
        }
     100% {
         background-position: 0% 50%;
        }
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

        .btn:hover {
            color: white;
        }

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

        .btn:hover::before {
            width: 160%;
        }
        /* From Uiverse.io by vinodjangid07 */ 
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

        /* plus sign */
            .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sign svg {
            width: 17px;
        }

        .sign svg path {
            fill: white;
        }
        /* text */
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
        /* hover effect on button width */
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
        /* hover effect button's text */
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }
        /* button click effect*/
        .Btn:active {
            transform: translate(2px ,2px);
        }
        .wrapper {
            width: 498px;
            background: rgb(2, 0, 36);
            background: linear-gradient(
                90deg,
                rgba(2, 0, 36, 1) 9%,
                rgba(9, 9, 121, 1) 68%,
                rgba(0, 91, 255, 1) 97%
            );
            backdrop-filter: blur(9px);
            color: #fff;
            border-radius: 0px;
            padding: 30px 40px;
        }

    </style>
    <body>
        <center><h2><font color="black">PHP/ARRAY</font> </h2></center>
        <HR></HR>
        <nav>   
            &nbsp;&nbsp;
            <a href="inicial.php" style="color: white; text-decoration: none">HOME | </a> <a href="listagem.php" style="color: white; text-decoration: none">LISTAGEM |</a> <a href="gravar.php" style="color: white; text-decoration: none">SALVAR DADOS</a>
            <div class="user" style="color: white; text-decoration: none">
                &nbsp;&nbsp; <?php echo $nomes[$id]; ?> | <a href="sair.php" style="color: white; text-decoration: none">SAIR</a>&nbsp;&nbsp;

            </div>
        </nav>
        <br/>
        <center> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <B>CADASTRAR NOVO USUÁRIO</B>
        </button></center>
        <br/>
        <div class="row justify-content-center row-cols-2 row-cols-md-3 text-center">
            <div class="cols">
                <div class="card mb-4 rounded shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        </svg>&nbsp;&nbsp;<b>USUARIOS</b></h3>
                    </div>
                    <div class="card-body">
                       <?php
                        include "usuarios.php";
                       ?>
                    </div>
                </div>
            </div>
            <div class="cols">
                <div class="card mb-4 rounded shadow-sw">
                    <div class="card-header py-3">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
                        </svg>&nbsp;&nbsp;<b>GENEROS</b></h3>
                    </div>
                    <div class="card-body">
                        <?php
                            include "generos.php";
                        ?>
                    </div>
                </div>
            </div> 
        </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="wrapper">
                        <div class="modal-header">
                            </hr>
                            <h5 class="modal-title" id="exampleModalLabel">CADASTRAR USUÁRIO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body text-start">
                    <form action ="cadastro.php" method="post"> 
                        <label class="form-label">NOME</label>
                        <input class="form-control" type="text" name="nome" required placeholder ="Digite o seu nome..."></input>
                        <br/>
                        <label class="form-label">E-MAIL</label>
                        <input class="form-control" type="email" name="email" required placeholder ="Digite o seu email..."></input>
                        <br/>
                        <label class="form-label">GENERO</label>
                        <select class="form-select" aria-label="Selecione seu genero" name="genero" required>
                            <option selected></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro...</option>
                        </select>
                        <br/>
                        <label class="form-label">SENHA</label>
                        <input class="form-control" type="password" name="senha" required placeholder ="Digite sua senha..."></input>
                        <br/>
                        <input type="submit" class="btn btn-success" value="CADASTRAR"/>
                        <button class="Btn" name="BotaoSairModal"data-bs-dismiss="modal">
                        <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                        <div class="text">Sair</div>
                    </button>
                    </form>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 