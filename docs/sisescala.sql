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
  `compl_end` varchar(50) DEFAULT NULL,
  `cep_end` varchar(50) DEFAULT NULL,
  `bairro_end` varchar(50) DEFAULT NULL,
  `cidade_end` varchar(50) DEFAULT NULL,
  `estado_end` varchar(50) DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_end`) USING BTREE,
  KEY `endereco_ibfk_1` (`id_func`) USING BTREE,
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~2 rows (aproximadamente)
REPLACE INTO `endereco` (`id_end`, `rua_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(44, 'Passagem Modelo', '', '66073-400', 'Guamá', 'Belém', 'PA', 40),
	(45, 'Rua Félix Antônio Lombardi', '', '58028-500', 'Ipês', 'João Pessoa', 'PB', 41),
	(46, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 42),
	(47, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 44);

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
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~18 rows (aproximadamente)
REPLACE INTO `escala` (`id_esc`, `tipo_turno`, `hora_inicio`, `hora_fim`, `data`, `id_func`) VALUES
	(7, 'diurno', '07:00:00', '19:00:00', NULL, NULL),
	(8, 'noturno', '19:00:00', '07:00:00', NULL, NULL),
	(201, 'dia', '07:00:00', '19:00:00', '2024-10-01', 44),
	(202, 'dia', '07:00:00', '19:00:00', '2024-10-03', 44),
	(203, 'dia', '07:00:00', '19:00:00', '2024-10-05', 44),
	(204, 'dia', '07:00:00', '19:00:00', '2024-10-07', 44),
	(205, 'dia', '07:00:00', '19:00:00', '2024-10-09', 44),
	(206, 'dia', '07:00:00', '19:00:00', '2024-10-11', 44),
	(207, 'dia', '07:00:00', '19:00:00', '2024-10-13', 44),
	(208, 'dia', '07:00:00', '19:00:00', '2024-10-15', 44),
	(209, 'dia', '07:00:00', '19:00:00', '2024-10-17', 44),
	(210, 'dia', '07:00:00', '19:00:00', '2024-10-19', 44),
	(211, 'dia', '07:00:00', '19:00:00', '2024-10-21', 44),
	(212, 'dia', '07:00:00', '19:00:00', '2024-10-23', 44),
	(213, 'dia', '07:00:00', '19:00:00', '2024-10-25', 44),
	(214, 'dia', '07:00:00', '19:00:00', '2024-10-27', 44),
	(215, 'dia', '07:00:00', '19:00:00', '2024-10-29', 44),
	(216, 'dia', '07:00:00', '19:00:00', '2024-10-31', 44);

-- Copiando estrutura para tabela sisescala.funcionario
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(50) NOT NULL,
  `cargo_func` varchar(50) DEFAULT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `telefone_func` varchar(50) NOT NULL,
  `sexo_func` varchar(50) NOT NULL,
  `email_func` varchar(50) NOT NULL,
  `id_st` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_func`) USING BTREE,
  KEY `FK_funcionario_setor` (`id_st`),
  CONSTRAINT `FK_funcionario_setor` FOREIGN KEY (`id_st`) REFERENCES `setor` (`id_st`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~4 rows (aproximadamente)
REPLACE INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `turno`, `telefone_func`, `sexo_func`, `email_func`, `id_st`) VALUES
	(40, 'joao', '', '', '111111111', 'M', 'j@gmail.com', NULL),
	(41, 'maria', '', '', '22222222', 'F', 'mari@gmail.com', NULL),
	(42, 'walter', '', '', '333333', 'M', 'walt@gmail.com', NULL),
	(44, 'Jessica', '', 'diurno', '66666', 'F', 'jess@gmail.com', NULL);

-- Copiando estrutura para tabela sisescala.setor
DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `nome_st` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_st`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.setor: ~0 rows (aproximadamente)
REPLACE INTO `setor` (`id_st`, `nome_st`) VALUES
	(1, 'Produção');

-- Copiando estrutura para tabela sisescala.substituicao
DROP TABLE IF EXISTS `substituicao`;
CREATE TABLE IF NOT EXISTS `substituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitante` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `data_solic` date NOT NULL,
  `substituto` int(11) NOT NULL,
  `data_subs` date DEFAULT NULL,
  `status` enum('Pendente','Aprovada','Reprovada') DEFAULT 'Pendente',
  `data_aprovacao` datetime DEFAULT NULL,
  `id_esc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitante` (`solicitante`),
  KEY `substituto` (`substituto`),
  KEY `id_esc` (`id_esc`),
  CONSTRAINT `substituicao_ibfk_1` FOREIGN KEY (`solicitante`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `substituicao_ibfk_2` FOREIGN KEY (`substituto`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `substituicao_ibfk_3` FOREIGN KEY (`id_esc`) REFERENCES `escala` (`id_esc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.substituicao: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~5 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`, `id_func`) VALUES
	(3, 'Funcionario', 'func', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@demo.com.br', 1, 1, '2024-10-07 21:21:10', NULL),
	(5, 'Supervisor', 'sup', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00', NULL),
	(6, 'Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00', NULL),
	(23, 'walter', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walt@gmail.com', 1, 1, '0000-00-00 00:00:00', NULL),
	(25, 'Jessica', 'jess', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jess@gmail.com', 1, 1, '0000-00-00 00:00:00', 44);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
