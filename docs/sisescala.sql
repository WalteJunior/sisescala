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
CREATE DATABASE IF NOT EXISTS `sisescala` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `sisescala`;

-- Copiando estrutura para tabela sisescala.aluno
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sisescala.escala
DROP TABLE IF EXISTS `escala`;
CREATE TABLE IF NOT EXISTS `escala` (
  `id_esc` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_esc`),
  KEY `FK_escala_funcionario` (`id_func`),
  CONSTRAINT `FK_escala_funcionario` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sisescala.funcionario
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(50) DEFAULT NULL,
  `cargo_func` varchar(50) DEFAULT NULL,
  `telefone_func` varchar(50) DEFAULT NULL,
  `sexo_func` varchar(50) DEFAULT NULL,
  `email_func` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_func`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sisescala.setor
DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `nome_st` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_st`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sisescala.substituicao
DROP TABLE IF EXISTS `substituicao`;
CREATE TABLE IF NOT EXISTS `substituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `id_esc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_substituicao_escala` (`id_esc`),
  CONSTRAINT `FK_substituicao_escala` FOREIGN KEY (`id_esc`) REFERENCES `escala` (`id_esc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
