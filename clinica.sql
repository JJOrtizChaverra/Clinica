-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2024 a las 17:19:50
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
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `document_admin` text DEFAULT NULL,
  `name_admin` text DEFAULT NULL,
  `lastname_admin` text DEFAULT NULL,
  `picture_admin` text DEFAULT NULL,
  `password_admin` text DEFAULT NULL,
  `role_admin` text NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `document_admin`, `name_admin`, `lastname_admin`, `picture_admin`, `password_admin`, `role_admin`) VALUES
(1, '123987456', 'Luis', 'Gallego', '201-81.png', '$argon2id$v=19$m=65536,t=4,p=1$WVQzcVBoRHFwNzl5S1pzZQ$nsGXQ6SzYcu3cqyAIplylFvGBBILzCk4WYJ5C4MiZPQ', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulting_rooms`
--

CREATE TABLE `consulting_rooms` (
  `id_consulting_room` int(11) NOT NULL,
  `name_consulting_room` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `consulting_rooms`
--

INSERT INTO `consulting_rooms` (`id_consulting_room`, `name_consulting_room`) VALUES
(49, 'Odontologia'),
(260, 'Nutrición'),
(303, 'Psicología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` int(11) NOT NULL,
  `document_doctor` int(12) DEFAULT 0,
  `name_doctor` text DEFAULT NULL,
  `lastname_doctor` text DEFAULT NULL,
  `gender_doctor` varchar(11) DEFAULT NULL,
  `password_doctor` text DEFAULT NULL,
  `picture_doctor` text DEFAULT NULL,
  `role_doctor` text DEFAULT 'doctor',
  `id_consulting_room_doctor` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `document_doctor`, `name_doctor`, `lastname_doctor`, `gender_doctor`, `password_doctor`, `picture_doctor`, `role_doctor`, `id_consulting_room_doctor`) VALUES
