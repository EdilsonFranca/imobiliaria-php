<?php
require_once"conexao.php";
require_once"logica-usuario.php";
$ImoveisDao = new ImoveisDao($conn);
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Lista imoveis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <style>
       a{color:black;}
       a:hover{color:orange;}
    </style>
</head>

<body>
    <div class="container-fluid" style="padding:0">
        <?php verificaUsuario()?>
        <?php if(usuarioEstaLogado()) :?>
             <p class="text-success text-center">Você está logado como <?= usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p>
        <?php endif?>

        <nav class="navbar navbar-dark bg-dark" style="width:170%">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="formulario_adiciona_imovel.php">Cadastar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista_imoveis.php">Listar</a>
                </li>

            </ul>
        </nav>