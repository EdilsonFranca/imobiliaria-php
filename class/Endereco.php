<?php 

class Endereco implements JsonSerializable{
	private $id;
	private $numero;
	private $logradouroTipo;
	private $logradouroNome;
	private $bairro;
    private $cep;
	private $cidade;
	private $lat;
	private $lng;
	
	public function getId(){
		return $this->id;
	  }
	  public function setId($id){
		$this->id=$id;
	  }

	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($numero){
		$this->numero=$numero;
	}
    public function getLogradouroTipo(){
		return $this->logradouroTipo;
	}
	public function setLogradouroTipo($logradouroTipo){
	    $this->logradouroTipo=$logradouroTipo;
	}
	public function getLogradouroNome(){
		return $this->logradouroNome;
	}
	public function setLogradouroNome($logradouroNome){
	    $this->logradouroNome=$logradouroNome;
	}
	public function getBairro(){
		return $this->bairro;
    }
    public function setBairro($bairro){
		$this->bairro=$bairro;
    }
    public function getCep(){
		return $this->cep;
	}
	public function setCep($cep){
		$this->cep=$cep;
	}

	public function getCidade(){
		return $this->cidade;
	}
	public function setCidade($cidade){
		$this->cidade=$cidade;
	}
	public function getLat(){
		return $this->lat;
	}
	public function setLat($lat){
		$this->lat =$lat;
	}
	public function getLng(){
		return $this->lng;
	}
	public function setLng($lng){
		$this->lng =$lng;
	}
	
    public function jsonSerialize(){
        return [
				'lat' => $this->lat,
				'lng' => $this->lng,
             ];
    }

}