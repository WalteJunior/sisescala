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


-- Copiando estrutura do banco de dados para sisescala
DROP DATABASE IF EXISTS `sisescala`;
CREATE DATABASE IF NOT EXISTS `sisescala` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `sisescala`;

-- Copiando estrutura para tabela sisescala.aluno
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.aluno: 0 rows
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela sisescala.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_end` int(11) NOT NULL AUTO_INCREMENT,
  `rua_end` varchar(50) DEFAULT NULL,
  `compl_end` varchar(50) DEFAULT NULL,
  `cep_end` varchar(50) DEFAULT NULL,
  `bairro_end` varchar(50) DEFAULT NULL,
  `cidade_end` varchar(50) DEFAULT NULL,
  `estado_end` varchar(50) DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_end`) USING BTREE,
  KEY `endereco_ibfk_1` (`id_func`) USING BTREE,
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~1 rows (aproximadamente)
INSERT INTO `endereco` (`id_end`, `rua_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(39, 'Rua João Goulart', '', '21010-840', 'Parada de Lucas', 'Rio de Janeiro', 'RJ', 35);

-- Copiando estrutura para tabela sisescala.escala
CREATE TABLE IF NOT EXISTS `escala` (
  `id_esc` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_esc`),
  KEY `FK_escala_funcionario` (`id_func`),
  CONSTRAINT `FK_escala_funcionario` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~1 rows (aproximadamente)
INSERT INTO `escala` (`id_esc`, `data_inicio`, `data_fim`, `id_func`) VALUES
	(3, '2024-10-12', '2024-10-13', 35);

-- Copiando estrutura para tabela sisescala.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(50) DEFAULT NULL,
  `cargo_func` varchar(50) DEFAULT NULL,
  `telefone_func` varchar(50) DEFAULT NULL,
  `sexo_func` varchar(50) DEFAULT NULL,
  `email_func` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_func`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~1 rows (aproximadamente)
INSERT INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `telefone_func`, `sexo_func`, `email_func`) VALUES
	(35, 'João', 'OP', '21999999', 'M', 'joao@gmail.com');

-- Copiando estrutura para tabela sisescala.setor
CREATE TABLE IF NOT EXISTS `setor` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `nome_st` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_st`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.setor: ~1 rows (aproximadamente)
INSERT INTO `setor` (`id_st`, `nome_st`) VALUES
	(1, 'Produção');

-- Copiando estrutura para tabela sisescala.substituicao
CREATE TABLE IF NOT EXISTS `substituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `id_esc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_substituicao_escala` (`id_esc`),
  CONSTRAINT `FK_substituicao_escala` FOREIGN KEY (`id_esc`) REFERENCES `escala` (`id_esc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.substituicao: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisescala.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~5 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`) VALUES
	(3, 'Admin1', 'admin1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@demo.com.br', 1, 1, '2024-10-07 21:21:10'),
	(5, 'Admin2', 'admin2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00'),
	(6, 'Admin3', 'admin3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00'),
	(19, 'Walter Junior', 'waltjunio', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walter@gmail.com', 1, 1, '0000-00-00 00:00:00'),
	(20, 'Walter Junior', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walter@gmail.com', 1, 1, '0000-00-00 00:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
