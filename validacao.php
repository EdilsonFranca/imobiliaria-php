<?php
   
   $exibir_tabela=false;
   $tem_erros=false;
   $erros_validacao=array();

if(isset($_POST['nome']) && $_POST['nome'] !=''){
	$nome=$_POST['nome'];
}else{
   	$tem_erros=true;
   	$erros_validacao['nome']='o nome é obrigatório';
   }


if(isset($_POST['sobreNome']) && $_POST['sobreNome'] !=''){
	
	$sobreNome=$_POST['sobreNome'];
}else{
    $tem_erros=true;
   	$erros_validacao['sobreNome']='o sobre nome é obrigatório';
   }

if(isset($_POST['email']) && $_POST['email'] !=''){
	$email=$_POST['email'];
}else{
   	$tem_erros=true;
   	$erros_validacao['email']='o email é obrigatório';
   }

if(isset($_POST['tell']) && $_POST['tell'] !=''){
	
	$tell=$_POST['tell'];
}else{
   	$tem_erros=true;
   	$erros_validacao['tell']='o telefone é obrigatório';
   }

if(isset($_POST['mensagem']) && $_POST['mensagem'] !=''){
  
  $mensagem=$_POST['mensagem'];
}else{
    $tem_erros=true;
    $erros_validacao['mensagem']='a mensagem é obrigatório';
   }
   

   if (!$tem_erros) {
    header('Location:email.php?nome='.$nome
    .'&sobreNome='.$sobreNome
    .'&email='.$email
    .'&tell='.$tell
    .'&mensagem='.$mensagem);
   }else{
   	
   }

  ?>