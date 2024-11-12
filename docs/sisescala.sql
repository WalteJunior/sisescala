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

-- Copiando estrutura para tabela sisescala.endereco
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~7 rows (aproximadamente)
REPLACE INTO `endereco` (`id_end`, `rua_end`, `num_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(46, 'Rua Mário das Virgens de Lima', 'S/N', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 42),
	(47, 'Rua Mário das Virgens de Lima', '', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 44),
	(48, 'Rua 3', '', '(Cj Res Morada da Lagoa)', '60840-190', 'Messejana', 'Fortaleza', 'CE', 45),
	(50, 'Avenida Getúlio Vargas', '', 'de 3031/3032 a 3443/3444', '69918-578', 'Vila Ivonete', 'Rio Branco', 'AC', 47),
	(51, 'Rua Mário das Virgens de Lima', '', '(Cj 6 de Novembro)', '21864-410', 'Bangu', 'Rio de Janeiro', 'RJ', 48),
	(52, 'Rua Icamiaba', '', 'de 415/416 a 839/840', '76876-484', 'Jardim Jorge Teixeira', 'Ariquemes', 'RO', 49);

-- Copiando estrutura para tabela sisescala.escala
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
) ENGINE=InnoDB AUTO_INCREMENT=1389 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~129 rows (aproximadamente)
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
	(1278, 'diurno', '07:00:00', '19:00:00', '2024-11-01', 49),
	(1279, 'diurno', '07:00:00', '19:00:00', '2024-11-03', 49),
	(1280, 'diurno', '07:00:00', '19:00:00', '2024-11-05', 49),
	(1281, 'diurno', '07:00:00', '19:00:00', '2024-11-07', 49),
	(1282, 'diurno', '07:00:00', '19:00:00', '2024-11-09', 49),
	(1283, 'diurno', '07:00:00', '19:00:00', '2024-11-11', 49),
	(1284, 'diurno', '07:00:00', '19:00:00', '2024-11-13', 49),
	(1285, 'diurno', '07:00:00', '19:00:00', '2024-11-15', 49),
	(1286, 'diurno', '07:00:00', '19:00:00', '2024-11-17', 49),
	(1287, 'diurno', '07:00:00', '19:00:00', '2024-11-19', 49),
	(1288, 'diurno', '07:00:00', '19:00:00', '2024-11-21', 49),
	(1289, 'diurno', '07:00:00', '19:00:00', '2024-11-23', 49),
	(1290, 'diurno', '07:00:00', '19:00:00', '2024-11-25', 49),
	(1291, 'diurno', '07:00:00', '19:00:00', '2024-11-27', 49),
	(1292, 'diurno', '07:00:00', '19:00:00', '2024-11-29', 49),
	(1293, 'diurno', '07:00:00', '19:00:00', '2024-12-01', 49),
	(1294, 'diurno', '07:00:00', '19:00:00', '2024-12-03', 49),
	(1295, 'diurno', '07:00:00', '19:00:00', '2024-12-05', 49),
	(1296, 'diurno', '07:00:00', '19:00:00', '2024-12-07', 49),
	(1297, 'diurno', '07:00:00', '19:00:00', '2024-12-09', 49),
	(1298, 'diurno', '07:00:00', '19:00:00', '2024-12-11', 49),
	(1299, 'diurno', '07:00:00', '19:00:00', '2024-12-13', 49),
	(1300, 'diurno', '07:00:00', '19:00:00', '2024-12-15', 49),
	(1301, 'diurno', '07:00:00', '19:00:00', '2024-12-17', 49),
	(1302, 'diurno', '07:00:00', '19:00:00', '2024-12-19', 49),
	(1303, 'diurno', '07:00:00', '19:00:00', '2024-12-21', 49),
	(1304, 'diurno', '07:00:00', '19:00:00', '2024-12-23', 49),
	(1305, 'diurno', '07:00:00', '19:00:00', '2024-12-25', 49),
	(1306, 'diurno', '07:00:00', '19:00:00', '2024-12-27', 49),
	(1307, 'diurno', '07:00:00', '19:00:00', '2024-12-29', 49),
	(1308, 'diurno', '07:00:00', '19:00:00', '2024-12-31', 49),
	(1309, 'noturno', '19:00:00', '07:00:00', '2024-10-16', 44),
	(1310, 'noturno', '19:00:00', '07:00:00', '2024-10-18', 44),
	(1311, 'noturno', '19:00:00', '07:00:00', '2024-10-20', 44),
	(1312, 'noturno', '19:00:00', '07:00:00', '2024-10-22', 44),
	(1313, 'noturno', '19:00:00', '07:00:00', '2024-10-24', 44),
	(1314, 'noturno', '19:00:00', '07:00:00', '2024-10-26', 44),
	(1315, 'noturno', '19:00:00', '07:00:00', '2024-10-28', 44),
	(1316, 'noturno', '19:00:00', '07:00:00', '2024-10-30', 44),
	(1317, 'noturno', '19:00:00', '07:00:00', '2024-11-01', 44),
	(1318, 'noturno', '19:00:00', '07:00:00', '2024-11-03', 44),
	(1319, 'noturno', '19:00:00', '07:00:00', '2024-11-05', 44),
	(1320, 'noturno', '19:00:00', '07:00:00', '2024-11-07', 44),
	(1321, 'noturno', '19:00:00', '07:00:00', '2024-11-09', 44),
	(1322, 'noturno', '19:00:00', '07:00:00', '2024-11-11', 44),
	(1323, 'noturno', '19:00:00', '07:00:00', '2024-11-13', 44),
	(1324, 'noturno', '19:00:00', '07:00:00', '2024-11-15', 44),
	(1325, 'noturno', '19:00:00', '07:00:00', '2024-11-17', 44),
	(1326, 'noturno', '19:00:00', '07:00:00', '2024-11-19', 44),
	(1327, 'noturno', '19:00:00', '07:00:00', '2024-11-21', 44),
	(1328, 'noturno', '19:00:00', '07:00:00', '2024-11-23', 44),
	(1329, 'noturno', '19:00:00', '07:00:00', '2024-11-25', 44),
	(1330, 'noturno', '19:00:00', '07:00:00', '2024-11-27', 44),
	(1331, 'noturno', '19:00:00', '07:00:00', '2024-11-29', 44),
	(1332, 'diurno', '07:00:00', '19:00:00', '2024-10-15', 45),
	(1333, 'diurno', '07:00:00', '19:00:00', '2024-10-17', 45),
	(1334, 'diurno', '07:00:00', '19:00:00', '2024-10-19', 45),
	(1335, 'diurno', '07:00:00', '19:00:00', '2024-10-21', 45),
	(1336, 'diurno', '07:00:00', '19:00:00', '2024-10-23', 45),
	(1337, 'diurno', '07:00:00', '19:00:00', '2024-10-25', 45),
	(1338, 'diurno', '07:00:00', '19:00:00', '2024-10-27', 45),
	(1339, 'diurno', '07:00:00', '19:00:00', '2024-10-29', 45),
	(1340, 'diurno', '07:00:00', '19:00:00', '2024-10-31', 45),
	(1341, 'diurno', '07:00:00', '19:00:00', '2024-11-02', 45),
	(1342, 'diurno', '07:00:00', '19:00:00', '2024-11-04', 45),
	(1343, 'diurno', '07:00:00', '19:00:00', '2024-11-06', 45),
	(1344, 'diurno', '07:00:00', '19:00:00', '2024-11-08', 45),
	(1345, 'diurno', '07:00:00', '19:00:00', '2024-11-10', 45),
	(1346, 'diurno', '07:00:00', '19:00:00', '2024-11-12', 45),
	(1347, 'diurno', '07:00:00', '19:00:00', '2024-11-14', 45),
	(1348, 'diurno', '07:00:00', '19:00:00', '2024-11-16', 45),
	(1349, 'diurno', '07:00:00', '19:00:00', '2024-11-18', 45),
	(1350, 'diurno', '07:00:00', '19:00:00', '2024-11-20', 45),
	(1351, 'diurno', '07:00:00', '19:00:00', '2024-11-22', 45),
	(1352, 'diurno', '07:00:00', '19:00:00', '2024-11-24', 45),
	(1353, 'diurno', '07:00:00', '19:00:00', '2024-11-26', 45),
	(1354, 'diurno', '07:00:00', '19:00:00', '2024-11-28', 45),
	(1355, 'diurno', '07:00:00', '19:00:00', '2024-11-30', 45),
	(1356, 'noturno', '19:00:00', '07:00:00', '2024-10-30', 47),
	(1357, 'noturno', '19:00:00', '07:00:00', '2024-11-01', 47),
	(1358, 'noturno', '19:00:00', '07:00:00', '2024-11-03', 47),
	(1359, 'noturno', '19:00:00', '07:00:00', '2024-11-05', 47),
	(1360, 'noturno', '19:00:00', '07:00:00', '2024-11-07', 47),
	(1361, 'noturno', '19:00:00', '07:00:00', '2024-11-09', 47),
	(1362, 'noturno', '19:00:00', '07:00:00', '2024-11-11', 47),
	(1363, 'noturno', '19:00:00', '07:00:00', '2024-11-13', 47),
	(1364, 'noturno', '19:00:00', '07:00:00', '2024-11-15', 47),
	(1365, 'noturno', '19:00:00', '07:00:00', '2024-11-17', 47),
	(1366, 'noturno', '19:00:00', '07:00:00', '2024-11-19', 47),
	(1367, 'noturno', '19:00:00', '07:00:00', '2024-11-21', 47),
	(1368, 'noturno', '19:00:00', '07:00:00', '2024-11-23', 47),
	(1369, 'noturno', '19:00:00', '07:00:00', '2024-11-25', 47),
	(1370, 'noturno', '19:00:00', '07:00:00', '2024-11-27', 47),
	(1371, 'noturno', '19:00:00', '07:00:00', '2024-11-29', 47),
	(1372, 'noturno', '19:00:00', '07:00:00', '2024-11-30', 47),
	(1373, 'noturno', '19:00:00', '07:00:00', '2024-10-31', 48),
	(1374, 'noturno', '19:00:00', '07:00:00', '2024-11-02', 48),
	(1375, 'noturno', '19:00:00', '07:00:00', '2024-11-04', 48),
	(1376, 'noturno', '19:00:00', '07:00:00', '2024-11-06', 48),
	(1377, 'noturno', '19:00:00', '07:00:00', '2024-11-08', 48),
	(1378, 'noturno', '19:00:00', '07:00:00', '2024-11-10', 48),
	(1379, 'noturno', '19:00:00', '07:00:00', '2024-11-12', 48),
	(1380, 'noturno', '19:00:00', '07:00:00', '2024-11-14', 48),
	(1381, 'noturno', '19:00:00', '07:00:00', '2024-11-16', 48),
	(1382, 'noturno', '19:00:00', '07:00:00', '2024-11-18', 48),
	(1383, 'noturno', '19:00:00', '07:00:00', '2024-11-20', 48),
	(1384, 'noturno', '19:00:00', '07:00:00', '2024-11-22', 48),
	(1385, 'noturno', '19:00:00', '07:00:00', '2024-11-24', 48),
	(1386, 'noturno', '19:00:00', '07:00:00', '2024-11-26', 48),
	(1387, 'noturno', '19:00:00', '07:00:00', '2024-11-28', 48),
	(1388, 'noturno', '19:00:00', '07:00:00', '2024-11-30', 48);

-- Copiando estrutura para tabela sisescala.funcionario
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~6 rows (aproximadamente)
REPLACE INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `turno`, `telefone_func`, `sexo_func`, `email_func`, `id_st`) VALUES
	(42, 'walter', 'INSP', 'diurno', '(21) 97233-7489', 'M', 'walt@gmail.com', NULL),
	(44, 'Jessica', 'OP', 'noturno', '(22) 99831-2310', 'F', 'jess@gmail.com', NULL),
	(45, 'Marta', 'TC', 'diurno', '(22) 98116-7008', 'F', 'mt@gmail.com', NULL),
	(47, 'Clara', 'TC', 'noturno', '(21)98787-3089', 'F', 'clara@gmail.com', NULL),
	(48, 'Leticia', 'AX', 'noturno', '(21) 97508-6276', 'F', 'let@gmail.com', NULL),
	(49, 'Carolina', 'AX', 'diurno', '(21)95432-1598', 'F', 'caca@gmail.com', NULL);

-- Copiando estrutura para tabela sisescala.setor
CREATE TABLE IF NOT EXISTS `setor` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `nome_st` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_st`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.setor: ~0 rows (aproximadamente)
REPLACE INTO `setor` (`id_st`, `nome_st`) VALUES
	(1, 'Produção');

-- Copiando estrutura para tabela sisescala.substituicao
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.substituicao: ~0 rows (aproximadamente)
REPLACE INTO `substituicao` (`id`, `solicitante`, `motivo`, `data_solic`, `substituto`, `data_subs`, `ativo_sub`, `data_aprovacao`, `id_esc`) VALUES
	(10, 'walter', 'medico', '2024-11-13', 'Davi', '2024-11-15', 'Em analise', NULL, NULL);

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
  `id_func` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `nivel` (`nivel`),
  KEY `FK_usuarios_funcionario` (`id_func`),
  CONSTRAINT `FK_usuarios_funcionario` FOREIGN KEY (`id_func`) REFERENCES `funcionario` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~9 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`, `id_func`) VALUES
	(3, 'Funcionario', 'func', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@demo.com.br', 1, 1, '2024-10-07 21:21:10', NULL),
	(5, 'Supervisor', 'sup', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00', NULL),
	(6, 'Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00', NULL),
	(23, 'walter', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walt@gmail.com', 1, 1, '2024-10-14 00:00:00', 42),
	(25, 'Jessica', 'jess', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jess@gmail.com', 1, 1, '2024-10-15 00:00:00', 44),
	(26, 'Marta', 'mart', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@gmail.com', 1, 1, '2024-10-14 00:00:00', 45),
	(28, 'Clara', 'clarinha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'clara@gmail.com', 1, 1, '2024-10-29 16:38:10', 47),
	(29, 'Leticia', 'let', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'let@gmail.com', 1, 1, '2024-10-31 16:34:42', 48),
	(30, 'Carolina', 'carol', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'caca@gmail.com', 1, 1, '2024-10-31 17:11:43', 49);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
