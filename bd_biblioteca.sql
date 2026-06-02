-- phpMyAdmin SQL Dump
-- Sistema de Gestión de Biblioteca
-- bd_biblioteca

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_biblioteca`
--

CREATE DATABASE IF NOT EXISTS `bd_biblioteca`;
USE `bd_biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `categoria` varchar(80) DEFAULT NULL,
  `stock` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `isbn`, `categoria`, `stock`) VALUES
(1, 'El Señor de los Anillos', 'J.R.R. Tolkien', '978-84-450-7179-3', 'Fantasía', 3),
(2, 'Cien Años de Soledad', 'Gabriel García Márquez', '978-84-376-0494-7', 'Literatura', 2),
(3, 'Algoritmos y Estructuras', 'Thomas H. Cormen', '978-0-262-03384-8', 'Informática', 2),
(4, 'El Principito', 'Antoine de Saint-Exupéry', '978-84-261-3289-5', 'Clásicos', 4),
(5, 'Bases de Datos', 'C. J. Date', '978-968-444-471-1', 'Informática', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `carnet` varchar(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `carnet`, `telefono`, `correo`) VALUES
(1, 'Ana María López', '2021-12345', '70012345', 'ana.lopez@usfx.bo'),
(2, 'Carlos Quispe Rojas', '2020-98765', '71198765', 'carlos.quispe@usfx.bo'),
(3, 'María Fernanda Cruz', '2022-55555', '69955555', 'mf.cruz@usfx.bo'),
(4, 'Dr. Roberto Vidal', 'DOC-0042', '72200042', 'r.vidal@usfx.bo');

-- --------------------------------------------------------

--
-- Índices para tablas volcadas
--

ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carnet` (`carnet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
