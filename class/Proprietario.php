<?php
class Proprietario{
    private $id;
    private $nome;
    private $tell;
    private $email;
    
    function getId(){
      return $this->id;
  }
  function setId($id){
    $this->id=$id;
  }

    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
      $this->nome=$nome;
    }

    function getTell(){
        return $this->tell;
    }
    function setTell($tell){
      $this->tell=$tell;
    }

    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
      $this->email=$email;
    }
}