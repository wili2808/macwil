-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2017 a las 04:42:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ci_macwil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `motivo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mensaje` varchar(600) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `eliminado` varchar(2) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `apellido`, `email`, `telefono`, `motivo`, `imagen`, `mensaje`, `fecha`, `eliminado`) VALUES
(1, 'juan', 'Gimenez', 'juan@gmail.com', 12345, 'uniformes', 'uploads/uniforme11.jpg', '', '0000-00-00', 'SI'),
(6, 'Edgar', 'Garcia', 'juan@hotmail.com', 610473, 'otros', 'uploads/uniforme11.jpg', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd\r\nasdas\r\nds\r\nds\r\nds\r\n\r\nads\r\nsd', '0000-00-00', 'SI'),
(7, 'manuel', 'Gimenez', 'wili_2808@hotmail.com', 12332, 'bordados', NULL, 'bordadoooss', '0000-00-00', 'SI'),
(8, 'Juan', 'Garcia', 'juan@hotmail.com', 654, 'sublimacion', NULL, 'asdasdasdasdasdsd', '2017-06-10', 'NO'),
(9, 'Pablo', 'Sasd', 'pablo@hotmail.comn', 55455, 'uniformes', 'uploads/buso2.jpg', 'hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas hola como estas ', '2017-06-10', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` double(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `talle` int(11) NOT NULL,
  `genero` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_producto` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `eliminado` varchar(2) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`, `stock_minimo`, `talle`, `genero`, `tipo_producto`, `imagen`, `eliminado`) VALUES
(1, 'remera', 200.00, 10, 5, 18, 'hombre', 2, 'uploads/botines-remeras.png', 'SI'),
(4, 'Remera Negra', 200.00, 10, 2, 18, 'hombre', 2, 'uploads/botines-remeras.png', 'SI'),
(5, 'Pollera', 150.00, 15, 5, 10, 'mujer', 1, 'uploads/03_enteriso.jpg', 'NO'),
(6, 'Escolar', 180.00, 8, 2, 12, 'mujer', 1, 'uploads/rbk3t.jpg', 'SI'),
(7, 'Uniforme: Esc 44', 250.00, 20, 5, 16, 'mujer', 1, 'uploads/uniforme11.jpg', 'NO'),
(8, 'Buso invierno', 300.00, 15, 5, 18, 'hombre', 1, 'uploads/PANTS007.jpg', 'SI'),
(9, 'Uniforme: Esc 54', 250.00, 10, 3, 14, 'mujer', 1, 'uploads/images.jpg', 'SI'),
(10, 'Remera Gris', 300.00, 18, 5, 18, 'hombre', 2, 'uploads/gris-masgasLargas.jpg', 'NO'),
(11, 'Remera Naranja', 250.00, 19, 5, 16, 'mujer', 2, 'uploads/remera-naranja.jpg', 'NO'),
(12, 'Remera amarilla', 220.00, 20, 5, 16, 'mujer', 2, 'uploads/remera-amarilla.jpg', 'NO'),
(13, 'Buso Educ Fisica', 380.00, 20, 5, 18, 'hombre', 1, 'uploads/invierno.jpg', 'NO'),
(14, 'Uniforme: Esc 460', 500.00, 20, 5, 16, 'mujer', 1, 'uploads/uniforme5.jpg', 'NO'),
(15, 'Uniforme: Esc 107 Primaria', 480.00, 20, 5, 14, 'mujer', 1, 'uploads/uniforme1.jpg', 'NO'),
(16, 'Uniforme: Esc 66', 460.00, 18, 5, 16, 'hombre', 1, 'uploads/41OJWCPUj3L.jpg', 'NO'),
(17, 'Remera roja', 280.00, 18, 5, 18, 'hombre', 2, 'uploads/remera-roja.jpg', 'NO'),
(18, 'Jeans rotos', 450.00, 16, 5, 18, 'hombre', 2, 'uploads/jeans.jpg', 'NO'),
(19, 'Jean rayas', 550.00, 20, 5, 20, 'hombre', 2, 'uploads/jeans4.jpg', 'NO'),
(20, 'Jeans comun', 500.00, 20, 5, 22, 'hombre', 2, 'uploads/jeans3.jpg', 'NO'),
(21, 'Jeans comun 1', 480.00, 20, 5, 22, 'hombre', 2, 'uploads/jeans2.jpg', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `colegio` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `descripcion`, `colegio`) VALUES
(1, 'uniformes', NULL),
(2, 'prendas', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_usuario` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `eliminado` varchar(2) COLLATE utf8_spanish2_ci DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `apellido`, `nombre`, `tel`, `email`, `tipo_usuario`, `eliminado`) VALUES
(11, 'wili28', 'd2lsaTI4', 'Garcia', 'Wili', 610473, 'wili_2808@hotmail.com', 1, 'NO'),
(12, 'juan', 'anVhbg==', 'Gimenez', 'Juan', 123, 'juan@asd.com', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `precio_total` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `precio_total`) VALUES
(4, '2017-06-09', 12, 2380.00),
(5, '2017-06-10', 12, 1500.00),
(6, '2017-06-10', 12, 250.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(10) UNSIGNED NOT NULL,
  `venta_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `sub_total`) VALUES
(5, 4, 16, 2, 460.00),
(6, 4, 18, 2, 450.00),
(7, 4, 17, 2, 280.00),
(8, 5, 10, 2, 300.00),
(9, 5, 18, 2, 450.00),
(10, 6, 11, 1, 250.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tipo_producto` (`tipo_producto`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usuario` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_detalle_cabecera` (`venta_id`),
  ADD KEY `FK_detalle_producto` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_tipo_producto` FOREIGN KEY (`tipo_producto`) REFERENCES `tipo_producto` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_tipo_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id`);

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `FK_detalle_cabecera` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`),
  ADD CONSTRAINT `FK_detalle_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
