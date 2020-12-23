-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-12-2020 a las 08:43:20
-- Versión del servidor: 10.4.15-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u282806625_shop`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `existenciaGeneral`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`u282806625_moy`@`127.0.0.1` SQL SECURITY DEFINER VIEW `existenciaGeneral`  AS  select `I`.`precVent` AS `Precio`,`E`.`IDProducto` AS `IDProducto`,`E`.`NumeroLote` AS `NumeroLote`,`E`.`Existencia` AS `Existencia`,`P`.`nombre` AS `nombre` from ((`inventario` `I` join `existencia` `E`) join `producto` `P` on(`I`.`numLote` = `E`.`NumeroLote` and `P`.`idProd` = `E`.`IDProducto`)) ;

--
-- VIEW  `existenciaGeneral`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