(82, 12345678, 'María García', 'López Vergara', 'Femenino', '$argon2id$v=19$m=65536,t=4,p=1$eGZyaTFhWnRvYUxEVVVkRQ$c/c9ZMt9H19DFCiDvsVFvVoM7lMmPMK8isnTuyrKg4A', NULL, 'doctor', 303),
(83, 98765432, 'Juan David', 'Martínez Lopera', 'Masculino', '$argon2id$v=19$m=65536,t=4,p=1$NUx3VDNldC5jaGRDNHgwMw$kvybN5XlC0egaYGFQwd6kPdp/eQMOrYI5Wv9eLhFUCw', NULL, 'doctor', 49),
(84, 45678901, 'Ana María', 'Sánchez Rodríguez', 'Femenino', '$argon2id$v=19$m=65536,t=4,p=1$R0Nld1NHVHN2VnhiSXdNWg$BA0DaTl3bWsQlv/Wt6hhe9qLsRK6PND27PAFWXSaIug', NULL, 'doctor', 49),
(85, 23456789, 'Carlos Manuel', 'González', 'Masculino', '$argon2id$v=19$m=65536,t=4,p=1$bG9teXBqTXFxdWVGeDc3Lw$Dv4+qi9nNTTPBeTPgV+DJdIhZUPnFixzlznnZay2N64', NULL, 'doctor', 260),
(86, 34567890, 'Laura', 'Martínez García', 'Femenino', '$argon2id$v=19$m=65536,t=4,p=1$bGsvc1pmZG5hR0xNNFNCeg$fony2XqirCLDLghmjkEwmzLFNkBdHUeB4cBc9LOGC7U', NULL, 'doctor', 303);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarys`
--

CREATE TABLE `horarys` (
  `id_horary` int(11) NOT NULL,
  `date_horary` date DEFAULT NULL,
  `start_horary` time DEFAULT NULL,
  `end_horary` time DEFAULT NULL,
  `times_horary` text DEFAULT NULL,
  `minutes_range_horary` int(11) DEFAULT 0,
  `id_doctor_horary` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `horarys`
--

INSERT INTO `horarys` (`id_horary`, `date_horary`, `start_horary`, `end_horary`, `times_horary`, `minutes_range_horary`, `id_doctor_horary`) VALUES
(6, '2024-03-31', '12:00:00', '17:00:00', '[\"12:15\",\"12:30\",\"12:45\",\"13:00\",\"13:15\",\"13:30\",\"13:45\",\"14:00\",\"14:15\",\"14:30\",\"14:45\",\"15:00\",\"15:15\",\"15:30\",\"15:45\",\"16:00\",\"16:15\",\"16:30\",\"16:45\"]', 15, 85),
(7, '2024-03-30', '18:00:00', '22:00:00', '[\"18:30\",\"19:00\",\"19:30\",\"20:00\",\"21:00\",\"21:30\"]', 30, 85),
(8, '2024-04-01', '18:14:00', '22:14:00', '[\"18:39\",\"19:04\",\"19:29\",\"19:54\",\"20:19\",\"20:44\",\"21:09\",\"21:59\"]', 25, 85),
(9, '2024-03-31', '15:00:00', '20:00:00', '[\"15:30\",\"16:00\",\"16:30\",\"17:30\",\"18:00\",\"18:30\",\"19:00\",\"19:30\"]', 30, 86),
(10, '2024-04-03', '08:00:00', '16:00:00', '[\"08:15\",\"08:30\",\"08:45\",\"09:00\",\"09:15\",\"09:30\",\"09:45\",\"10:00\",\"10:15\",\"10:30\",\"10:45\",\"11:15\",\"11:30\",\"11:45\",\"12:00\",\"12:15\",\"12:30\",\"12:45\",\"13:00\",\"13:15\",\"13:30\",\"13:45\",\"14:00\",\"14:15\",\"14:30\",\"14:45\",\"15:00\",\"15:15\",\"15:30\",\"15:45\"]', 15, 86),
(14, '2024-04-02', '08:00:00', '15:00:00', '[\"08:30\",\"09:00\",\"09:30\",\"10:00\",\"10:30\",\"11:00\",\"11:30\",\"12:00\",\"12:30\",\"13:00\",\"13:30\",\"14:30\"]', 30, 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `id_patient` int(11) NOT NULL,
  `document_patient` int(11) DEFAULT 0,
  `name_patient` text DEFAULT NULL,
  `lastname_patient` text DEFAULT NULL,
  `gender_patient` text DEFAULT NULL,
  `password_patient` text DEFAULT NULL,
  `picture_patient` text DEFAULT NULL,
  `role_patient` text NOT NULL DEFAULT 'patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `patients`
--

INSERT INTO `patients` (`id_patient`, `document_patient`, `name_patient`, `lastname_patient`, `gender_patient`, `password_patient`, `picture_patient`, `role_patient`) VALUES
(46, 56789012, 'Alejandro', 'Pérez Montoya', 'Masculino', '$argon2id$v=19$m=65536,t=4,p=1$N3FLQkw0aVdFN3VORVI4OQ$/1y6yd7iWBBatiVwSDt7H/8R6rfAPrPAvJYZY5JYors', '29-83.png', 'patient'),
(47, 67890123, 'Mariana Sofía', 'Cardona', 'Femenino', '$argon2id$v=19$m=65536,t=4,p=1$b0hySzlCU3NiWlB3RkZjOA$EmcJnAfd95B9J7IJ/ibykUwGP6P1spqOb1uMr9x80mE', NULL, 'patient'),
(48, 78901234, 'Daniel', 'Gómez', 'Masculino', '$argon2id$v=19$m=65536,t=4,p=1$UmR6VmJQenZPNDJReVFLaA$EpJJE23hWXqaZJXKg3IgFQmY2lWkiVbF5DU9iRYyiVw', NULL, 'patient');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

CREATE TABLE `quotes` (
  `id_quote` int(11) NOT NULL,
  `date_quote` date DEFAULT NULL,
  `time_quote` time DEFAULT NULL,
  `id_patient_quote` int(11) NOT NULL DEFAULT 0,
  `id_doctor_quote` int(11) NOT NULL DEFAULT 0,
  `id_consulting_room_quote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`id_quote`, `date_quote`, `time_quote`, `id_patient_quote`, `id_doctor_quote`, `id_consulting_room_quote`) VALUES
