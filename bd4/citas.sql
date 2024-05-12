-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2024 a las 16:36:35
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
-- Base de datos: `citas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `cita_id` int NOT NULL,
  `cita_texto` text NOT NULL,
  `cita_usuario` int DEFAULT NULL,
  `cita_autor` varchar(255) DEFAULT NULL,
  `cita_visible` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`cita_id`, `cita_texto`, `cita_usuario`, `cita_autor`, `cita_visible`) VALUES
(101, 'La única manera de ganar una discusión es evitarla.', 5, 'Dale Carnegie', 1),
(102, 'Un hombre puede tener la razón en teoría, pero equivocarse en la práctica.', 6, 'Dale Carnegie', 1),
(103, 'Desarrolle un interés genuino en las otras personas.', 7, 'Dale Carnegie', 1),
(104, 'Sonríe, ¡es contagioso!', 8, 'Dale Carnegie', 1),
(105, 'Recuerda que el nombre de una persona es para ella el sonido más dulce e importante en cualquier idioma.', 5, 'Dale Carnegie', 1),
(106, 'Sea un buen oyente. Anime a los demás a hablar de sí mismos.', 6, 'Dale Carnegie', 1),
(107, 'Hable en función de los intereses de la otra persona.', 7, 'Dale Carnegie', 1),
(108, 'Nunca critique, condene o se queje.', 8, 'Dale Carnegie', 1),
(109, 'Exprese aprecio honesto y sincero.', 5, 'Dale Carnegie', 1),
(110, 'Despierte en la otra persona un deseo ferviente.', 6, 'Dale Carnegie', 1),
(111, 'Comience de manera amistosa.', 7, 'Dale Carnegie', 1),
(112, 'La única manera de ganar una discusión es evitarla.', 8, 'Dale Carnegie', 1),
(113, 'Muestre respeto por las opiniones de la otra persona. Nunca diga \'Estás equivocado\'.', 5, 'Dale Carnegie', 1),
(114, 'Si te equivocas, admítelo rápida y enfáticamente.', 6, 'Dale Carnegie', 1),
(115, 'Haga preguntas en lugar de dar órdenes directas.', 7, 'Dale Carnegie', 1),
(116, 'Haga que la otra persona sienta que la idea es suya.', 8, 'Dale Carnegie', 1),
(117, 'Trate honestamente de ver las cosas desde el punto de vista de la otra persona.', 5, 'Dale Carnegie', 1),
(118, 'Simpatiza con las ideas y deseos de la otra persona.', 6, 'Dale Carnegie', 1),
(119, 'Apel a los motivos más nobles.', 7, 'Dale Carnegie', 1),
(120, 'Pinte una imagen del futuro que la otra persona deseará.', 8, 'Dale Carnegie', 1),
(121, 'La única manera de ganar una discusión es evitarla.', 5, 'Dale Carnegie', 2),
(122, 'Un hombre puede tener la razón en teoría, pero equivocarse en la práctica.', 6, 'Dale Carnegie', 2),
(123, 'Desarrolle un interés genuino en las otras personas.', 7, 'Dale Carnegie', 2),
(124, 'Sonríe, ¡es contagioso!', 8, 'Dale Carnegie', 2),
(125, 'Recuerda que el nombre de una persona es para ella el sonido más dulce e importante en cualquier idioma.', 5, 'Dale Carnegie', 2),
(126, 'Sea un buen oyente. Anime a los demás a hablar de sí mismos.', 6, 'Dale Carnegie', 2),
(127, 'Hable en función de los intereses de la otra persona.', 7, 'Dale Carnegie', 2),
(128, 'Nunca critique, condene o se queje.', 8, 'Dale Carnegie', 2),
(129, 'Exprese aprecio honesto y sincero.', 5, 'Dale Carnegie', 2),
(130, 'Despierte en la otra persona un deseo ferviente.', 6, 'Dale Carnegie', 2),
(131, 'Comience de manera amistosa.', 7, 'Dale Carnegie', 2),
(132, 'La única manera de ganar una discusión es evitarla.', 8, 'Dale Carnegie', 2),
(133, 'Muestre respeto por las opiniones de la otra persona. Nunca diga \'Estás equivocado\'.', 5, 'Dale Carnegie', 2),
(134, 'Si te equivocas, admítelo rápida y enfáticamente.', 6, 'Dale Carnegie', 2),
(135, 'Haga preguntas en lugar de dar órdenes directas.', 7, 'Dale Carnegie', 1),
(136, 'Haga que la otra persona sienta que la idea es suya.', 8, 'Dale Carnegie', 1),
(137, 'Trate honestamente de ver las cosas desde el punto de vista de la otra persona.', 5, 'Dale Carnegie', 1),
(138, 'Simpatiza con las ideas y deseos de la otra persona.', 6, 'Dale Carnegie', 1),
(139, 'Apel a los motivos más nobles.', 7, 'Dale Carnegie', 1),
(140, 'Pinte una imagen del futuro que la otra persona deseará.', 8, 'Dale Carnegie', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `nivel_id` int NOT NULL,
  `nivel_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`nivel_id`, `nivel_nombre`) VALUES
(1, 'Administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `usuario_correo` varchar(255) NOT NULL,
  `usuario_password` varchar(255) NOT NULL,
  `usuario_imagen` varchar(255) DEFAULT NULL,
  `usuario_nivel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_correo`, `usuario_password`, `usuario_imagen`, `usuario_nivel`) VALUES
(5, 'Oswaldo', 'oswaldo@example.com', 'contraseña1', NULL, 2),
(6, 'María', 'maria@example.com', 'contraseña2', NULL, 2),
(7, 'Manuel', 'manuel@example.com', 'contraseña3', NULL, 2),
(8, 'Irene', 'irene@example.com', 'contraseña4', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visible`
--

CREATE TABLE `visible` (
  `visible_id` int NOT NULL,
  `visible_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `visible`
--

INSERT INTO `visible` (`visible_id`, `visible_nombre`) VALUES
(1, 'privada'),
(2, 'publica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`cita_id`),
  ADD KEY `cita_usuario` (`cita_usuario`),
  ADD KEY `cita_visible` (`cita_visible`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`nivel_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `usuario_nivel` (`usuario_nivel`);

--
-- Indices de la tabla `visible`
--
ALTER TABLE `visible`
  ADD PRIMARY KEY (`visible_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `cita_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `nivel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `visible`
--
ALTER TABLE `visible`
  MODIFY `visible_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`cita_usuario`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`cita_visible`) REFERENCES `visible` (`visible_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usuario_nivel`) REFERENCES `nivel` (`nivel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
