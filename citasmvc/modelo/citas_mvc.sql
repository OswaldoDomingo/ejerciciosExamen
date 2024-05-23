-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2024 a las 18:04:21
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citas_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `acceso_id` int NOT NULL,
  `acceso_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`acceso_id`, `acceso_nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `citas_id` int NOT NULL,
  `citas_usuario` int DEFAULT NULL,
  `citas_texto` text NOT NULL,
  `citas_fuente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`citas_id`, `citas_usuario`, `citas_texto`, `citas_fuente`) VALUES
(1, 1, 'El conocimiento es poder.', 'Francis Bacon'),
(2, 2, 'La vida es lo que sucede mientras estás ocupado haciendo otros planes.', 'John Lennon'),
(3, 3, 'La única forma de hacer un gran trabajo es amar lo que haces.', 'Steve Jobs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `localidad_id` int NOT NULL,
  `localidad_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`localidad_id`, `localidad_nombre`) VALUES
(1, 'Valencia'),
(2, 'Gandía'),
(3, 'Castellón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `usuario_edad` int NOT NULL,
  `usuario_imagen` varchar(255) DEFAULT NULL,
  `usuario_acceso` int DEFAULT NULL,
  `usuario_localidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_edad`, `usuario_imagen`, `usuario_acceso`, `usuario_localidad`) VALUES
(1, 'Oswaldo Domingo', 30, 'oswaldo.png', 1, 1),
(2, 'Ana Gómez', 25, 'ana.png', 2, 2),
(3, 'Carlos Ruiz', 35, 'carlos.png', 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`acceso_id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`citas_id`),
  ADD KEY `citas_usuario` (`citas_usuario`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`localidad_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `usuario_acceso` (`usuario_acceso`),
  ADD KEY `usuario_localidad` (`usuario_localidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `acceso_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `citas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `localidad_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`citas_usuario`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usuario_acceso`) REFERENCES `acceso` (`acceso_id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`usuario_localidad`) REFERENCES `localidad` (`localidad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
