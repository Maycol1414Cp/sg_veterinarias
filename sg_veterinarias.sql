-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2024 a las 20:39:34
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
-- Base de datos: `sg_veterinarias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sg_veterinarias`
--

CREATE TABLE `sg_veterinarias` (
  `id` int NOT NULL,
  `dueno` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `mascota` varchar(50) DEFAULT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `tratamientos` varchar(50) DEFAULT NULL,
  `costo` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sg_veterinarias`
--

INSERT INTO `sg_veterinarias` (`id`, `nombre`, `mascota`, `raza`, `costo`, `tratamientos`, `dueno`, `fecha`) VALUES
(1, 'Firulais', 'Perro', 'Labrador', 30.00, 'Vacunación', 'Juan Pérez', '2024-07-15'),
(2, 'Luna', 'Gato', 'Siames', 40.00, 'Desparasitación', 'María López', '2024-07-16'),
(3, 'Polly', 'Pájaro', 'Canario', 20.00, 'Chequeo general', 'Carlos Gómez', '2024-07-17'),
(4, 'Maxi', 'Perro', 'Chapie', 50.00, 'Cirugía', 'Juana Ramírez', '2024-07-18'),
(5, 'Leo', 'Gato', 'Angora', 25.00, 'Vacunación', 'Jasiel Martínez', '2024-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones_login`
--

CREATE TABLE `sessiones_login` (
  `correo_electronico` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sessiones_login`
--

INSERT INTO `sessiones_login` (`correo_electronico`, `nombre`, `contrasena`) VALUES
('admin@admin.com', 'Carlos', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sg_veterinarias`
--
ALTER TABLE `sg_veterinarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessiones_login`
--
ALTER TABLE `sessiones_login`
  ADD PRIMARY KEY (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sg_veterinarias`
--
ALTER TABLE `sg_veterinarias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;