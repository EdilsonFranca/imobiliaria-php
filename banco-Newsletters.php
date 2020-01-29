<?php

require_once('conexao.php');

  function insere_Newsletters($conn, Newsletter $newsletters){
  $query="INSERT INTO  newsletters(nome,email)
     VALUES('{$newsletters->getNome()}',
            '{$newsletters->getEmail()}')";
  return mysqli_query($conn,$query);
}