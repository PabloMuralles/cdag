-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 05:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdag_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Alta Verapaz'),
(2, 'Baja Verapaz'),
(3, 'Chimaltenango'),
(4, 'Chiquimula'),
(5, 'El Progreso'),
(6, 'Escuintla '),
(7, 'Guatemala'),
(8, 'Huehuetenango'),
(9, 'Izabal'),
(10, 'Jalapa'),
(11, 'Jutiapa'),
(12, 'Petén'),
(13, 'Quetzaltenango'),
(14, 'Quiché'),
(15, 'Retalhuleu'),
(16, 'Sacatepéquez'),
(17, 'San Marcos'),
(18, 'Santa Rosa '),
(19, 'Sololá'),
(20, 'Suchitepéquez'),
(21, 'Totonicapán'),
(22, 'Zacapa');

-- --------------------------------------------------------

--
-- Table structure for table `escolaridad`
--

CREATE TABLE `escolaridad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `escolaridad`
--

INSERT INTO `escolaridad` (`id`, `nombre`) VALUES
(1, 'Primaria'),
(2, 'Secundaria'),
(3, 'Diversificado'),
(4, 'Universidad');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fadn_deporte`
--

CREATE TABLE `fadn_deporte` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fadn_deporte`
--

INSERT INTO `fadn_deporte` (`id`, `nombre`) VALUES
(1, 'Deporte Adaptado'),
(2, 'Federación Deportiva Nacional de Ajedrez'),
(3, 'Federación Deportiva Nacional de Andinismo'),
(4, 'Federación Deportiva Nacional de Atletismo'),
(5, 'Federación Deportiva Nacional de Bádminton'),
(6, 'Federación Deportiva Nacional de Balonmano'),
(7, 'Federación Deportiva Nacional de Baloncesto'),
(8, 'Federación Deportiva Nacional de Béisbol'),
(9, 'Asociación Deportiva Nacional de Billar'),
(10, 'Federación Deportiva Nacional de Boliche'),
(11, 'Federación Deportiva Nacional de Boxeo'),
(12, 'Federación Deportiva Nacional de Ciclismo'),
(13, 'Asociación Deportiva Nacional de Ecuestres'),
(14, 'Federación Deportiva Nacional de Esgrima'),
(15, 'Federación Deportiva Nacional de Físicoculturismo'),
(16, 'Asociación de Frontón de Guatemala'),
(17, 'Federación Deportiva Nacional de Fútbol'),
(18, 'Federación Deportiva Nacional de Gimnasia'),
(19, 'Asociación Deportiva Nacional de Golf'),
(20, 'Asociación Deportiva Nacional de Hockey'),
(21, 'Federación Deportiva Nacional de Judo'),
(22, 'Federación Deportiva Nacional de Karate-Do'),
(23, 'Federación Deportiva Nacional de Levantamiento de Pesas'),
(24, 'Federación Nacional de Levantamiento de Potencia'),
(25, 'Federación Deportiva Nacional de Luchas'),
(26, 'Federación Nacional de Motociclismo'),
(27, 'Federación Deportiva Nacional de Natación'),
(28, 'Asociación Deportiva Nacional de Navegación a Vela'),
(29, 'Asociación Deportiva Nacional de Paracaidismo'),
(30, 'Federación Nacional de Patinaje'),
(31, 'Asociación Deportiva Nacional de Pentatlon Moderno'),
(32, 'Asociación Deportiva Nacional de Pesca Deportiva'),
(33, 'Asociación Deportiva Nacional de Polo'),
(34, 'Asociación Nacional de Raquetbol'),
(35, 'Federación Deportiva Nacional de Remo y Canotaje'),
(36, 'Asociación Deportiva Nacional de Rugby'),
(37, 'Asociación Deportiva Nacional de Sóftbol'),
(38, 'Asociación Deportiva Nacional de Squash'),
(39, 'Asociación Deportiva Nacional de Surf'),
(40, 'Federación Deportiva Nacional de Taekwondo'),
(41, 'Federación Deportiva Nacional de Tenis de Campo'),
(42, 'Federación Deportiva Nacional de Tenis de Mesa'),
(43, 'Asociación Deportiva Nacional de Tiro con Arco'),
(44, 'Asociación Deportiva Nacional de Tiro con Arma de Caza'),
(45, 'Federación Deportiva Nacional de Tiro Deportivo'),
(46, 'Federación Deportiva Nacional de Triatlón'),
(47, 'Federación Deportiva Nacional de Voleibol'),
(48, 'Asociación Deportiva Nacional de Vuelo Libre'),
(49, 'Asociación Deportiva Nacional de Kickboxing');

-- --------------------------------------------------------

--
-- Table structure for table `grupo_objetivo`
--

CREATE TABLE `grupo_objetivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupo_objetivo`
--

INSERT INTO `grupo_objetivo` (`id`, `nombre`) VALUES
(1, 'Árbitro\r\n'),
(2, 'Asesor'),
(3, 'Asistente Técnico'),
(4, 'Colaborador'),
(5, 'Comité Ejecutivo'),
(6, 'Deportistas'),
(7, 'Directivo'),
(8, 'Director'),
(9, 'Director Administrativo'),
(10, 'Director Ejecutivo'),
(11, 'Director Financiero'),
(12, 'Director Técnico'),
(13, 'Dirigente'),
(14, 'Dirigente Deportivo de Comité Ejecutivo'),
(15, 'Docente'),
(16, 'Doctor'),
(17, 'Entrenadores'),
(18, 'Estudiante Universitario'),
(19, 'Fisioterapistas'),
(20, 'Gerente'),
(21, 'Gerente Administrativo'),
(22, 'Gerente Financiero'),
(23, 'Gerente Técnico'),
(24, 'Gerentes'),
(25, 'Junta Directiva'),
(26, 'Metodólogo'),
(27, 'Nutricionista'),
(28, 'Preparadores Físicos'),
(29, 'Presidente'),
(30, 'Presidente Asociación'),
(31, 'Presidente Asociación Chiquimula'),
(32, 'Presidente CDAG'),
(33, 'Presidente de Asociación'),
(34, 'Presidente FADN'),
(35, 'Promotor deportivo'),
(36, 'Psicólogo'),
(37, 'Subgerente'),
(38, 'Técnicos de Estrategia Deportiva'),
(39, 'Técnicos de Evaluación'),
(40, 'Técnicos de las FADN'),
(41, 'Vicepresidente');

-- --------------------------------------------------------

--
-- Table structure for table `identidad_cultural`
--

CREATE TABLE `identidad_cultural` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identidad_cultural`
--

