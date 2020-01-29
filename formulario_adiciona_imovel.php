<?php 
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
?>
<?php 
require_once"conexao.php";
require_once"logica-usuario.php";
$imovel=new Imoveis();
$proprietario=new Proprietario();
$endereco=new Endereco();
$imovel->setEndereco($endereco);
$imovel->setProprietario($proprietario);
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"> </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css ">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="estilo.css">
	<title>Adiciona imovel</title>
    <style>
      .card{ margin-top:10px}
      a{color:black;}
      a:hover{color:orange;}
    </style>
</head>

<body>
    <div class="container-fluid">
        <?php verificaUsuario()?>
        <?php if(usuarioEstaLogado()) :?>
             <p class="text-success text-center">Você está logado como <?= usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p>
        <?php endif?>
        <nav class="navbar navbar-dark bg-dark" style="width:100%">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="formulario_adiciona_imovel.php">Cadastar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista_imoveis.php">Listar</a>
                </li>
            </ul>
        </nav>
        <form action="adiciona_imoveis.php" method="POST" enctype="multipart/form-data">
            <div class="card text-white bg-secondary ">
                <div class="card-header">
                    <h4>Cadastro de Imoveis</h4>
                </div>
                <?php include("formulario_base.php"); ?>
           <div class="form-group card-body col-md-3">
              <button type="submit" class="btn btn-primary">Adiciona</button>
          </div>
        </form>
    </div>
</body>

</html>