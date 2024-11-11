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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.endereco: ~8 rows (aproximadamente)
REPLACE INTO `endereco` (`id_end`, `rua_end`, `compl_end`, `cep_end`, `bairro_end`, `cidade_end`, `estado_end`, `id_func`) VALUES
	(46, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 42),
	(47, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864410', 'Bangu', 'Rio de Janeiro', 'RJ', 44),
	(48, 'Rua 3', '(Cj Res Morada da Lagoa)', '60840-190', 'Messejana', 'Fortaleza', 'CE', 45),
	(49, 'Alameda Cedro', '', '68742-122', 'Nova Olinda', 'Castanhal', 'PA', 46),
	(50, 'Avenida Getúlio Vargas', 'de 3031/3032 a 3443/3444', '69918-578', 'Vila Ivonete', 'Rio Branco', 'AC', 47),
	(51, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864-410', 'Bangu', 'Rio de Janeiro', 'RJ', 48),
	(52, 'Rua Icamiaba', 'de 415/416 a 839/840', '76876-484', 'Jardim Jorge Teixeira', 'Ariquemes', 'RO', 49),
	(56, 'Rua Mário das Virgens de Lima', '(Cj 6 de Novembro)', '21864-410', 'Bangu', 'Rio de Janeiro', 'RJ', 78);

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
) ENGINE=InnoDB AUTO_INCREMENT=1380 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.escala: ~213 rows (aproximadamente)
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
	(1067, 'diurno', '07:00:00', '19:00:00', '2024-10-16', 44),
	(1068, 'diurno', '07:00:00', '19:00:00', '2024-10-18', 44),
	(1069, 'diurno', '07:00:00', '19:00:00', '2024-10-20', 44),
	(1070, 'diurno', '07:00:00', '19:00:00', '2024-10-22', 44),
	(1071, 'diurno', '07:00:00', '19:00:00', '2024-10-24', 44),
	(1072, 'diurno', '07:00:00', '19:00:00', '2024-10-26', 44),
	(1073, 'diurno', '07:00:00', '19:00:00', '2024-10-28', 44),
	(1074, 'diurno', '07:00:00', '19:00:00', '2024-10-30', 44),
	(1075, 'diurno', '07:00:00', '19:00:00', '2024-11-01', 44),
	(1076, 'diurno', '07:00:00', '19:00:00', '2024-11-03', 44),
	(1077, 'diurno', '07:00:00', '19:00:00', '2024-11-05', 44),
	(1078, 'diurno', '07:00:00', '19:00:00', '2024-11-07', 44),
	(1079, 'diurno', '07:00:00', '19:00:00', '2024-11-09', 44),
	(1080, 'diurno', '07:00:00', '19:00:00', '2024-11-11', 44),
	(1081, 'diurno', '07:00:00', '19:00:00', '2024-11-13', 44),
	(1082, 'diurno', '07:00:00', '19:00:00', '2024-11-15', 44),
	(1083, 'diurno', '07:00:00', '19:00:00', '2024-11-17', 44),
	(1084, 'diurno', '07:00:00', '19:00:00', '2024-11-19', 44),
	(1085, 'diurno', '07:00:00', '19:00:00', '2024-11-21', 44),
	(1086, 'diurno', '07:00:00', '19:00:00', '2024-11-23', 44),
	(1087, 'diurno', '07:00:00', '19:00:00', '2024-11-25', 44),
	(1088, 'diurno', '07:00:00', '19:00:00', '2024-11-27', 44),
	(1089, 'diurno', '07:00:00', '19:00:00', '2024-11-29', 44),
	(1114, 'noturno', '19:00:00', '07:00:00', '2024-10-16', 46),
	(1115, 'noturno', '19:00:00', '07:00:00', '2024-10-18', 46),
	(1116, 'noturno', '19:00:00', '07:00:00', '2024-10-20', 46),
	(1117, 'noturno', '19:00:00', '07:00:00', '2024-10-22', 46),
	(1118, 'noturno', '19:00:00', '07:00:00', '2024-10-24', 46),
	(1119, 'noturno', '19:00:00', '07:00:00', '2024-10-26', 46),
	(1120, 'noturno', '19:00:00', '07:00:00', '2024-10-28', 46),
	(1121, 'noturno', '19:00:00', '07:00:00', '2024-10-30', 46),
	(1122, 'noturno', '19:00:00', '07:00:00', '2024-11-01', 46),
	(1123, 'noturno', '19:00:00', '07:00:00', '2024-11-03', 46),
	(1124, 'noturno', '19:00:00', '07:00:00', '2024-11-05', 46),
	(1125, 'noturno', '19:00:00', '07:00:00', '2024-11-07', 46),
	(1126, 'noturno', '19:00:00', '07:00:00', '2024-11-09', 46),
	(1127, 'noturno', '19:00:00', '07:00:00', '2024-11-11', 46),
	(1128, 'noturno', '19:00:00', '07:00:00', '2024-11-13', 46),
	(1129, 'noturno', '19:00:00', '07:00:00', '2024-11-15', 46),
	(1130, 'noturno', '19:00:00', '07:00:00', '2024-11-17', 46),
	(1131, 'noturno', '19:00:00', '07:00:00', '2024-11-19', 46),
	(1132, 'noturno', '19:00:00', '07:00:00', '2024-11-21', 46),
	(1133, 'noturno', '19:00:00', '07:00:00', '2024-11-23', 46),
	(1134, 'noturno', '19:00:00', '07:00:00', '2024-11-25', 46),
	(1135, 'noturno', '19:00:00', '07:00:00', '2024-11-27', 46),
	(1136, 'noturno', '19:00:00', '07:00:00', '2024-11-29', 46),
	(1137, 'diurno', '07:00:00', '19:00:00', '2024-10-30', 47),
	(1138, 'diurno', '07:00:00', '19:00:00', '2024-11-01', 47),
	(1139, 'diurno', '07:00:00', '19:00:00', '2024-11-03', 47),
	(1140, 'diurno', '07:00:00', '19:00:00', '2024-11-05', 47),
	(1141, 'diurno', '07:00:00', '19:00:00', '2024-11-07', 47),
	(1142, 'diurno', '07:00:00', '19:00:00', '2024-11-09', 47),
	(1143, 'diurno', '07:00:00', '19:00:00', '2024-11-11', 47),
	(1144, 'diurno', '07:00:00', '19:00:00', '2024-11-13', 47),
	(1145, 'diurno', '07:00:00', '19:00:00', '2024-11-15', 47),
	(1146, 'diurno', '07:00:00', '19:00:00', '2024-11-17', 47),
	(1147, 'diurno', '07:00:00', '19:00:00', '2024-11-19', 47),
	(1148, 'diurno', '07:00:00', '19:00:00', '2024-11-21', 47),
	(1149, 'diurno', '07:00:00', '19:00:00', '2024-11-23', 47),
	(1150, 'diurno', '07:00:00', '19:00:00', '2024-11-25', 47),
	(1151, 'diurno', '07:00:00', '19:00:00', '2024-11-27', 47),
	(1152, 'diurno', '07:00:00', '19:00:00', '2024-11-29', 47),
	(1153, 'diurno', '07:00:00', '19:00:00', '2024-12-01', 47),
	(1154, 'diurno', '07:00:00', '19:00:00', '2024-12-03', 47),
	(1155, 'diurno', '07:00:00', '19:00:00', '2024-12-05', 47),
	(1156, 'diurno', '07:00:00', '19:00:00', '2024-12-07', 47),
	(1157, 'diurno', '07:00:00', '19:00:00', '2024-12-09', 47),
	(1158, 'diurno', '07:00:00', '19:00:00', '2024-12-11', 47),
	(1159, 'diurno', '07:00:00', '19:00:00', '2024-12-13', 47),
	(1160, 'diurno', '07:00:00', '19:00:00', '2024-12-15', 47),
	(1161, 'diurno', '07:00:00', '19:00:00', '2024-12-17', 47),
	(1162, 'diurno', '07:00:00', '19:00:00', '2024-12-19', 47),
	(1163, 'diurno', '07:00:00', '19:00:00', '2024-12-21', 47),
	(1164, 'diurno', '07:00:00', '19:00:00', '2024-12-23', 47),
	(1165, 'diurno', '07:00:00', '19:00:00', '2024-12-25', 47),
	(1166, 'diurno', '07:00:00', '19:00:00', '2024-12-27', 47),
	(1167, 'diurno', '07:00:00', '19:00:00', '2024-12-29', 47),
	(1168, 'diurno', '07:00:00', '19:00:00', '2024-12-31', 47),
	(1169, 'diurno', '07:00:00', '19:00:00', '2024-11-01', 48),
	(1170, 'diurno', '07:00:00', '19:00:00', '2024-11-03', 48),
	(1171, 'diurno', '07:00:00', '19:00:00', '2024-11-05', 48),
	(1172, 'diurno', '07:00:00', '19:00:00', '2024-11-07', 48),
	(1173, 'diurno', '07:00:00', '19:00:00', '2024-11-09', 48),
	(1174, 'diurno', '07:00:00', '19:00:00', '2024-11-11', 48),
	(1175, 'diurno', '07:00:00', '19:00:00', '2024-11-13', 48),
	(1176, 'diurno', '07:00:00', '19:00:00', '2024-11-15', 48),
	(1177, 'diurno', '07:00:00', '19:00:00', '2024-11-17', 48),
	(1178, 'diurno', '07:00:00', '19:00:00', '2024-11-19', 48),
	(1179, 'diurno', '07:00:00', '19:00:00', '2024-11-21', 48),
	(1180, 'diurno', '07:00:00', '19:00:00', '2024-11-23', 48),
	(1181, 'diurno', '07:00:00', '19:00:00', '2024-11-25', 48),
	(1182, 'diurno', '07:00:00', '19:00:00', '2024-11-27', 48),
	(1183, 'diurno', '07:00:00', '19:00:00', '2024-11-29', 48),
	(1184, 'diurno', '07:00:00', '19:00:00', '2024-12-01', 48),
	(1185, 'diurno', '07:00:00', '19:00:00', '2024-12-03', 48),
	(1186, 'diurno', '07:00:00', '19:00:00', '2024-12-05', 48),
	(1187, 'diurno', '07:00:00', '19:00:00', '2024-12-07', 48),
	(1188, 'diurno', '07:00:00', '19:00:00', '2024-12-09', 48),
	(1189, 'diurno', '07:00:00', '19:00:00', '2024-12-11', 48),
	(1190, 'diurno', '07:00:00', '19:00:00', '2024-12-13', 48),
	(1191, 'diurno', '07:00:00', '19:00:00', '2024-12-15', 48),
	(1192, 'diurno', '07:00:00', '19:00:00', '2024-12-17', 48),
	(1193, 'diurno', '07:00:00', '19:00:00', '2024-12-19', 48),
	(1194, 'diurno', '07:00:00', '19:00:00', '2024-12-21', 48),
	(1195, 'diurno', '07:00:00', '19:00:00', '2024-12-23', 48),
	(1196, 'diurno', '07:00:00', '19:00:00', '2024-12-25', 48),
	(1197, 'diurno', '07:00:00', '19:00:00', '2024-12-27', 48),
	(1198, 'diurno', '07:00:00', '19:00:00', '2024-12-29', 48),
	(1199, 'diurno', '07:00:00', '19:00:00', '2024-12-31', 48),
	(1200, 'noturno', '19:00:00', '07:00:00', '2024-11-01', 49),
	(1201, 'noturno', '19:00:00', '07:00:00', '2024-11-03', 49),
	(1202, 'noturno', '19:00:00', '07:00:00', '2024-11-05', 49),
	(1203, 'noturno', '19:00:00', '07:00:00', '2024-11-07', 49),
	(1204, 'noturno', '19:00:00', '07:00:00', '2024-11-09', 49),
	(1205, 'noturno', '19:00:00', '07:00:00', '2024-11-11', 49),
	(1206, 'noturno', '19:00:00', '07:00:00', '2024-11-13', 49),
	(1207, 'noturno', '19:00:00', '07:00:00', '2024-11-15', 49),
	(1208, 'noturno', '19:00:00', '07:00:00', '2024-11-17', 49),
	(1209, 'noturno', '19:00:00', '07:00:00', '2024-11-19', 49),
	(1210, 'noturno', '19:00:00', '07:00:00', '2024-11-21', 49),
	(1211, 'noturno', '19:00:00', '07:00:00', '2024-11-23', 49),
	(1212, 'noturno', '19:00:00', '07:00:00', '2024-11-25', 49),
	(1213, 'noturno', '19:00:00', '07:00:00', '2024-11-27', 49),
	(1214, 'noturno', '19:00:00', '07:00:00', '2024-11-29', 49),
	(1215, 'noturno', '19:00:00', '07:00:00', '2024-12-01', 49),
	(1216, 'noturno', '19:00:00', '07:00:00', '2024-12-03', 49),
	(1217, 'noturno', '19:00:00', '07:00:00', '2024-12-05', 49),
	(1218, 'noturno', '19:00:00', '07:00:00', '2024-12-07', 49),
	(1219, 'noturno', '19:00:00', '07:00:00', '2024-12-09', 49),
	(1220, 'noturno', '19:00:00', '07:00:00', '2024-12-11', 49),
	(1221, 'noturno', '19:00:00', '07:00:00', '2024-12-13', 49),
	(1222, 'noturno', '19:00:00', '07:00:00', '2024-12-15', 49),
	(1223, 'noturno', '19:00:00', '07:00:00', '2024-12-17', 49),
	(1224, 'noturno', '19:00:00', '07:00:00', '2024-12-19', 49),
	(1225, 'noturno', '19:00:00', '07:00:00', '2024-12-21', 49),
	(1226, 'noturno', '19:00:00', '07:00:00', '2024-12-23', 49),
	(1227, 'noturno', '19:00:00', '07:00:00', '2024-12-25', 49),
	(1228, 'noturno', '19:00:00', '07:00:00', '2024-12-27', 49),
	(1229, 'noturno', '19:00:00', '07:00:00', '2024-12-29', 49),
	(1230, 'noturno', '19:00:00', '07:00:00', '2024-12-31', 49),
	(1306, 'noturno', '19:00:00', '07:00:00', '2024-10-15', 45),
	(1307, 'noturno', '19:00:00', '07:00:00', '2024-10-17', 45),
	(1308, 'noturno', '19:00:00', '07:00:00', '2024-10-19', 45),
	(1309, 'noturno', '19:00:00', '07:00:00', '2024-10-21', 45),
	(1310, 'noturno', '19:00:00', '07:00:00', '2024-10-23', 45),
	(1311, 'noturno', '19:00:00', '07:00:00', '2024-10-25', 45),
	(1312, 'noturno', '19:00:00', '07:00:00', '2024-10-27', 45),
	(1313, 'noturno', '19:00:00', '07:00:00', '2024-10-29', 45),
	(1314, 'noturno', '19:00:00', '07:00:00', '2024-10-31', 45),
	(1315, 'noturno', '19:00:00', '07:00:00', '2024-11-02', 45),
	(1316, 'noturno', '19:00:00', '07:00:00', '2024-11-04', 45),
	(1317, 'noturno', '19:00:00', '07:00:00', '2024-11-06', 45),
	(1318, 'noturno', '19:00:00', '07:00:00', '2024-11-08', 45),
	(1319, 'noturno', '19:00:00', '07:00:00', '2024-11-10', 45),
	(1320, 'noturno', '19:00:00', '07:00:00', '2024-11-12', 45),
	(1321, 'noturno', '19:00:00', '07:00:00', '2024-11-14', 45),
	(1322, 'noturno', '19:00:00', '07:00:00', '2024-11-16', 45),
	(1323, 'noturno', '19:00:00', '07:00:00', '2024-11-18', 45),
	(1324, 'noturno', '19:00:00', '07:00:00', '2024-11-20', 45),
	(1325, 'noturno', '19:00:00', '07:00:00', '2024-11-22', 45),
	(1326, 'noturno', '19:00:00', '07:00:00', '2024-11-24', 45),
	(1327, 'noturno', '19:00:00', '07:00:00', '2024-11-26', 45),
	(1328, 'noturno', '19:00:00', '07:00:00', '2024-11-28', 45),
	(1329, 'noturno', '19:00:00', '07:00:00', '2024-11-30', 45),
	(1355, 'diurno', '07:00:00', '19:00:00', '2024-11-12', 78),
	(1356, 'diurno', '07:00:00', '19:00:00', '2024-11-14', 78),
	(1357, 'diurno', '07:00:00', '19:00:00', '2024-11-16', 78),
	(1358, 'diurno', '07:00:00', '19:00:00', '2024-11-18', 78),
	(1359, 'diurno', '07:00:00', '19:00:00', '2024-11-20', 78),
	(1360, 'diurno', '07:00:00', '19:00:00', '2024-11-22', 78),
	(1361, 'diurno', '07:00:00', '19:00:00', '2024-11-24', 78),
	(1362, 'diurno', '07:00:00', '19:00:00', '2024-11-26', 78),
	(1363, 'diurno', '07:00:00', '19:00:00', '2024-11-28', 78),
	(1364, 'diurno', '07:00:00', '19:00:00', '2024-11-30', 78),
	(1365, 'diurno', '07:00:00', '19:00:00', '2024-12-02', 78),
	(1366, 'diurno', '07:00:00', '19:00:00', '2024-12-04', 78),
	(1367, 'diurno', '07:00:00', '19:00:00', '2024-12-06', 78),
	(1368, 'diurno', '07:00:00', '19:00:00', '2024-12-08', 78),
	(1369, 'diurno', '07:00:00', '19:00:00', '2024-12-10', 78),
	(1370, 'diurno', '07:00:00', '19:00:00', '2024-12-12', 78),
	(1371, 'diurno', '07:00:00', '19:00:00', '2024-12-14', 78),
	(1372, 'diurno', '07:00:00', '19:00:00', '2024-12-16', 78),
	(1373, 'diurno', '07:00:00', '19:00:00', '2024-12-18', 78),
	(1374, 'diurno', '07:00:00', '19:00:00', '2024-12-20', 78),
	(1375, 'diurno', '07:00:00', '19:00:00', '2024-12-22', 78),
	(1376, 'diurno', '07:00:00', '19:00:00', '2024-12-24', 78),
	(1377, 'diurno', '07:00:00', '19:00:00', '2024-12-26', 78),
	(1378, 'diurno', '07:00:00', '19:00:00', '2024-12-28', 78),
	(1379, 'diurno', '07:00:00', '19:00:00', '2024-12-30', 78);

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.funcionario: ~8 rows (aproximadamente)
REPLACE INTO `funcionario` (`id_func`, `nome_func`, `cargo_func`, `turno`, `telefone_func`, `sexo_func`, `email_func`, `id_st`) VALUES
	(42, 'walter', 'INSP', 'noturno', '(22) 98368-8345', 'M', 'walt@gmail.com', NULL),
	(44, 'Jessica', 'OP', 'noturno', '(21) 98307-8583', 'F', 'jess@gmail.com', NULL),
	(45, 'Marta', 'AX', 'noturno', '(24) 98677-2510', 'F', 'mt@gmail.com', NULL),
	(46, 'Davi', 'OP', 'diurno', '(24) 98816-8607', 'M', 'dv@gmail.com', NULL),
	(47, 'Clara', 'TC', 'diurno', '(21) 98787-3089', 'F', 'clara@gmail.com', NULL),
	(48, 'Leticia', 'AX', 'diurno', '(22) 99273-3660', 'F', 'let@gmail.com', NULL),
	(49, 'Carolina', 'TC', 'diurno', '(21) 95432-1598', 'F', 'caca@gmail.com', NULL),
	(78, 'Fabiano', 'OP', '', '(21)98002-7289', '', 'fab@gmail.com', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.substituicao: ~2 rows (aproximadamente)
REPLACE INTO `substituicao` (`id`, `solicitante`, `motivo`, `data_solic`, `substituto`, `data_subs`, `ativo_sub`, `data_aprovacao`, `id_esc`) VALUES
	(10, 'walter', 'medico', '2024-11-13', 'Davi', '2024-11-15', 'Reprovado', NULL, NULL),
	(15, 'Fabiano', 'consulta medica', '2024-11-16', 'walter', '2024-11-29', 'Aprovado', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisescala.usuarios: ~11 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `dt_cadastro`, `id_func`) VALUES
	(3, 'Funcionario', 'func', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin@demo.com.br', 1, 1, '2024-10-07 21:21:10', NULL),
	(5, 'Supervisor', 'sup', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin2@mail.com', 2, 1, '2019-04-11 00:00:00', NULL),
	(6, 'Administrador', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin3@mail.com', 3, 1, '2019-04-11 00:00:00', NULL),
	(23, 'walter', 'walt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'walt@gmail.com', 1, 1, '2024-10-14 00:00:00', 42),
	(25, 'Jessica', 'jess', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jess@gmail.com', 1, 1, '2024-10-15 00:00:00', 44),
	(26, 'Marta', 'mart', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@gmail.com', 1, 1, '2024-10-14 00:00:00', 45),
	(27, 'Davi', 'dav', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dv@gmail.com', 1, 1, '2024-10-15 18:58:42', 46),
	(28, 'Clara', 'clarinha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'clara@gmail.com', 1, 1, '2024-10-29 16:38:10', 47),
	(29, 'Leticia', 'let', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'let@gmail.com', 1, 1, '2024-10-31 16:34:42', 48),
	(30, 'Carolina', 'carol', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'caca@gmail.com', 1, 1, '2024-10-31 17:11:43', 49),
	(34, 'Fabiano', 'fab', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'fab@gmail.com', 1, 1, '2024-11-11 15:20:57', 78);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
