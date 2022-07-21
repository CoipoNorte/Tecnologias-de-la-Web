-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2021 a las 06:19:04
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_`
--

CREATE TABLE `productos_` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio` int(10) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_`
--

INSERT INTO `productos_` (`id`, `nombre`, `precio`, `imagen`, `categoria`, `descripcion`) VALUES
(1, 'nom', 101, 'img', 'cat', 'des'),
(2, 'nom', 200, 'img', 'cat', 'des'),
(3, 'nom', 300, 'img', 'cat', 'des'),
(4, 'nom', 400, 'img', 'cat', 'des'),
(5, 'nom', 500, 'img', 'cat', 'des'),
(123, 'Manjaro', 12345, './fondos/Manjaro.png', 'SO', 'Bonito');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos_`
--
ALTER TABLE `productos_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos_`
--
ALTER TABLE `productos_`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
