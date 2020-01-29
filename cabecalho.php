<!--error_reporting ( E_ALL )--> 
<?php 
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
require_once("adiciona-Newsletters.php");
require_once("conexao.php");
?>
	<!DOCTYPE html>
	<html>
	<head>
	<html lang="pt-BR">
		<meta charset="utf-8">
		<meta name="description" content="Aqui na Ubira Consultoria voce vai encontrar casas,apartamentos,sobrados a venda ou para alugar  na zona leste oeste norte e sul de São Paulo SP com muita qualidade e otimo preço">
		<meta name="keywords" content="Casas a venda em São Paulo ,Casas a venda na zona Leste de São Paulo,Casas a venda na zona Oeste de São Paulo Casas a venda na zona Norte de São Paulo Casas a venda na zona Sul de São Paulo,
		Apartamento a venda em São Paulo ,Apartamento a venda na zona Leste de São Paulo,Apartamento a venda na zona Oeste de São Paulo Apartamento a venda na zona Norte de São Paulo Apartamento a venda na zona Sul de São Paulo,
		Sobrado a venda em São Paulo ,Sobrado a venda na zona Leste de São Paulo,Sobrado a venda na zona Oeste de São Paulo Sobrado a venda na zona Norte de São Paulo Sobrado a venda na zona Sul de São Paulo,
		Terreno a venda em São Paulo ,Terreno a venda na zona Leste de São Paulo,Terreno a venda na zona Oeste de São Paulo Terreno a venda na zona Norte de São Paulo Terreno a venda na zona Sul de São Paulo">
	    <script src="js/code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="bootstrap-4.2.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="bootstrap-4.2.1/css/bootstrap.css">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
		<?php
		foreach($array_css_da_pagina as $css):
	      echo"<link rel='stylesheet' href='css/$css.css'>";
		endforeach;

		foreach($array_js_da_pagina as $js):
			$defer= $js =='script'?'defer':'';
	      echo"<script type='text/javascript' src='js/$js.js' $defer ></script>";
		endforeach;
		foreach($array_jquery_da_pagina as $jquery):
	      echo"<script type='text/javascript' src='js/jquery-nice-select/js/$jquery.js'></script>";
		endforeach;
		?>
		<title>Consultoria </title>
	</head>
	<body class="body">
   	<div id="interface" class="container-fluid">
	            <header class="header">
	                <nav class="navbar navbar-expand-lg navbar-light">
	                    <a class="navbar-bheaderrand" href="#">Site  Teste  Imagens meramente ilustrativas</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
						  aria-controls="navbarTogglerDemo02" aria-expanded="false"aria-label="Toggle navigation">
	                        <span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
	                        <ul class="navbar-nav">
	                            <li class="nav-item active ">
	                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	                            </li>
	                            <li class="nav-item">
	                                <a class="nav-link" href="busca-no-mapa.php">Busca no Mapa</a>
								</li>
								<li class="nav-item">
	                                <a class="nav-link" href="sobre-nos.php">Sobre Nós</a>
	                            </li>
	                            <li class="nav-item">
	                                <a class="nav-link " href="fale-conosco.php"> Fale Conosco</a>
	                            </li>
	                        </ul>
	                    </div>
	                </nav>
	            </header>
	            <?php $ImoveisDao = new ImoveisDao($conn);?>
				