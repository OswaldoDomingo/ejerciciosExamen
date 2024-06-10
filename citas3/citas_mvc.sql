-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2024 a las 18:27:00
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
  `citas_fuente` varchar(255) DEFAULT NULL,
  `citas_tipo` int NOT NULL COMMENT 'Cita pública o privada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`citas_id`, `citas_usuario`, `citas_texto`, `citas_fuente`, `citas_tipo`) VALUES
(1, 1, 'El conocimiento es poder.', 'Francis Bacon', 2),
(2, 2, 'La vida es lo que sucede mientras estás ocupado haciendo otros planes.', 'John Lennon', 2),
(3, 3, 'La única forma de hacer un gran trabajo es amar lo que haces.', 'Steve Jobs', 2),
(4, 1, 'Existen dos posibilidades:\r\no estamos solos\r\nen el Universo\r\no no lo estamos.\r\nAmbas son igualmente aterradoras.', 'Arthur C Clarke', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `tipo_id` int NOT NULL,
  `tipo_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`tipo_id`, `tipo_nombre`) VALUES
(1, 'privada'),
(2, 'publica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `usuario_edad` date NOT NULL,
  `usuario_imagen` varchar(255) DEFAULT NULL,
  `usuario_acceso` int DEFAULT NULL,
  `usuario_correo` varchar(255) NOT NULL,
  `usuario_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_edad`, `usuario_imagen`, `usuario_acceso`, `usuario_correo`, `usuario_pass`) VALUES
(1, 'Oswaldo', '1963-08-27', 'oswaldo.png', 1, 'correo0@correo.es', '$2y$10$e0NRnZ1zLRg9TbVZ2O68puPvV6Lk8uZG2XHzR4FW59A93S1FWQnZC'),
(2, 'Ana Gómez', '1963-08-27', 'ana.png', 2, 'correo1@correo.es', '$2y$10$e0NRnZ1zLRg9TbVZ2O68puPvV6Lk8uZG2XHzR4FW59A93S1FWQnZC'),
(3, 'Carlos Ruiz', '1963-08-27', 'carlos.png', 2, 'correo2@correo.es', '$2y$10$e0NRnZ1zLRg9TbVZ2O68puPvV6Lk8uZG2XHzR4FW59A93S1FWQnZC'),
(4, 'Oswaldo Domingo', '1963-08-27', 'arrozh.jpg', 2, 'oswaldomingo@gmail.com', '$2y$10$e0NRnZ1zLRg9TbVZ2O68puPvV6Lk8uZG2XHzR4FW59A93S1FWQnZC'),
(5, 'Oswaldo Domingo', '1963-08-27', 'espaguetipimenta.jpg', 2, 'oswaldomingo@gmail.com', '$2y$10$e0NRnZ1zLRg9TbVZ2O68puPvV6Lk8uZG2XHzR4FW59A93S1FWQnZC'),
(6, 'Oswaldo Domingo', '1963-08-27', 'espaguetipimenta.jpg', 2, 'oswaldomingo@gmail.com', '$2y$10$e0NRnZ1zLRg9TbVZ2O68puPvV6Lk8uZG2XHzR4FW59A93S1FWQnZC');

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
  ADD KEY `citas_usuario` (`citas_usuario`),
  ADD KEY `citas_tipo` (`citas_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tipo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `usuario_acceso` (`usuario_acceso`);

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
  MODIFY `citas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`citas_usuario`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`citas_tipo`) REFERENCES `tipo` (`tipo_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usuario_acceso`) REFERENCES `acceso` (`acceso_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
