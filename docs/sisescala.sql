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

-- Copiando estrutura para tabela sisescala.endereco
DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_end` int(11) NOT NULL AUTO_INCREMENT,
  `rua_end` varchar(50) DEFAULT NULL,
  `num_end` varchar(10) DEFAULT NULL,
  `compl_end` varchar(50) DEFAULT NULL,
  `cep_end` varchar(50) DEFAULT NULL,
  `bairro_end` varchar(50) DEFAULT NULL,
  `cidade_end` varchar(50) DEFAULT NULL,
  `estado_end` varchar(50) DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_end`) USING BTREE,
  KEY `endereco_ibfk_1` (`id_func`) USING BTREE,
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~4 rows (aproximadamente)
REPLACE INTO `endereco` (`id_end`, `rua_end`, `num_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(46, 'Rua Mário das Virgens de Lima', 'S/N', '(Cj 6 de Novembro)', '21864-410', 'Bangu', 'Rio de Janeiro', 'RJ', 42),
	(49, 'Rua Mário das Virgens de Lima', 'S/N', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 46),
	(51, 'Rua Mário das Virgens de Lima', '', '(Cj 6 de Novembro)', '21864-410', 'Bangu', 'Rio de Janeiro', 'RJ', 48),
	(52, 'Rua Icamiaba', '', 'de 415/416 a 839/840', '76876-484', 'Jardim Jorge Teixeira', 'Ariquemes', 'RO', 49),
	(83, 'Rua E', '157', '(Lot Est do Tindiba 1040)', '22740-410', 'Taquara', 'Rio de Janeiro', 'RJ', 84);

-- Copiando estrutura para tabela sisescala.escala
DROP TABLE IF EXISTS `escala`;
CREATE TABLE IF NOT EXISTS `escala` (
  `id_esc` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_turno` varchar(50) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_esc`),
  KEY `FK_escala_funcionario` (`id_func`),
  CONSTRAINT `FK_escala_funcionario` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2092 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~94 rows (aproximadamente)
REPLACE INTO `escala` (`id_esc`, `tipo_turno`, `hora_inicio`, `hora_fim`, `data`, `id_func`) VALUES
	(1043, 'diurno', '07:00:00', '19:00:00', '2024-10-15', 42),
	(1044, 'diurno', '07:00:00', '19:00:00', '2024-10-17', 42),
	(1045, 'diurno', '07:00:00', '19:00:00', '2024-10-19', 42),
	(1046, 'diurno', '07:00:00', '19:00:00', '2024-10-21', 42),
	(1047, 'diurno', '07:00:00', '19:00:00', '2024-10-23', 42),
	(1048, 'diurno', '07:00:00', '19:00:00', '2024-10-25', 42),
	(1049, 'diurno', '07:00:00', '19:00:00', '2024-10-27', 42),
	(1050, 'diurno', '07:00:00', '19:00:00', '2024-10-29', 42),
	(1051, 'diurno', '07:00:00', '19:00:00', '2024-10-31', 42),
	(1052, 'diurno', '07:00:00', '19:00:00', '2024-11-02', 42),
	(1053, 'diurno', '07:00:00', '19:00:00', '2024-11-04', 42),
	(1054, 'diurno', '07:00:00', '19:00:00', '2024-11-06', 42),
	(1055, 'diurno', '07:00:00', '19:00:00', '2024-11-08', 42),
	(1056, 'diurno', '07:00:00', '19:00:00', '2024-11-10', 42),
	(1057, 'diurno', '07:00:00', '19:00:00', '2024-11-12', 42),
	(1058, 'diurno', '07:00:00', '19:00:00', '2024-11-14', 42),
	(1059, 'diurno', '07:00:00', '19:00:00', '2024-11-16', 42),
	(1060, 'diurno', '07:00:00', '19:00:00', '2024-11-18', 42),
	(1061, 'diurno', '07:00:00', '19:00:00', '2024-11-20', 42),
	(1062, 'diurno', '07:00:00', '19:00:00', '2024-11-22', 42),
	(1063, 'diurno', '07:00:00', '19:00:00', '2024-11-24', 42),
	(1064, 'diurno', '07:00:00', '19:00:00', '2024-11-26', 42),
	(1065, 'diurno', '07:00:00', '19:00:00', '2024-11-28', 42),
	(1066, 'diurno', '07:00:00', '19:00:00', '2024-11-30', 42),
	(1931, 'noturno', '19:00:00', '07:00:00', '2024-10-15', 46),
	(1932, 'noturno', '19:00:00', '07:00:00', '2024-10-17', 46),
	(1933, 'noturno', '19:00:00', '07:00:00', '2024-10-19', 46),
	(1934, 'noturno', '19:00:00', '07:00:00', '2024-10-21', 46),
	(1935, 'noturno', '19:00:00', '07:00:00', '2024-10-23', 46),
	(1936, 'noturno', '19:00:00', '07:00:00', '2024-10-25', 46),
	(1937, 'noturno', '19:00:00', '07:00:00', '2024-10-27', 46),
	(1938, 'noturno', '19:00:00', '07:00:00', '2024-10-29', 46),
	(1939, 'noturno', '19:00:00', '07:00:00', '2024-10-31', 46),
	(1940, 'noturno', '19:00:00', '07:00:00', '2024-11-02', 46),
	(1941, 'noturno', '19:00:00', '07:00:00', '2024-11-04', 46),
	(1942, 'noturno', '19:00:00', '07:00:00', '2024-11-06', 46),
	(1943, 'noturno', '19:00:00', '07:00:00', '2024-11-08', 46),
	(1944, 'noturno', '19:00:00', '07:00:00', '2024-11-10', 46),
	(1945, 'noturno', '19:00:00', '07:00:00', '2024-11-12', 46),
	(1946, 'noturno', '19:00:00', '07:00:00', '2024-11-14', 46),
	(1947, 'noturno', '19:00:00', '07:00:00', '2024-11-16', 46),
	(1948, 'noturno', '19:00:00', '07:00:00', '2024-11-18', 46),
	(1949, 'noturno', '19:00:00', '07:00:00', '2024-11-20', 46),
	(1950, 'noturno', '19:00:00', '07:00:00', '2024-11-22', 46),
	(1951, 'noturno', '19:00:00', '07:00:00', '2024-11-24', 46),
	(1952, 'noturno', '19:00:00', '07:00:00', '2024-11-26', 46),
	(1953, 'noturno', '19:00:00', '07:00:00', '2024-11-28', 46),
	(1954, 'noturno', '19:00:00', '07:00:00', '2024-11-30', 46),
	(2001, 'diurno', '07:00:00', '19:00:00', '2024-10-16', 48),
	(2002, 'diurno', '07:00:00', '19:00:00', '2024-10-18', 48),
	(2003, 'diurno', '07:00:00', '19:00:00', '2024-10-20', 48),
	(2004, 'diurno', '07:00:00', '19:00:00', '2024-10-22', 48),
	(2005, 'diurno', '07:00:00', '19:00:00', '2024-10-24', 48),
	(2006, 'diurno', '07:00:00', '19:00:00', '2024-10-26', 48),
	(2007, 'diurno', '07:00:00', '19:00:00', '2024-10-28', 48),
	(2008, 'diurno', '07:00:00', '19:00:00', '2024-10-30', 48),
	(2009, 'diurno', '07:00:00', '19:00:00', '2024-11-01', 48),
	(2010, 'diurno', '07:00:00', '19:00:00', '2024-11-03', 48),
	(2011, 'diurno', '07:00:00', '19:00:00', '2024-11-05', 48),
	(2012, 'diurno', '07:00:00', '19:00:00', '2024-11-07', 48),
	(2013, 'diurno', '07:00:00', '19:00:00', '2024-11-09', 48),
	(2014, 'diurno', '07:00:00', '19:00:00', '2024-11-11', 48),
	(2015, 'diurno', '07:00:00', '19:00:00', '2024-11-13', 48),
	(2016, 'diurno', '07:00:00', '19:00:00', '2024-11-15', 48),
	(2017, 'diurno', '07:00:00', '19:00:00', '2024-11-17', 48),
	(2018, 'diurno', '07:00:00', '19:00:00', '2024-11-19', 48),
	(2019, 'diurno', '07:00:00', '19:00:00', '2024-11-21', 48),
	(2020, 'diurno', '07:00:00', '19:00:00', '2024-11-23', 48),
	(2021, 'diurno', '07:00:00', '19:00:00', '2024-11-25', 48),
	(2022, 'diurno', '07:00:00', '19:00:00', '2024-11-27', 48),
	(2023, 'diurno', '07:00:00', '19:00:00', '2024-11-29', 48),
	(2024, 'noturno', '19:00:00', '07:00:00', '2024-10-16', 49),
	(2025, 'noturno', '19:00:00', '07:00:00', '2024-10-18', 49),
	(2026, 'noturno', '19:00:00', '07:00:00', '2024-10-20', 49),
	(2027, 'noturno', '19:00:00', '07:00:00', '2024-10-22', 49),
	(2028, 'noturno', '19:00:00', '07:00:00', '2024-10-24', 49),
	(2029, 'noturno', '19:00:00', '07:00:00', '2024-10-26', 49),
	(2030, 'noturno', '19:00:00', '07:00:00', '2024-10-28', 49),
	(2031, 'noturno', '19:00:00', '07:00:00', '2024-10-30', 49),
	(2032, 'noturno', '19:00:00', '07:00:00', '2024-11-01', 49),
	(2033, 'noturno', '19:00:00', '07:00:00', '2024-11-03', 49),
	(2034, 'noturno', '19:00:00', '07:00:00', '2024-11-05', 49),
	(2035, 'noturno', '19:00:00', '07:00:00', '2024-11-07', 49),
	(2036, 'noturno', '19:00:00', '07:00:00', '2024-11-09', 49),
	(2037, 'noturno', '19:00:00', '07:00:00', '2024-11-11', 49),
	(2038, 'noturno', '19:00:00', '07:00:00', '2024-11-13', 49),
	(2039, 'noturno', '19:00:00', '07:00:00', '2024-11-15', 49),
	(2040, 'noturno', '19:00:00', '07:00:00', '2024-11-17', 49),
	(2041, 'noturno', '19:00:00', '07:00:00', '2024-11-19', 49),
	(2042, 'noturno', '19:00:00', '07:00:00', '2024-11-21', 49),
	(2043, 'noturno', '19:00:00', '07:00:00', '2024-11-23', 49),
	(2044, 'noturno', '19:00:00', '07:00:00', '2024-11-25', 49),
	(2045, 'noturno', '19:00:00', '07:00:00', '2024-11-27', 49),
	(2046, 'noturno', '19:00:00', '07:00:00', '2024-11-29', 49);

-- Copiando estrutura para tabela sisescala.funcionario
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(50) NOT NULL,
  `cargo_func` varchar(50) DEFAULT NULL,
  `turno` enum('diurno','noturno') DEFAULT NULL,
  `telefone_func` varchar(50) NOT NULL,
  `sexo_func` varchar(50) NOT NULL,
  `email_func` varchar(50) NOT NULL,
  `id_st` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_func`) USING BTREE,
  KEY `FK_funcionario_setor` (`id_st`),
  CONSTRAINT `FK_funcionario_setor` FOREIGN KEY (`id_st`) REFERENCES `setor` (`id_st`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~5 rows (aproximadamente)
REPLACE INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `turno`, `telefone_func`, `sexo_func`, `email_func`, `id_st`) VALUES
	(42, 'Walter Pereira dos Santos', 'INSP', 'diurno', '(21) 97233-7489', 'M', 'walt@gmail.com', NULL),
	(46, 'Davi Oliveira da Silva', 'OP', 'noturno', '(21) 96664-7403', 'M', 'dv@gmail.com', NULL),
	(48, 'Leticia Pereira Santos', 'AX', 'diurno', '(21) 97508-6276', 'M', 'let@gmail.com', NULL),
	(49, 'Carolina Braga', 'TC', 'noturno', '(21) 95432-1598', 'F', 'caca@gmail.com', NULL),
	(84, 'João Pedro', '', NULL, '(21) 93684-8358', 'M', 'joao@gmail.com', NULL);

