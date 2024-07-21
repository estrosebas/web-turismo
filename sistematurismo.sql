-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2024 a las 08:38:24
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
  `ImagenPaquete` varchar(250) DEFAULT NULL,
  `FechaCreacion` timestamp NULL DEFAULT current_timestamp(),
  `FechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lugaresviaje`
--

INSERT INTO `lugaresviaje` (`IdPaquete`, `NombrePaquete`, `TipoPaquete`, `UbicacionPaquete`, `PrecioPaquete`, `CaracteristicasPaquete`, `DetallesPaquete`, `ImagenPaquete`, `FechaCreacion`, `FechaActualizacion`) VALUES
(1, 'Santa Catalina', 'Cultural', 'Arequipa', 1200, 'Transporte, Alojamiento, Guía', 'Visita guiada al Monasterio de Santa Catalina y alrededores', 'https://upload.wikimedia.org/wikipedia/commons/5/5b/Monasterio_santa_catalina.jpg', '2024-06-19 08:16:13', '2024-07-21 04:35:24'),
(2, 'Plaza de Armas', 'Cultural', 'Arequipa', 1000, 'Transporte, Guía', 'Recorrido por la Plaza de Armas y la Catedral de Arequipa', 'https://images.mnstatic.com/b4/f7/b4f707d8b868e9df994e4040a44e77ed.jpg', '2024-06-19 08:16:13', '2024-06-19 08:38:41'),
(3, 'Mirador Yanahuara', 'Aventura', 'Arequipa', 800, 'Transporte, Guía', 'Vistas panorámicas desde el Mirador de Yanahuara', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2NS-8FHyfgVvU0IT2jVdiX9qn8M7hU6oWkw&s', '2024-06-19 08:16:13', '2024-06-19 08:24:29'),
(4, 'Museo Santuarios Andinos', 'Cultural', 'Arequipa', 1100, 'Transporte, Guía', 'Visita al Museo que alberga a la momia Juanita', 'https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/27/72/08.jpg', '2024-06-19 08:16:13', '2024-06-19 08:24:53'),
(5, 'Volcán Misti', 'Aventura', 'Arequipa', 1500, 'Transporte, Guía, Equipo de montaña', 'Ascenso al Volcán Misti con guía especializado', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUCFW1fxBuUC-wB0DZeimcYoe80ncClOKocg&s', '2024-06-19 08:16:13', '2024-06-19 08:25:17'),
(6, 'Cayma y sus Chicharrones', 'Aventura', 'Arequipa', 900, 'Transporte, Comidas, Guía', 'Tour gastronómico por Cayma y degustación de chicharrones', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBdEvRBob5SQwrWbHm7QaktWdlrqGqSwh3cg&s', '2024-06-19 08:16:13', '2024-06-19 08:25:50'),
(7, 'Valle del Colca', 'Aventura', 'Arequipa', 1800, 'Transporte, Alojamiento, Guía', 'Excursión al Cañón del Colca con pernocte en el valle', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzLwvI5-KXXSPLyKje1QMUWb6x0GwANgpF6g&s', '2024-06-19 08:16:13', '2024-06-19 08:26:12'),
(8, 'Casona Tristan del Pozo', 'Cultural', 'Arequipa', 1300, 'Transporte, Alojamiento, Guía', 'Estadía en la Casona Tristan del Pozo y tour histórico', 'https://upload.wikimedia.org/wikipedia/commons/5/56/CASA-TRISTAN-DEL-POZO-WIKI.jpg', '2024-06-19 08:16:13', '2024-06-19 08:26:32'),
(9, 'Mercado San Camilo', 'Cultural', 'Arequipa', 700, 'Transporte, Guía', 'Visita guiada al Mercado San Camilo y degustación de productos locales', 'https://upload.wikimedia.org/wikipedia/commons/c/c5/Mercado_San_Camilo.jpg', '2024-06-19 08:16:13', '2024-06-19 08:27:06'),
(10, 'Puente Bolognesi', 'Cultural', 'Arequipa', 600, 'Transporte, Guía', 'Recorrido histórico por el Puente Bolognesi y sus alrededores', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP6ezwKXrysbZ30abYKeR15IMu107bS5YcoQ&s', '2024-06-19 08:16:13', '2024-06-19 08:28:48'),
(18, 'Cañón del Colca', 'Tour de Aventura', 'Cañón del Colca, Arequipa', 120, 'Transporte, guía turístico, desayuno, almuerzo', 'Explora el impresionante Cañón del Colca, uno de los más profundos del mundo. Observa cóndores en su hábitat natural y disfruta de paisajes espectaculares.', 'https://www.paquetesdeviajesperu.com/wp-content/uploads/2022/07/canon-de-colca-scaled.jpg', '2024-07-21 13:26:37', '2024-07-21 13:32:34'),
(19, 'Salinas y Aguada Blanca', 'Tour Natural', 'Reserva Nacional', 70, 'Transporte, guía turístico, almuerzo', 'Aprecia la belleza natural de las salinas y la biodiversidad de la región. Ideal para amantes de la naturaleza y la fotografía.', 'https://www.vivearequipa.com/wp-content/uploads/2022/06/principal_reserva_aguda_blanca_salinas_divulgacion.jpg', '2024-07-21 13:31:18', '2024-07-21 13:32:19'),
(20, 'Caminata al Volcán Misti', 'Tour de Aventura', 'Volcán Misti, Arequipa', 150, 'Transporte, guía de montaña, equipo de escalada', 'Una experiencia desafiante que te llevará a la cima del majestuoso Volcán Misti. Disfruta de vistas panorámicas y un reto inolvidable.', 'https://media.traveler.es/photos/61376ddacb06ad0f20e12713/master/pass/143246.jpg', '2024-07-21 13:34:02', '2024-07-21 13:34:02'),
(21, 'Tour al Valle de los Volcanes', 'Tour Natural', 'Valle de los Volcanes, Andagua', 100, 'Transporte, guía turístico, almuerzo', 'Explora un paisaje único formado por numerosos volcanes extintos. Conoce la geología y la historia de este fascinante lugar.', 'https://elbuho.pe/wp-content/uploads/2023/03/valle-de-los-volcanes-andagua-arequipa-1.jpg', '2024-07-21 13:35:13', '2024-07-21 13:35:51');

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
(3, NULL, 'Problema con el paquete', 'El paquete no incluye lo mencionado', '2024-05-23 19:00:00', NULL, NULL),
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
  `Estado` varchar(30) DEFAULT NULL,
  `CanceladoPor` varchar(5) DEFAULT NULL,
  `FechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IdReserva`, `IdPaquete`, `CorreoUsuario`, `FechaInicio`, `FechaFin`, `Comentario`, `FechaRegistro`, `Estado`, `CanceladoPor`, `FechaActualizacion`) VALUES
(11, 1, NULL, '0000-00-00', '0000-00-00', 'hola', '2024-07-20 08:21:32', 'Pagado', NULL, '2024-07-20 16:15:20'),
(12, 2, NULL, '2022-12-12', '2022-12-15', 'a', '2024-07-20 08:34:13', 'Pendiente', NULL, '2024-07-20 16:15:15'),
(13, 21, 'estrosebas@gmail.com', '2024-07-21', '2024-07-25', 'pa mi', '2024-07-21 13:36:47', '0', NULL, '2024-07-21 13:36:47');

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
  `FechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `esAdmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `NumeroMovil`, `Correo`, `Contraseña`, `FechaRegistro`, `FechaActualizacion`, `esAdmin`) VALUES
(1, 'Juan Perez', '9876543210', 'juan.perez@example.com', 'password123', '2024-05-01 17:00:00', '2024-05-01 17:00:00', 0),
(2, 'Ana Garcia', '9876543211', 'ana.garcia@example.com', 'password123', '2024-05-02 17:00:00', '2024-05-02 17:00:00', 0),
(3, 'Luis Gomez', '9876543212', 'luis.gasca@gmail.com', 'Estro123', '2024-05-03 17:00:00', '2024-07-20 22:09:18', 0),
(4, 'Maria Lopez', '9876543213', 'maria.lopez@example.com', 'password123', '2024-05-04 17:00:00', '2024-05-04 17:00:00', 0),
(5, 'Carlos Torres', '9876543214', 'carlos.torres@example.com', 'password123', '2024-05-05 17:00:00', '2024-05-05 17:00:00', 0),
(6, 'Sofia Sanchez', '9876543215', 'sofia.sanchez@example.com', 'password123', '2024-05-06 17:00:00', '2024-05-06 17:00:00', 0),
(7, 'Miguel Ramirez', '9876543216', 'miguel.ramirez@example.com', 'password123', '2024-05-07 17:00:00', '2024-05-07 17:00:00', 0),
(8, 'Laura Diaz', '9876543217', 'laura.diaz@example.com', 'password123', '2024-05-08 17:00:00', '2024-05-08 17:00:00', 0),
(9, 'Jorge Moreno', '9876543218', 'jorge.moreno@example.com', 'password123', '2024-05-09 17:00:00', '2024-05-09 17:00:00', 0),
(10, 'Andrea Ruiz', '9876543219', 'andrea.ruiz@example.com', 'password123', '2024-05-10 17:00:00', '2024-05-10 17:00:00', 0),
(12, 'Diego Sebastian Gonzales Gomez', '962233318', 'estrosebas@gmail.com', 'Estro123', '2024-06-19 05:33:58', '2024-07-21 05:11:10', 0),
(13, 'Diego Sebastian Gonzales Gomez', '962233318', 'estrofree@gmail.com', 'Estro123', '2024-06-19 05:43:34', '2024-06-19 05:43:47', 1),
(15, 'Leandro', '978833788', 'leandroboza.666@gmail.com', 'xDestryCrx', '2024-07-21 02:59:04', NULL, 0);

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
  MODIFY `IdPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
