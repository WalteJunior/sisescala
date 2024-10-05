-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para siscrud
DROP DATABASE IF EXISTS `siscrud`;
CREATE DATABASE IF NOT EXISTS `siscrud` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `siscrud`;

-- Copiando estrutura para tabela siscrud.aluno
DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nome_aluno` varchar(50) DEFAULT NULL,
  `nome_pai` varchar(50) DEFAULT NULL,
  `nome_mae` varchar(50) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `sexo_aluno` char(1) DEFAULT NULL,
  `rg_aluno` int(11) DEFAULT NULL,
  `cpf_aluno` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela siscrud.aluno: 6 rows
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
REPLACE INTO `aluno` (`matricula`, `nome_aluno`, `nome_pai`, `nome_mae`, `dt_nasc`, `sexo_aluno`, `rg_aluno`, `cpf_aluno`) VALUES
	(15, 'ROMÁRIO DA SILVA SANTOS', 'PAULO DA SILVA SOUZA', 'MARIANA DA SILVA SOUZA', '2024-05-06', 'M', 2222222, '33333333'),
	(16, 'DANIEL DA CONCEIÇÃO', 'RONALDO AMÂNCIO', 'MARIA DE FÁTIMA', '2000-05-05', 'M', 2147483647, '6565656555'),
	(10, 'MARCELO PRADO DA SILVA', 'ROBERTO SILVEIRA', 'RENATA PIMENTEL DAS GRACAS', '2015-02-10', 'M', 987979333, '9879879333'),
	(8, 'RONALDO DA SILVA', 'RONALDO AMÂNCIO ALVES', 'RENATA PIMENTEL DAS GRAÇAS', '2015-02-10', 'M', 987979333, '9879879333'),
	(17, 'ROBERVAL FIGUEIREDO DE ANDRADE ARAUJO', 'ROSINALDO DA SILVA ARAUJO', 'FILOMENA TANCRINIDEA PAZOFILA', '2010-10-10', 'M', 2147483647, '34324324324'),
	(18, 'AROLDO DA SILVA SANOTATE', 'RAUL DATANIDEO', 'MAIRINEIDE ARAUJO', '2005-10-01', 'M', 988989898, '989898988');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela siscrud.endereco
DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela siscrud.endereco: ~11 rows (aproximadamente)
REPLACE INTO `endereco` (`id`, `logradouro`, `nome`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`) VALUES
	(1, 'Rua', 'Pedro Labatut', '198', 'Casa 2', 'Honório Gurgel', 'Rio de Janeiro', 'RJ', '21511370'),
	(6, 'Vila', 'Palmeiras', '123', 'apto202', 'Centro', 'Rio de Janeiro', 'RJ', '20040030'),
	(7, 'Avenida', 'Brasil', '456', 'Sala 10', 'Jardim América', 'São Paulo', 'SP', '01234000'),
	(8, 'Rua', 'Pinheiros', '789', 'Casa 5', 'Pinheiros', 'Belo Horizonte', 'MG', '30130011'),
	(9, 'Estrada', 'Mercedez', '250', 'Loja 3', 'Lapa', 'Curitiba', 'PR', '80530050'),
	(10, 'Rua', 'João Mendes', '321', 'Apto 101', 'Liberdade', 'Recife', 'PE', '50060090'),
	(11, 'Avenida', 'Pedro II', '789', 'Bloco B', 'São Cristóvão', 'Porto Alegre', 'RS', '90650980'),
	(12, 'Vila', 'Nova Esperança', '75', 'Casa 1', 'São Mateus', 'Manaus', 'AM', '69043000'),
	(13, 'Rua ', 'Augusta', '303', 'Apto 5', 'Consolação', 'São Paulo', 'SP', '01305000'),
	(14, 'Rua', 'Floriano Peixoto', '876', 'Apto 203', 'Bela Vista', 'Vitória', 'ES', '29052700'),
	(15, 'Avenida', 'Independência', '3200', 'Sala 2', 'Centro', 'Goiânia', 'GO', '74030150');

-- Copiando estrutura para tabela siscrud.funcionario
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela siscrud.funcionario: ~12 rows (aproximadamente)
REPLACE INTO `funcionario` (`id`, `nome`, `cargo`, `email`, `telefone`, `sexo`) VALUES
	(1, 'Davi ', 'Administrador', 'daviliveee@gmail.com', '21966674703', '1'),
	(5, 'Shirley', 'Comissária', 'shirleydcc@gmail.com', '21955487634', '2'),
	(6, 'Sandoval', 'Advogado', 'valsandi89@gmail.com', '21945779977', '2'),
	(7, 'Petrônio', 'Pedreiro', 'pepe81@gmail.com', '21944783250', '3'),
	(8, 'Marinete', 'Uber', 'mari69nete@gmail.com', '21988742308', '2'),
	(9, 'Solineuza', 'Diarista', 'soliza@gmail.com', '21965471289', '3'),
	(10, 'Regina', 'Enfermeira', 're56na@gmail.com', '219933871954', '2'),
	(11, 'Doralice', 'Feirante', 'dorinha@gmail.com', '21944785206', '2'),
	(12, 'Silvio', 'Construtor', 'silconstrutor@gmail.com', '219856377415', '1'),
	(13, 'Magnólia', 'Pintora', 'magnolia758@gmail.com', '21958742302', '2'),
	(14, 'Geraldo', 'Atendente', 'geraldinho22@gmail.com', '21987230054', '1'),
	(17, 'EEEEE', 'AAAAAA', 'dee@gmail.com', '21966674555', '1');

-- Copiando estrutura para tabela siscrud.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT 1,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `dt_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela siscrud.usuario: ~5 rows (aproximadamente)
REPLACE INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`) VALUES
	(2, 'Jarvis', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jarvis@ironman.com', 3, 1, '2021-11-24 19:31:10'),
	(3, 'Penelope', 'pcharmosa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'penelope@gmail.com', 2, 1, '2021-11-24 18:55:00'),
	(4, 'Hulk Hell', 'hell', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hell@hot.com', 1, 1, '2021-11-24 19:00:24'),
	(5, 'Maria da Silva', 'maria', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'maria@xmail.com', 3, 1, '2021-11-11 00:00:00'),
	(7, 'Gustavo da Silva', 'gustavo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gustavo@mail.com', 3, 1, '2024-09-11 00:00:00'),
	(11, 'Davi Oliveira da Silva', 'adm', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'daviliveee@gmail.com', 1, 1, '2024-09-24 00:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
