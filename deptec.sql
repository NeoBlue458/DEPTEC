-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2025 a las 21:16:33
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
-- Base de datos: `deptec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquila`
--

CREATE TABLE `alquila` (
  `id_alquila` int(10) NOT NULL,
  `fecha_alquiler` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `id_inquilino` int(10) DEFAULT NULL,
  `id_departamento` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(10) NOT NULL,
  `nombre_D` varchar(100) NOT NULL,
  `amueblado` varchar(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_D`, `amueblado`, `precio`) VALUES
(1, 'Departamento001', '1', 1200.00),
(2, 'Departamento002', '2', 1800.00),
(3, 'Departamento003', '3', 2000.00),
(4, 'Departamento004', 'Base de Cama', 2500.00),
(5, 'Departamento004', 'Ropero', 2500.00),
(6, 'Departamento004', 'Ropero', 2500.00),
(7, 'Departamento0012', 'Mesa de Noche', 3000.00),
(8, 'Departamento0012', 'Base de Cama', 3000.00),
(9, 'Departamento0012', 'Base de Cama', 3000.00),
(10, 'Departamento0012', 'Base de Cama', 3000.00),
(11, 'Departamento0012', 'Base de Cama', 3000.00),
(12, 'Departamento0012', 'Base de Cama', 3000.00),
(13, 'Departamento0012', 'Base de Cama', 3000.00),
(14, 'Departamento0012', 'Base de Cama', 3000.00),
(15, 'Departamento0012', 'Base de Cama', 3000.00),
(16, 'Departamento0012', 'Base de Cama', 3000.00),
(17, 'Departamento0013', 'Base de Cama', 3500.00),
(18, 'Departamento0013', 'Base de Cama', 3500.00),
(19, 'Departamento0014', 'Sillón', 2000.00),
(20, 'Departamento0014', 'Sillón', 2000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquilino`
--

CREATE TABLE `inquilino` (
  `id_inquilino` int(10) NOT NULL,
  `nombre_I` varchar(100) NOT NULL,
  `apellido_paterno` varchar(100) DEFAULT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `telefono_tutor` varchar(15) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id_recibo` int(10) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `pagado` tinyint(1) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `id_alquila` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(10) NOT NULL,
  `nombre_S` varchar(100) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `id_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `nombre_U` varchar(100) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquila`
--
ALTER TABLE `alquila`
  ADD PRIMARY KEY (`id_alquila`),
  ADD KEY `id_inquilino` (`id_inquilino`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `inquilino`
--
ALTER TABLE `inquilino`
  ADD PRIMARY KEY (`id_inquilino`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_alquila` (`id_alquila`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquila`
--
ALTER TABLE `alquila`
  MODIFY `id_alquila` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inquilino`
--
ALTER TABLE `inquilino`
  MODIFY `id_inquilino` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id_recibo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquila`
--
ALTER TABLE `alquila`
  ADD CONSTRAINT `alquila_ibfk_1` FOREIGN KEY (`id_inquilino`) REFERENCES `inquilino` (`id_inquilino`),
  ADD CONSTRAINT `alquila_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `inquilino`
--
ALTER TABLE `inquilino`
  ADD CONSTRAINT `inquilino_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`id_alquila`) REFERENCES `alquila` (`id_alquila`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
