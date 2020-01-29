<?php 

class ImoveisDao{
     private $conn;

  function __construct($conn){
   $this->conn =$conn; 
 }
  function cadastrarImovel(Endereco $endereco,Proprietario $proprietario,imoveis $imoveis,array $fotos){ 
    $queryEndereco="INSERT INTO endereco(numero,logradouroTipo,logradouroNome,bairro,cep,cidade,lat,lng)VALUES(
    '{$endereco->getNumero()}',
    '{$endereco->getLogradouroTipo()}', 
    '{$endereco->getLogradouroNome()}', 
    '{$endereco->getBairro()}',
    '{$endereco->getCep()}',
    '{$endereco->getCidade()}',
    '{$endereco->getLat()}',
    '{$endereco->getLng()}')";
  if(mysqli_query($this->conn,$queryEndereco)){ //se o endereço for inserido com sucesso//
    $id_endereco=mysqli_insert_id($this->conn); // pega o id do utimo endereco adicionado//
    $queryProprietario="INSERT INTO proprietario(nome,tell,email)VALUES(
    '{$proprietario->getNome()}',
    '{$proprietario->getTell()}',
    '{$proprietario->getEmail()}')";
  if(mysqli_query($this->conn,$queryProprietario)){ //se o proprietario for inserido com sucesso//
    $id_proprietario=mysqli_insert_id($this->conn);  // pega o id do utimo proprietario adicionado//
    $queryImovel="INSERT INTO imoveis(transacao,tipo,dormitorio,suite,vaga,banheiro,preco,area,condominio,destaque,titulo,descricao,proprietario_id,endereco_id)
    VALUES(
    '{$imoveis->getTransacao()}',
    '{$imoveis->getTipo()}',
    '{$imoveis->getDormitorio()}',
    '{$imoveis->getSuite()}',
    '{$imoveis->getVaga()}',
    '{$imoveis->getBanheiro()}',
    '{$imoveis->getPreco()}',
    '{$imoveis->getArea()}',
    '{$imoveis->getCondominio()}',
    '{$imoveis->getDestaque()}',
    '{$imoveis->getTitulo()}',
    '{$imoveis->getDescricao()}',
    '{$id_proprietario}',
    '{$id_endereco}' )";
  if(mysqli_query($this->conn,$queryImovel)){// se o imovel for inserido//
    $id_imovel=mysqli_insert_id($this->conn); // pega o id do utimo imovel adicionado//
    foreach($fotos as $foto):
        $queryFotos="INSERT INTO fotos(nome_foto,imovel_id)VALUES('{$foto}','{$id_imovel}')";
        mysqli_query($this->conn,$queryFotos);
    endforeach;
  return true;
    }//fim do if imovel inserido
    else{ 
      mysqli_query($this->conn,"delete from endereco where id_endereco = {$id_endereco}"); 
      mysqli_query($this->conn,"delete from proprietario where id_proprietario = {$id_proprietario}"); 
      return false;}
   }//fim do if proprietario inserido
   else{ 
    mysqli_query($this->conn,"delete from endereco where id_endereco = {$id_endereco}"); 
    return false;}
  }//fim do if endereço inserido
  else{ return false;}
}
   

