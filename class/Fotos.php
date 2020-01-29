<?php
 class Fotos implements JsonSerializable{
  private  $id;
  private  $id_imovel;
  private  $nome_foto;

  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id=$id;
  }
  public function getId_imovel(){
    return $this->id_imovel;
  }
  public function setId_imovel($id_imovel){
    $this->id_imovel=$id_imovel;
  }

  public function getNome_foto(){
    return $this->nome_foto;
  }
  public function setNome_foto($nome_foto){
    $this->nome_foto=$nome_foto;
  }
  public function jsonSerialize(){
    return [
            'nome_foto' => $this->nome_foto
           ];
    }
}