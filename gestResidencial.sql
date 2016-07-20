CREATE TABLE local_docs(
  id serial NOT NULL PRIMARY KEY ,
  descricao varchar(45) NOT NULL,
  data_cadastro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao timestamp
);
CREATE TABLE tipo_docs(
  id serial NOT NULL PRIMARY KEY ,
  descricao varchar(45) NOT NULL,
  data_cadastro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao timestamp
);
CREATE TABLE usuario_sistema(
  id serial NOT NULL PRIMARY KEY ,
  login_usuario varchar(15) NOT NULL,
  senha_usuario varchar(5) NOT NULL,
  administrador boolean DEFAULT false
);
CREATE TABLE Tabela_Estado (
   id serial NOT NULL PRIMARY KEY ,
   nome varchar(30) NOT NULL,
   sigla varchar(2) NOT NULL
);
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Acre','AC');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Alagoas','AL');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Amazonas','AM');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Amapá','AP');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Bahia','BA');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Ceará','CE');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Distrito Federal','DF');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Espírito Santo','ES');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Góias','GO');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Maranhão','MA');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Minas Gerais','MG');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Mato Grosso do Sul','MS');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Mato Grosso','MT');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Pará','PA');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Paraíba','PB');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Pernambuco','PE');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Piauí','PI');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Paraná','PR');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Rio de Janeiro','RJ');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Rio Grande do Norte','RN');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Rondônia','RO');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Roraima','RR');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Rio Grande do Sul','RS');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Santa Catarina','SC');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Sergipe','SE');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('São Paulo','SP');
INSERT INTO Tabela_Estado(nome,sigla) VALUES ('Tocantins','TO');


CREATE TABLE Tabela_Cidade (
   id serial NOT NULL PRIMARY KEY ,
   nome varchar(40)  NOT NULL,
   estado_id integer REFERENCES Tabela_Estado(id) MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE 
);
CREATE TABLE Tabela_Bairro (
   id serial NOT NULL PRIMARY KEY ,
   nome varchar(40)  NOT NULL,
   cidade_id integer REFERENCES Tabela_Cidade(id) MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE 
);


CREATE TABLE agencia (
  id serial PRIMARY KEY ,
  nome_agencia varchar(55) NOT NULL ,
  numero_agencia varchar(7) NOT NULL ,
  endereco varchar(65) NOT NULL ,
  cep varchar(7) NOT NULL ,
  bairro varchar(65) NOT NULL ,
  cidade_id integer REFERENCES cidade(id) MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE  ,
  nome_pessoa_contato varchar(65) ,
  email_pessoa_contato varchar(65) ,
  ramal_pessoa_contato varchar(5) ,
  fone_pessoa_contato varchar(15)
  
);
CREATE TABLE banco (
  id serial PRIMARY KEY ,
  nome_banco varchar(35) NOT NULL   
) ; 
INSERT INTO banco(nome_banco) VALUES ('Itau');
INSERT INTO banco(nome_banco) VALUES ('Santander');
INSERT INTO banco(nome_banco) VALUES ('Caixa Economica Federal');
INSERT INTO banco(nome_banco) VALUES ('Banco do Brasil');
INSERT INTO banco(nome_banco) VALUES ('Bradesco');

CREATE TABLE banco_agencias (
  id serial PRIMARY KEY ,
  banco_id INT REFERENCES banco (id) MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE ,
  agencia_id INT REFERENCES agencia (id) MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE 
) ;
CREATE TABLE agencia_contas(
  id serial PRIMARY KEY ,
  agencia_id INT REFERENCES agencia (id) MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE ,
  numero_conta varchar(7) NOT NULL ,
  limite_credito numeric(10,2) NOT NULL ,
  saldo_inicial numeric(10,2) NOT NULL ,
  data_saldo_inicial date NOT NULL ,
  saldo_atual numeric(10,2) NOT NULL ,
  ultima_atualizacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  
);