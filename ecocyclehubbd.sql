-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2024 a las 21:49:22
-- Versión del servidor: 11.4.0-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecocyclehubbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `entrada` datetime DEFAULT NULL,
  `salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_empleado`, `entrada`, `salida`) VALUES
(11, 6, '2024-04-16 03:43:55', '2024-04-16 05:43:55'),
(12, 4, '2024-04-25 17:27:57', '2024-04-26 17:27:57'),
(13, 1, '2024-04-23 02:59:44', '2024-04-24 02:59:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre`) VALUES
(1, 'Recolector'),
(2, 'Conductor'),
(3, 'Separador'),
(4, 'Gerente'),
(5, 'Supervisor'),
(6, 'Administrador'),
(7, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `material` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `nombre`, `apellido`, `usuario`, `fecha_hora`, `direccion`, `material`) VALUES
(20, 'Cristhian Jovanni', 'Aguayo Cruz', 'Admin3', '2020-10-24 10:15:00', 'C. Independencia #20', 'Metal'),
(21, 'Jorge Osvaldo ', 'Dorado Jarero', 'Admin4', '2020-10-24 10:01:00', 'Altamira #23', 'PET'),
(22, 'Diego Carlos', 'Diaz Flores', 'Admin3', '2020-10-25 10:00:00', 'Altamira #23', 'Carton');

--
-- Disparadores `citas`
--
DELIMITER $$
CREATE TRIGGER `after_insert_citas_with_employee` AFTER INSERT ON `citas` FOR EACH ROW BEGIN
    DECLARE empleado_id INT;
    DECLARE cargo_id INT;
    
    -- Seleccionar aleatoriamente un empleado con id_cargo 1, 2 o 3
    SELECT id_empleado, cargo INTO empleado_id, cargo_id 
    FROM empleado 
    WHERE cargo IN (1, 3) 
    ORDER BY RAND() 
    LIMIT 1;
    
    -- Insertar el nuevo registro en la tabla visitas con el empleado seleccionado
    INSERT INTO visitas (id_cita, id_empleado, id_cargo, usuario, fecha_hora, direccion, material)
    VALUES (NEW.id_cita, empleado_id, cargo_id, NEW.usuario, NEW.fecha_hora, NEW.direccion, NEW.material);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `RFC` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido`, `RFC`, `cargo`) VALUES
(1, 'Juan Manuel', 'Quispe Chocce', '78945612', 1),
(2, 'Jose', 'Vega Chavez', '77441122', 3),
(3, 'Erick', 'Muleta Paredes', '77885522', 3),
(4, 'Maria', 'Molina Gutiérrez', '00225566', 5),
(6, 'Ismael', 'Sandoval de la Cruz', '74433542', 2),
(12, 'Miguel Angel', 'Dorado Jarero', '23232232', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qys`
--

CREATE TABLE `qys` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `qys`
--

INSERT INTO `qys` (`Id`, `Nombre`, `Telefono`, `Correo`, `Mensaje`) VALUES
(1, 'Miguel Dorado', '3329484508', 'migueldoradoedmodo@gmail.com', 'No'),
(3, 'Evelin', '1450987', 'evelin.124@gmail.com', 'Es una pagina asqueroso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `password`, `id_cargo`) VALUES
(3, 'Diego Alberto', 'Diaz Flores', 'User3', '202cb962ac59075b964b07152d234b70', 7),
(15, 'Miguel Angel', 'Dorado Jarero', 'Admin1', '202cb962ac59075b964b07152d234b70', 6),
(21, 'Cristhian Jovanni', 'Aguayo Cruz', 'Admin2', '202cb962ac59075b964b07152d234b70', 6),
(22, 'Base de Datos', 'Chupapene', 'User4', '202cb962ac59075b964b07152d234b70', 7),
(26, 'Miguel', 'Rea Gonzalez', 'MiguelG', '81dc9bdb52d04dc20036dbd8313ed055', 7),
(27, 'Jorge', 'Dorado Jarero', 'Osvaldo27', '81dc9bdb52d04dc20036dbd8313ed055', 7),
(28, 'Diego', 'Rea Gonzalez', 'DiegoRG', '81dc9bdb52d04dc20036dbd8313ed055', 7),
(29, 'Manuel', 'Esparza', 'ManuelE', '81dc9bdb52d04dc20036dbd8313ed055', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_cita` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `material` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id_visita`, `id_empleado`, `id_cargo`, `id_cita`, `usuario`, `fecha_hora`, `direccion`, `material`) VALUES
(29, 3, 3, 20, 'Admin3', '2020-10-24 10:15:00', 'C. Independencia #20', 'Metal'),
(30, 2, 3, 21, 'Admin4', '2020-10-24 10:01:00', 'Altamira #23', 'PET'),
(31, 1, 1, 22, 'Admin3', '2020-10-25 10:00:00', 'Altamira #23', 'Carton');

--
-- Disparadores `visitas`
--
DELIMITER $$
CREATE TRIGGER `after_delete_visitas` AFTER DELETE ON `visitas` FOR EACH ROW BEGIN
    DELETE FROM citas WHERE id_cita = OLD.id_cita;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `fk2` (`id_empleado`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fk1` (`cargo`);

--
-- Indices de la tabla `qys`
--
ALTER TABLE `qys`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `visitas_ibfk_1` (`id_empleado`),
  ADD KEY `visitas_ibfk_2` (`id_cita`),
  ADD KEY `visitas_ibfk_3` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `qys`
--
ALTER TABLE `qys`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitas_ibfk_2` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visitas_ibfk_3` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
