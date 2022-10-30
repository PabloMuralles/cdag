-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2022 a las 01:08:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cdag_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fadn_deporte`
--

CREATE TABLE `fadn_deporte` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fadn_deporte`
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
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `dpi_cui` varchar(13) NOT NULL,
  `nombre_completo` varchar(250) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `institucion` varchar(250) NOT NULL,
  `grupo_objetivo` varchar(250) NOT NULL,
  `correo_electronico` varchar(250) NOT NULL,
  `celular` varchar(8) NOT NULL,
  `FADN_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_evento`
--

CREATE TABLE `registro_evento` (
  `id` int(11) NOT NULL,
  `participante_id` varchar(13) NOT NULL,
  `evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fadn_deporte`
--
ALTER TABLE `fadn_deporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`dpi_cui`),
  ADD KEY `FADN_id` (`FADN_id`);

--
-- Indices de la tabla `registro_evento`
--
ALTER TABLE `registro_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participante_id` (`participante_id`),
  ADD KEY `evento_id` (`evento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fadn_deporte`
--
ALTER TABLE `fadn_deporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `registro_evento`
--
ALTER TABLE `registro_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`FADN_id`) REFERENCES `fadn_deporte` (`id`);

--
-- Filtros para la tabla `registro_evento`
--
ALTER TABLE `registro_evento`
  ADD CONSTRAINT `registro_evento_ibfk_1` FOREIGN KEY (`participante_id`) REFERENCES `participante` (`dpi_cui`),
  ADD CONSTRAINT `registro_evento_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
