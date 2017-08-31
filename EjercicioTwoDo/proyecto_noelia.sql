-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2017 a las 03:39:15
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_noelia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividades` int(11) NOT NULL,
  `detalle` varchar(400) NOT NULL,
  `fecha_realizado` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividades`, `detalle`, `fecha_realizado`, `id_usuario`, `id_tarea`) VALUES
(1, 'Se agrego una nueva tarea que debe realizar antes cuanto antes de ', '2017-07-08', 1, 48),
(2, 'Se actualizo el estado de la tarea por : en curso', '2017-07-09', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `fecha_realizado` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `detalle`, `fecha_realizado`, `id_usuario`, `id_tarea`) VALUES
(1, 'Lo termine justo', '2017-06-09 00:00:00', 1, 2),
(2, 'Falta agregarlo al manual de usuario', '2017-07-12 00:00:00', 2, 2),
(3, 'Listo por ahora', '2017-07-12 00:00:00', 2, 3),
(7, 'Ahora termino esta tarea y continuo con la otra', '2017-07-02 00:00:00', 1, 2),
(8, 'ajdjsfhgsdhgf  hdhddhd', '2017-07-04 00:00:00', 1, 5),
(9, 'Estoy comentando espero que siga funcionando', '2017-07-04 00:00:00', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consignas`
--

CREATE TABLE `consignas` (
  `id_consignas` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `fecha_realizado` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consignas`
--

INSERT INTO `consignas` (`id_consignas`, `detalle`, `fecha_realizado`, `estado`, `id_tarea`, `id_usuario`) VALUES
(1, 'Entrevista con el cliente', '2017-06-09', 'pendiente', 2, 1),
(2, 'ABM clientes', '2017-07-04', 'pendiente', 2, 2),
(3, 'Manual de usuario', '2017-07-03', 'en curso', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE `pasos` (
  `id_pasos` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fecha_realizado` date NOT NULL,
  `id_consignas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasos`
--

INSERT INTO `pasos` (`id_pasos`, `detalle`, `fecha_realizado`, `id_consignas`) VALUES
(1, 'Llamar al cliente y coordinar fecha, hora y lugar de encuentro', '2017-06-09', 1),
(2, 'Juntar toda la documentacion de los entrevistadores', '2017-07-04', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `estimacion` float(10,2) DEFAULT NULL,
  `consumo` float(10,2) DEFAULT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `descripcion` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `nombre`, `fecha_inicio`, `estimacion`, `consumo`, `fecha_fin`, `estado`, `descripcion`) VALUES
(1, 'Documentacion del Sistema ', '2017-06-01', 5.00, 0.00, '2017-06-23', 'completo', 'Se debe hacer la documentacion con las tareas que hace el sistema de gestion APOR paso a paso para entregar al cliente. A ver si actualiza vamos che\r\nSaludos No'),
(2, 'ABM clientes', '2017-05-09', 2.00, 1.00, '2017-05-17', 'en curso', 'Realizar alta, baja y modificacion de la tabla de clientes de APOR. Bertolo '),
(3, 'Manejo de productos de almacen', '2017-06-05', 10.00, 0.00, '2017-07-03', 'en curso', 'Pendiente los ABM productos'),
(4, 'Facturacion de productos', '2017-06-15', 6.00, 0.00, '2017-07-06', 'en curso', 'Modelo de la factura en el sistema'),
(5, 'Debug del modulo de facturacion', '2017-07-10', 10.00, 0.00, '2017-07-09', 'pendiente', 'Aun falta terminar el modulo de facturacion'),
(6, 'Armar documentacion', '2017-07-07', 0.00, 0.00, '2017-07-12', 'pendiente', 'Armar la documentación de como se maneja dicho sistema'),
(7, 'Control de stock de productos', '2017-07-06', 0.00, 0.00, '2017-07-11', 'pendiente', 'Armar antes de largar el sistema a produccion'),
(8, 'Abm productos', '2017-07-11', 40.00, 20.00, '2017-07-14', 'pendiente', 'hacelo con doumentacion'),
(18, 'Probando', '2017-07-12', 4.00, 1.00, '2017-06-28', 'pendiente', 'Indique una breve descripciÃ³n de la funcionalidad de la tarea.'),
(19, 'Probando', '2017-07-12', 4.00, 1.00, '2017-06-28', 'pendiente', 'Indique una breve descripciÃ³n de la funcionalidad de la tarea.'),
(22, 'Hacer el ABM proveedor', '2017-07-05', 4.00, 0.00, '2017-07-08', 'pendiente', 'Debemos tener en cuenta de que localidad es.'),
(24, 'Probando historico', '2017-07-04', 2.00, 2.00, '2017-07-03', 'completo', 'Hacerla rapido'),
(31, 'Testing de modulo', '2017-07-02', 6.00, 5.00, '2017-07-07', 'completo', 'Realizar diferentes pruebas para chequear que el modulo solicitado funciona bien.'),
(47, 'Preparar mate', '2017-07-04', 1.00, 0.50, '2017-07-04', 'completo', 'Tomas unos mates con los compas'),
(48, 'Comprar articulos para la cena', '2017-07-04', 3.00, 2.00, '2017-07-04', 'en curso', 'Todo lo que se necesita para cenar y almorzar al dÃ­a siguiente.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_users`
--

CREATE TABLE `tarea_users` (
  `id_tuser` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea_users`
--

INSERT INTO `tarea_users` (`id_tuser`, `id_usuario`, `id_tarea`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 2, 2),
(4, 1, 1),
(5, 3, 3),
(6, 4, 4),
(7, 1, 3),
(8, 2, 5),
(9, 1, 4),
(10, 2, 4),
(11, 1, 5),
(12, 2, 3),
(13, 2, 6),
(14, 1, 7),
(19, 4, 2),
(32, 1, 47),
(33, 1, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nick` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `correo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `nick`, `password`, `correo`) VALUES
(1, 'Noelia D ', 'Carrizo', 'noe', 'noe2017', ''),
(2, 'Magdalena', 'Salsati', 'admin', '1234', ''),
(3, 'Maria', 'Roberta', 'maria', 'maria', ''),
(4, 'Cesar', 'Socolisqui', 'pepe', 'pepe', ''),
(5, 'Martina', 'Cayuela', 'admin', 'martina2017', ''),
(6, 'Rodrigo', 'Alfred', 'admin', 'rodri2017', ''),
(7, 'Alejandra', 'Huarte', 'ale', 'ale2017', ''),
(9, 'Gaby', 'Aristegui', 'gaby', 'gaby2017', ''),
(10, 'Maria', 'Leguizamon', 'maria', 'maria2017', ''),
(12, '344eee', 'ee3333', 'deerrrr.....', 'ejjejej333', 'ejej@fjjf.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividades`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `consignas`
--
ALTER TABLE `consignas`
  ADD PRIMARY KEY (`id_consignas`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`id_pasos`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `tarea_users`
--
ALTER TABLE `tarea_users`
  ADD PRIMARY KEY (`id_tuser`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `consignas`
--
ALTER TABLE `consignas`
  MODIFY `id_consignas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pasos`
--
ALTER TABLE `pasos`
  MODIFY `id_pasos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `tarea_users`
--
ALTER TABLE `tarea_users`
  MODIFY `id_tuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `consignas`
--
ALTER TABLE `consignas`
  ADD CONSTRAINT `consignas_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE CASCADE,
  ADD CONSTRAINT `consignas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
