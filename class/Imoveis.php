<?php

    class Imoveis implements JsonSerializable{
    private $id;
	private $transacao;
	private $tipo;
	private $dormitorio;
	private $suite;
	public  $vaga;
	private $banheiro;
	private $preco;
	private $area;
	private $condominio;
	private $destaque;
	private $titulo;
	private $descricao;
	private $proprietario;
	private $endereco;
	private $foto = array();
  

	public function getId_imovel(){
		return $this->id;
	}
	public function setId_imovel($id){
		$this->id=$id;
	}

	public function getTransacao(){
		return $this->transacao;
	}
	public function setTransacao($transacao){
		$this->transacao=$transacao;
	}
	
	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo=$tipo;
	}
	
	public function getDormitorio(){
		return $this->dormitorio;
	}
	public function setDormitorio($dormitorio){
		$this->dormitorio=$dormitorio;
	}
	
	public function getSuite(){
		return $this->suite;
	}
	public function setSuite($suite){
		$this->suite=$suite;
	}
	
	public function getVaga(){
		return $this->vaga;
	}
	public function setVaga($vaga){
		$this->vaga=$vaga;
	}
	
	public function getBanheiro(){
		return $this->banheiro;
	}
	public function setBanheiro($banheiro){
		$this->banheiro=$banheiro;
	}
	public function getPreco(){
		return $this->preco;
	}
	public function setPreco($preco){
		$this->preco=$preco;
	}

	public function getArea(){
		return $this->area;
	}
	public function setArea($area){
		$this->area=$area;
	}
	public function getCondominio(){
		return $this->condominio;
	}
	public function setCondominio($condominio){
		$this->condominio=$condominio;
	}
	
	public function getDestaque(){
		return $this->destaque;
	}
	public function setDestaque($destaque){
		$this->destaque=$destaque;
	}
	
	public function getTitulo(){
		return $this->titulo;
	}
	public function setTitulo($titulo){
		$this->titulo=$titulo;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao=$descricao;
	}
	
	public function getEndereco(){
		return $this->endereco;
	}
	public function setEndereco($endereco){
		$this->endereco=$endereco;
	}
	
	public function getProprietario(){
		return $this->proprietario;
	}
	public function setProprietario($proprietario){
		$this->proprietario=$proprietario;
	}
	
	public function getFoto(){
		return $this->foto;
	}
	public function setFoto($foto){
		$this->foto[]=$foto;
	}
	
    public function jsonSerialize(){
		return [
			'id' => $this->id,
			'transacao' => $this->transacao,
				'tipo' => $this->tipo,
				'dormitorio' => $this->dormitorio,
				'suite' => $this->suite,
				'vaga' => $this->vaga,
				'banheiro' => $this->banheiro,
				'preco' => $this->preco,
				'endereco' =>  $this->endereco,
				'foto'=>$this->foto
        ];
    }


}