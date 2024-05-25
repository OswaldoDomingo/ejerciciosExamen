-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2023 a las 16:43:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listalibros`
--

CREATE TABLE `listalibros` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `autor` varchar(40) NOT NULL,
  `editorial` varchar(30) NOT NULL,
  `anyo` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `listalibros`
--

INSERT INTO `listalibros` (`idLibro`, `titulo`, `autor`, `editorial`, `anyo`) VALUES
(1, 'Tokio blues', 'Haruki Murakami', 'Tusquets Editores S.A.', 1987),
(2, 'La desaparición de Stephanie Mailer', 'Joël Dicker', 'Alfaguara', 2018),
(3, 'El imperio final', 'Brandon Sanderson', 'S.A. Ediciones B', 2006),
(4, 'El nombre del viento', 'Patrick Rothfuss', 'Plaza & Janes Editores', 2007),
(5, 'El enigma de la habitación 622', 'Joël Dicker', 'Alfaguara', 2020),
(6, 'La chica del tren', 'Paula Hawkins', 'Planeta', 2015),
(7, 'After Dark', 'Haruki Murakami', 'Tusquets Editores S.A.', 2004),
(8, 'El pozo de la ascensión', 'Brandon Sanderson', 'S.A. Ediciones B', 2007),
(9, 'El temor de un hombre sabio', 'Patrick Rothfuss', 'Plaza & Janes Editores', 2011);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `nombreUsuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contrasenya` varchar(256) NOT NULL,
  `nivel_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listalibros`
--
ALTER TABLE `listalibros`
  ADD PRIMARY KEY (`idLibro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `uk_nombreUsuario` (`nombreUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listalibros`
--
ALTER TABLE `listalibros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
