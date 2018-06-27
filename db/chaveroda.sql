-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2018 at 11:25 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaveroda`
--

-- --------------------------------------------------------

--
-- Table structure for table `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `cliente` varchar(60) NOT NULL,
  `cpfcnpj` varchar(14) NOT NULL,
  `carro` varchar(30) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `anomodelo` varchar(4) NOT NULL,
  `cor` varchar(15) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carro`
--

INSERT INTO `carro` (`id`, `cliente`, `cpfcnpj`, `carro`, `fabricante`, `anomodelo`, `cor`, `placa`, `ativo`) VALUES
(2, 'Izabel Cristina Mendes de Almeida', '06835211602', 'Peugeot 206 1.6 4portas', 'Peugeot', '2012', 'Metalico', 'ABC 7904', 'Ativo'),
(3, 'Paulo Henrique Lenoar Goncalves', '06835211603', 'Prisma Joy 1.0 2portas', 'Chevrolet', '2018', 'Preto', 'CCD 7605', 'Ativo'),
(4, 'Rogerio da Silva Goncalves', '06835211601', 'Versa 1.6 4portas', 'Nissan', '2012', 'Preto', 'NXZ 7905', 'Ativo'),
(5, 'Rogerio da Silva Goncalves', '06835211601', 'Corsa Joy 1.0 2portas', 'Chevrolet', '2008', 'Azul Metalico', 'HHF 0169', 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `cpfcnpj` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`cpfcnpj`, `nome`, `endereco`, `bairro`, `cidade`, `uf`, `telefone`, `sexo`, `email`, `ativo`) VALUES
('05636806604', 'rafael Borges Dantas', 'Rua Itapoa', 'sao francisco', 'sete lagoas', 'MG', '31 3771 0665', 'M', 'rafboot@hotmail.com', 'Ativo'),
('06775461658', 'Mariana Carmargos Nascimento', 'RUA MACEIO,116 APT201', 'CANAAN', 'SETE LAGOAS', 'MG', '', 'F', 'mariana_camargos@yahoo.com.br', 'Ativo'),
('06835211601', 'Rogerio da Silva Goncalves', 'Av: Messias Herculano Rocha Lima, 151', 'Verde Vale', 'Sete Lagoas', 'MG', '31 99687 7465', 'M', 'rogeriosuport@hotmail.com', 'Ativo'),
('06835211602', 'Izabel Cristina Mendes de Almeida', 'Rua Central, 83', 'Luxemburgo', 'Sete Lagoas', 'MG', '31 37764594', 'F', 'izabelcristina@gmail.com', 'Ativo'),
('06835211603', 'Paulo Henrique Lenoar Goncalves', 'Rua Suica, 1038', 'Nova Cidade', 'Curvelo', 'MG', '31 37764580', 'M', 'ph@hotmail.com', 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `formapagamento`
--

CREATE TABLE `formapagamento` (
  `id` int(11) NOT NULL,
  `codigo` varchar(99) NOT NULL,
  `finalizadora` varchar(60) NOT NULL,
  `tipo` varchar(6) NOT NULL,
  `parcela` varchar(2) NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formapagamento`
--

