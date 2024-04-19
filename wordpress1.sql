-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2024 a las 08:51:00
-- Versión del servidor: 8.0.36-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wordpress1`
--
CREATE DATABASE IF NOT EXISTS `wordpress1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wordpress1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_administrador`
--

DROP TABLE IF EXISTS `transfer_administrador`;
CREATE TABLE `transfer_administrador` (
  `Id_usuario` int NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Apellido1` varchar(255) NOT NULL,
  `Apellido2` varchar(255) NOT NULL,
  `Id_tipo_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_administrador`
--

INSERT INTO `transfer_administrador` (`Id_usuario`, `Username`, `Password`, `Nombre`, `email`, `Apellido1`, `Apellido2`, `Id_tipo_usuario`) VALUES
(1, 'cespigol25', '123456', 'Carlos', 'carlos-admin@uoc.edu', 'Espigol', 'Flores2', 3),
(2, 'cespigol', '123456', 'Felix', 'felix-admin@uoc.edu', '...', '...', 3),
(4, 'etoledob@uoc.edu', '123456', 'Esteban', 'esteban-admin@uoc.edu', 'Toledo', 'Barrios', 3),
(5, 'cespigol', 'Traw5Mufre6#', 'wqer', 'asdf@asd.es', 'wqer', 'wqer', 3),
(6, 'Montserrat', '123456', 'montse', 'montse-admin@gmail.com', 'Gomez', 'Perez2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_hotel`
--

DROP TABLE IF EXISTS `transfer_hotel`;
CREATE TABLE `transfer_hotel` (
  `id_hotel` int NOT NULL,
  `NombreHotel` varchar(255) NOT NULL,
  `Caracteristicas` varchar(255) NOT NULL,
  `id_zona` int DEFAULT NULL,
  `Comision` int DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `Id_tipo_usuario` int NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_hotel`
--

INSERT INTO `transfer_hotel` (`id_hotel`, `NombreHotel`, `Caracteristicas`, `id_zona`, `Comision`, `usuario`, `password`, `Id_tipo_usuario`, `email`) VALUES
(1, 'Nixe Palace', 'El lujoso Nixe Palace se encuentra junto a la playa de Cala Major y al palacio de Marivent. Ofrece piscina al aire libre, spa gratuito y habitaciones con aire acondicionado y conexión WiFi gratuita.', 1, 20, 'Esteban', '123456', 5, 'esteban-hotel@uoc.edu'),
(2, 'Meliá Palma Marina', 'Este magnífico hotel alberga un centro de spa, una piscina exterior de temporada y una terraza solárium con vistas al mar y a la bahía de Palma.', 1, 20, 'Esther', '123456', 5, 'esther-hotel@uoc.edu'),
(3, 'HM Jaime III', 'El HM Jaime III ofrece un alojamiento elegante en el centro de Palma de Mallorca, a 500 metros del puerto deportivo.', 1, 20, 'felix3', '123456', 5, 'felix3-hotel@uoc.edu'),
(4, 'Isla Mallorca & SPA', 'El Isla Mallorca & Spa se encuentra en una zona tranquila de Palma de Mallorca. Ofrece piscina exterior, spa y habitaciones elegantes con TV vía satélite de pantalla plana y WiFi gratuita.', 1, 20, 'Felix', '123456', 5, 'felix-hotel@uoc.edu'),
(5, 'GPRO Valparaiso Palace & SPA', 'Este hotel de lujo se encuentra en el distrito exclusivo de La Bonanova, una zona apartada de Palma de Mallorca.', 1, 20, 'Carlos', '123456', 5, 'carlos-hotel@uoc.edu'),
(6, 'Hotel Be Live Adults Only Marivent', 'El Hotel Be Live Adults Only Marivent dispone de gimnasio y varias piscinas al aire libre. La zona de relajación incluye baños de vapor y sauna finlandesa y está disponible por un suplemento.', 1, 20, 'Esther2', '123456', 5, 'esther2-hotel@uoc.edu'),
(7, 'Castillo Hotel Son Vida, a Luxury Collection Hotel, Mallorca - Adults Only', 'El Castillo Hotel Son Vida, a Luxury Collection Hotel, Mallorca - Adults Only, a Luxury Collection Hotel ocupa un castillo del siglo XIII y ofrece vistas a la bahía de Palma.', 1, 20, 'Esteban2', '123456', 5, 'esteban2-hotel@uoc.edu'),
(8, 'Eurostars Marivent', 'El hotel Marivent se encuentra frente al Palacio de Marivent, a 800 metros de la playa de Cala Mayor y a 5 minutos a pie de la Fundación Joan Miró.', 1, 20, 'Felix2', '123456', 5, 'felix2-hotel@uoc.edu'),
(9, 'Hotel Saratoga', 'El hotel Saratoga es un establecimiento de lujo situado en el centro de Palma de Mallorca y equipado con una azotea con piscina con vistas preciosas a la ciudad.', 1, 20, 'Carlos2', '123456', 5, 'carlos2-hotel@uoc.edu'),
(999, 'dummy', 'dummy', 1, 0, 'dummy@dummy.es', 'dummy', 5, 'dummy@dummy.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_precios`
--

DROP TABLE IF EXISTS `transfer_precios`;
CREATE TABLE `transfer_precios` (
  `id_precios` int NOT NULL,
  `id_vehiculo` int NOT NULL,
  `id_hotel` int NOT NULL,
  `Precio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_precios`
--

INSERT INTO `transfer_precios` (`id_precios`, `id_vehiculo`, `id_hotel`, `Precio`) VALUES
(1, 2, 1, 30),
(2, 2, 2, 50),
(3, 3, 4, 100),
(4, 4, 6, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_reservas`
--

DROP TABLE IF EXISTS `transfer_reservas`;
CREATE TABLE `transfer_reservas` (
  `id_reserva` int NOT NULL,
  `localizador` varchar(100) NOT NULL,
  `id_hotel` int DEFAULT NULL COMMENT 'Es el hotel que realiza la reserva',
  `id_tipo_reserva` int NOT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `fecha_reserva` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `id_destino` int NOT NULL,
  `fecha_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `numero_vuelo_entrada` varchar(50) NOT NULL,
  `origen_vuelo_entrada` varchar(50) NOT NULL,
  `hora_vuelo_salida` time NOT NULL,
  `hora_recogida_hotel` time NOT NULL,
  `fecha_vuelo_salida` date NOT NULL,
  `num_viajeros` int NOT NULL,
  `id_vehiculo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_reservas`
--

INSERT INTO `transfer_reservas` (`id_reserva`, `localizador`, `id_hotel`, `id_tipo_reserva`, `email_cliente`, `fecha_reserva`, `fecha_modificacion`, `id_destino`, `fecha_entrada`, `hora_entrada`, `numero_vuelo_entrada`, `origen_vuelo_entrada`, `hora_vuelo_salida`, `hora_recogida_hotel`, `fecha_vuelo_salida`, `num_viajeros`, `id_vehiculo`) VALUES
(7, 'hScXRF2uoE', 999, 2, 'carlos-viajero@uoc.edu', '2024-04-06 12:04:49', '2024-04-06 12:04:49', 1, '2024-04-23', '07:38:00', '123', '23', '06:34:00', '00:00:00', '2024-04-23', 1, 4),
(8, 'tYpg7mAHl6', 999, 2, 'carlos-viajero@uoc.edu', '2024-04-06 07:04:30', '2024-04-06 07:04:30', 1, '2024-04-06', '22:57:00', '123', '23', '23:58:00', '00:00:00', '2024-04-06', 1, 9999),
(9, 'BFvTKHoKo7', 999, 1, 'carlos-viajero@uoc.edu', '2024-04-07 02:04:50', '2024-04-07 02:04:50', 1, '2024-04-03', '19:29:00', '123', '23', '00:00:00', '00:00:00', '9999-12-31', 3, 4),
(10, 'KRs2DkPwZG', 999, 1, 'carlos-viajero@uoc.edu', '2024-04-07 04:04:31', '2024-04-15 01:04:53', 5, '2024-04-19', '18:21:00', 'A304912', 'Vallcarca', '00:00:00', '00:00:00', '9999-12-31', 1, 4),
(11, 'WkkzrzIv40', 999, 1, 'carlos-viajero@uoc.edu', '2024-04-07 05:04:21', '2024-04-15 01:04:05', 3, '2024-05-04', '23:20:00', 'A304912', 'Vallcarca', '00:00:00', '00:00:00', '9999-12-31', 1, 2),
(12, 'x9znGT8cv1', 999, 1, 'cespigol@uoc.edu', '2024-04-07 05:04:06', '2024-04-07 05:04:06', 7, '2024-04-18', '19:53:00', 'A304912', 'Vallcarca', '00:00:00', '00:00:00', '9999-12-31', 3, 4),
(13, 'lvCsOJtwpq', NULL, 1, 'carlos-viajero@uoc.edu', '2024-04-15 01:04:47', '2024-04-15 01:04:47', 9, '2024-04-17', '03:41:00', 'e', 'ewq', '00:00:00', '00:00:00', '9999-12-31', 3, 4),
(15, 'oThiA4J3H8', NULL, 1, 'carlos-viajero@uoc.edu', '2024-04-15 01:04:30', '2024-04-15 01:04:40', 8, '2024-04-18', '03:43:00', 'e', 'Vallcarca', '00:00:00', '00:00:00', '9999-12-31', 2, 4),
(16, 'PejhWPdKVz', NULL, 1, 'oriol@uoc.edu', '2024-04-15 08:04:09', '2024-04-15 08:04:09', 7, '2024-04-17', '10:54:00', 'AE203', 'Mallorca', '00:00:00', '00:00:00', '9999-12-31', 3, 3),
(17, 'lNb9inzocs', NULL, 2, 'oriol@uoc.edu', '2024-04-15 08:04:58', '2024-04-15 08:04:58', 4, '2024-04-24', '17:40:00', 'AEF3004', 'Mallorca', '18:58:00', '17:40:00', '2024-04-24', 3, 9999),
(18, 'kyc9NqC4RH', NULL, 1, 'oriol@uoc.edu', '2024-04-15 08:04:59', '2024-04-15 08:04:59', 5, '2024-04-17', '06:48:00', 'AEF203', 'Mallorca', '00:00:00', '00:00:00', '9999-12-31', 3, 9999),
(19, 'GHP9z9Qse1', NULL, 1, 'carlos-admin@uoc.edu', '2024-04-15 09:04:30', '2024-04-15 09:04:30', 3, '2024-04-18', '03:33:00', 'Ae427', 'Mallorca', '00:00:00', '00:00:00', '9999-12-31', 2, 9999),
(20, '938mBRO3Q2', NULL, 1, 'carlos-admin@uoc.edu', '2024-04-15 10:04:29', '2024-04-15 10:04:29', 1, '2024-04-19', '03:07:00', 'Ae427', 'Mallorca', '00:00:00', '00:00:00', '9999-12-31', 1, 3),
(21, 'SdRLOiGQDZ', NULL, 1, 'carlos-viajero@uoc.edu', '2024-04-15 10:04:07', '2024-04-15 10:04:07', 3, '2024-04-19', '00:25:00', 'AEF203', 'Mallorca', '00:00:00', '00:00:00', '9999-12-31', 1, 9999),
(22, 'kE2jOIU4u0', NULL, 2, 'felix-viajero@uoc.edu', '2024-04-15 10:04:52', '2024-04-15 10:04:52', 5, '2024-04-26', '00:27:00', 'AEF3004', 'Mallorca', '21:23:00', '00:27:00', '2024-04-26', 3, 9999),
(23, 'qrNKMjxEV0', NULL, 1, 'felix-viajero@uoc.edu', '2024-04-15 11:04:55', '2024-04-15 11:04:55', 5, '2024-04-18', '05:10:00', '12', 'Valencia', '00:00:00', '00:00:00', '9999-12-31', 3, 9999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_tipo_reserva`
--

DROP TABLE IF EXISTS `transfer_tipo_reserva`;
CREATE TABLE `transfer_tipo_reserva` (
  `id_tipo_reserva` int NOT NULL,
  `Descripción` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_tipo_reserva`
--

INSERT INTO `transfer_tipo_reserva` (`id_tipo_reserva`, `Descripción`) VALUES
(1, 'Sólo trayecto de aeropuerto a hotel'),
(2, 'Sólo trayecto de hotel a aeropuerto'),
(3, 'Trayectos de ida y vuelta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_usuarios_tipo`
--

DROP TABLE IF EXISTS `transfer_usuarios_tipo`;
CREATE TABLE `transfer_usuarios_tipo` (
  `Id_tipo_usuario` int NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_usuarios_tipo`
--

INSERT INTO `transfer_usuarios_tipo` (`Id_tipo_usuario`, `Descripcion`) VALUES
(1, 'Usuario Corporativo'),
(2, 'Usuario normal'),
(3, 'Administrador'),
(4, 'Conductor'),
(5, 'Hotel'),
(6, 'Viajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_vehiculo`
--

DROP TABLE IF EXISTS `transfer_vehiculo`;
CREATE TABLE `transfer_vehiculo` (
  `id_vehiculo` int NOT NULL,
  `Descripcion` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email_conductor` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Id_tipo_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_vehiculo`
--

INSERT INTO `transfer_vehiculo` (`id_vehiculo`, `Descripcion`, `email_conductor`, `password`, `Id_tipo_usuario`) VALUES
(1, 'Tesla Model 1 - 8 plazas', 'esther-vehiculo@uoc.edu', '123456', 4),
(2, 'Tesla Model 1', 'esteban-vehiculo@uoc.edu', '123456', 4),
(3, 'Tesla Model 1 - 8 Plazas', 'felix-vehiculo@uoc.edu', '123456', 4),
(4, 'Tesla Model - Carlos', 'carlos-vehiculo@uoc.edu', '123456', 4),
(9999, 'pendiente de asignar.', 'pdte.asignar@mail.org', 'pdte.asignar@mail.org', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_viajeros`
--

DROP TABLE IF EXISTS `transfer_viajeros`;
CREATE TABLE `transfer_viajeros` (
  `id_viajero` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `codigoPostal` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Id_tipo_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_viajeros`
--

INSERT INTO `transfer_viajeros` (`id_viajero`, `nombre`, `apellido1`, `apellido2`, `direccion`, `codigoPostal`, `ciudad`, `pais`, `email`, `password`, `Id_tipo_usuario`) VALUES
(1, 'Carlos', 'Espigol', 'Flores', 'C/ Entença 203', '08030', 'Barcelona', 'España', 'carlos-viajero@uoc.edu', '123456', 6),
(3, 'Esteban', '...', '...', 'C/ Levante 20', '08040', 'Barcelona', 'España', 'esteban-viajero@uoc.edu', '123456', 6),
(4, 'Felix', '...', '...', 'C/ Hispalense 30', '41030', 'Sevilla', 'España', 'felix-viajero@uoc.edu', '123456', 6),
(5, 'Antonio', 'Ferrandis', 'Ferrandis', '1230943 0 230 ', '20030', '20394 09 0234', '2309234', 'carlos-prueba@orange.es', '1223456', 6),
(6, 'Felipe', 'ntonio', 'Depq', 'werqwer qwer q', '22343', '12341234', '12341234', 'ccc@ccc.es', '123456', 6),
(7, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf@asd.es', '12341234', 6),
(8, 'Jose Antonio', 'Gomez', 'Perez', 'direccion  1', '08754', 'Barcelona', 'España', 'jantonio@gmail.com', '123456', 6),
(9, 'Didac', 'Espigol', 'Jimenez', 'C/ Salamanca 34', '08340', 'Badalona', 'España', 'didac@uoc.edu', '123456', 6),
(10, 'Oriol', 'Espigol', 'Jimenez', 'C/ Santolaria 23', '03045', 'Valencia', 'España', 'oriol@uoc.edu', '123456', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_zona`
--

DROP TABLE IF EXISTS `transfer_zona`;
CREATE TABLE `transfer_zona` (
  `id_zona` int NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `transfer_zona`
--

INSERT INTO `transfer_zona` (`id_zona`, `descripcion`) VALUES
(1, 'Palma de Mallorca'),
(2, 'Sierra de Tramontana'),
(3, 'Raiguer'),
(4, 'Llano de Mallorca'),
(5, 'Migjorn'),
(6, 'Levante'),
(7, 'nueva zona 20'),
(8, 'Nueva zona 26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `transfer_administrador`
--
ALTER TABLE `transfer_administrador`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `FK_Usuarios_Id_Tipo_Usuarios` (`Id_tipo_usuario`);

--
-- Indices de la tabla `transfer_hotel`
--
ALTER TABLE `transfer_hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `FK_HOTEL_ZONA` (`id_zona`),
  ADD KEY `FK_hotel_id_tipo_usuario` (`Id_tipo_usuario`);

--
-- Indices de la tabla `transfer_precios`
--
ALTER TABLE `transfer_precios`
  ADD PRIMARY KEY (`id_precios`),
  ADD KEY `FK_PRECIOS_HOTEL` (`id_hotel`),
  ADD KEY `FK_PRECIOS_VEHICULO` (`id_vehiculo`);

--
-- Indices de la tabla `transfer_reservas`
--
ALTER TABLE `transfer_reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_RESERVAS_DESTINO` (`id_destino`),
  ADD KEY `FK_RESERVAS_HOTEL` (`id_hotel`),
  ADD KEY `FK_RESERVAS_TIPO` (`id_tipo_reserva`),
  ADD KEY `FK_RESERVAS_VEHICULO` (`id_vehiculo`);

--
-- Indices de la tabla `transfer_tipo_reserva`
--
ALTER TABLE `transfer_tipo_reserva`
  ADD PRIMARY KEY (`id_tipo_reserva`);

--
-- Indices de la tabla `transfer_usuarios_tipo`
--
ALTER TABLE `transfer_usuarios_tipo`
  ADD PRIMARY KEY (`Id_tipo_usuario`);

--
-- Indices de la tabla `transfer_vehiculo`
--
ALTER TABLE `transfer_vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `FK_vehiculo_id_tipo_usuario` (`Id_tipo_usuario`);

--
-- Indices de la tabla `transfer_viajeros`
--
ALTER TABLE `transfer_viajeros`
  ADD PRIMARY KEY (`id_viajero`),
  ADD KEY `FK_viajeres_id_tipo_usuario` (`Id_tipo_usuario`) USING BTREE;

--
-- Indices de la tabla `transfer_zona`
--
ALTER TABLE `transfer_zona`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `transfer_administrador`
--
ALTER TABLE `transfer_administrador`
  MODIFY `Id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `transfer_hotel`
--
ALTER TABLE `transfer_hotel`
  MODIFY `id_hotel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT de la tabla `transfer_precios`
--
ALTER TABLE `transfer_precios`
  MODIFY `id_precios` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `transfer_reservas`
--
ALTER TABLE `transfer_reservas`
  MODIFY `id_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `transfer_tipo_reserva`
--
ALTER TABLE `transfer_tipo_reserva`
  MODIFY `id_tipo_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transfer_usuarios_tipo`
--
ALTER TABLE `transfer_usuarios_tipo`
  MODIFY `Id_tipo_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `transfer_vehiculo`
--
ALTER TABLE `transfer_vehiculo`
  MODIFY `id_vehiculo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT de la tabla `transfer_viajeros`
--
ALTER TABLE `transfer_viajeros`
  MODIFY `id_viajero` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `transfer_zona`
--
ALTER TABLE `transfer_zona`
  MODIFY `id_zona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transfer_administrador`
--
ALTER TABLE `transfer_administrador`
  ADD CONSTRAINT `FK_Usuarios_Id_Tipo_Usuarios` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `transfer_usuarios_tipo` (`Id_tipo_usuario`);

--
-- Filtros para la tabla `transfer_hotel`
--
ALTER TABLE `transfer_hotel`
  ADD CONSTRAINT `FK_HOTEL_ZONA` FOREIGN KEY (`id_zona`) REFERENCES `transfer_zona` (`id_zona`),
  ADD CONSTRAINT `transfer_hotel_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `transfer_usuarios_tipo` (`Id_tipo_usuario`);

--
-- Filtros para la tabla `transfer_precios`
--
ALTER TABLE `transfer_precios`
  ADD CONSTRAINT `FK_PRECIOS_HOTEL` FOREIGN KEY (`id_hotel`) REFERENCES `transfer_hotel` (`id_hotel`),
  ADD CONSTRAINT `FK_PRECIOS_VEHICULO` FOREIGN KEY (`id_vehiculo`) REFERENCES `transfer_vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `transfer_reservas`
--
ALTER TABLE `transfer_reservas`
  ADD CONSTRAINT `FK_RESERVAS_DESTINO` FOREIGN KEY (`id_destino`) REFERENCES `transfer_hotel` (`id_hotel`),
  ADD CONSTRAINT `FK_RESERVAS_HOTEL` FOREIGN KEY (`id_hotel`) REFERENCES `transfer_hotel` (`id_hotel`),
  ADD CONSTRAINT `FK_RESERVAS_TIPO` FOREIGN KEY (`id_tipo_reserva`) REFERENCES `transfer_tipo_reserva` (`id_tipo_reserva`),
  ADD CONSTRAINT `FK_RESERVAS_VEHICULO` FOREIGN KEY (`id_vehiculo`) REFERENCES `transfer_vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `transfer_vehiculo`
--
ALTER TABLE `transfer_vehiculo`
  ADD CONSTRAINT `transfer_vehiculo_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `transfer_usuarios_tipo` (`Id_tipo_usuario`);

--
-- Filtros para la tabla `transfer_viajeros`
--
ALTER TABLE `transfer_viajeros`
  ADD CONSTRAINT `transfer_viajeros_ibfk_1` FOREIGN KEY (`Id_tipo_usuario`) REFERENCES `transfer_usuarios_tipo` (`Id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
