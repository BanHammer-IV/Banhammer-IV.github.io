-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 08:48:50
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locaciones`
--
ALTER TABLE `locaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locaciones`
--
ALTER TABLE `locaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
