-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2024 at 10:22 PM
-- Server version: 11.4.2-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sg_veterinarias`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessiones_login`
--

CREATE TABLE `sessiones_login` (
  `correo_electronico` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessiones_login`
--

INSERT INTO `sessiones_login` (`correo_electronico`, `nombre`, `contrasena`) VALUES
('a@b.c', 'abc', '3e39b3844837bdefc8017fbcb386ea302af877fb17baa09d0a1bd34b67bbf2b34fba314bbcab450f5f3f73771b7aea956ba3320defda029723f4fdff7dfa007b'),
('admin@admin.com', 'Carlos', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0');

-- --------------------------------------------------------

--
-- Table structure for table `sg_veterinarias`
--

CREATE TABLE `sg_veterinarias` (
  `id` int(11) NOT NULL,
  `dueno` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `mascota` varchar(50) DEFAULT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `tratamientos` varchar(50) DEFAULT NULL,
  `costo` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sg_veterinarias`
--

INSERT INTO `sg_veterinarias` (`id`, `dueno`, `nombre`, `mascota`, `raza`, `tratamientos`, `costo`, `fecha`) VALUES
(1, 'Juan Pérez', 'Firulais', 'Perro', 'Labrador', 'Vacunación', '30.00', '2024-07-15'),
(2, 'María López', 'Luna', 'Gato', 'Siames', 'Desparasitación', '40.00', '2024-07-16'),
(3, 'Carlos Gómez', 'Polly', 'Pájaro', 'Canario', 'Chequeo general', '20.00', '2024-07-17'),
(4, 'Juana Ramírez', 'Maxi', 'Perro', 'Chapie', 'Cirugía', '50.00', '2024-07-18'),
(5, 'Jasiel Martínez', 'Leo', 'Gato', 'Angora', 'Vacunación', '25.00', '2024-07-19'),
(7, 'Juan', 'hachi', 'perro', 'cucker', 'moquillo', '100', '2024-10-12'),
(8, 'Laura García', 'Clínica Veterinaria Central', 'Milo', 'Husky', 'Vacunación, Cirugía', '450', '2024-01-22'),
(9, 'Pedro Rodríguez', 'Clínica Veterinaria Central', 'Coco', 'Cocker Spaniel', 'Desparasitación, Tratamiento para la piel', '160', '2024-01-23'),
(10, 'Elena Díaz', 'Clínica Veterinaria Central', 'Lucy', 'Pastor Alemán', 'Consulta General, Vacunación', '130', '2024-01-24'),
(11, 'Fernando Ruiz', 'Clínica Veterinaria Central', 'Buddy', 'Dálmata', 'Vacunación, Desparasitación', '150', '2024-01-25'),
(12, 'Patricia Gómez', 'Clínica Veterinaria Central', 'Lola', 'Shih Tzu', 'Esterilización, Vacunación', '220', '2024-01-26'),
(13, 'Javier Morales', 'Clínica Veterinaria Central', 'Rex', 'Doberman', 'Consulta General, Medicación', '180', '2024-01-27'),
(14, 'Marta Pérez', 'Clínica Veterinaria Central', 'Kira', 'Boxer', 'Cirugía, Tratamiento Antipulgas', '500', '2024-01-28'),
(15, 'Andrés Castillo', 'Clínica Veterinaria Central', 'Chloe', 'Chihuahua', 'Vacunación, Desparasitación', '140', '2024-01-29'),
(16, 'Sandra López', 'Clínica Veterinaria Central', 'Jack', 'Terrier', 'Limpieza Dental, Vacunación', '170', '2024-01-30'),
(17, 'Ricardo Hernández', 'Clínica Veterinaria Central', 'Zeus', 'Gran Danés', 'Consulta General, Desparasitación', '200', '2024-01-31'),
(18, 'Verónica Romero', 'Clínica Veterinaria Central', 'Maggie', 'Schnauzer', 'Vacunación, Tratamiento para la piel', '160', '2024-02-01'),
(19, 'Francisco Vega', 'Clínica Veterinaria Central', 'Loki', 'Akita', 'Cirugía, Medicación', '480', '2024-02-02'),
(20, 'Carmen Méndez', 'Clínica Veterinaria Central', 'Bella', 'Bichón Frisé', 'Vacunación, Esterilización', '210', '2024-02-03'),
(21, 'Mario Ortiz', 'Clínica Veterinaria Central', 'Max', 'Pomerania', 'Consulta General, Vacunación', '130', '2024-02-04'),
(22, 'Alicia Blanco', 'Clínica Veterinaria Central', 'Zoe', 'Boston Terrier', 'Desparasitación, Tratamiento Antipulgas', '140', '2024-02-05'),
(23, 'Gabriel Ruiz', 'Clínica Veterinaria Central', 'Oscar', 'Border Collie', 'Vacunación, Cirugía', '460', '2024-02-06'),
(24, 'Adriana Soto', 'Clínica Veterinaria Central', 'Mia', 'Pinscher', 'Consulta General, Limpieza Dental', '150', '2024-02-07'),
(25, 'Luis Ramos', 'Clínica Veterinaria Central', 'Toby', 'Rottweiler', 'Tratamiento para la piel, Vacunación', '200', '2024-02-08'),
(26, 'Carolina Jiménez', 'Clínica Veterinaria Central', 'Nina', 'Pug', 'Desparasitación, Esterilización', '180', '2024-02-09'),
(27, 'José Silva', 'Clínica Veterinaria Central', 'Simba', 'Mastín', 'Consulta General, Tratamiento Antipulgas', '220', '2024-02-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessiones_login`
--
ALTER TABLE `sessiones_login`
  ADD PRIMARY KEY (`correo_electronico`);

--
-- Indexes for table `sg_veterinarias`
--
ALTER TABLE `sg_veterinarias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sg_veterinarias`
--
ALTER TABLE `sg_veterinarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