-- Copiando estrutura para tabela sisescala.setor
DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `nome_st` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_st`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.setor: ~1 rows (aproximadamente)
REPLACE INTO `setor` (`id_st`, `nome_st`) VALUES
	(1, 'Produção');

-- Copiando estrutura para tabela sisescala.substituicao
DROP TABLE IF EXISTS `substituicao`;
CREATE TABLE IF NOT EXISTS `substituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitante` varchar(50) NOT NULL DEFAULT '',
  `motivo` varchar(50) NOT NULL,
  `data_solic` date NOT NULL,
  `substituto` varchar(50) NOT NULL DEFAULT '',
  `data_subs` date DEFAULT NULL,
  `ativo_sub` enum('Em analise','Aprovado','Reprovado') NOT NULL,
  `data_aprovacao` datetime DEFAULT NULL,
  `id_esc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_esc` (`id_esc`),
  CONSTRAINT `substituicao_ibfk_3` FOREIGN KEY (`id_esc`) REFERENCES `escala` (`id_esc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.substituicao: ~1 rows (aproximadamente)
REPLACE INTO `substituicao` (`id`, `solicitante`, `motivo`, `data_solic`, `substituto`, `data_subs`, `ativo_sub`, `data_aprovacao`, `id_esc`) VALUES
	(17, 'Walter Pereira dos Santos', 'Ir ao médico!', '2024-11-25', 'Carolina Braga', '2024-11-26', 'Em analise', NULL, NULL);

-- Copiando estrutura para tabela sisescala.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT 1,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `dt_cadastro` datetime NOT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`),
  KEY `FK_usuarios_funcionario` (`id_func`),
  CONSTRAINT `FK_usuarios_funcionario` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~6 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`, `id_func`) VALUES
	(5, 'Supervisor', 'sup', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00', NULL),
	(6, 'Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00', NULL),
	(23, 'Walter Pereira dos Santos', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walt@gmail.com', 1, 1, '2024-11-21 16:34:35', 42),
	(29, 'Leticia', 'let', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'let@gmail.com', 1, 1, '2024-10-31 16:34:42', 48),
	(30, 'Carolina', 'carol', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'caca@gmail.com', 1, 1, '2024-10-31 17:11:43', 49),
	(59, 'Davi Oliveira da Silva', 'Davi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'daviliveee@gmail.com', 1, 1, '2024-11-14 11:24:03', 46),
	(65, 'João Pedro', 'jota', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'joao@gmail.com', 1, 1, '2024-11-14 19:10:12', 84);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
