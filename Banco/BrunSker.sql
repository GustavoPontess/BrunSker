create database imoveis_Brunsker;
use imoveis_Brunsker;

create table tbl_users(
id_usuario int auto_increment not null primary key,
nome varchar(100) not null,
email varchar(100) not null,
senha varchar(100) not null
);

select * from tbl_users;

create table tbl_imoveis(
id_imovel int auto_increment not null primary key,
nome_imovel varchar(100) not null,
valor_imovel varchar(100) not null,
tipo_imovel varchar(50) not null,
tipo_locacao varchar(10) not null, -- vender ou alugar
quant_quartos int null,
quant_suites int null,
quant_banheiros int null,
quant_vagas int null,
id_imovel_usuario int not null,
foreign key (id_imovel_usuario) references users(id_usuario)
);
select * from tbl_imoveis;

create table adress_imoveis(
  id_adress int auto_increment not null primary key,
  cep int not null,
  logradouro varchar(100) not null,
  bairro varchar(100) not null,
  localidade varchar(100) not null,
  uf varchar(2) not null,
  numero varchar(20) not null,
  id_adress_imovel int not null,
  foreign key (id_adress_imovel) references tbl_imoveis(id_imovel)
);

select * from tbl_imoveis as imv inner join adress_imoveis as adr on imv.id_imovel = adr.id_adress_imovel;