function atualizaImovel(Endereco $endereco,Proprietario $proprietario,imoveis $imoveis,array $fotos){ 
  $queryEndereco="UPDATE endereco  SET
  numero='{$endereco->getNumero()}',
  logradouroTipo='{$endereco->getLogradouroTipo()}',
  logradouroNome='{$endereco->getLogradouroNome()}',
  bairro='{$endereco->getBairro()}',
  cep='{$endereco->getCep()}',
  cidade='{$endereco->getCidade()}',
  lat= '{$endereco->getLat()}',
  lng= '{$endereco->getLng()}'
  WHERE id_endereco='{$endereco->getId()}' ";
 
if(mysqli_query($this->conn,$queryEndereco)){ //se o endereço for ATUALIZADO com sucesso//
  $queryProprietario="UPDATE proprietario SET
   nome='{$proprietario->getNome()}',
   tell='{$proprietario->getTell()}',
   email='{$proprietario->getEmail()}'
   WHERE id_proprietario='{$proprietario->getId()}' ";
if(mysqli_query($this->conn,$queryProprietario)){ //se o proprietario for ATUALIZADO com sucesso//
  $queryImovel="UPDATE imoveis SET 
  transacao='{$imoveis->getTransacao()}',
  tipo='{$imoveis->getTipo()}',
  dormitorio='{$imoveis->getDormitorio()}',
  suite='{$imoveis->getSuite()}',
  vaga='{$imoveis->getVaga()}',
  banheiro='{$imoveis->getBanheiro()}',
  preco= '{$imoveis->getPreco()}',
  area='{$imoveis->getArea()}',
  condominio='{$imoveis->getCondominio()}',
  destaque='{$imoveis->getDestaque()}',
  titulo='{$imoveis->getTitulo()}',
  descricao='{$imoveis->getDescricao()}'
  WHERE id_imovel='{$imoveis->getId_imovel()}' ";
 
if(mysqli_query($this->conn,$queryImovel)){// se o imovel for ATUALIZADO//
  if (!empty($fotos)){
   $verifica_if_tem_fotos=mysqli_query($this->conn,"SELECT * from fotos  WHERE imovel_id='{$imoveis->getId_imovel()}'");
   foreach($fotos as $foto):      
     if (!empty($verifica_if_tem_fotos->fetch_assoc())){
        mysqli_query($this->conn,"UPDATE fotos SET nome_foto='{$foto}'  WHERE imovel_id='{$imoveis->getId_imovel()}'");
      }else{
        if(mysqli_query($this->conn,"INSERT INTO fotos(nome_foto,imovel_id)VALUES('{$foto}','{$imoveis->getId_imovel()}')")){
        }
      }
    endforeach;
  return true;
  }
  return true;
  }//fim do if imovel ATUALIZADO 
  else{  echo 'o imovel não foi atualizado'; return false;}
 }//fim do if proprietario ATUALIZADO
 else{  echo 'o proprietario não foi atualizado'; return false;}
}//fim do if endereço ATUALIZADO
else{ echo 'o endereco não foi atualizado';return false;}
}

function Lista_imovel_resentes(){
  $Imovel_resentes=array();
  $query="SELECT i.id_imovel,i.transacao,i.tipo,i.dormitorio,i.suite,i.vaga,i.banheiro,i.preco,e.logradouroTipo,e.logradouroNome,e.bairro,e.cidade,e.cep from imoveis i join endereco e on e.id_endereco=i.endereco_id order by i.id_imovel desc Limit 3";
  $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
  while($Imovel_resentes_array=$result->fetch_assoc()){

    $endereco = new Endereco();
    $endereco->setLogradouroTipo($Imovel_resentes_array['logradouroTipo']);
    $endereco->setLogradouroNome($Imovel_resentes_array['logradouroNome']);
    $endereco->setBairro($Imovel_resentes_array['bairro']);
    $endereco->setCidade($Imovel_resentes_array['cidade']);
    $endereco->setCep   ($Imovel_resentes_array['cep']);
    
    $imovel = new Imoveis();
    $imovel->setId_imovel  ($Imovel_resentes_array['id_imovel']);
    $imovel->setTransacao  ($Imovel_resentes_array['transacao']);
    $imovel->setTipo       ($Imovel_resentes_array['tipo']);
    $imovel->setDormitorio ($Imovel_resentes_array['dormitorio']);
    $imovel->setSuite      ($Imovel_resentes_array['suite']);
    $imovel->setVaga       ($Imovel_resentes_array['vaga']);
    $imovel->setBanheiro   ($Imovel_resentes_array['banheiro']);
    $imovel->setPreco      ($Imovel_resentes_array['preco']);
    $imovel->setEndereco($endereco);
    array_push($Imovel_resentes,$imovel);
  }
  return $Imovel_resentes;
}


