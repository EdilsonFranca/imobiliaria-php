<?php  

function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
require_once('conexao.php');


$ImoveisDao = new ImoveisDao($conn);
$endereco = new Endereco();
$endereco->setId($_POST['id_endereco']);
$endereco->setNumero($_POST['numero']);
$endereco->setLogradouroTipo  ($_POST['logradouroTipo']);
$endereco->setLogradouroNome  ($_POST['logradouroNome']);
$endereco->setBairro($_POST['bairro']);
$endereco->setCep   ($_POST['cep']);
$endereco->setCidade($_POST['cidade']);
$endereco->setLat($_POST['latitude']);
$endereco->setLng($_POST['longitude']);
	
$proprietario = new Proprietario();
$proprietario->setNome($_POST['nome']);
$proprietario->setTell($_POST['tell']);
$proprietario->setEmail($_POST['email']);

$imoveis= new Imoveis();
$imoveis->setTitulo($_POST['titulo']);

if( isset($_POST['destaque']) ){
	$imoveis->setDestaque(1);
} else {
	$imoveis->setDestaque(0);
}
$imoveis->setDormitorio($_POST['dormitorio']);
$imoveis->setSuite($_POST['suite']);
$imoveis->setVaga($_POST['vaga']);
$imoveis->setBanheiro($_POST['banheiro']);
$imoveis->setArea($_POST['area']);
$imoveis->setCondominio($_POST['condominio']);
$imoveis->setPreco($_POST['preco']);
$imoveis->setTransacao($_POST['transacao']);
$imoveis->setTipo($_POST['tipo']);
$imoveis->setDescricao($_POST['descricao']);

$array_de_fotos=array();

//INFO IMAGEM 
$file = $_FILES['arquivo']; 
$numFile = count(array_filter($file['name'])); 

//PASTA 
$folder = 'foto'; 

//REQUISITOS 
$permite = array('image/jpeg', 'image/png', 'image/jpg'); 
$maxSize = 1024 * 1024 * 5; 

//MENSAGENS 
$msg = array(); 
$errorMsg = array( 
	1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.', 
	2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML', 
	3 => 'o upload do arquivo foi feito parcialmente', 
	4 => 'Não foi feito o upload do arquivo' 
); 

 if($numFile <= 0) 
	echo 'Selecione uma Imagem!'; 
 else{  
	for($i =0; $i < $numFile; $i++){ 

		$name = $file['name'][$i]; 
		$type = $file['type'][$i]; 
		$size = $file['size'][$i]; 
		$error= $file['error'][$i]; 
		$tmp = $file['tmp_name'][$i]; 

		$extensao = @end(explode('.', $name)); 
	    $novoNome = rand().".$extensao"; 

		if($error != 0) 
		    $msg[] = "$name : ".$errorMsg[$error]; 
		else if(!in_array($type, $permite)) 
			$msg[] = "$name : Erro imagem não suportada! <br />"; 
		else if($size > $maxSize) 
			$msg[] = "$name : Erro imagem ultrapassa o limite de 5MB <br />"; 
		else{ 

		  if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
			echo"$name : Upload Realizado com Sucesso!  <br />";

			array_push($array_de_fotos,$novoNome);

        }else {
		     $msg[] = "$name : Desculpe! Ocorreu um erro...<br />";
		   }
				} 
		foreach($msg as $pop) 
			echo $pop.''; 
		} 
	
	}
 
if(isset($_POST['id'])  &&  (!empty($_POST['id']))){ 
	$imoveis->setId_imovel($_POST['id']);
	if($ImoveisDao->atualizaImovel($endereco,$proprietario,$imoveis,$array_de_fotos)) { ?>
	       <p class="text-success">O imovelfoi alterado.</p>
		   <?php  $_SESSION["sucess"] = "cadastrado com sucesso.";
		} else {?>
	        <p class="text-danger">O imovel não foi alterado: <?= mysqli_error($conn)?></p>
	<?php
	    }

}else{
	if($ImoveisDao->cadastrarImovel($endereco,$proprietario,$imoveis,$array_de_fotos)) { ?>
         <p class="text-success">O imovelfoi adicionado.</p>
    <?php 
     } else {	?>
       <p class="text-danger">O imovel não foi adicionado: <?= mysqli_error($conn)?></p>
   <?php
   }
}
?>