INSERT INTO `identidad_cultural` (`id`, `nombre`) VALUES
(1, 'Ladino/Mestizo'),
(2, 'Maya'),
(3, 'Xinca'),
(4, 'Garífuna');

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE `institucion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `institucion_afin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`id`, `nombre`, `institucion_afin`) VALUES
(1, 'CDAG', 0),
(2, 'COG', 0),
(3, 'CONADER', 0),
(4, 'COPAG', 0),
(5, 'DIGEF', 0),
(6, 'FADN', 0),
(7, 'MICUDE', 0),
(8, 'MINEDUC', 0),
(9, 'MINGOB', 0),
(10, 'USAC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'Sololá', 19),
(2, 'San José Chacayá', 19),
(3, 'Santa María Visitación', 19),
(4, 'Santa Lucía Utatlán', 19),
(5, 'Nahualá', 19),
(6, 'Santa Catarina Ixtahuacán', 19),
(7, 'Santa Clara la Laguna', 19),
(8, 'Concepción', 19),
(9, 'San Andrés Semetabaj', 19),
(10, 'Panajachel', 19),
(11, 'Santa Catarina Palopó', 19),
(12, 'San Antonio Palopó', 19),
(13, 'San Lucas Tolimán', 19),
(14, 'Santa Cruz la Laguna', 19),
(15, 'San Pablo la Laguna', 19),
(16, 'San Marcos la Laguna', 19),
(17, 'San Juan la Laguna', 19),
(18, 'San Pedro la Laguna', 19),
(19, 'Santiago Atitlán', 19),
(20, 'Mazatenango', 20),
(21, 'Cuyotenango', 20),
(22, 'San Francisco Zapotitlán', 20),
(23, 'San Bernardino', 20),
(24, 'San José el Idolo', 20),
(25, 'Santo Domingo Suchitepéquez', 20),
(26, 'San Lorenzo', 20),
(27, 'Samayac', 20),
(28, 'San Pablo Jocopilas', 20),
(29, 'San Antonio Suchitepéquez', 20),
(30, 'San Miguel Panán', 20),
(31, 'San Gabriel', 20),
(32, 'Chicacao', 20),
(33, 'Patulul', 20),
(34, 'Santa Bárbara', 20),
(35, 'San Juan Bautista', 20),
(36, 'Santo Tomás la Unión', 20),
(37, 'Zunilito', 20),
(38, 'Pueblo Nuevo', 20),
(39, 'Río Bravo', 20),
(40, 'San José La Máquina', 20),
(41, 'Totonicapán', 21),
(42, 'San Cristóbal Totonicapán', 21),
(43, 'San Francisco el Alto', 21),
(44, 'San Andrés Xecul', 21),
(45, 'Momostenango', 21),
(46, 'Santa María Chiquimula', 21),
(47, 'Santa Lucía la Reforma', 21),
(48, 'San Bartolo', 21),
(49, 'Zacapa', 22),
(50, 'Estanzuela', 22),
(51, 'Río Hondo', 22),
(52, 'Gualán', 22),
(53, 'Teculután', 22),
(54, 'Usumatlán', 22),
(55, 'Cabañas', 22),
(56, 'San Diego', 22),
(57, 'La Unión', 22),
(58, 'Huité', 22),
(59, 'San Jorge', 22),
(60, 'Cobán', 1),
(61, 'Santa Cruz Verapaz', 1),
(62, 'San Cristóbal Verapaz', 1),
(63, 'Tactic', 1),
(64, 'Tamahú', 1),
(65, 'San Miguel Tucurú', 1),
(66, 'Panzóz', 1),
(67, 'Senahú', 1),
(68, 'San Pedro Carchá', 1),
(69, 'San Juan Chamelco', 1),
(70, 'San Agustín Lanquín', 1),
(71, 'Santa María Cahabón', 1),
(72, 'Chisec', 1),
(73, 'Chahal', 1),
(74, 'Fray Bartolomé de las Casas', 1),
(75, 'Santa Catalina La Tinta', 1),
(76, 'Raxruhá', 1),
(77, 'Salamá', 2),
(78, 'San Miguel Chicaj', 2),
(79, 'Rabinal', 2),
(80, 'Cubulco', 2),
(81, 'Granados', 2),
(82, 'Santa Cruz el Chol', 2),
(83, 'San Jerónimo', 2),
(84, 'Purulhá', 2),
(85, 'Chimaltenango ', 3),
(86, 'San José Poaquil', 3),
(87, 'San Martín Jilotepeque', 3),
(88, 'San Juan Comalapa', 3),
(89, 'Santa Apolonia', 3),
(90, 'Tecpán', 3),
(91, 'Patzún', 3),
(92, 'San Miguel Pochuta', 3),
(93, 'Patzicía', 3),
(94, 'Santa Cruz Balanyá', 3),
(95, 'Acatenango', 3),
(96, 'San Pedro Yepocapa', 3),
(97, 'San Andrés Itzapa', 3),
(98, 'Parramos', 3),
(99, 'Zaragoza', 3),
(100, 'El Tejar', 3),
(102, 'Chiquimula', 4),
(103, 'Jocotán', 4),
(104, 'Esquipulas', 4),
(105, 'Camotán', 4),
(106, 'Quezaltepeque', 4),
(107, 'Olopa', 4),
(108, 'Ipala', 4),
(109, 'San Juan Ermita', 4),
(110, 'Concepción Las Minas', 4),
(111, 'San Jacinto', 4),
(112, 'San José la Arada', 4),
(113, 'El Jícaro', 5),
(114, 'Morazán', 5),
(115, 'San Agustín Acasaguastlán', 5),
(116, 'San Antonio La Paz', 5),
(117, 'San Cristóbal Acasaguastlán', 5),
(118, 'Sanarate', 5),
(119, 'Guastatoya', 5),
(120, 'Sansare', 5),
(121, 'Escuintla', 6),
(122, 'Santa Lucía Cotzumalguapa', 6),
(123, 'La Democracia', 6),
(124, 'Siquinalá', 6),
(125, 'Masagua', 6),
(126, 'Tiquisate', 6),
(127, 'La Gomera', 6),
(128, 'Guaganazapa', 6),
(129, 'San José', 6),
(130, 'Iztapa', 6),
(131, 'Palín', 6),
(132, 'San Vicente Pacaya', 6),
(133, 'Nueva Concepción', 6),
(134, 'Santa Catarina Pinula', 7),
(135, 'San José Pinula', 7),
(136, 'Guatemala', 7),
(137, 'San José del Golfo', 7),
(138, 'Palencia', 7),
(139, 'Chinautla', 7),
(140, 'San Pedro Ayampuc', 7),
(141, 'Mixco', 7),
(142, 'San Pedro Sacatapéquez', 7),
(143, 'San Juan Sacatepéquez', 7),
(144, 'Chuarrancho', 7),
(145, 'San Raymundo', 7),
(146, 'Fraijanes', 7),
(147, 'Amatitlán', 7),
(148, 'Villa Nueva', 7),
(149, 'Villa Canales', 7),
(150, 'San Miguel Petapa', 7),
(151, 'Huehuetenango', 8),
(152, 'Chiantla', 8),
(153, 'Malacatancito', 8),
(154, 'Cuilco', 8),
(155, 'Nentón', 8),
(156, 'San Pedro Necta', 8),
(157, 'Jacaltenango', 8),
(158, 'Soloma', 8),
(159, 'Ixtahuacán', 8),
(160, 'Santa Bárbara', 8),
(161, 'La Libertad', 8),
(162, 'La Democracia', 8),
(163, 'San Miguel Acatán', 8),
(164, 'San Rafael la Independencia', 8),
(165, 'Todos Santos Cuchumatán', 8),
(166, 'San Juan Atitán', 8),
(167, 'Santa Eulalia', 8),
(168, 'San Mateo Ixtatán', 8),
(169, 'Colotenango', 8),
(170, 'San Sebastián Huehuetenango', 8),
(171, 'Tectitán', 8),
(172, 'Concepción Huista', 8),
(173, 'San Juan Ixcoy', 8),
(174, 'San Antonio Huista', 8),
(175, 'San Sebastián Coatán', 8),
(176, 'Santa Cruz Barillas', 8),
(177, 'Aguacatán', 8),
(178, 'San Rafael Petzal', 8),
(179, 'San Gaspar Ixchil', 8),
(180, 'Santiago Chimaltenango', 8),
(181, 'Santa Ana Huista', 8),
(182, 'Morales', 9),
(183, 'Los Amates', 9),
(184, 'Livingston', 9),
(185, 'El Estor', 9),
(186, 'Puerto Barrios', 9),
(187, 'Jalapa', 10),
(188, 'San Pedro Pinula', 10),
(189, 'San Luis Jilotepeque', 10),
(190, 'San Manuel Chaparrón', 10),
(191, 'San Carlos Alzatate', 10),
(192, 'Monjas', 10),
(193, 'Mataquescuintla', 10),
(194, 'Jutiapa', 11),
(195, 'El Progreso', 11),
(196, 'Santa Catarina Mita', 11),
(197, 'Agua Blanca', 11),
(198, 'Asunción Mita', 11),
(199, 'Yupiltepeque', 11),
(200, 'Atescatempa', 11),
(201, 'Jerez', 11),
(202, 'El Adelanto', 11),
(203, 'Santa Bárbara', 11),
(204, 'La Libertad', 11),
(205, 'La Democracia', 11),
(206, 'San Miguel Acatán', 11),
(207, 'San Rafael la Independencia', 11),
(208, 'Todos Santos Cuchumatán', 11),
(209, 'San Juan Atitán', 11),
(210, 'Santa Eulalia', 11),
(211, 'Flores', 12),
(212, 'San José', 12),
(213, 'San Benito', 12),
(214, 'San Andrés', 12),
(215, 'La Libertad', 12),
(216, 'San Francisco', 12),
(217, 'Santa Ana', 12),
(218, 'Dolores', 12),
(219, 'San Luis', 12),
(220, 'Sayaxché', 12),
(221, 'Melchor de Mencos', 12),
(222, 'Poptún', 12),
(223, 'Quetzaltenango', 13),
(224, 'Salcajá', 13),
(225, 'San Juan Olintepeque', 13),
(226, 'San Carlos Sija', 13),
(227, 'Sibilia', 13),
(228, 'Cabricán', 13),
(229, 'Cajolá', 13),
(230, 'San Miguel Siguilá', 13),
(231, 'San Juan Ostuncalco', 13),
(232, 'San Mateo', 13),
(233, 'Concepción Chiquirichapa', 13),
(234, 'San Martín Sacatepéquez', 13),
(235, 'Almolonga', 13),
(236, 'Cantel', 13),
(237, 'Huitán', 13),
(238, 'Zunil', 13),
(239, 'Colomba Costa Cuca', 13),
(240, 'San Francisco La Unión', 13),
(241, 'El Palmar', 13),
(242, 'Coatepeque', 13),
(243, 'Génova', 13),
(244, 'Flores Costa Cuca', 13),
(245, 'La Esperanza', 13),
(246, 'Palestina de Los Altos', 13),
(247, 'Santa Cruz del Quiché', 14),
(248, 'Chiché', 14),
(249, 'Chinique', 14),
(250, 'Zacualpa', 14),
(251, 'Chajul', 14),
(252, 'Chichicastenango', 14),
(253, 'Patzité', 14),
(254, 'San Antonio Ilotenango', 14),
(255, 'San Pedro Jocopilas', 14),
(256, 'Cunén', 14),
(257, 'San Juan Cotzal', 14),
(258, 'Joyabaj', 14),
(259, 'Nebaj', 14),
(260, 'San Andrés Sajcabajá', 14),
(261, 'Uspantán', 14),
(262, 'Sacapulas', 14),
(263, 'San Bartolomé Jocotenango', 14),
(264, 'Canillá', 14),
(265, 'Chicamán', 14),
(266, 'Ixcán', 14),
(267, 'Pachalum', 14),
(268, 'Retalhuleu', 15),
(269, 'San Sebastián', 15),
(270, 'Santa Cruz Muluá', 15),
(271, 'San Martín Zapotitlán', 15),
(272, 'San Felipe', 15),
(273, 'San Andrés Villa Seca', 15),
(274, 'Champerico', 15),
(275, 'Nuevo San Carlos', 15),
(276, 'El Asintal', 15),
(277, 'Antigua Guatemala', 16),
(278, 'Jocotenango', 16),
(279, 'Pastores', 16),
(280, 'Sumpango', 16),
(281, 'Santo Domingo Xenacoj', 16),
(282, 'Santiago Sacatepéquez', 16),
(283, 'San Bartolomé Milpas Altas', 16),
(284, 'San Lucas Sacatepéquez', 16),
(285, 'Santa Lucía Milpas Altas', 16),
(286, 'Magdalena Milpas Altas', 16),
(287, 'Santa María de Jesús', 16),
(288, 'Ciudad Vieja', 16),
(289, 'San Miguel Dueñas', 16),
(290, 'Alotenango', 16),
(291, 'San Antonio Aguas Calientes', 16),
(292, 'Santa Catarina Barahona', 16),
(293, 'San Marcos', 17),
(294, 'San Pedro Sacatepéquez', 17),
(295, 'San Antonio Sacatepéquez', 17),
(296, 'Comitancillo', 17),
(297, 'San Miguel Ixtahuacán', 17),
(298, 'Concepción Tutuapa', 17),
(299, 'Tacaná', 17),
(300, 'Sibinal', 17),
(301, 'Tajumulco', 17),
(302, 'Tejutla', 17),
(303, 'San Rafael Pié de la Cuesta', 17),
(304, 'Nuevo Progreso', 17),
(305, 'El Tumbador', 17),
(306, 'El Rodeo', 17),
(307, 'Malacatán', 17),
(308, 'Catarina', 17),
(309, 'Ayutla', 17),
(310, 'Ocós', 17),
(311, 'San Pablo', 17),
(312, 'El Quetzal', 17),
(313, 'La Reforma', 17),
(314, 'Pajapita', 17),
(315, 'Ixchiguán', 17),
(316, 'San José Ojetenán', 17),
(317, 'San Cristóbal Cucho', 17),
(318, 'Sipacapa', 17),
(319, 'Esquipulas Palo Gordo', 17),
(320, 'Río Blanco', 17),
(321, 'San Lorenzo', 17),
(322, 'La Blanca', 17),
(323, 'Cuilapa', 18),
(324, 'Barberena', 18),
(325, 'Santa Rosa de Lima', 18),
(326, 'Casillas', 18),
(327, 'San Rafael las Flores', 18),
(328, 'Oratorio', 18),
(329, 'San Juan Tecuaco', 18),
(330, 'Chiquimulilla', 18),
(331, 'Taxisco', 18),
(332, 'Santa María Ixhuatán', 18),
(333, 'Guazacapán', 18),
(334, 'Santa Cruz Naranjo', 18),
(335, 'Pueblo Nuevo Viñas', 18),
(336, 'Nueva Santa Rosa', 18),
(337, 'Unión Cantinil', 8),
(338, 'Las Cruces', 12);

-- --------------------------------------------------------

--
-- Table structure for table `participante`
--

CREATE TABLE `participante` (
  `dpi_cui` varchar(13) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `grupo_objetivo_id` int(11) NOT NULL,
  `correo_electronico` varchar(250) NOT NULL,
  `celular` varchar(8) NOT NULL,
  `FADN_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `identidad_cultural_id` int(11) NOT NULL,
  `escolaridad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registro_evento`
--

CREATE TABLE `registro_evento` (
  `id` int(11) NOT NULL,
  `participante_id` varchar(13) NOT NULL,
  `evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_evento`
--

INSERT INTO `tipo_evento` (`id`, `nombre`) VALUES
(1, 'Curso'),
(2, 'Diplomado'),
(3, 'Taller'),
(4, 'Conferencia'),
(5, 'Seminario'),
(6, 'Foro'),
(7, 'Precongreso'),
(8, 'Congreso');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escolaridad`
--
ALTER TABLE `escolaridad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_evento_id` (`tipo_evento_id`);

--
-- Indexes for table `fadn_deporte`
--
ALTER TABLE `fadn_deporte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupo_objetivo`
--
ALTER TABLE `grupo_objetivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identidad_cultural`
--
ALTER TABLE `identidad_cultural`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indexes for table `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`dpi_cui`),
  ADD KEY `FADN_id` (`FADN_id`),
  ADD KEY `departamento_id` (`departamento_id`),
  ADD KEY `institucion_id` (`institucion_id`),
  ADD KEY `identidad_cultural_id` (`identidad_cultural_id`),
  ADD KEY `grupo_objetivo_id` (`grupo_objetivo_id`),
  ADD KEY `escolaridad_id` (`escolaridad_id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indexes for table `registro_evento`
--
ALTER TABLE `registro_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participante_id` (`participante_id`),
  ADD KEY `evento_id` (`evento_id`);

--
-- Indexes for table `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `escolaridad`
--
ALTER TABLE `escolaridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fadn_deporte`
--
ALTER TABLE `fadn_deporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `grupo_objetivo`
--
ALTER TABLE `grupo_objetivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `identidad_cultural`
--
ALTER TABLE `identidad_cultural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `registro_evento`
--
ALTER TABLE `registro_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`tipo_evento_id`) REFERENCES `tipo_evento` (`id`);

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`);

--
-- Constraints for table `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`FADN_id`) REFERENCES `fadn_deporte` (`id`),
  ADD CONSTRAINT `participante_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `participante_ibfk_3` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id`),
  ADD CONSTRAINT `participante_ibfk_4` FOREIGN KEY (`identidad_cultural_id`) REFERENCES `identidad_cultural` (`id`),
  ADD CONSTRAINT `participante_ibfk_5` FOREIGN KEY (`grupo_objetivo_id`) REFERENCES `grupo_objetivo` (`id`),
  ADD CONSTRAINT `participante_ibfk_6` FOREIGN KEY (`escolaridad_id`) REFERENCES `escolaridad` (`id`),
  ADD CONSTRAINT `participante_ibfk_7` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`);

--
-- Constraints for table `registro_evento`
--
ALTER TABLE `registro_evento`
  ADD CONSTRAINT `registro_evento_ibfk_1` FOREIGN KEY (`participante_id`) REFERENCES `participante` (`dpi_cui`),
  ADD CONSTRAINT `registro_evento_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`tipo_evento_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
