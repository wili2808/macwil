-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2017 a las 09:53:40
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ci_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `edicion` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `editorial` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `anio` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `stock_minimo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(1, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos_cabecera`
--

CREATE TABLE `prestamos_cabecera` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_retiro` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `socio_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos_detalle`
--

CREATE TABLE `prestamos_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `prestamo_id` int(10) UNSIGNED NOT NULL,
  `libro_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `dias_prestamos` int(11) NOT NULL,
  `usuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `apellido`, `dias_prestamos`, `usuario`, `pass`, `perfil_id`) VALUES
(1, 'car', 'car', 5, 'car', 'Y2Fy', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos_cabecera`
--
ALTER TABLE `prestamos_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prestamo_socio` (`socio_id`);

--
-- Indices de la tabla `prestamos_detalle`
--
ALTER TABLE `prestamos_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_detalle_cabecera` (`prestamo_id`),
  ADD KEY `FK_detalle_libro` (`libro_id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `prestamos_cabecera`
--
ALTER TABLE `prestamos_cabecera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prestamos_detalle`
--
ALTER TABLE `prestamos_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos_cabecera`
--
ALTER TABLE `prestamos_cabecera`
  ADD CONSTRAINT `FK_prestamo_socio` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`);

--
-- Filtros para la tabla `prestamos_detalle`
--
ALTER TABLE `prestamos_detalle`
  ADD CONSTRAINT `FK_detalle_cabecera` FOREIGN KEY (`prestamo_id`) REFERENCES `prestamos_cabecera` (`id`),
  ADD CONSTRAINT `FK_detalle_libro` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
