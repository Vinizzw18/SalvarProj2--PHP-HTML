<?php

    session_start();
    if (isset($_GET['pos'])) {
        $index = $_GET['pos'];
        if (isset($_SESSION['nomes'][$index]) &&
            isset($_SESSION['emails'][$index]) &&
            isset($_SESSION['generos'][$index]) &&
            isset($_SESSION['senhas'][$index])) {
            $nome = $_SESSION['nomes'][$index];
            $email = $_SESSION['emails'][$index];
            $genero = $_SESSION['generos'][$index];
            $senha = $_SESSION['senhas'][$index]; 
        } else {
            header("Location: listagem.php");
            exit;
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $index = $_POST['index']; 
        $nome = $_POST['nomes'];
        $email = $_POST['emails'];
        $senha = $_POST['senhas'];
        $genero = $_POST['generos'];
        foreach ($_SESSION['emails'] as $key => $existingEmail) {
            if ($existingEmail === $email && $key != $index) {
                echo "<script language='javascript'type='text/javascript'>
                alert('E-mail já cadastrado para outro usuário!');
                window.location.href='listagem.php';
                </script>";
                exit;
            }
        }
        $_SESSION['nomes'][$index] = $nome;
        $_SESSION['emails'][$index] = $email;
        $_SESSION['senhas'][$index] = $senha;
        $_SESSION['generos'][$index] = $genero;
        header("Location: listagem.php");
        exit;
    } else {
        header("Location: listagem.php");
        exit;
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
        <div class="modal fade show" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true" style="display: block;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="wrapper">
                            <div class="modal-header">
                                </hr>
                                <h5 class="modal-title" id="exampleModalLabel">ATUALIZAR DADOS DO USUÁRIO</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body text-start">
                        <form action ="listagem.php" method="post"> 
                            <label class="form-label">NOME</label>
                            <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">
                            <br/>
                            <label class="form-label">E-MAIL</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $email ?>">
                            <br/>
                            <label class="form-label">GENERO</label>
                            <select class="form-select" aria-label="Selecione seu genero" value="<?php echo $genero ?>">
                                <option selected><?php echo $genero ?></option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Outro">Outro...</option>
                            </select>
                            <br/>
                            <label class="form-label">SENHA</label>
                            <input class="form-control" type="password" name="senha" value="<?php echo $senha ?>">
                            <br/>
                            <input type="submit" class="btn btn-success" value="ATUALIZAR"/>
                            <button class="Btn" name="BotaoSairModal"data-bs-dismiss="modal">
                            <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                            <div class="text">SAIR</div>
                        </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <script>
                    var myModal = new bootstrap.Modal(document.getElementById('editUserModal'), {
                        backdrop: 'static', 
                        keyboard: false 
                    });
                    myModal.show();
                </script>
    </body>
</html>
