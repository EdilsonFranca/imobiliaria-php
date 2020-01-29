<?php 
require_once("banco-usuario.php");
require_once("logica-usuario.php");
$usuario = buscaUsuario($conn, $_POST["email"], $_POST["senha"]);
if($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("Location: loguinIndex.php");
} else {
	$_SESSION["success"] = "Usuário logado com sucesso.";
	logaUsuario($usuario["email"]);
	header("Location:formulario_adiciona_imovel.php");
}
die();