-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 08:46:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_tie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `puesto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `usuario`, `pass`, `puesto`) VALUES
(2, 'carlos', 'CarlosYZR', '123', 'Gerente'),
(3, 'ivan', 'Isaac', '123', 'conserje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locaciones`
--

CREATE TABLE `locaciones` (
  `id` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `apertura` time NOT NULL,
  `cierre` time NOT NULL,
  `cantidad_salas` varchar(100) NOT NULL,
  `peliculas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `locaciones`
--

INSERT INTO `locaciones` (`id`, `direccion`, `apertura`, `cierre`, `cantidad_salas`, `peliculas`) VALUES
(1, 'obregon', '12:30:00', '23:00:00', '20', 'Kung-fu panda, blancanieves, avengers'),
(2, '21 de marzo', '13:30:00', '01:20:00', '10', 'blancanieves, yugioh'),
(3, 'patria', '21:40:00', '12:00:00', '40', 'yugioh, kung-fu panda, avengers');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `director` varchar(30) DEFAULT NULL,
  `clasificacion` varchar(30) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `salas` varchar(30) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `estreno` date DEFAULT NULL,
  `idiomas` varchar(50) DEFAULT NULL,
  `trailer` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `inicio` datetime NOT NULL,
  `finalizacion` datetime NOT NULL,
  `precio` float NOT NULL,
  `contenido` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `telefono`, `correo`, `nacimiento`, `usuario`, `pass`, `metodo_pago`) VALUES
(1, 'carlos', '6673337049', 'carlos@gmail.com', '2023-11-29', 'CarlosYZR', '123', 'Paypal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locaciones`
--
ALTER TABLE `locaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `locaciones`
--
ALTER TABLE `locaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
