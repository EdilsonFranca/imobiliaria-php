<?php 
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
function com_ou_sem_s($num){
    return $num > 1 ? "s":"";
   }
spl_autoload_register("carregaClasse");
require_once('conexao.php');

$paginaAtual=$_GET['pagina'];
$ImoveisDao = new ImoveisDao($conn);
    $tipo     =$_GET['tipo'];
    $transacao=$_GET['transacao'];
    $bairro   =$_GET['bairro'];
    (isset($_GET['quarto']))? $quarto  =$_GET['quarto']: $quarto ='';
    (isset($_GET['vaga']))? $vaga  =$_GET['vaga']: $vaga ='';
    $valorMin =$_GET['minValue'];
    $valorMax =$_GET['maxValue'];

    $imovel=new Imoveis();
    $endereco=new Endereco();
    $imovel->setTipo($tipo);
    $imovel->setTransacao($transacao);
    $endereco->setBairro($bairro);
    $imovel->setEndereco($endereco);
    $imovel->setDormitorio($quarto);
    $imovel->setVaga($vaga);

    $where=array(); // cria um array

	  if ( $transacao ) {$where[] = " i.transacao  = '{$transacao}' "; }
	  if ( $tipo )      {$where[] = " i.tipo       = '{$tipo}'      "; }
      if ( $bairro )    {$where[] = " e.bairro like '%{$bairro}%'    "; }
      if ( $quarto )    {$where[] = " i.dormitorio = '{$quarto}'    "; }
      if ( $vaga )      {$where[] = " i.vaga       = '{$vaga}'    "; }
      if ( $valorMin )  {$where[] = " i.preco     >= '{$valorMin}' "; }
      if ( $valorMax )  {$where[] = " i.preco     <= '{$valorMax}' "; }
	  $sql='';
      if( sizeof( $where) ) $sql =' WHERE '.implode( ' AND ',$where )."order by preco";
	  //  sizeof = Retorna o número de elementos em uma matriz:
      // implode = Junte os elementos da matriz com uma string:
      
      $registro_por_pagina=3;
      $imoveis_Busca=$ImoveisDao->ListaimovelBusca($registro_por_pagina,$paginaAtual,$sql);

      $numImoveisFiltrados=$ImoveisDao->ListaimovelBuscaCont($sql);
      $nOfPages = $numImoveisFiltrados / $registro_por_pagina;
      if ($numImoveisFiltrados % $registro_por_pagina > 0){$nOfPages++;}
    ?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap-4.2.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap-4.2.1/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="js/slider.js"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/lista_filtrada.css">
    <link rel="stylesheet" href="css/geral.css">
    <title>Lista de Imoveis</title>
