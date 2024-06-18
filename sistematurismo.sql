-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2024 a las 09:21:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistematurismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `IdConsulta` int(11) NOT NULL,
  `NombreCompleto` varchar(255) NOT NULL,
  `NumeroMovil` varchar(15) NOT NULL,
  `Asunto` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `FechaPublicacion` datetime NOT NULL,
  `Correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`IdConsulta`, `NombreCompleto`, `NumeroMovil`, `Asunto`, `Descripcion`, `FechaPublicacion`, `Correo`) VALUES
(11, 'Juan Pérez', '987654321', 'Consulta de paquetes turísticos', 'Quisiera información sobre los paquetes disponibles para visitar el Cañón del Colca.', '2024-06-18 01:50:27', 'juan@example.com'),
(12, 'María López', '987123456', 'Consulta sobre reservas', 'Quiero saber si hay disponibilidad para reservar un tour al Valle del Colca para el próximo fin de semana.', '2024-06-18 01:50:27', 'maria@example.com'),
(13, 'Pedro García', '987789456', 'Solicitud de información', 'Me gustaría obtener más detalles sobre los tours guiados por el centro histórico de Arequipa.', '2024-06-18 01:50:27', 'pedro@example.com'),
(14, 'Ana Torres', '987456123', 'Consulta sobre precios', 'Estoy interesada en conocer el precio del paquete turístico para visitar el Monasterio de Santa Catalina.', '2024-06-18 01:50:27', 'ana@example.com'),
(15, 'Carlos Rodríguez', '987987654', 'Consulta sobre transporte', '¿El paquete turístico incluye transporte desde el aeropuerto hasta el hotel?', '2024-06-18 01:50:27', 'carlos@example.com'),
(18, 'Diego Sebastian Gonzales Gomez', '962233318', 'Solicitud', 'wa', '2024-06-18 08:58:59', 'estrosebas@gmail.com'),
(19, 'Diego Sebastian Gonzales Gomez', '962233318', 'Solicitud', 'wa', '2024-06-18 09:02:50', 'estrosebas@gmail.com'),
(22, 'Diego Sebastian Gonzales Gomez', '962233318', 'Solicitud', 'warwi', '2024-06-18 09:10:49', 'estrosebas@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugaresviaje`
--

CREATE TABLE `lugaresviaje` (
  `IdPaquete` int(11) NOT NULL,
  `NombrePaquete` varchar(200) DEFAULT NULL,
  `TipoPaquete` varchar(150) DEFAULT NULL,
  `UbicacionPaquete` varchar(100) DEFAULT NULL,
  `PrecioPaquete` int(11) DEFAULT NULL,
  `CaracteristicasPaquete` varchar(255) DEFAULT NULL,
  `DetallesPaquete` mediumtext DEFAULT NULL,
  `ImagenPaquete` varchar(100) DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lugaresviaje`
--

INSERT INTO `lugaresviaje` (`IdPaquete`, `NombrePaquete`, `TipoPaquete`, `UbicacionPaquete`, `PrecioPaquete`, `CaracteristicasPaquete`, `DetallesPaquete`, `ImagenPaquete`, `FechaCreacion`, `FechaActualizacion`) VALUES
(1, 'Cusco Imperial', 'Cultural', 'Cusco', 1500, 'Transporte, Alojamiento, Guía', 'Visita a sitios arqueológicos de Cusco', 'cusco.jpg', '2024-05-01 17:00:00', '2024-05-01 17:00:00'),
(2, 'Machu Picchu Místico', 'Aventura', 'Machu Picchu', 2000, 'Transporte, Alojamiento, Comidas', 'Tour completo a Machu Picchu', 'machupicchu.jpg', '2024-05-02 17:00:00', '2024-05-02 17:00:00'),
(3, 'Lima Colonial', 'Cultural', 'Lima', 1200, 'Transporte, Alojamiento', 'Recorrido por el centro histórico de Lima', 'lima.jpg', '2024-05-03 17:00:00', '2024-05-03 17:00:00'),
(4, 'Arequipa Encantada', 'Cultural', 'Arequipa', 1300, 'Transporte, Alojamiento, Guía', 'Exploración de la ciudad blanca de Arequipa', 'arequipa.jpg', '2024-05-04 17:00:00', '2024-05-04 17:00:00'),
(5, 'Puno y el Titicaca', 'Aventura', 'Puno', 1400, 'Transporte, Alojamiento, Comidas', 'Tour al lago Titicaca y sus islas', 'puno.jpg', '2024-05-05 17:00:00', '2024-05-05 17:00:00'),
(6, 'Ica y Huacachina', 'Aventura', 'Ica', 1000, 'Transporte, Alojamiento, Guía', 'Visita al oasis de Huacachina y bodegas', 'ica.jpg', '2024-05-06 17:00:00', '2024-05-06 17:00:00'),
(7, 'Trujillo Histórico', 'Cultural', 'Trujillo', 1100, 'Transporte, Alojamiento, Comidas', 'Recorrido por las ruinas de Chan Chan', 'trujillo.jpg', '2024-05-07 17:00:00', '2024-05-07 17:00:00'),
(8, 'Tarapoto Natural', 'Aventura', 'Tarapoto', 1600, 'Transporte, Alojamiento, Guía', 'Exploración de la selva amazónica', 'tarapoto.jpg', '2024-05-08 17:00:00', '2024-05-08 17:00:00'),
(9, 'Chiclayo Milenario', 'Cultural', 'Chiclayo', 1000, 'Transporte, Alojamiento, Comidas', 'Visita a las pirámides de Túcume', 'chiclayo.jpg', '2024-05-09 17:00:00', '2024-05-09 17:00:00'),
(10, 'Piura Paradisíaca', 'Aventura', 'Piura', 1700, 'Transporte, Alojamiento, Guía', 'Tour a las playas de Máncora', 'piura.jpg', '2024-05-10 17:00:00', '2024-05-10 17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `IdPago` int(11) NOT NULL,
  `Tipo` varchar(255) DEFAULT '',
  `Detalle` longtext DEFAULT NULL,
  `IdReserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`IdPago`, `Tipo`, `Detalle`, `IdReserva`) VALUES