INSERT INTO `formapagamento` (`id`, `codigo`, `finalizadora`, `tipo`, `parcela`, `ativo`) VALUES
(1, '1', 'Dinheiro', 'Vista', '', 'Ativo'),
(2, '2', 'Cheque a Vista', 'Vista', '', 'Ativo'),
(3, '3', 'Cheque a Prazo', 'Prazo', '30', 'Ativo'),
(4, '4', 'Cartao Visa Electron', 'Vista', '', 'Ativo'),
(5, '5', 'Cartao Visa Credito', 'Prazo', '30', 'Ativo'),
(6, '6', 'Cartao Visa Credito 2x', 'Prazo', '2x', 'Ativo'),
(7, '7', 'Cartao Visa Credito 3x', 'Prazo', '3x', 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `funcao` varchar(60) NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id`, `cpf`, `nome`, `endereco`, `bairro`, `cidade`, `uf`, `telefone`, `sexo`, `funcao`, `ativo`) VALUES
(1, '11122233344', 'Jose Nivaldo da Silva', 'Rua Central, 83', 'Eldorado', 'Betim', 'SP', '31 37764522', 'M', 'Mecanico', 'Ativo'),
(2, '11111111111', 'Maria Jose Padilha', 'Av Olegario Motta', 'Brasilia', 'Maceio', 'BA', '31 37768888', 'M', 'Torneiro Mecanico', 'Ativo'),
(3, '22222222222', 'Paulo Marques Guedes', 'Rua Arauna, 897', 'Felicidade', 'Felixladia', 'MG', '31 99687 0000', 'M', 'Eletricista', 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `datainicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datafinal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `defeito` text,
  `tecnico` varchar(60) NOT NULL,
  `id_cpfcnpj` varchar(14) NOT NULL,
  `id_carro` int(11) NOT NULL,
  `total_os` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `status`, `datainicial`, `datafinal`, `defeito`, `tecnico`, `id_cpfcnpj`, `id_carro`, `total_os`) VALUES
