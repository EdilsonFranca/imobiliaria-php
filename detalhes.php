<?php 
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
function com_ou_sem_s($num){
    return $num > 1 ? "s":"";
   }
spl_autoload_register("carregaClasse");
require_once("adiciona-Newsletters.php");
include_once("conexao.php");
?>
<?php
$tem_erros=false;
if(isset($_POST['submit'])){include("validacao.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="js/code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap-4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap-4.2.1/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type='text/javascript' src='js/javaScript.js' ></script>
    <link rel="stylesheet" href="css/detalhe.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/geral.css">
    <title></title>
</head>
<body>
    <div class="containar">
        <div class="row ">
            <?php
			$idDe=$_GET['n'];
			$ImoveisDao = new ImoveisDao($conn);
			$imovel=$ImoveisDao->buscar_imovel($idDe); 
		    ?>
            <div class="col-sm-7 margin_bottom">
                <div class="anuncio text-center">
                    <h2><?=$imovel->getTitulo()?></h2>
                </div>
                <div id="carouselExampleControls" class="carousel slide margin_bottom" data-ride="carousel"
                    data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        <?php $subclass = "active";
							$imagens=$ImoveisDao->Lista_fotos($idDe,20);
                            for($i=0;$i < count($imagens);++$i): $num=$i+1;?>
                        <div class="carousel-item  <?=$subclass?>">
                            <img class="d-block w-100" src="foto/<?= $imagens[$i]->getNome_foto();?>"
                                alt="<?=$imovel->getTipo();?>" title="<?=$imovel->getTipo();?>">
                            <?="<span id='num_fotos'>".$num." / ".count($imagens)."</span>"?>
                        </div>
                        <?php $subclass='';
                        endfor?>
                        <svg class="item‐icone-foto"><use xlink:href="icon/categorias.svg#foto"/></svg>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-sm-12 informacoes">
                        <div class=" informacoes_preco text-center">
                            <span class="preco"> R$ <?= number_format($imovel->getPreco(), 2);?></span>
                        </div>
                        <div class="col-sm-12 informacoes_ico text-center">
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#quarto"/></svg><span><?= $imovel->getDormitorio() ?> Dorm<?=com_ou_sem_s($imovel->getDormitorio())?></span>
                               </i>
                            </span>|
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#suite"/></svg><span><?= $imovel->getSuite() ?> Suite<?=com_ou_sem_s($imovel->getSuite())?></span>
                                </i>
                            </span>|
                            <span>
                                <i><svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#banheiro"/></svg><span><?= $imovel->getBanheiro() ?> Banheiro<?=com_ou_sem_s($imovel->getBanheiro())?></span></i>
                            </span>
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#vaga"/></svg><span><?= $imovel->getVaga() ?> vaga<?=com_ou_sem_s($imovel->getVaga())?></span>
                                </i>
                            </span>|
                           
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#area"/></svg><span> <?= $imovel->getArea() ?> m²</span>
                                </i>
                            </span>|
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#condominio"/></svg><span>R$:<?= $imovel->getCondominio()?> Condominio</span>
                                </i>
                            </span>
                        </div>
                        <div class=" col-sm-12 descricao">
                            <div class="descricao_body justificado-certo"><?= $imovel->getDescricao();?></div>
                        </div>
                    </div><!-- class col12-->
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="localizacao">
                            <i><svg class="item‐icone-localizacao"><use xlink:href="icon/categorias.svg#localizacao"/></svg> </i><span
                                class="localizacao_span">Localizaçaõ :</span>
                            <span> <?= $imovel->getEndereco()->getCidade()?> </span>>
                            <span> <?= $imovel->getEndereco()->getBairro()?> </span>>
                            <span>
                                <?=$imovel->getEndereco()->getLogradouroTipo()?><?= $imovel->getEndereco()->getLogradouroNome()?>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 localizacao_mapa">
                        <form>
                            <?php $enderecoM=$imovel->getEndereco()->getLogradouroTipo()."  ".$imovel->getEndereco()->getLogradouroNome()."   ".$imovel->getEndereco()->getBairro(); ?>
                            <input type="hidden" id="txtEndereco" name="txtEndereco" value="<?= $enderecoM?> " />
                        </form>
                        <div id="mapa" class="col-sm-12 mapa1" style="background-image: url('./img/mapaFotos.png');">
                            <div class="divMapa text-center">  <i><svg class="item‐icone-localizacao"><use xlink:href="icon/categorias.svg#mapa"/></svg> </i><span>Navegar pelo
                                mapa</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 div_col_4">
                <div class="formulario">
                    <form action="" method="Post" id="form_contato">
                        <div class="divForm col-sm-12">
                            <h3 class="text-center">Entre em contato</h3>
                            <tr>
                                <td><span class="prime_span">Nome</span></td>
                                <?php if ($tem_erros && isset($erros_validacao['nome'])): ?>
                                <td>
                                    <span class="erro"><?=$erros_validacao['nome']?></span>
                                </td>
                                <?php endif?>
                                <td>
                                    <?php  $nome = isset($_POST['nome']) ? $_POST['nome'] : ''; ?>
                                    <input class="form-control" type="text" name="nome" id="nome" value="<?=$nome?>">
                                    <span class='msg-erro msg-nome'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="prime_span">Sobre Nome</span></td>
                                <?php if ($tem_erros && isset($erros_validacao['sobreNome'])): ?>
                                <td>
                                    <span class="erro"><?=$erros_validacao['sobreNome']?></span>
                                </td>
                                <?php endif?>
                                <td>
                                    <?php  $sobreNome = isset($_POST['sobreNome']) ? $_POST['sobreNome'] : ''; ?>
                                    <input class="form-control" type="text" name="sobreNome" id="sobreNome"
                                        value="<?=$sobreNome?>">
                                    <span class='msg-erro msg-sobreNome'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="prime_span">Email</span></td>
                                <?php if ($tem_erros && isset($erros_validacao['email'])): ?>
                                <td>
                                    <span class="erro"><?=$erros_validacao['email']?></span>
                                </td>
                                <?php endif?>
                                <td>
                                    <?php  $email = isset($_POST['email']) ? $_POST['email'] : ''; ?>
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="<?=$email?>">
                                    <span class='msg-erro msg-email'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="prime_span">Tell</span></td>
                                <?php if ($tem_erros && isset($erros_validacao['tell'])): ?>
                                <span class="erro text"><?=$erros_validacao['tell']?></span>
                                <?php endif?>
                                <td>
                                    <?php  $tell = isset($_POST['tell']) ? $_POST['tell'] : ''; ?>
                                    <input class="form-control phone" type="text" name="tell" id="tell"
                                        value="<?=$tell?>">
                                    <span class='msg-erro msg-tell'></span>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="prime_span">Mensagem</span></td>
                                <td>
                                    <textarea class="form-control" name="mensagem"
                                        id="mensagem">Olá, visualizei este anúncio e gostaria que entrasse em contato comigo. id do imovel <?=$idDe?></textarea>
                                    <span class='msg-erro msg-mensagem'></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button id="btnButom" class="btn btn-primary btn-block" type="submit"
                                        name="submit">enviar</button>
                                </td>
                            </tr>
                        </div>
                    </form>
                </div>

            </div><!-- class col4-->
        </div>
        <script type="text/javascript" src="js/detalhe.js"></script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKCD3ebDDRJOOzeZMeiznBdIS2YXpjGko&callback=initMap"
            type="text/javascript"></script>
        <script type="text/javascript" src="js/mapa.js"></script>
        <script type="text/javascript" src="validacao.js"></script>
        <script type="text/javascript" src="js/javaScript.js"></script>
        <?php include("rodape.php");?>