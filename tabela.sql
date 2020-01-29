drop database imobiliaria;
create database imobiliaria;
use imobiliaria;

create table endereco(
    id_endereco int primary key auto_increment,
    numero int(11),
    logradouroTipo ENUM('AV','Rua'),
    logradouroNome varchar(100),
    bairro varchar(100),
    cep varchar(100),
    cidade varchar(100),
    lat varchar(100),
    lng varchar(100)
);

create table proprietario(
    id_proprietario int primary key auto_increment,
    nome varchar(100),
    tell varchar(100),
    email varchar(100)
);

create table imoveis (
    id_imovel int PRIMARY KEY auto_increment,
    transacao varchar(50), 
    tipo varchar(50), 
    dormitorio TINYINT DEFAULT 0, 
    suite TINYINT DEFAULT 0, 
    vaga TINYINT DEFAULT 1, 
    banheiro TINYINT DEFAULT 1, 
    preco decimal(19,2), 
    area varchar(50),
    condominio varchar(50) DEFAULT 0,
    destaque TINYINT(1) DEFAULT 0,
    titulo varchar(255), 
    descricao text, 
    proprietario_id int(11), 
    endereco_id int(11),
    CONSTRAINT fk_imoProprietario FOREIGN KEY (proprietario_id) REFERENCES proprietario(id_proprietario)ON DELETE CASCADE,
    CONSTRAINT fk_imoendereco FOREIGN KEY (endereco_id) REFERENCES endereco(id_endereco)ON DELETE CASCADE
);

create table fotos(
  id_foto int PRIMARY KEY auto_increment,
  nome_foto VARCHAR(100),
  imovel_id int(11),
  CONSTRAINT fk_fotoImovel FOREIGN KEY (imovel_id) REFERENCES imoveis(id_imovel)ON DELETE CASCADE
);

create TABLE usuario(
    id_usuario int PRIMARY KEY auto_increment,
    email varchar(100)not null,
    senha VARCHAR(100)not null
);

/*
$servername="imobiliariaubir.mysql.uhserver.com";
$username="edilsonfrancama";
$password="Joao2019.";
$namedb="imobiliariaubir";
*/
create table newsletters(
    nome varchar(100)not null,
    email varchar(100)not null
);