(1, 'Tarjeta de Crédito', 'Pago con tarjeta VISA', 1),
(2, 'PayPal', 'Pago con cuenta PayPal', 2),
(3, 'Transferencia Bancaria', 'Pago vía transferencia bancaria', 3),
(4, 'Tarjeta de Crédito', 'Pago con tarjeta Mastercard', 4),
(5, 'PayPal', 'Pago con cuenta PayPal', 5),
(6, 'Transferencia Bancaria', 'Pago vía transferencia bancaria', 6),
(7, 'Tarjeta de Crédito', 'Pago con tarjeta VISA', 7),
(8, 'PayPal', 'Pago con cuenta PayPal', 8),
(9, 'Transferencia Bancaria', 'Pago vía transferencia bancaria', 9),
(10, 'Tarjeta de Crédito', 'Pago con tarjeta Mastercard', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `IdReporte` int(11) NOT NULL,
  `CorreoUsuario` varchar(100) DEFAULT NULL,
  `Problema` varchar(100) DEFAULT NULL,
  `Descripcion` mediumtext DEFAULT NULL,
  `FechaPublicacion` timestamp NULL DEFAULT current_timestamp(),
  `ObservacionAdmin` mediumtext DEFAULT NULL,
  `FechaObservacionAdmin` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`IdReporte`, `CorreoUsuario`, `Problema`, `Descripcion`, `FechaPublicacion`, `ObservacionAdmin`, `FechaObservacionAdmin`) VALUES
(1, 'juan.perez@example.com', 'Problema con la reserva', 'No puedo ver mi reserva en el sistema', '2024-05-21 19:00:00', NULL, NULL),
(2, 'ana.garcia@example.com', 'Error en el pago', 'El pago no se procesó correctamente', '2024-05-22 19:00:00', NULL, NULL),
(3, 'luis.gomez@example.com', 'Problema con el paquete', 'El paquete no incluye lo mencionado', '2024-05-23 19:00:00', NULL, NULL),
(4, 'maria.lopez@example.com', 'Error en la fecha', 'La fecha de inicio es incorrecta', '2024-05-24 19:00:00', NULL, NULL),
(5, 'carlos.torres@example.com', 'Problema con el guía', 'El guía no se presentó a tiempo', '2024-05-25 19:00:00', NULL, NULL),
(6, 'sofia.sanchez@example.com', 'Problema con el alojamiento', 'El hotel no era el esperado', '2024-05-26 19:00:00', NULL, NULL),
(7, 'miguel.ramirez@example.com', 'Problema con el transporte', 'El transporte llegó tarde', '2024-05-27 19:00:00', NULL, NULL),
(8, 'laura.diaz@example.com', 'Problema con las comidas', 'Las comidas no eran buenas', '2024-05-28 19:00:00', NULL, NULL),
(9, 'jorge.moreno@example.com', 'Problema con la guía', 'La guía no fue clara', '2024-05-29 19:00:00', NULL, NULL),
(10, 'andrea.ruiz@example.com', 'Problema con el descuento', 'El descuento no se aplicó', '2024-05-30 19:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `IdReserva` int(11) NOT NULL,
  `IdPaquete` int(11) DEFAULT NULL,
  `CorreoUsuario` varchar(100) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `Comentario` mediumtext DEFAULT NULL,
  `FechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `Estado` int(11) DEFAULT NULL,
  `CanceladoPor` varchar(5) DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IdReserva`, `IdPaquete`, `CorreoUsuario`, `FechaInicio`, `FechaFin`, `Comentario`, `FechaRegistro`, `Estado`, `CanceladoPor`, `FechaActualizacion`) VALUES