(2, 'Fechado', '2018-06-12 13:02:15', '2018-06-13 20:15:14', 'EFETUAR A TROCA DA SUSPENSAO', 'Jose Nivaldo da Silva', '06835211601', 4, 0),
(5, 'Fechado', '2018-06-13 19:53:06', '2018-06-13 20:19:05', 'EFETUAR A TROCA DA CORREIA DENTADA', 'Paulo Marques Guedes', '06775461658', 2, 0),
(6, 'Executada', '2018-06-13 19:53:18', '0000-00-00 00:00:00', 'EFETUAR A TROCA DA SUSPENSAO', 'Maria Jose Padilha', '06835211602', 2, 0),
(7, 'Esboco', '2018-06-13 19:53:35', '0000-00-00 00:00:00', 'EFETUAR A TROCA DA SUSPENSAO', 'Jose Nivaldo da Silva', '05636806604', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `os_corpo_produto`
--

CREATE TABLE `os_corpo_produto` (
  `id` int(11) NOT NULL,
  `id_capa_os` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `descricao_produto` varchar(99) DEFAULT NULL,
  `quantidade` float NOT NULL,
  `valor_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os_corpo_produto`
--

INSERT INTO `os_corpo_produto` (`id`, `id_capa_os`, `id_produto`, `descricao_produto`, `quantidade`, `valor_unitario`) VALUES
(2, 2, 3, 'Chicote Alternador Veiculo ar Gol', 2, 320),
(4, 5, 5, 'Pneu aro 14', 4, 180);

-- --------------------------------------------------------

--
-- Table structure for table `os_corpo_servico`
--

CREATE TABLE `os_corpo_servico` (
  `id` int(11) NOT NULL,
  `id_capa_os` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `descricao_servico` varchar(60) DEFAULT NULL,
  `quantidade` float NOT NULL,
  `valor_unitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `os_corpo_servico`
--

INSERT INTO `os_corpo_servico` (`id`, `id_capa_os`, `id_servico`, `descricao_servico`, `quantidade`, `valor_unitario`) VALUES
(3, 2, 1, 'MOTOR', 1, 100),
(4, 5, 2, 'SUSPENSAO', 2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `politicadesconto`
--

CREATE TABLE `politicadesconto` (
  `id` int(11) NOT NULL,
  `precototal` varchar(60) NOT NULL,
  `desconto` float NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `politicadesconto`
--

INSERT INTO `politicadesconto` (`id`, `precototal`, `desconto`, `ativo`) VALUES
(1, 'De R$200,00 a R$ 1.000,00 (5%)', 5, 'Ativo'),
(2, 'Superior a R$ 1.000,00 (10%)', 10, 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(15) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `precovenda` float NOT NULL,
  `saldo` float NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `codigo`, `descricao`, `precovenda`, `saldo`, `ativo`) VALUES
(3, '10', 'Chicote Alternador Veiculo ar Gol', 320, 44, 'Ativo'),
(4, '11', 'Par farol milha cristal pequeno', 58.5, 300, 'Ativo'),
(5, '12', 'Pneu aro 14', 180, 584, 'Ativo'),
(6, '13', 'Oleo motor Mobil 5W30', 35, 200, 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `preco` float NOT NULL,
  `ativo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servico`
--

INSERT INTO `servico` (`id`, `codigo`, `descricao`, `preco`, `ativo`) VALUES
(1, '1M', 'MOTOR', 100, 'Ativo'),
(2, '2S', 'SUSPENSAO', 200, 'Ativo'),
(3, '4F', 'FREIO', 300, 'Ativo'),
(4, '4E', 'PARTE ELETRICA', 150, 'Ativo'),
(5, '5I', 'PARTE ELETRONICA', 350, 'Ativo');

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `id_capa_os` int(11) NOT NULL,
  `id_politicadesconto` int(11) NOT NULL,
  `id_formapagamento` int(11) NOT NULL,
  `total` float NOT NULL,
  `desconto` float NOT NULL,
  `cliente` varchar(60) NOT NULL,
  `finalizadora` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpfcnpj`);

--
-- Indexes for table `formapagamento`
--
ALTER TABLE `formapagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_cpfcnpj` (`id_cpfcnpj`),
  ADD KEY `fk_os_id_carro` (`id_carro`);

--
-- Indexes for table `os_corpo_produto`
--
ALTER TABLE `os_corpo_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_corpo_produto_id_capa_os` (`id_capa_os`),
  ADD KEY `fk_corpo_id_produto` (`id_produto`);

--
-- Indexes for table `os_corpo_servico`
--
ALTER TABLE `os_corpo_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_corpo_id_servico` (`id_servico`),
  ADD KEY `fk_corpo_servico_id_capa_os` (`id_capa_os`);

--
-- Indexes for table `politicadesconto`
--
ALTER TABLE `politicadesconto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venda_id_capa_os` (`id_capa_os`),
  ADD KEY `fk_venda_id_politicadesconto` (`id_politicadesconto`),
  ADD KEY `fk_venda_id_formapagamento` (`id_formapagamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `formapagamento`
--
ALTER TABLE `formapagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `os_corpo_produto`
--
ALTER TABLE `os_corpo_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `os_corpo_servico`
--
ALTER TABLE `os_corpo_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `politicadesconto`
--
ALTER TABLE `politicadesconto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `os`
--
ALTER TABLE `os`
  ADD CONSTRAINT `fk_id_cpfcnpj` FOREIGN KEY (`id_cpfcnpj`) REFERENCES `cliente` (`cpfcnpj`),
  ADD CONSTRAINT `fk_os_id_carro` FOREIGN KEY (`id_carro`) REFERENCES `carro` (`id`);

--
-- Constraints for table `os_corpo_produto`
--
ALTER TABLE `os_corpo_produto`
  ADD CONSTRAINT `fk_corpo_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `fk_corpo_produto_id_capa_os` FOREIGN KEY (`id_capa_os`) REFERENCES `os` (`id`);

--
-- Constraints for table `os_corpo_servico`
--
ALTER TABLE `os_corpo_servico`
  ADD CONSTRAINT `fk_corpo_id_servico` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id`),
  ADD CONSTRAINT `fk_corpo_servico_id_capa_os` FOREIGN KEY (`id_capa_os`) REFERENCES `os` (`id`);

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_id_capa_os` FOREIGN KEY (`id_capa_os`) REFERENCES `os` (`id`),
  ADD CONSTRAINT `fk_venda_id_formapagamento` FOREIGN KEY (`id_formapagamento`) REFERENCES `formapagamento` (`id`),
  ADD CONSTRAINT `fk_venda_id_politicadesconto` FOREIGN KEY (`id_politicadesconto`) REFERENCES `politicadesconto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
