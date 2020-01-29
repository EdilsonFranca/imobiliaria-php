<?php 
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
require_once('conexao.php');
(isset($_GET['quarto']))? $quarto  =$_GET['quarto']: $quarto ='';
(isset($_GET['pagina']))? $paginaAtual=$_GET['pagina']:$paginaAtual=1;
$ImoveisDao = new ImoveisDao($conn);
     isset($_GET['tipo'])  &&  (!empty($_GET['tipo'])) ? $tipo  =$_GET['tipo']:$tipo='';
     isset($_GET['transacao'])  &&  (!empty($_GET['transacao'])) ? $transacao  =$_GET['transacao']:$transacao='';
     isset($_GET['bairro'])? $bairro  =$_GET['bairro']: $bairro ='';
     isset($_GET['quarto'])? $quarto  =$_GET['quarto']: $quarto ='';
     isset($_GET['vaga'])? $vaga  =$_GET['vaga']: $vaga ='';
     isset($_GET['minValue'])? $valorMin  =$_GET['minValue']: $valorMin ='';
     isset($_GET['maxValue'])? $valorMax  =$_GET['maxValue']: $valorMax ='';

    $imovel=new Imoveis();
    $endereco=new Endereco();
    $imovel->setTipo($tipo);
    $imovel->setTransacao($transacao);
    $endereco->setBairro($bairro);
    $imovel->setEndereco($endereco);
    $imovel->setDormitorio($quarto);
    $imovel->setVaga($vaga);

    $where=array(); // cria um array

	  if ( $transacao) {$where[] = " i.transacao  = '{$transacao}' "; }
	  if ( $tipo)      {$where[] = " i.tipo       = '{$tipo}'      "; }
      if ( $bairro)    {$where[] = " e.bairro like '%{$bairro}%'    "; }
      if ( $quarto)    {$where[] = " i.dormitorio = '{$quarto}'    "; }
      if ( $vaga)      {$where[] = " i.vaga       = '{$vaga}'    "; }
      if ( $valorMin)  {$where[] = " i.preco     >= '{$valorMin}' "; }
      if ( $valorMax)  {$where[] = " i.preco     <= '{$valorMax}' "; }
	  $sql='';
      if( sizeof( $where) ) $sql =' WHERE '.implode( ' AND ',$where )."order by preco";
	  //  sizeof = Retorna o número de elementos em uma matriz:
      // implode = Junte os elementos da matriz com uma string:
      
      $registro_por_pagina=3;
      $imoveis_Busca=$ImoveisDao->ListaimovelBusca($registro_por_pagina,$paginaAtual,$sql);

      $numImoveisFiltrados=$ImoveisDao->ListaimovelBuscaCont($sql);
      $nOfPages = $numImoveisFiltrados / $registro_por_pagina;
      if ($numImoveisFiltrados % $registro_por_pagina > 0){$nOfPages++;}
      require_once("cabecalho_imoveis.php");
      require_once("mostra-alerta.php"); 
    ?>
<div class="">
    <form class="form" method="" action="">
        <div class="row">
            <?php $transacoesArray=array("Venda","Alugar") ;?>
            <select class="form-control  col-sm-1" name="transacao">
                <option value="">Transação</option>
                <?php foreach($transacoesArray as $transacaoArray):?>
                <option
                    <?=$imovel->getTransacao() == $transacaoArray ? "selected='selected'" : ""; ?>value="<?=$transacaoArray?>">
                    <?=$transacaoArray?></option>
                <?php endforeach;?>
            </select>
            <?php $tiposArray= array("Apartamento","Casa","Sobrado","Terreno");?>
            <select class="form-control  col-sm-1" name="tipo">
                <option value="">Tipo De Imovel</option>
                <?php foreach($tiposArray as $tipoArray):?>
                <option <?=$imovel->getTipo() == $tipoArray ? "selected='selected'" : ""; ?>value="<?=$tipoArray?>">
                    <?=$tipoArray?></option>
                <?php endforeach?>
            </select>
            <input name="bairro" placeholder="Bairro" class="form-control col-sm-2" type="text"
                value="<?= $imovel->getEndereco()->getBairro()?>" />
            <ul class="itens">
                <span>Quartos</span>
                <?php for($i=1;$i<4;$i++):?>
                <li class="item" style="display:inline">
                    <?php $imovel->getDormitorio()==$i ? "checked='checked'" : ""; ?>
                    <input name="quarto" type="radio" id="quarto<?=$i?>" value="<?=$i?>"
                        <?=$imovel->getDormitorio()== $i ? "checked='checked'" : ""; ?>>
                    <label for="quarto<?=$i?>"><?=$i?></label>
                </li>
                <?php endfor?>
            </ul>

            <ul class="itens vaga col-sm-2">
                <span>Vagas </span>
                <?php for($i=1;$i<4;$i++):?>
                <li class="item" style="display:inline">
                    <input name="vaga" type="radio" id="vaga<?=$i?>" value="<?=$i?>"
                        <?=$imovel->getVaga()== $i ? "checked='checked'" : ""; ?>>
                    <label for="vaga<?=$i?>"><?=$i?></label>
                </li>
                <?php endfor?>
            </ul>

            <input class="col-sm-1 form-control" type="text" name="minValue" value="<?=$valorMin?>" placeholder="De">
            <input class="col-sm-1 form-control" type="text" name="maxValue" value="<?=$valorMax?>" placeholder="A">

            <button class="btn btn-primary form-control col-sm-1" type="submit">Pesquisar</button>
        </div>
    </form>
