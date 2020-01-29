<?php
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
require_once('conexao.php');
$ImoveisDao = new ImoveisDao($conn);

$id = $_POST['id'];
if($ImoveisDao->removeImovel($id)){
    $_SESSION["success"] = "Produto removido com sucesso.";
    die();
}else{
    $_SESSION["danger"] = "Produto naõ foi removido com sucesso.";
    die();
}
