-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2023 a las 06:21:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_9`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `emp_id` int(11) NOT NULL,
  `emp_nom` varchar(100) DEFAULT NULL,
  `emp_dir` varchar(50) DEFAULT NULL,
  `emp_tel` varchar(10) DEFAULT NULL,
  `emp_ciu` varchar(25) DEFAULT NULL,
  `emp_dep` varchar(25) DEFAULT NULL,
  `emp_cod_pos` varchar(10) DEFAULT NULL,
  `emp_ced` varchar(10) DEFAULT NULL,
  `emp_num_seg_soc` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`emp_id`, `emp_nom`, `emp_dir`, `emp_tel`, `emp_ciu`, `emp_dep`, `emp_cod_pos`, `emp_ced`, `emp_num_seg_soc`) VALUES
(100001, 'Willi el jardinero', 'calle siempre viva', '255562', 'Sprinfield', 'No se', '7885', '2526', '4885');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_medicos`
--

CREATE TABLE `horarios_medicos` (
  `hm_id` int(11) NOT NULL,
  `med_id` int(11) DEFAULT NULL,
  `hm_dia` varchar(3) DEFAULT NULL,
  `hm_sem` varchar(3) DEFAULT NULL,
  `hm_hini` varchar(8) DEFAULT NULL,
  `hm_hfin` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios_medicos`
--

INSERT INTO `horarios_medicos` (`hm_id`, `med_id`, `hm_dia`, `hm_sem`, `hm_hini`, `hm_hfin`) VALUES
(101, 2, '30', '4', '1:00', '23:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `med_id` int(11) NOT NULL,
  `med_nom` varchar(100) DEFAULT NULL,
  `med_dir` varchar(100) DEFAULT NULL,
  `med_tel` varchar(10) DEFAULT NULL,
  `med_ciu` varchar(25) DEFAULT NULL,
  `med_dep` varchar(25) DEFAULT NULL,
  `med_cod_pos` varchar(15) DEFAULT NULL,
  `med_ced` varchar(10) DEFAULT NULL,
  `med_num_seg_soc` varchar(15) DEFAULT NULL,
  `med_mat_pro` varchar(15) DEFAULT NULL,
  `med_tip` enum('medico titular','medico interino','medico sustituto') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`med_id`, `med_nom`, `med_dir`, `med_tel`, `med_ciu`, `med_dep`, `med_cod_pos`, `med_ced`, `med_num_seg_soc`, `med_mat_pro`, `med_tip`) VALUES
(1, 'Sergio Castaño Londoño', 'cll 52 N 32 B 21', '3123568957', 'Manizales', 'Caldas', '78452', '1225488745', '123456', '987654', 'medico titular'),
(2, 'Juan Castaño', 'calle 32b N58z 21', '3125898652', 'Manizales', 'Caldas', '8965', '1552488952', '2451', '366652', 'medico interino'),
(3, 'David Londoño', 'cll 52 N 32 B 21', '3123568957', 'villamaria', 'Caldas', '8965', '1552488952', '55555', '987654', 'medico sustituto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_nom` varchar(100) DEFAULT NULL,
  `pac_dir` varchar(50) DEFAULT NULL,
  `pac_tel` varchar(10) DEFAULT NULL,
  `pac_cod_pos` varchar(10) DEFAULT NULL,
  `pac_ced` varchar(10) DEFAULT NULL,
  `pac_num_seg_soc` varchar(10) DEFAULT NULL,
  `med_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`pac_id`, `pac_nom`, `pac_dir`, `pac_tel`, `pac_cod_pos`, `pac_ced`, `pac_num_seg_soc`, `med_id`) VALUES
(101, 'Enfermo prueba', 'la casa del enfermo', '018000', '10001', '1000001', '15298', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos_vacaciones`
--

CREATE TABLE `periodos_vacaciones` (
  `pv_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `pv_fec_ini` date DEFAULT NULL,
  `pv_fec_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustitutos`
--

CREATE TABLE `sustitutos` (
  `sus_id` int(11) NOT NULL,
  `med_id` int(11) DEFAULT NULL,
  `sus_fec_alt` varchar(25) DEFAULT NULL,
  `sus_fec_baj` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sustitutos`
--

INSERT INTO `sustitutos` (`sus_id`, `med_id`, `sus_fec_alt`, `sus_fec_baj`) VALUES
(1, 3, '14/06/2023', '20/06/2023'),
(1, 3, '21/06/2023', '10/08/2023');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`med_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pac_id`),
  ADD KEY `med_id` (`med_id`);

--
-- Indices de la tabla `periodos_vacaciones`
--
ALTER TABLE `periodos_vacaciones`
  ADD PRIMARY KEY (`pv_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`med_id`) REFERENCES `medicos` (`med_id`);

--
-- Filtros para la tabla `periodos_vacaciones`
--
ALTER TABLE `periodos_vacaciones`
  ADD CONSTRAINT `periodos_vacaciones_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `empleados` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