function Lista_imovel_destaque(){
  $Imovel_destaque=array();
  $query="SELECT i.id_imovel,i.transacao,i.tipo,i.dormitorio,i.suite,i.vaga,i.banheiro,i.preco,e.logradouroTipo,
  e.logradouroNome,e.bairro,e.cidade,e.cep from imoveis i join endereco e on e.id_endereco=i.endereco_id 
  where i.destaque=1 order by i.id_imovel desc Limit 3 ";
  $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
    while($Imovel_destaque_array=$result->fetch_assoc()){
    $endereco = new Endereco();
    $endereco->setLogradouroTipo($Imovel_destaque_array['logradouroTipo']);
    $endereco->setLogradouroNome($Imovel_destaque_array['logradouroNome']);
    $endereco->setBairro($Imovel_destaque_array['bairro']);
    $endereco->setCidade($Imovel_destaque_array['cidade']);
    $endereco->setCep   ($Imovel_destaque_array['cep']);

    $imovel = new Imoveis();
    $imovel->setId_imovel  ($Imovel_destaque_array['id_imovel']);
    $imovel->setTransacao  ($Imovel_destaque_array['transacao']);
    $imovel->setTipo       ($Imovel_destaque_array['tipo']);
    $imovel->setDormitorio ($Imovel_destaque_array['dormitorio']);
    $imovel->setSuite      ($Imovel_destaque_array['suite']);
    $imovel->setVaga       ($Imovel_destaque_array['vaga']);
    $imovel->setBanheiro   ($Imovel_destaque_array['banheiro']);
    $imovel->setPreco      ($Imovel_destaque_array['preco']);
    $imovel->setEndereco($endereco);

    array_push($Imovel_destaque,$imovel);
  }
  return $Imovel_destaque;
}

function Lista_fotos($id,$quantidade){
  $fotos_resentes=array();
  $query="SELECT nome_foto FROM  fotos where imovel_id={$id} Limit $quantidade";
  $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
  while($Imovel_resentes_array=$result->fetch_assoc()){
    $fotos = new Fotos();
    $fotos->setNome_foto($Imovel_resentes_array['nome_foto']);
    array_push($fotos_resentes,$fotos);
  }
  return $fotos_resentes;
}

function imovelBuscaMapar(){
  $imoveisBuscaMapa=array();
  $query="SELECT distinct i.id_imovel,i.preco ,i.transacao ,i.tipo,i.dormitorio,i.suite ,i.vaga ,i.banheiro ,e.lat,e.lng
  from imoveis i join  endereco e on e.id_endereco=i.endereco_id "; 
   $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
  while($imovelBuscaMapa_array=$result->fetch_assoc()){
    $endereco = new Endereco();
    $endereco->setLat($imovelBuscaMapa_array['lat']);
    $endereco->setLng($imovelBuscaMapa_array['lng']);

    $imovel = new Imoveis();
    $imovel->setId_imovel  ($imovelBuscaMapa_array['id_imovel']);
    $imovel->setTransacao  ($imovelBuscaMapa_array['transacao']);
    $imovel->setTipo       ($imovelBuscaMapa_array['tipo']);
    $imovel->setDormitorio ($imovelBuscaMapa_array['dormitorio']);
    $imovel->setSuite      ($imovelBuscaMapa_array['suite']);
    $imovel->setVaga       ($imovelBuscaMapa_array['vaga']);
    $imovel->setBanheiro   ($imovelBuscaMapa_array['banheiro']);
    $imovel->setPreco      ($imovelBuscaMapa_array['preco']);
    $imovel->setEndereco($endereco);
    
    $sub_query="SELECT nome_foto FROM  fotos where imovel_id={$imovelBuscaMapa_array['id_imovel']} Limit 3";
    $sub_result = mysqli_query($this->conn,$sub_query)or die("erro na consulta".mysqli_error($this->conn));
    $fotos_array=array();
    while($Imovel_resentes_array=$sub_result->fetch_assoc()){
      $fotos = new Fotos();
      $fotos->setNome_foto($Imovel_resentes_array['nome_foto']);
      array_push($fotos_array,$fotos);
      $imovel->setFoto($fotos);
    }
    array_push($imoveisBuscaMapa,$imovel);
  }
  
  return $imoveisBuscaMapa;
}





