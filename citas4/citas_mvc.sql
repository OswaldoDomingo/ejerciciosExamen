-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2024 a las 10:18:40
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
(3, 3, 'La única forma de hacer un gran trabajo es amar lo que haces.', 'Steve Jobs', 2),
(4, 1, 'Existen dos posibilidades:\r\no estamos solos\r\nen el Universo\r\no no lo estamos.\r\nAmbas son igualmente aterradoras.', 'Arthur C Clarke', 2),
(5, 8, 'La casa por el tejado', 'Anónimo', 2),
(6, 8, 'El sabio no dice todo lo que piensa, pero siempre piensa todo lo que dice.', 'Aristóteles (384 AC-322 AC) Filósofo griego.', 2),
(7, 8, 'Tenemos dos orejas y una sola boca, justamente para oír más y hablar menos', 'Zenón de Citio', 1),
(8, 8, 'Es extraño que sólo las personas extraordinarios hagan descubrimientos que luego aparecen de manera fácil y sencilla', 'Georg Lichtenberg', 1),
(9, 8, 'La vida es lo que sucede cuando estás ocupado haciendo otros planes.', 'John Lennon', 2);

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
  `usuario_acceso` int DEFAULT NULL,
  `usuario_correo` varchar(255) NOT NULL,
  `usuario_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_edad`, `usuario_acceso`, `usuario_correo`, `usuario_pass`) VALUES
(1, 'Oswaldo', '1963-08-27', 1, 'correo0@correo.es', '$2y$10$cn/C0AyjVANXlKiuAXU3heM/tnURHbBFQQYhNrgy903TqIfX3p/32'),
(3, 'Carlos Ruiz', '1963-08-27', 2, 'correo2@correo.es', '$2y$10$cn/C0AyjVANXlKiuAXU3heM/tnURHbBFQQYhNrgy903TqIfX3p/32'),
(6, 'Oswaldo Domingo', '1963-08-27', 2, 'oswaldomingo@gmail.com', '$2y$10$cn/C0AyjVANXlKiuAXU3heM/tnURHbBFQQYhNrgy903TqIfX3p/32'),
(8, 'Oswal', '1970-08-27', 2, 'oswaldomingo@gmail.com', '$2y$10$cn/C0AyjVANXlKiuAXU3heM/tnURHbBFQQYhNrgy903TqIfX3p/32');

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
  MODIFY `citas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`citas_usuario`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE,
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
