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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~4 rows (aproximadamente)
REPLACE INTO `endereco` (`id_end`, `rua_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(46, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 42),
	(47, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 44),
	(48, 'Rua 3', '(Cj Res Morada da Lagoa)', '60840-190', 'Messejana', 'Fortaleza', 'CE', 45),
	(49, 'Alameda Cedro', '', '68742-122', 'Nova Olinda', 'Castanhal', 'PA', 46);

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
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~65 rows (aproximadamente)
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
	(216, 'dia', '07:00:00', '19:00:00', '2024-10-31', 44),
	(279, '', '19:00:00', '07:00:00', '2024-10-01', 45),
	(280, '', '19:00:00', '07:00:00', '2024-10-03', 45),
	(281, '', '19:00:00', '07:00:00', '2024-10-05', 45),
	(282, '', '19:00:00', '07:00:00', '2024-10-07', 45),
	(283, '', '19:00:00', '07:00:00', '2024-10-09', 45),
	(284, '', '19:00:00', '07:00:00', '2024-10-11', 45),
	(285, '', '19:00:00', '07:00:00', '2024-10-13', 45),
	(286, '', '19:00:00', '07:00:00', '2024-10-15', 45),
	(287, '', '19:00:00', '07:00:00', '2024-10-17', 45),
	(288, '', '19:00:00', '07:00:00', '2024-10-19', 45),
	(289, '', '19:00:00', '07:00:00', '2024-10-21', 45),
	(290, '', '19:00:00', '07:00:00', '2024-10-23', 45),
	(291, '', '19:00:00', '07:00:00', '2024-10-25', 45),
	(292, '', '19:00:00', '07:00:00', '2024-10-27', 45),
	(293, '', '19:00:00', '07:00:00', '2024-10-29', 45),
	(294, '', '19:00:00', '07:00:00', '2024-10-31', 45),
	(327, 'diurno', '07:00:00', '19:00:00', '2024-10-02', 46),
	(328, 'diurno', '07:00:00', '19:00:00', '2024-10-04', 46),
	(329, 'diurno', '07:00:00', '19:00:00', '2024-10-06', 46),
	(330, 'diurno', '07:00:00', '19:00:00', '2024-10-08', 46),
	(331, 'diurno', '07:00:00', '19:00:00', '2024-10-10', 46),
	(332, 'diurno', '07:00:00', '19:00:00', '2024-10-12', 46),
	(333, 'diurno', '07:00:00', '19:00:00', '2024-10-14', 46),
	(334, 'diurno', '07:00:00', '19:00:00', '2024-10-16', 46),
	(335, 'diurno', '07:00:00', '19:00:00', '2024-10-18', 46),
	(336, 'diurno', '07:00:00', '19:00:00', '2024-10-20', 46),
	(337, 'diurno', '07:00:00', '19:00:00', '2024-10-22', 46),
	(338, 'diurno', '07:00:00', '19:00:00', '2024-10-24', 46),
	(339, 'diurno', '07:00:00', '19:00:00', '2024-10-26', 46),
	(340, 'diurno', '07:00:00', '19:00:00', '2024-10-28', 46),
	(341, 'diurno', '07:00:00', '19:00:00', '2024-10-30', 46),
	(406, 'noturno', '19:00:00', '07:00:00', '2024-10-01', 42),
	(407, 'noturno', '19:00:00', '07:00:00', '2024-10-03', 42),
	(408, 'noturno', '19:00:00', '07:00:00', '2024-10-05', 42),
	(409, 'noturno', '19:00:00', '07:00:00', '2024-10-07', 42),
	(410, 'noturno', '19:00:00', '07:00:00', '2024-10-09', 42),
	(411, 'noturno', '19:00:00', '07:00:00', '2024-10-11', 42),
	(412, 'noturno', '19:00:00', '07:00:00', '2024-10-13', 42),
	(413, 'noturno', '19:00:00', '07:00:00', '2024-10-15', 42),
	(414, 'noturno', '19:00:00', '07:00:00', '2024-10-17', 42),
	(415, 'noturno', '19:00:00', '07:00:00', '2024-10-19', 42),
	(416, 'noturno', '19:00:00', '07:00:00', '2024-10-21', 42),
	(417, 'noturno', '19:00:00', '07:00:00', '2024-10-23', 42),
	(418, 'noturno', '19:00:00', '07:00:00', '2024-10-25', 42),
	(419, 'noturno', '19:00:00', '07:00:00', '2024-10-27', 42),
	(420, 'noturno', '19:00:00', '07:00:00', '2024-10-29', 42),
	(421, 'noturno', '19:00:00', '07:00:00', '2024-10-31', 42);

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~4 rows (aproximadamente)
REPLACE INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `turno`, `telefone_func`, `sexo_func`, `email_func`, `id_st`) VALUES
	(42, 'walter', 'INSP', 'noturno', '333333', 'M', 'walt@gmail.com', NULL),
	(44, 'Jessica', 'OP', 'noturno', '66666', 'F', 'jess@gmail.com', NULL),
	(45, 'Marta', 'AX', 'diurno', '2199999', 'F', 'mt@gmail.com', NULL),
	(46, 'Davi', 'OP', 'diurno', '2190000', 'M', 'dv@gmail.com', NULL);

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
  `ativo_sub` enum('Pendente','Aprovada','Reprovada') NOT NULL DEFAULT 'Pendente',
  `data_aprovacao` datetime DEFAULT NULL,
  `id_esc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_esc` (`id_esc`),
  CONSTRAINT `substituicao_ibfk_3` FOREIGN KEY (`id_esc`) REFERENCES `escala` (`id_esc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `token_recuperacao` varchar(32) DEFAULT NULL,
  `expiracao_token` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`),
  KEY `FK_usuarios_funcionario` (`id_func`),
  CONSTRAINT `FK_usuarios_funcionario` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~7 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`, `id_func`, `token_recuperacao`, `expiracao_token`) VALUES
	(3, 'Funcionario', 'func', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@demo.com.br', 1, 1, '2024-10-07 21:21:10', NULL, NULL, NULL),
	(5, 'Supervisor', 'sup', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00', NULL, NULL, NULL),
	(6, 'Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00', NULL, NULL, NULL),
	(23, 'walter', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walt@gmail.com', 1, 1, '2024-10-14 00:00:00', 42, 'f7894e5d5b92a8c79f0660d577a068df', '2024-10-25 19:13:34'),
	(25, 'Jessica', 'jess', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jess@gmail.com', 1, 1, '2024-10-16 00:00:00', 44, NULL, NULL),
	(26, 'Marta', 'mart', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@gmail.com', 1, 1, '2024-10-19 00:00:00', 45, NULL, NULL),
	(27, 'Davi', 'dav', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dv@gmail.com', 1, 1, '2024-10-19 18:58:42', 46, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