(1, 1, 'juan.perez@example.com', '2024-06-01', '2024-06-05', 'Ninguno', '2024-05-11 19:00:00', 1, NULL, '2024-05-11 19:00:00'),
(2, 2, 'ana.garcia@example.com', '2024-06-10', '2024-06-15', 'Ninguno', '2024-05-12 19:00:00', 1, NULL, '2024-05-12 19:00:00'),
(3, 3, 'luis.gomez@example.com', '2024-06-20', '2024-06-25', 'Ninguno', '2024-05-13 19:00:00', 1, NULL, '2024-05-13 19:00:00'),
(4, 4, 'maria.lopez@example.com', '2024-07-01', '2024-07-05', 'Ninguno', '2024-05-14 19:00:00', 1, NULL, '2024-05-14 19:00:00'),
(5, 5, 'carlos.torres@example.com', '2024-07-10', '2024-07-15', 'Ninguno', '2024-05-15 19:00:00', 1, NULL, '2024-05-15 19:00:00'),
(6, 6, 'sofia.sanchez@example.com', '2024-07-20', '2024-07-25', 'Ninguno', '2024-05-16 19:00:00', 1, NULL, '2024-05-16 19:00:00'),
(7, 7, 'miguel.ramirez@example.com', '2024-08-01', '2024-08-05', 'Ninguno', '2024-05-17 19:00:00', 1, NULL, '2024-05-17 19:00:00'),
(8, 8, 'laura.diaz@example.com', '2024-08-10', '2024-08-15', 'Ninguno', '2024-05-18 19:00:00', 1, NULL, '2024-05-18 19:00:00'),
(9, 9, 'jorge.moreno@example.com', '2024-08-20', '2024-08-25', 'Ninguno', '2024-05-19 19:00:00', 1, NULL, '2024-05-19 19:00:00'),
(10, 10, 'andrea.ruiz@example.com', '2024-09-01', '2024-09-05', 'Ninguno', '2024-05-20 19:00:00', 1, NULL, '2024-05-20 19:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `NumeroMovil` char(10) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(100) DEFAULT NULL,
  `FechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  `FechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `NumeroMovil`, `Correo`, `Contraseña`, `FechaRegistro`, `FechaActualizacion`) VALUES
(1, 'Juan Perez', '9876543210', 'juan.perez@example.com', 'password123', '2024-05-01 17:00:00', '2024-05-01 17:00:00'),
(2, 'Ana Garcia', '9876543211', 'ana.garcia@example.com', 'password123', '2024-05-02 17:00:00', '2024-05-02 17:00:00'),
(3, 'Luis Gomez', '9876543212', 'luis.gomez@example.com', 'password123', '2024-05-03 17:00:00', '2024-05-03 17:00:00'),
(4, 'Maria Lopez', '9876543213', 'maria.lopez@example.com', 'password123', '2024-05-04 17:00:00', '2024-05-04 17:00:00'),
(5, 'Carlos Torres', '9876543214', 'carlos.torres@example.com', 'password123', '2024-05-05 17:00:00', '2024-05-05 17:00:00'),
(6, 'Sofia Sanchez', '9876543215', 'sofia.sanchez@example.com', 'password123', '2024-05-06 17:00:00', '2024-05-06 17:00:00'),
(7, 'Miguel Ramirez', '9876543216', 'miguel.ramirez@example.com', 'password123', '2024-05-07 17:00:00', '2024-05-07 17:00:00'),
(8, 'Laura Diaz', '9876543217', 'laura.diaz@example.com', 'password123', '2024-05-08 17:00:00', '2024-05-08 17:00:00'),
(9, 'Jorge Moreno', '9876543218', 'jorge.moreno@example.com', 'password123', '2024-05-09 17:00:00', '2024-05-09 17:00:00'),
(10, 'Andrea Ruiz', '9876543219', 'andrea.ruiz@example.com', 'password123', '2024-05-10 17:00:00', '2024-05-10 17:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`IdConsulta`);

--
-- Indices de la tabla `lugaresviaje`
--
ALTER TABLE `lugaresviaje`
  ADD PRIMARY KEY (`IdPaquete`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`IdPago`),
  ADD KEY `IdReserva` (`IdReserva`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`IdReporte`),
  ADD KEY `CorreoUsuario` (`CorreoUsuario`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `CorreoUsuario` (`CorreoUsuario`),
  ADD KEY `IdPaquete` (`IdPaquete`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `IdConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `lugaresviaje`
--
ALTER TABLE `lugaresviaje`
  MODIFY `IdPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `IdPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `IdReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`CorreoUsuario`) REFERENCES `usuarios` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`CorreoUsuario`) REFERENCES `usuarios` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`IdPaquete`) REFERENCES `lugaresviaje` (`IdPaquete`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
