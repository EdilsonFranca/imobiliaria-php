<?php 
$servername="localhost";
$username="root";
$password="root";
$namedb="imobiliaria";

header('Content-Type: text/html; charset=utf-8');
$conn=mysqli_connect($servername,$username,$password,$namedb);
mysqli_select_db($conn,$namedb);
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_results=utf8');

if(!$conn){
	die("conexaõ falhou !!!".mysqli_connect_error($conn));
}




