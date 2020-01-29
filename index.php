<?php
function com_ou_sem_s($num)
{
    return $num > 1 ? "s" : "";
}
$array_css_da_pagina = array('header', 'estilo', 'slider', 'nice_select', 'geral', 'footer');
$array_js_da_pagina = array('javaScript', 'slider', 'footer');
$array_jquery_da_pagina = array('jquery.min', 'jquery', 'jquery.nice-select.min', 'prism');
include "cabecalho.php";
if (isset($_GET['enviado']) && !empty($_GET['enviado'])) :
    ?>
    <p class="text-success textAlert"><?= $_GET['enviado'] ?></p>
<?php endif ?>
<div class="slide row">
    <div class="imagem_principal">
        <div class="filtro_principal">
            <form class="formulario_principal" action="filtro.php">
                <div class="formulario_principal_div">
                    <select name="tipo" class="formulario_principal_div_input select_tipo" class="Wide" name="Selectbox" class="wpcf7-form-control wpcf7-select" aria-invalid="false">
                        <option value="Apartamento">Apartamento</option>
                        <option value="Casa">Casa</option>
                        <option value="Sobrado">Sobrado</option>
                        <option value="Terreno">Terreno</option>
                    </select>
                    <select name="transacao" class="formulario_principal_div_input select_transacao" class="Wide" name="Selectbox" class="wpcf7-form-control wpcf7-select" aria-invalid="false">
                        <option value="Venda">Venda</option>
                        <option value="Alugar">Alugar</option>
                    </select>
                    <input class="formulario_principal_div_input input_bairro" type="text" name="bairro" value="" placeholder="Bairro">
                    <button class="" type="submit"><svg class="item‐icone-search">
                            <use xlink:href="icon/categorias.svg#search" /></svg></button>
                </div>
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
                        <input type="hidden" name="minValue" value="">
                        <input type="hidden" name="maxValue" value="">
                    </div>
                </div>
                <input type="hidden" name="pagina" value="1">
            </form>
        </div>
    </div>
    <a href="http://api.whatsapp.com/send?1=pt_BR&phone=5511946279867"> <svg class="item‐icone-rodape whatsapp">
            <use xlink:href="icon/categorias.svg#whatshap" /></svg></a>
