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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~7 rows (aproximadamente)
REPLACE INTO `endereco` (`id_end`, `rua_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(46, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 42),
	(47, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 44),
	(48, 'Rua 3', '(Cj Res Morada da Lagoa)', '60840-190', 'Messejana', 'Fortaleza', 'CE', 45),
	(49, 'Alameda Cedro', '', '68742-122', 'Nova Olinda', 'Castanhal', 'PA', 46),
	(50, 'Avenida Getúlio Vargas', 'de 3031/3032 a 3443/3444', '69918-578', 'Vila Ivonete', 'Rio Branco', 'AC', 47),
	(51, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864-410', 'Bangu', 'Rio de Janeiro', 'RJ', 48),
	(52, 'Rua Icamiaba', 'de 415/416 a 839/840', '76876-484', 'Jardim Jorge Teixeira', 'Ariquemes', 'RO', 49);

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
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~110 rows (aproximadamente)
REPLACE INTO `escala` (`id_esc`, `tipo_turno`, `hora_inicio`, `hora_fim`, `data`, `id_func`) VALUES
	(7, 'diurno', '07:00:00', '19:00:00', NULL, NULL),
	(8, 'noturno', '19:00:00', '07:00:00', NULL, NULL),
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
	(638, 'diurno', '07:00:00', '19:00:00', '2024-10-02', 47),
	(639, 'diurno', '07:00:00', '19:00:00', '2024-10-04', 47),
	(640, 'diurno', '07:00:00', '19:00:00', '2024-10-06', 47),
	(641, 'diurno', '07:00:00', '19:00:00', '2024-10-08', 47),
	(642, 'diurno', '07:00:00', '19:00:00', '2024-10-10', 47),
	(643, 'diurno', '07:00:00', '19:00:00', '2024-10-12', 47),
	(644, 'diurno', '07:00:00', '19:00:00', '2024-10-14', 47),
	(645, 'diurno', '07:00:00', '19:00:00', '2024-10-16', 47),
	(646, 'diurno', '07:00:00', '19:00:00', '2024-10-18', 47),
	(647, 'diurno', '07:00:00', '19:00:00', '2024-10-20', 47),
	(648, 'diurno', '07:00:00', '19:00:00', '2024-10-22', 47),
	(649, 'diurno', '07:00:00', '19:00:00', '2024-10-24', 47),
	(650, 'diurno', '07:00:00', '19:00:00', '2024-10-26', 47),
	(651, 'diurno', '07:00:00', '19:00:00', '2024-10-28', 47),
	(652, 'diurno', '07:00:00', '19:00:00', '2024-10-30', 47),
	(845, 'noturno', '19:00:00', '07:00:00', '2024-10-01', 42),
	(846, 'noturno', '19:00:00', '07:00:00', '2024-10-03', 42),
	(847, 'noturno', '19:00:00', '07:00:00', '2024-10-05', 42),
	(848, 'noturno', '19:00:00', '07:00:00', '2024-10-07', 42),
	(849, 'noturno', '19:00:00', '07:00:00', '2024-10-09', 42),
	(850, 'noturno', '19:00:00', '07:00:00', '2024-10-11', 42),
	(851, 'noturno', '19:00:00', '07:00:00', '2024-10-13', 42),
	(852, 'noturno', '19:00:00', '07:00:00', '2024-10-15', 42),
	(853, 'noturno', '19:00:00', '07:00:00', '2024-10-17', 42),
	(854, 'noturno', '19:00:00', '07:00:00', '2024-10-19', 42),
	(855, 'noturno', '19:00:00', '07:00:00', '2024-10-21', 42),
	(856, 'noturno', '19:00:00', '07:00:00', '2024-10-23', 42),
	(857, 'noturno', '19:00:00', '07:00:00', '2024-10-25', 42),
	(858, 'noturno', '19:00:00', '07:00:00', '2024-10-27', 42),
	(859, 'noturno', '19:00:00', '07:00:00', '2024-10-29', 42),
	(860, 'noturno', '19:00:00', '07:00:00', '2024-10-31', 42),
	(906, 'diurno', '07:00:00', '19:00:00', '2024-10-02', 48),
	(907, 'diurno', '07:00:00', '19:00:00', '2024-10-04', 48),
	(908, 'diurno', '07:00:00', '19:00:00', '2024-10-06', 48),
	(909, 'diurno', '07:00:00', '19:00:00', '2024-10-08', 48),
	(910, 'diurno', '07:00:00', '19:00:00', '2024-10-10', 48),
	(911, 'diurno', '07:00:00', '19:00:00', '2024-10-12', 48),
	(912, 'diurno', '07:00:00', '19:00:00', '2024-10-14', 48),
	(913, 'diurno', '07:00:00', '19:00:00', '2024-10-16', 48),
	(914, 'diurno', '07:00:00', '19:00:00', '2024-10-18', 48),
	(915, 'diurno', '07:00:00', '19:00:00', '2024-10-20', 48),
	(916, 'diurno', '07:00:00', '19:00:00', '2024-10-22', 48),
	(917, 'diurno', '07:00:00', '19:00:00', '2024-10-24', 48),
	(918, 'diurno', '07:00:00', '19:00:00', '2024-10-26', 48),
	(919, 'diurno', '07:00:00', '19:00:00', '2024-10-28', 48),
	(920, 'diurno', '07:00:00', '19:00:00', '2024-10-30', 48),
	(952, 'diurno', '07:00:00', '19:00:00', '2024-10-01', 49),
	(953, 'diurno', '07:00:00', '19:00:00', '2024-10-03', 49),
	(954, 'noturno', '19:00:00', '07:00:00', '2024-10-05', 49),
	(955, 'diurno', '07:00:00', '19:00:00', '2024-10-07', 49),
	(956, 'noturno', '19:00:00', '07:00:00', '2024-10-09', 49),
	(957, 'diurno', '07:00:00', '19:00:00', '2024-10-11', 49),
	(958, 'noturno', '19:00:00', '07:00:00', '2024-10-13', 49),
	(959, 'diurno', '07:00:00', '19:00:00', '2024-10-15', 49),
	(960, 'noturno', '19:00:00', '07:00:00', '2024-10-17', 49),
	(961, 'noturno', '19:00:00', '07:00:00', '2024-10-19', 49),
	(962, 'diurno', '07:00:00', '19:00:00', '2024-10-21', 49),
	(963, 'diurno', '07:00:00', '19:00:00', '2024-10-23', 49),
	(964, 'diurno', '07:00:00', '19:00:00', '2024-10-25', 49),
	(965, 'noturno', '19:00:00', '07:00:00', '2024-10-27', 49),
	(966, 'noturno', '19:00:00', '07:00:00', '2024-10-29', 49),
	(967, 'diurno', '07:00:00', '19:00:00', '2024-10-31', 49),
	(983, 'diurno', '07:00:00', '19:00:00', '2024-11-01', 44),
	(984, 'noturno', '19:00:00', '07:00:00', '2024-11-03', 44),
	(985, 'diurno', '07:00:00', '19:00:00', '2024-11-05', 44),
	(986, 'noturno', '19:00:00', '07:00:00', '2024-11-07', 44),
	(987, 'diurno', '07:00:00', '19:00:00', '2024-11-09', 44),
	(988, 'noturno', '19:00:00', '07:00:00', '2024-11-11', 44),
	(989, 'noturno', '19:00:00', '07:00:00', '2024-11-13', 44),
	(990, 'noturno', '19:00:00', '07:00:00', '2024-11-15', 44),
	(991, 'noturno', '19:00:00', '07:00:00', '2024-11-17', 44),
	(992, 'noturno', '19:00:00', '07:00:00', '2024-11-19', 44),
	(993, 'noturno', '19:00:00', '07:00:00', '2024-11-21', 44),
	(994, 'diurno', '07:00:00', '19:00:00', '2024-11-23', 44),
	(995, 'noturno', '19:00:00', '07:00:00', '2024-11-25', 44),
	(996, 'noturno', '19:00:00', '07:00:00', '2024-11-27', 44),
	(997, 'diurno', '07:00:00', '19:00:00', '2024-11-29', 44);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~7 rows (aproximadamente)
REPLACE INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `turno`, `telefone_func`, `sexo_func`, `email_func`, `id_st`) VALUES
	(42, 'walter', 'INSP', 'noturno', '333333', 'M', 'walt@gmail.com', NULL),
	(44, 'Jessica', 'OP', 'noturno', '66666', 'F', 'jess@gmail.com', NULL),
	(45, 'Marta', 'AX', 'diurno', '2199999', 'F', 'mt@gmail.com', NULL),
	(46, 'Davi', 'OP', 'diurno', '2190000', 'M', 'dv@gmail.com', NULL),
	(47, 'Clara', 'TC', 'diurno', '(21)98787-3089', 'F', 'clara@gmail.com', NULL),
	(48, 'Leticia', 'AX', 'diurno', '(21)33376-667_', 'F', 'let@gmail.com', NULL),
	(49, 'Carolina', NULL, NULL, '(21)95432-1598', 'F', 'caca@gmail.com', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.substituicao: ~1 rows (aproximadamente)
REPLACE INTO `substituicao` (`id`, `solicitante`, `motivo`, `data_solic`, `substituto`, `data_subs`, `ativo_sub`, `data_aprovacao`, `id_esc`) VALUES
	(10, 'walter', 'medico', '2024-11-13', 'Davi', '2024-11-15', '', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~10 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`, `id_func`) VALUES
	(3, 'Funcionario', 'func', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@demo.com.br', 1, 1, '2024-10-07 21:21:10', NULL),
	(5, 'Supervisor', 'sup', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00', NULL),
	(6, 'Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00', NULL),
	(23, 'walter', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walt@gmail.com', 1, 1, '2024-10-14 00:00:00', 42),
	(25, 'Jessica', 'jess', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jess@gmail.com', 1, 1, '2024-10-16 00:00:00', 44),
	(26, 'Marta', 'mart', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@gmail.com', 1, 1, '2024-10-19 00:00:00', 45),
	(27, 'Davi', 'dav', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dv@gmail.com', 1, 1, '2024-10-19 18:58:42', 46),
	(28, 'Clara', 'clarinha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'clara@gmail.com', 1, 1, '2024-10-29 16:38:10', 47),
	(29, 'Leticia', 'let', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'let@gmail.com', 1, 1, '2024-10-31 16:34:42', 48),
	(30, 'Carolina', 'carol', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'caca@gmail.com', 1, 1, '2024-10-31 17:11:43', 49);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