function buscar_imovel($id){
  $imovel = new Imoveis();
  $query="SELECT  i.*,e.*,p.*  from imoveis i join endereco e on e.id_endereco=i.endereco_id join proprietario p on i.proprietario_id=p.id_proprietario where i.id_imovel={$id}";
  $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
  if($imovel_detalhe_array=$result->fetch_assoc()){
    $endereco = new Endereco();

    $endereco->setLogradouroTipo($imovel_detalhe_array['logradouroTipo']);
    $endereco->setLogradouroNome($imovel_detalhe_array['logradouroNome']);
    $endereco->setBairro        ($imovel_detalhe_array['bairro']);
    $endereco->setCidade        ($imovel_detalhe_array['cidade']);
    $endereco->setLat           ($imovel_detalhe_array['lat']);
    $endereco->setLng           ($imovel_detalhe_array['lng']);
    $endereco->setCep           ($imovel_detalhe_array['cep']);
    $endereco->setNumero        ($imovel_detalhe_array['numero']);
    $endereco->setId            ($imovel_detalhe_array['id_endereco']);


    $imovel->setId_imovel  ($imovel_detalhe_array['id_imovel']);
    $imovel->setTransacao  ($imovel_detalhe_array['transacao']);
    $imovel->setTipo       ($imovel_detalhe_array['tipo']);
    $imovel->setDormitorio ($imovel_detalhe_array['dormitorio']);
    $imovel->setSuite      ($imovel_detalhe_array['suite']);
    $imovel->setVaga       ($imovel_detalhe_array['vaga']);
    $imovel->setBanheiro   ($imovel_detalhe_array['banheiro']);
    $imovel->setPreco      ($imovel_detalhe_array['preco']);
    $imovel->setarea       ($imovel_detalhe_array['area']);
    $imovel->setCondominio ($imovel_detalhe_array['condominio']);
    $imovel->setdestaque   ($imovel_detalhe_array['destaque']);
    $imovel->setTitulo     ($imovel_detalhe_array['titulo']);
    $imovel->setDescricao  ($imovel_detalhe_array['descricao']);
    $imovel->setEndereco($endereco);

    $proprietario=new Proprietario();
    $proprietario->setNome($imovel_detalhe_array['nome']);
    $proprietario->setEmail($imovel_detalhe_array['email']);
    $proprietario->setTell ($imovel_detalhe_array['tell']);
    $imovel->setProprietario($proprietario);
  }
  return $imovel;
}

function lista_imoveis(){
  $imoveisLista=array();
  $query="SELECT i.*,e.* from imoveis i join endereco e on e.id_endereco=i.endereco_id";
  $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
  while($imovel_lista_array=$result->fetch_assoc()){
    $imovel = new Imoveis();
    $endereco = new Endereco();
    
    $endereco->setNumero($imovel_lista_array['numero']);
    $endereco->setLogradouroTipo($imovel_lista_array['logradouroTipo']);
    $endereco->setLogradouroNome($imovel_lista_array['logradouroNome']);
    $endereco->setBairro($imovel_lista_array['bairro']);
    $endereco->setCidade($imovel_lista_array['cidade']);
    $endereco->setCep   ($imovel_lista_array['cep']);
    $endereco->setLat($imovel_lista_array['lat']);
    $endereco->setLng($imovel_lista_array['lng']);

    $imovel->setId_imovel  ($imovel_lista_array['id_imovel']);
    $imovel->setTransacao  ($imovel_lista_array['transacao']);
    $imovel->setTipo       ($imovel_lista_array['tipo']);
    $imovel->setDormitorio ($imovel_lista_array['dormitorio']);
    $imovel->setSuite      ($imovel_lista_array['suite']);
    $imovel->setVaga       ($imovel_lista_array['vaga']);
    $imovel->setBanheiro   ($imovel_lista_array['banheiro']);
    $imovel->setPreco      ($imovel_lista_array['preco']);
    $imovel->setarea      ($imovel_lista_array['area']);
    $imovel->setCondominio($imovel_lista_array['condominio']);
    $imovel->setDestaque   ($imovel_lista_array['destaque']);
    $imovel->setTitulo     ($imovel_lista_array['titulo']);
    $imovel->setDescricao  ($imovel_lista_array['descricao']);
    $imovel->setEndereco($endereco);
    array_push($imoveisLista,$imovel);
  
  }
  return $imoveisLista;
}