</div>
<h4 class=" text-center titulo_da_section">Imoveis em Destaques</h4>
<div class="card-deck">
    <div class="row">
        <?php
        $Imovel_Destaques = $ImoveisDao->Lista_imovel_destaque();
        $i = 0;
        foreach ($Imovel_Destaques as $Imovel_Destaque) :
            $Destaqueid = $Imovel_Destaque->getId_imovel(); ?>
            <div class="col-sm-4 ">
                <div class="card border-dark">
                    <div class="img">
                        <div id="carouselExampleControls<?= $i ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                <p class="titulo_slider text-center">
                                    <?php $res =  $Imovel_Destaque->getTransacao() == 'Venda' ? " a " : " para "; ?>
                                    <span class="tipo"><?= $Imovel_Destaque->getTipo(); ?>
                                        <?= $res ?><?= $Imovel_Destaque->getTransacao(); ?></span> >
                                    <span class="preco">R$ <?= number_format($Imovel_Destaque->getPreco(), 2); ?></span>
                                </p>
                                <a href="detalhes.php?n=<?= $Destaqueid ?>">
                                    <?php
                                        $subclass = "active";
                                        $imagens = $ImoveisDao->Lista_fotos($Destaqueid, 3);
                                        for ($j = 0; $j < count($imagens); ++$j) : $num = $j + 1; ?>
                                        <div class="carousel-item <?= $subclass ?>">
                                            <img class="d-block w-100" src="foto/<?= $imagens[$j]->getNome_foto(); ?>" title="<?= $Imovel_Destaque->getTipo(); ?> para <?= $Imovel_Destaque->getTransacao(); ?>">
                                            <?= "<span id='num_fotos'>" . $num . " / " . count($imagens) . "</span>" ?>
                                        </div>
                                        <?php $subclass = ''; ?>
                                    <?php endfor ?>
                                </a>
                                <svg class="item‐icone-foto">
                                    <use xlink:href="icon/categorias.svg#foto" /></svg>
                                <a class="carousel-control-prev" href="#carouselExampleControls<?= $i ?>" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls<?= $i ?>" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <span class="label-info">cod :NN<?= $Destaqueid; ?></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-info text-center">
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#quarto" /></svg><span><?= $Imovel_Destaque->getDormitorio(); ?> Dorm<?= com_ou_sem_s($Imovel_Destaque->getDormitorio()) ?></span></i>
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#suite" /></svg><span><?= $Imovel_Destaque->getSuite(); ?> Suite<?= com_ou_sem_s($Imovel_Destaque->getSuite()) ?></span></i>
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#vaga" /></svg><span><?= $Imovel_Destaque->getVaga(); ?> vaga<?= com_ou_sem_s($Imovel_Destaque->getVaga()) ?></span></i>
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#banheiro" /></svg><span><?= $Imovel_Destaque->getBanheiro(); ?> Banheiro<?= com_ou_sem_s($Imovel_Destaque->getBanheiro()) ?></span></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <svg class="item‐icone-localizacao">
                                <use xlink:href="icon/categorias.svg#localizacao" /></svg>
                            <?= $Imovel_Destaque->getEndereco()->getCidade(); ?>>
                            <?= $Imovel_Destaque->getEndereco()->getBairro(); ?>>
                            <?= $Imovel_Destaque->getEndereco()->getLogradouroTipo(); ?>
                            <?= $Imovel_Destaque->getEndereco()->getLogradouroNome(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++;
        endforeach ?>
    </div>
</div>
<h4 class=" text-center titulo_da_section">Adicionados recentemente</h4>
<div class="card-deck">
    <div class="row">
        <?php
        $last_Imoveis = $ImoveisDao->Lista_imovel_resentes();
        $n = 0;
        foreach ($last_Imoveis as $last_Imovel) :
            $Lid = $last_Imovel->getId_imovel(); ?>
            <div class="col-sm-4 ">
                <div class="card border-dark">
                    <div class="img">
                        <div id="carouselExampleControls2<?= $n ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                <p class="titulo_slider text-center">
                                    <?php $res =  $last_Imovel->getTransacao() == 'Venda' ? " a " : " para "; ?>
                                    <span class="tipo"><?= $last_Imovel->getTipo(); ?>
                                        <?= $res ?><?= $last_Imovel->getTransacao(); ?></span> >
                                    <span class="preco">R$ <?= number_format($last_Imovel->getPreco(), 2); ?></span>
                                </p>
                                <a href="detalhes.php?n=<?= $Lid ?>">
                                    <?php
                                        $subclass = "active";
                                        $imagens = $ImoveisDao->Lista_fotos($Lid, 3);
                                        for ($i = 0; $i < count($imagens); ++$i) : $num = $i + 1; ?>
                                        <div class="carousel-item <?= $subclass ?>">
                                            <img class="d-block w-100" src="foto/<?= $imagens[$i]->getNome_foto(); ?>" title="<?= $last_Imovel->getTipo(); ?> para <?= $last_Imovel->getTransacao(); ?>">
                                            <?= "<span id='num_fotos'>" . $num . " / " . count($imagens) . "</span>" ?>
                                        </div>
                                        <?php $subclass = ''; ?>
                                    <?php endfor ?>
                                </a>
                                <svg class="item‐icone-foto">
                                    <use xlink:href="icon/categorias.svg#foto" /></svg>
                                <a class="carousel-control-prev" href="#carouselExampleControls2<?= $n ?>" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls2<?= $n ?>" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <span class="label-info">cod :NN<?= $Lid; ?></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-info text-center">
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#quarto" /></svg><span><?= $last_Imovel->getDormitorio(); ?> Dorm<?= com_ou_sem_s($last_Imovel->getDormitorio()) ?></span></i>
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#suite" /></svg><span><?= $last_Imovel->getSuite(); ?> Suite<?= com_ou_sem_s($last_Imovel->getSuite()) ?></span></i>
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#vaga" /></svg><span><?= $last_Imovel->getVaga(); ?> vaga<?= com_ou_sem_s($last_Imovel->getVaga()) ?></span></i>
                            <i><svg class="item‐icone-info">
                                    <use xlink:href="icon/categorias.svg#banheiro" /></svg><span><?= $last_Imovel->getBanheiro(); ?> Banheiro<?= com_ou_sem_s($last_Imovel->getBanheiro()) ?></span></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <svg class="item‐icone-localizacao">
                                <use xlink:href="icon/categorias.svg#localizacao" /></svg>
                            <?= $last_Imovel->getEndereco()->getCidade(); ?>>
                            <?= $last_Imovel->getEndereco()->getBairro(); ?>>
                            <?= $last_Imovel->getEndereco()->getLogradouroTipo(); ?>
                            <?= $last_Imovel->getEndereco()->getLogradouroNome(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $n++; ?>
        <?php endforeach  ?>
    </div>
</div>
<?php include "rodape.php"; ?>