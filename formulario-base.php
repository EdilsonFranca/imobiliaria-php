
 
 <div class="row">
     <div class="form-group card-body col-md-9 ">
         <label>Titulo</label>
         <input name="titulo" class="form-control" type="text" value="<?=$imovel->getTitulo()?>"> 
        </div>
        
        <?php $selecao_destaque = $imovel->getDestaque()==1 ? "checked='checked'" : "";?>
        <?php $imovel->setDestaque($selecao_destaque)?>                              

     <div class="form-group card-body col-md-3 ">
         <label> Destaque</label>
         <input name="destaque" type='checkbox' <?=$imovel->getDestaque()?> class="form-control" />
     </div>
 </div>
 <div class="form-group card-body row">
     <div class="form-group card-body col-md-1 ">
         <label for="dormitorio">Dormitorio:</label>
         <input name="dormitorio" class="form-control" type="number" value="<?=$imovel->getDormitorio()?>" />

     </div>
     <div class="form-group card-body col-md-1 ">
         <label for="suite">Suite:</label>
         <input name="suite" class="form-control" type="number" value="<?=$imovel->getSuite()?>" />

     </div>
     <div class="form-group card-body col-md-1 ">
         <label for="vaga">Vaga:</label>
         <input name="vaga" class="form-control" type="number" value="<?=$imovel->getVaga()?>" />

     </div>

     <div class="form-group card-body col-md-1 ">
         <label for="banheiro">Banheiro:</label>
         <input name="banheiro" class="form-control" type="number" value="<?=$imovel->getBanheiro()?>" />

     </div>
     <div class="form-group card-body col-md-1 ">
         <label>Area</label>
         <input name="area" class="form-control" type="number" value="<?=$imovel->getarea()?>" />
     </div>
     <div class="form-group card-body col-md-1 ">
         <label>Condoninio</label>
         <input name="condominio" class="form-control" type="text" value="<?=$imovel->getCondominio()?>" />
     </div>
     <div class="form-group card-body col-md-2 ">
         <label> valor </label>
         <input name="preco" class="form-control" type="text" value="<?=$imovel->getPreco()?>" />
     </div>
     <?php $tipos= array("Apartamento","Casa","Sobrado","Terreno");?>
     <div class="form-group card-body col-md-2 ">
         <label for="Tipo De Imovel">Tipo De Imovel:</label>
         <select class="form-control" name="tipo">
             <option value="">Tipo De Imovel</option>
             <?php foreach($tipos as $tipo):?>
                 <option  <?=$imovel->getTipo() == $tipo ? "selected='selected'" : ""; ?>value="<?=$tipo?>"><?=$tipo?></option>
             <?php endforeach?>
         </select>
     </div>
     <?php $transacoes=array("Venda","Aluga") ;?>
     <div class="form-group card-body col-md-2 ">
         <label for="Transação">Transação:</label>
         <select class="form-control" name="transacao">
             <option value="">Transação</option>
         <?php foreach($transacoes as $transacao):?>
             <option  <?=$imovel->getTransacao() == $transacao ? "selected='selected'" : ""; ?> value="<?=$transacao?>"><?=$transacao?></option>
         <?php endforeach;?>
         </select>
     </div>
 </div>
 <div class="row">
     <div class="form-group card-body col-md-8 ">
         <label>Descricao</label><br>
         <textarea name="descricao" class="form-control" rows="8"><?=$imovel->getDescricao()?></textarea>
     </div>

     <div class="form-group card-body col-md-4 ">
         <label>Fotos</label>
         <input name="arquivo[]" class="form-control" type="FILE" multiple />
     </div>
 </div>
 </div>
 <div class="card  bg-success">
     <div class="card-header">
         <h4>Endereço</h4>
     </div>
     <div class="row">
         <div class="form-group card-body col-md-1 ">
             <label> Numero </label>
             <input name="numero" class="form-control" type="text" value='<?=$imovel->getEndereco()->getNumero()?>' />
         </div>
         <?php $tiposLogradouro=array("AV","Rua");?>
         <div class="form-group card-body col-md-2 ">
             <label> Logradouros tipo </label>
             <select class="form-control" name="logradouroTipo">
                 <option>logradouros</option>
                 <?php foreach($tiposLogradouro as $tipoLogradouro):?>
                     <option  <?=$imovel->getEndereco()->getLogradouroTipo() == $tipoLogradouro ? "selected='selected'" : ""; ?> value="<?=$tipoLogradouro?>"><?=$tipoLogradouro?></option>
                 <?php endforeach;?>
             </select>
         </div>
         <div class="form-group card-body col-md-5 ">
             <label>Logradouros nome </label>
             <input name="logradouroNome" class="form-control" type="text" value=" <?= $imovel->getEndereco()->getLogradouroNome()?>" />
         </div>
         <div class="form-group card-body col-md-4 ">
             <label>Bairro </label>
             <input name="bairro" class="form-control" type="text" value="<?= $imovel->getEndereco()->getBairro()?>" />
         </div>
         <div class="form-group card-body col-md-3 ">
             <label>Cep </label>
             <input name="cep" class="form-control" type="text" value="<?=$imovel->getEndereco()->getCep()?>" />
         </div>
         <div class="form-group card-body col-md-3 ">
             <label>Cidade </label>
             <input name="cidade" class="form-control" type="text" value="<?=$imovel->getEndereco()->getCidade()?>"/>
         </div>
         <div class="form-group card-body col-md-2 ">
             <label>Latitude </label>
             <input name="latitude" class="form-control" type="text" value="<?=$imovel->getEndereco()->getLat()?>" />
         </div>
         <div class="form-group card-body col-md-2 ">
             <label>Longitude</label>
             <input name="longitude" class="form-control" type="text" value="<?=$imovel->getEndereco()->getLng()?>" />
         </div>
     </div>
 </div>
 <div class="card text-white bg-info">
     <div class="card-header">
         <h4>Proprietário</h4>
     </div>
     <div class="row">
         <div class="form-group card-body col-md-3 ">
             <label>Nome </label>
             <input name="nome" class="form-control" type="text" value="<?=$imovel->getProprietario()->getNome()?>" />
         </div>

         <div class="form-group card-body col-md-3 ">
             <label>Email </label>
             <input name="email" class="form-control" type="text" value="<?=$imovel->getProprietario()->getEmail()?>" />
         </div>
         <div class="form-group card-body col-md-3 ">
             <label>Tell </label>
             <input name="tell" class="form-control" type="text" value="<?=$imovel->getProprietario()->getTell()?>" />
         </div>
     </div>
 </div>


