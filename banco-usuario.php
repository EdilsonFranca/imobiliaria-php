<?php
require_once("conexao.php");			
function buscaUsuario($conn, $email, $senha) {
	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conn, $email);
	$query = "SELECT * FROM usuario WHERE email='{$email}' AND senha='{$senhaMd5}'";
	$resultado = mysqli_query($conn, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}