</div>
<table class="table table-striped table-bordered" style="widyh:100%">
    <tr>
        <td>Id</td>
        <td>Transacao</td>
        <td>Tipo</td>
        <td>Dormitorio</td>
        <td>Suite</td>
        <td>Vaga</td>
        <td>Banheiro</td>
        <td>Preco</td>
        <td>Destaque</td>
        <td>Titulo</td>
        <td>Descricao</td>
        <td>Numero</td>
        <td>LogradouroTipo</td>
        <td>LogradouroNome</td>
        <td>Bairro</td>
        <td>Cidade</td>
        <td>Cep</td>
        <td>Latitude</td>
        <td>Longitude</td>
        <td>Alterar</td>
        <td>Excluir</td>
    </tr>
    <?php foreach($imoveis_Busca as $imovel) :?>
    <tr>
        <td><?=$imovel->getId_imovel()?></td>
        <td><?=$imovel->getTransacao()?></td>
        <td><?=$imovel->getTipo()?></td>
        <td><?=$imovel->getDormitorio()?></td>
        <td><?=$imovel->getSuite()?></td>
        <td><?=$imovel->getVaga()?></td>
        <td><?=$imovel->getBanheiro()?></td>
        <td><?=$imovel->getPreco()?></td>
        <td><?=$imovel->getDestaque()?></td>
        <td><?=$imovel->getTitulo()?></td>
        <td><?= substr($imovel->getDescricao(),0, 40) ?></td>
        <td><?=$imovel->getEndereco()->getNumero()?></td>
        <td><?=$imovel->getEndereco()->getLogradouroTipo()?></td>
        <td><?=$imovel->getEndereco()->getLogradouroNome()?></td>
        <td><?=$imovel->getEndereco()->getBairro()?></td>
        <td><?=$imovel->getEndereco()->getCidade()?></td>
        <td><?=$imovel->getEndereco()->getCep()?></td>
        <td><?=$imovel->getEndereco()->getLat()?></td>
        <td><?=$imovel->getEndereco()->getLng()?></td>
        <td>
            <a class="btn btn-primary" href="formulario_altera_imovel.php?id=<?=$imovel->getId_imovel()?>">
                alterar
            </a>
        </td>
        <td>
            <form action="remove_imovel.php" method="post">
                <input type="hidden" name="id" value="<?=$imovel->getId_imovel()?>">
                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>
    <?php
	endforeach
	?>
</table>
<div class="row">
    <nav aria-label="Navigation for countries" class="nav_paginacao " style="margin:auto">
        <ul class="pagination">
            <?php if ($paginaAtual != 1):?>
            <li class="page-item">
                <a class="page-link"
                    href="?pagina=<?=$paginaAtual-1?>&transacao=<?=$transacao?>&tipo=<?=$tipo?>&bairro=<?=$bairro?>&minValue=<?=$valorMin?>&maxValue=<?=$valorMax?>">Previous</a>
            </li>
            <?php endif?>
            <?php for( $i=1;$i<= $nOfPages;$i++):?>
            <?php if($paginaAtual == $i){  ?>
            <li class="page-item active"><a class="page-link"><?=$i?><span class="sr-only">(current)</span></a>
            </li>
            <?php }else {?>
            <li class="page-item">
                <a class="page-link"
                    href="?pagina=<?=$i?>&transacao=<?=$transacao?>&tipo=<?=$tipo?>&bairro=<?=$bairro?>&minValue=<?=$valorMin?>&maxValue=<?=$valorMax?>">
                    <?=$i?> </a>
            </li>
            <?php }?>
            <?php endfor?>
            <?php if($paginaAtual < ($nOfPages)):?>
            <li class="page-item">
                <a class="page-link"
                    href="?pagina=<?=$paginaAtual+1?>&transacao=<?=$transacao?>&tipo=<?=$tipo?>&bairro=<?=$bairro?>&minValue=<?=$valorMin?>&maxValue=<?=$valorMax?>">Next</a>
            </li>
            <?php endif ?>
        </ul>
    </nav>
</div>
<?php include("rodape_imoveis.php"); ?>