function ListaimovelBusca($registrosPorPagina,$pageNumber,$sql){
  $registrosPorPagina;
  $start = $pageNumber * $registrosPorPagina - $registrosPorPagina;
  $imoveisBusca=array();
  $query ="SELECT * from imoveis i join endereco e on e.id_endereco=i.endereco_id   $sql Limit $start, $registrosPorPagina" ;  
  $result=mysqli_query($this->conn,$query)or die ("falha na consulta".mysqli_error($this->conn));
  while($imovelBusca=$result->fetch_assoc()){
    $endereco = new Endereco();
    $endereco->setLogradouroTipo($imovelBusca['logradouroTipo']);
    $endereco->setLogradouroNome($imovelBusca['logradouroNome']);
    $endereco->setBairro($imovelBusca['bairro']);
    $endereco->setCidade($imovelBusca['cidade']);
    $endereco->setCep   ($imovelBusca['cep']);
    $endereco->setLat   ($imovelBusca['lat']);
    $endereco->setLng   ($imovelBusca['lng']);
    $endereco->setNumero  ($imovelBusca['numero']);

    $imovel = new Imoveis();

    $imovel->setId_imovel  ($imovelBusca['id_imovel']);
    $imovel->setTransacao  ($imovelBusca['transacao']);
    $imovel->setTipo       ($imovelBusca['tipo']);
    $imovel->setDormitorio ($imovelBusca['dormitorio']);
    $imovel->setSuite      ($imovelBusca['suite']);
    $imovel->setVaga       ($imovelBusca['vaga']);
    $imovel->setBanheiro   ($imovelBusca['banheiro']);
    $imovel->setPreco      ($imovelBusca['preco']);
    $imovel->setDestaque   ($imovelBusca['destaque']);
    $imovel->setTitulo     ($imovelBusca['titulo']);
    $imovel->setDescricao  ($imovelBusca['descricao']);
    $imovel->setarea      ($imovelBusca['area']);
    $imovel->setCondominio($imovelBusca['condominio']);
    $imovel->setEndereco($endereco);
    array_push($imoveisBusca,$imovel);
  }
  return $imoveisBusca;
}


function ListaimovelBuscaCont($sql){
  $query ="SELECT * from imoveis i join endereco e on e.id_endereco=i.endereco_id   $sql" ;  
  $result=mysqli_query($this->conn,$query)or die ("falha na consulta".mysqli_error($this->conn));
  return mysqli_num_rows($result);
}
function ListaimovelBuscaGeral($sql){
  $imoveisBusca=array();
  $query ="SELECT * from imoveis i join endereco e on e.id_endereco=i.endereco_id   $sql" ;
  $result=mysqli_query($this->conn,$query)or die ("falha na consulta".mysqli_error($conn));
  while($imovelBusca=$result->fetch_assoc()){
    $endereco = new Endereco();

    $endereco->setRua   ($imovelBusca['rua']);
    $endereco->setBairro($imovelBusca['bairro']);
    $endereco->setCidade($imovelBusca['cidade']);
    $endereco->setCep   ($imovelBusca['cep']);

    $proprietario = new Proprirtario();
    $proprietario->setNome($imovelBusca['nome']);
    $proprietario->setTell($imovelBusca['tell']);
    $proprietario->setEmail($imovelBusca['email']);

    $imovel = new Imoveis();

    $imovel->setId_imovel  ($imovelBusca['id']);
    $imovel->setTransacao  ($imovelBusca['transacao']);
    $imovel->setTipo       ($imovelBusca['tipo']);
    $imovel->setNome_dono  ($imovelBusca['nome_dono']);
    $imovel->setDormitorio ($imovelBusca['dormitorio']);
    $imovel->setSuite      ($imovelBusca['suite']);
    $imovel->setVaga       ($imovelBusca['vaga']);
    $imovel->setBanheiro   ($imovelBusca['banheiro']);
    $imovel->setPreco      ($imovelBusca['preco']);
    $imovel->setDestaque   ($imovelBusca['destaque']);
    $imovel->setTitulo     ($imovelBusca['titulo']);
    $imovel->setDescricao  ($imovelBusca['descriçao']);
    $imovel->setEndereco($endereco);
    array_push($imoveisBusca,$imovel);
  }
  return $imoveisBusca;
}

function removeImovel($id){ 
   $query="SELECT *  from imoveis  where id_imovel={$id}";
   $result = mysqli_query($this->conn,$query)or die("erro na consulta".mysqli_error($this->conn));
   if ($imovel=mysqli_fetch_object($result)){ 
        $query1="delete from endereco where id_endereco = {$imovel->endereco_id}";
        $query2="delete from proprietario where id_proprietario = {$imovel->proprietario_id}";
        $query3="delete from imoveis where id_imovel = {$imovel->id_imovel}";
        $query4="delete from imoveis where id_imovel = {$imovel->id_imovel}";
        mysqli_query($this->conn,$query1)or die("erro na exclusao endereco".mysqli_error($this->conn));
        mysqli_query($this->conn,$query2)or die("erro na exclusao proprietario".mysqli_error($this->conn));
        mysqli_query($this->conn,$query3)or die("erro na exclusao imoveis".mysqli_error($this->conn));
        mysqli_query($this->conn,$query4)or die("erro na exclusao fotos".mysqli_error($this->conn));
      return true;
   }
	return  false;
}
}