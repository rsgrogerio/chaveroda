CREATE TABLE IF NOT EXISTS `cliente` (
  `cpfcnpj` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `ativo` varchar(7) NOT NULL,
   primary key(cpfcnpj)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `carro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpfcnpj` varchar(14) NOT NULL,
  `cliente` varchar(60) NOT NULL,
  `carro` varchar(30) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `anomodelo` varchar(4) NOT NULL,
  `cor` varchar(15) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `ativo` varchar(7) NOT NULL,
   constraint pk_carrocliente primary key(id,cpfcnpj)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `funcao` varchar(60) NOT NULL,
  `ativo` varchar(7) NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `formapagamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(99) NOT NULL,
  `finalizadora` varchar(60) NOT NULL,
  `tipo` varchar(6) NOT NULL,
  `parcela` varchar(2) NOT NULL,
  `ativo` varchar(7) NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `servico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `preco` float NOT NULL,
  `ativo` varchar(7) NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `politicadesconto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `precototal` varchar(60) NOT NULL,
  `desconto` float NOT NULL,
  `ativo` varchar(7) NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `precovenda` float NOT NULL,
  `saldo` float NOT NULL,
  `ativo` varchar(7) NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `os` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  `datainicial` timestamp,
  `datafinal` timestamp,
  `defeito` text NULL,
  `id_carro` int NOT NULL,
  `tecnico` varchar(60) NOT NULL,
  `id_cpfcnpj` varchar(14) NOT NULL,
  `total_os` float NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `os_corpo_servico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_capa_os` int NOT NULL,
  `id_servico` int NOT NULL,
  `descricao_servico` varchar(60) NULL,
  `quantidade` float NOT NULL,
  `valor_unitario` float NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `os_corpo_produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_capa_os` int NOT NULL,
  `id_produto` int NOT NULL,
  `descricao_produto` varchar(99) NULL,
  `quantidade` float NOT NULL,
  `valor_unitario` float NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `venda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_capa_os` int NOT NULL,
  `id_politicadesconto` int NOT NULL,
  `id_formapagamento` int NOT NULL,
  `total` float NOT NULL,
  `desconto` float NOT NULL,
  `cliente` varchar(60) NOT NULL,
  `finalizadora` varchar(60) NOT NULL,
   primary key(id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


ALTER TABLE `os` ADD CONSTRAINT `fk_os_id_carro` FOREIGN KEY ( `id_carro` ) REFERENCES `carro` ( `id` ); 
ALTER TABLE `os` ADD CONSTRAINT `fk_id_cpfcnpj` FOREIGN KEY ( `id_cpfcnpj` ) REFERENCES `cliente` ( `cpfcnpj` ); 
ALTER TABLE `os_corpo_produto` ADD CONSTRAINT `fk_corpo_produto_id_capa_os` FOREIGN KEY ( `id_capa_os` ) REFERENCES `os` ( `id` ); 
ALTER TABLE `os_corpo_produto` ADD CONSTRAINT `fk_corpo_id_produto` FOREIGN KEY ( `id_produto` ) REFERENCES `produto` ( `id` ); 
ALTER TABLE `os_corpo_servico` ADD CONSTRAINT `fk_corpo_id_servico` FOREIGN KEY ( `id_servico` ) REFERENCES `servico` ( `id` ); 
ALTER TABLE `os_corpo_servico` ADD CONSTRAINT `fk_corpo_servico_id_capa_os` FOREIGN KEY ( `id_capa_os` ) REFERENCES `os` ( `id` ); 
ALTER TABLE `venda` ADD CONSTRAINT `fk_venda_id_capa_os` FOREIGN KEY ( `id_capa_os` ) REFERENCES `os` ( `id` ); 
ALTER TABLE `venda` ADD CONSTRAINT `fk_venda_id_politicadesconto` FOREIGN KEY ( `id_politicadesconto` ) REFERENCES `politicadesconto` ( `id` ); 
ALTER TABLE `venda` ADD CONSTRAINT `fk_venda_id_formapagamento` FOREIGN KEY ( `id_formapagamento` ) REFERENCES `formapagamento` ( `id` ); 

