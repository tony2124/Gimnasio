-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-02-2012 a las 17:01:32
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `gimnasio`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `agenda`
-- 

CREATE TABLE `agenda` (
  `usuario` char(16) NOT NULL,
  `area` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `asistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `agenda`
-- 

INSERT INTO `agenda` (`usuario`, `area`, `hora`, `fecha`, `asistencia`) VALUES 
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-05', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-05', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-06', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-06', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-07', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-07', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-08', 0),
('sugeykarina1', 3, '09:30:00', '2011-12-08', 0),
('sugeykarina1', 1, '09:00:00', '2011-12-09', 0),
('sugeykarina1', 2, '09:30:00', '2011-12-09', 0),
('alex2124', 1, '09:00:00', '2011-12-05', 0),
('alex2124', 1, '09:00:00', '2011-12-06', 0),
('alex2124', 1, '09:00:00', '2011-12-07', 0),
('alex2124', 1, '09:00:00', '2011-12-08', 0),
('alex2124', 1, '09:00:00', '2011-12-09', 0),
('alex2124', 2, '09:30:00', '2011-12-05', 0),
('alex2124', 3, '09:30:00', '2011-12-06', 0),
('alex2124', 2, '09:30:00', '2011-12-07', 0),
('alex2124', 3, '09:30:00', '2011-12-08', 0),
('alex2124', 2, '09:30:00', '2011-12-09', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `area`
-- 

CREATE TABLE `area` (
  `area` int(11) NOT NULL,
  `nombre_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `area`
-- 

INSERT INTO `area` (`area`, `nombre_area`) VALUES 
(1, 'CARDIOVASCULAR'),
(2, 'M&Uacute;SCULOS SUPERIORES'),
(3, 'M&Uacute;SCULOS INFERIORES'),
(4, 'SPINNING');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `multas`
-- 

CREATE TABLE `multas` (
  `usuario` varchar(16) NOT NULL,
  `adeudo` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `multas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `usuario` varchar(16) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `apellidos_usuario` varchar(50) NOT NULL,
  `correo_electronico` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `autorizado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` (`usuario`, `contrasena`, `nombre_usuario`, `apellidos_usuario`, `correo_electronico`, `sexo`, `telefono`, `direccion`, `foto`, `autorizado`, `tipo`, `eliminado`) VALUES 
('administrador1', 'administrador1', '0', '0', '0', '0', '0', '0', '0', 1, 1, 0),
('alex2124', 'alfonso2111', 'Alejandro', 'Botello', 'alejandro@gmail.com', '0', '1234567890', 'c', '317796_193959224013730_100001989615885_424890_708685391_n.jpg', 1, 0, 0),
('alfonso2011', 'alfonso2011', 'Alfonso', 'Calderon Chavez', 'alfonso.calderon.chavez@gmail.com', 'H', '4251069520', 'Conocido El CeÃ±idor, Municipio de MÃºgica, MihchoacÃ¡n, MÃ©xico, AmÃ©rica.', 'Foto0638.jpg', 1, 0, 0),
('calderon', 'calderon', 'alfonso', 'calderon', 'alg@hotmail.com', 'H', '1234567890', 'conocido', 'Foto0574.jpg', -1, 0, 0),
('gersain2011', 'gersain2011', 'Gersain', 'Aguilar Pardo', 'ger_agui@live.com.mx', 'H', '1234567890', 'Conocido', 'ITSA.jpg', 1, 0, 0),
('Jose', 'alfonso211', 'jose2124', 'Jimenez', 'jose@gmail.com', 'H', '1234567890', 'Apatzingan', 'Snapshot_20111002.JPG', -1, 0, 0),
('sugeykarina1', 'sugeykarina1', 'Sugey', 'Rodriguez Hernandez', 'karina@hotmail.com', 'M', '1234567890', 'conocido El cahulote', '301991_2148631363104_1465938628_31932893_1206092748_n.jpg', 1, 0, 0),
('tony123123', 'tony123123', 'Alfonso', 'Caaaaaaaalderon', 'tony@h.com', 'H', '1234567890', 'conocido el ceÃ±idor municipio de mugica michoacan XD esta es una direccion chida!!', '386270_2148640923343_1465938628_31932899_448777464_n.jpg', 1, 0, 0),
('tony12345678', 'tony12345678', 'Alfonso', 'calderon', 'alfonso.calderon.chavez@gmail.com', 'H', '1234567890', 'tony12345678', '303662_168196869927510_100002115934544_344221_617185746_n.jpg', 1, 0, 0),
('tony2124', 'alfonso2121', 'Alfonso', 'Calderon Chavez', 'alfonso.calderon.chavez@gmail.com', 'H', '4251069520', 'Conocido El CeÃ±idor', '183942_2309522416992_1217280595_32836547_1244280_n.jpg', -1, 0, 0);