(14, '2024-03-30', '20:30:00', 46, 85, 260),
(15, '2024-03-31', '17:00:00', 46, 86, 303),
(19, '2024-04-01', '21:34:00', 46, 85, 260),
(20, '2024-04-03', '11:00:00', 46, 86, 303),
(21, '2024-04-02', '14:00:00', 46, 85, 260);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarys`
--

CREATE TABLE `secretarys` (
  `id_secretary` int(11) NOT NULL,
  `document_secretary` text DEFAULT NULL,
  `name_secretary` text DEFAULT NULL,
  `lastname_secretary` text DEFAULT NULL,
  `picture_secretary` text DEFAULT NULL,
  `password_secretary` text DEFAULT NULL,
  `role_secretary` text DEFAULT 'secretary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `secretarys`
--

INSERT INTO `secretarys` (`id_secretary`, `document_secretary`, `name_secretary`, `lastname_secretary`, `picture_secretary`, `password_secretary`, `role_secretary`) VALUES
(1, '123456789', 'Mariana Lucía', 'Díaz Montoya', NULL, '$argon2id$v=19$m=65536,t=4,p=1$bG9teXBqTXFxdWVGeDc3Lw$Dv4+qi9nNTTPBeTPgV+DJdIhZUPnFixzlznnZay2N64', 'secretary'),
(3, '90123456', 'Juana Patricia', 'Ramírez López', NULL, '$argon2id$v=19$m=65536,t=4,p=1$NU90bjdpUXRmY2w4eVdVSw$U7APcIrBu8b4AU+DQqn1dwDiQyOLGLQDir8iJWoL8F0', 'secretary'),
(5, '765113721', 'Andrea', 'Hernández', NULL, '$argon2id$v=19$m=65536,t=4,p=1$cVE0dTFydzNYZ2VITjREdw$Q6YZwKXAwbWElxa3MWecSmtIqFX39tbRhUkULFc/X1Y', 'secretary'),
(7, '1234567890', 'Juliana', 'Perez', NULL, '$argon2id$v=19$m=65536,t=4,p=1$UUVPQ29pbDlwYXJQMnlvMw$JRESD/R2V8wqf7A8ktIhTS9ujshSuwXeEwUhc96GrHc', 'secretary');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `consulting_rooms`
--
ALTER TABLE `consulting_rooms`
  ADD PRIMARY KEY (`id_consulting_room`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `consulting_room_doctor` (`id_consulting_room_doctor`);

--
-- Indices de la tabla `horarys`
--
ALTER TABLE `horarys`
  ADD PRIMARY KEY (`id_horary`),
  ADD KEY `id_doctor_horary` (`id_doctor_horary`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patient`);

--
-- Indices de la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id_quote`),
  ADD KEY `quotes_ibfk_1` (`id_doctor_quote`),
  ADD KEY `quotes_ibfk_2` (`id_consulting_room_quote`),
  ADD KEY `quotes_ibfk_3` (`id_patient_quote`);

--
-- Indices de la tabla `secretarys`
--
ALTER TABLE `secretarys`
  ADD PRIMARY KEY (`id_secretary`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consulting_rooms`
--
ALTER TABLE `consulting_rooms`
  MODIFY `id_consulting_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `horarys`
--
ALTER TABLE `horarys`
  MODIFY `id_horary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id_quote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `secretarys`
--
ALTER TABLE `secretarys`
  MODIFY `id_secretary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_consulting_room_doctor`) REFERENCES `consulting_rooms` (`id_consulting_room`);

--
-- Filtros para la tabla `horarys`
--
ALTER TABLE `horarys`
  ADD CONSTRAINT `horarys_ibfk_1` FOREIGN KEY (`id_doctor_horary`) REFERENCES `doctors` (`id_doctor`);

--
-- Filtros para la tabla `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`id_doctor_quote`) REFERENCES `doctors` (`id_doctor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quotes_ibfk_2` FOREIGN KEY (`id_consulting_room_quote`) REFERENCES `consulting_rooms` (`id_consulting_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quotes_ibfk_3` FOREIGN KEY (`id_patient_quote`) REFERENCES `patients` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