</head>
<body id="bodyCadastro">
    <div class="container-fluid interfaceListaFiltrada">
        <div class="row">
            <div class="col-sm-3  col-xs-12 div4">
                <form class="col-sm-12 form" method="" action="">
                    <?php $transacoesArray=array("Venda","Aluga") ;?>
                    <select class="form-control" name="transacao">
                        <option value="">Transação</option>
                        <?php foreach($transacoesArray as $transacaoArray):?>
                        <option
                            <?=$imovel->getTransacao() == $transacaoArray ? "selected='selected'" : ""; ?>value="<?=$transacaoArray?>">
                            <?=$transacaoArray?></option>
                        <?php endforeach;?>
                    </select>
                    <?php $tiposArray= array("Apartamento","Casa","Sobrado","Terreno");?>
                    <select class="form-control" name="tipo">
                        <option value="">Tipo De Imovel</option>
                        <?php foreach($tiposArray as $tipoArray):?>
                        <option
                            <?=$imovel->getTipo() == $tipoArray ? "selected='selected'" : ""; ?>value="<?=$tipoArray?>">
                            <?=$tipoArray?></option>
                        <?php endforeach?>
                    </select>
                    <input name="bairro" placeholder="Bairro" class="form-control" type="text"value="<?= $imovel->getEndereco()->getBairro()?>" />
                    <ul class="itens">
                        <span>Quartos</span>
                        <?php for($i=1;$i<4;$i++):?>
                        <li class="item">
                            <?php $imovel->getDormitorio()==$i ? "checked='checked'" : ""; ?>
                            <input name="quarto" type="radio" id="quarto<?=$i?>" value="<?=$i?>"
                                <?=$imovel->getDormitorio()== $i ? "checked='checked'" : ""; ?>>
                            <label for="quarto<?=$i?>"><?=$i?></label>
                        </li>
                        <?php endfor?>
                    </ul>
                    <ul class="itens vaga">
                        <span>Vagas </span>
                        <?php for($i=1;$i<4;$i++):?>
                        <li class="item">
                            <input name="vaga" type="radio" id="vaga<?=$i?>" value="<?=$i?>"
                                <?=$imovel->getVaga()== $i ? "checked='checked'" : ""; ?>>
                            <label for="vaga<?=$i?>"><?=$i?></label>
                        </li>
                        <?php endfor?>
                    </ul>
                    <div id="slidesConteiner" class="col-sm-12 ">
                        <div>
                            <div id="slider-range"></div>
                        </div>
                        <div class="row slider-labels">
                            <div class="col-6 caption">
                                <strong>De:</strong> <span id="slider-range-value1"></span>
                            </div>
                            <div class="col-6 text-right caption">
                                <strong>A:</strong> <span id="slider-range-value2"></span>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="minValue" value="<?=$valorMin?>">
                            <input type="hidden" name="maxValue" value="<?=$valorMax?>">
                        </div>
                        <input type="hidden" name="pagina" value="1">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Pesquisar</button>
                </form>
            </div>
            <div id="listaD" class="col-sm-9 col-xs-12 ">
                <?php
                $n=0;
				foreach ($imoveis_Busca as $imovelBusca):
                    $imovelId=$imovelBusca->getId_imovel();
                    ?>
                <div class="col-sm-12 div12">
                    <div class="row">
                        <div class="col-sm-4 di4">
                            <div id="carouselExampleControls<?=$n?>" class="carousel slide" data-ride="carousel"data-interval="false">
                                <div class="carousel-inner" role="listbox">
                                    <p class="tipo text-center">
                                        <span class="tipo"><?=$imovelBusca->getTipo();?>
                                            <?=$imovelBusca->getTransacao() == 'Venda' ? ' a ' : 'para'; ?>
                                            <?= $imovelBusca->getTransacao();?></span>
                                    </p>
                                    <?php
                                    $subclass = "active";
                                    $imagens=$ImoveisDao->Lista_fotos($imovelId,5);
                                    for($i=0;$i < count($imagens);++$i): $num=$i+1;?>

                                    <div class="carousel-item <?=$subclass?>">
                                        <img class="d-block w-100" src="foto/<?= $imagens[$i]->getNome_foto();?>"
                                            title="<?=$imovelBusca->getTipo();?> para <?= $imovelBusca->getTransacao();?>">
                                            <?="<span id='num_fotos'>".$num." / ".count($imagens)."</span>"?>
                                    </div>
                                    <?php $subclass='';
                                     endfor?>
                                     <svg class="item‐icone-foto"><use xlink:href="icon/categorias.svg#foto"/></svg>
                                    <a class="carousel-control-prev" href="#carouselExampleControls<?=$n?>"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls<?=$n?>"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <span class="label-info">cod :NN<?=$imovelId;?></span>
                            </div>
                        </div>
                        <div class="col-sm-8 div8">
                            <div class=" col-sm-12 text-center">
                                <span class="preco"> R$ <?= number_format($imovelBusca->getPreco(), 2);?></span>
                            </div>
                            <div class="col-sm-12 descricao">
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#quarto"/></svg><span><?= $imovelBusca->getDormitorio() ?> Dorm<?=com_ou_sem_s($imovelBusca->getDormitorio())?></span>
                               </i>
                            </span>|
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#suite"/></svg><span><?= $imovelBusca->getSuite() ?> Suite<?=com_ou_sem_s($imovelBusca->getSuite())?></span>
                                </i>
                            </span>
                            <span>
                                <i><svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#banheiro"/></svg><span><?= $imovelBusca->getBanheiro() ?> Banheiro<?=com_ou_sem_s($imovelBusca->getBanheiro())?></span></i>
                            </span>
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#vaga"/></svg><span><?= $imovelBusca->getVaga() ?> vaga<?=com_ou_sem_s($imovelBusca->getVaga())?></span>
                                </i>
                            </span>
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#area"/></svg><span> <?= $imovelBusca->getArea() ?> m²</span>
                                </i>
                            </span>|
                            <span>
                                <i>
                                    <svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#condominio"/></svg><span>R$:<?= $imovelBusca->getCondominio()?> Condominio</span>
                                </i>
                            </span>
                        </div>


                            <div class="col-sm-12 endereco">
                                <i><svg class="item‐icone-info"><use xlink:href="icon/categorias.svg#localizacao"/></svg></i><span class="localizacao">Localizaçaõ :</span>
                                <span> <?=$imovelBusca->getEndereco()->getCidade();?></span>>
                                <span> <?=$imovelBusca->getEndereco()->getBairro();?></span>>
                                <span> <?=$imovelBusca->getEndereco()->getLogradouroTipo();?> </span>
                                <span> <?=$imovelBusca->getEndereco()->getLogradouroNome();?> </span>
                            </div>
                            <div class="col-sm-12 descriText">
                                <article><?= substr($imovelBusca->getDescricao(), 0, 200) ?>...</article>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm"><a href="detalhes.php?n=<?=$imovelId?>">+detalhes</a></button>
                    </div>
                </div>
                <?php 
                    $n++;
                endforeach;
                ?>
            </div>
        </div>
        <div class="row">
            <nav aria-label="Navigation for countries" class="nav_paginacao">
                <ul class="pagination">
                    <?php if ($paginaAtual != 1):?>
                    <li class="page-item">
                        <a class="page-link"
                            href="?pagina=<?=$paginaAtual-1?>&transacao=<?=$transacao?>&tipo=<?=$tipo?>&bairro=<?=$bairro?>&minValue=<?=$valorMin?>&maxValue=<?=$valorMax?>">Previous</a>
                    </li>
                    <?php endif?>
                    <?php for( $i=1;$i<= $nOfPages;$i++):?>
                    <?php if($paginaAtual == $i){  ?>
                    <li class="page-item active"> <a class="page-link"><?=$i?> <span class="sr-only">(current)</span></a>
                    </li>
                    <?php }else {?>
                    <li class="page-item">
                        <a class="page-link"
                            href="?pagina=<?=$i?>&transacao=<?=$transacao?>&tipo=<?=$tipo?>&bairro=<?=$bairro?>&minValue=<?=$valorMin?>&maxValue=<?=$valorMax?>">
                            <?=$i?> </a>
                    </li>
                    <?php }?>
                    <?php endfor?>
                    <?php if($paginaAtual < $nOfPages):?>
                    <li class="page-item">
                        <a class="page-link"
                            href="?pagina=<?=$paginaAtual+1?>&transacao=<?=$transacao?>&tipo=<?=$tipo?>&bairro=<?=$bairro?>&minValue=<?=$valorMin?>&maxValue=<?=$valorMax?>">Next</a>
                    </li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
        <script type="text/javascript" src="js/lista_filtrada.js"></script>
        <?php include"rodape.php"; ?>