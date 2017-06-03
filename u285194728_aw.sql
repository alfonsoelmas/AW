-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2017 a las 23:41:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bocetos`
--

CREATE TABLE `bocetos` (
  `id_bocetos` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` longtext,
  `foto` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `id_capitulo` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `cuerpo` longtext NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_libro` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_boceto`
--

CREATE TABLE `comentario_boceto` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `cuerpo` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_padre` int(10) UNSIGNED DEFAULT NULL,
  `id_boceto` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_capitulo`
--

CREATE TABLE `comentario_capitulo` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `cuerpo` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_padre` int(10) UNSIGNED DEFAULT NULL,
  `id_capitulo` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_libro`
--

CREATE TABLE `comentario_libro` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `cuerpo` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_padre` int(10) UNSIGNED DEFAULT NULL,
  `id_libro` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `sinopsis` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `portada` varchar(100) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `id_seguidor` int(10) UNSIGNED NOT NULL,
  `id_seguido` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `edad` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valora`
--

CREATE TABLE `valora` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_libro` int(10) UNSIGNED NOT NULL,
  `puntuacion` int(10) UNSIGNED DEFAULT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bocetos`
--
ALTER TABLE `bocetos`
  ADD PRIMARY KEY (`id_bocetos`);

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id_capitulo`);

--
-- Indices de la tabla `comentario_boceto`
--
ALTER TABLE `comentario_boceto`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `comentario_capitulo`
--
ALTER TABLE `comentario_capitulo`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `comentario_libro`
--
ALTER TABLE `comentario_libro`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`,`email`),
  ADD KEY `Nombre` (`nombre`),
  ADD KEY `usuario_2` (`usuario`),
  ADD KEY `usuario_3` (`usuario`);

--
-- Indices de la tabla `valora`
--
ALTER TABLE `valora`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bocetos`
--
ALTER TABLE `bocetos`
  MODIFY `id_bocetos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id_capitulo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario_boceto`
--
ALTER TABLE `comentario_boceto`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario_capitulo`
--
ALTER TABLE `comentario_capitulo`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario_libro`
--
ALTER TABLE `comentario_libro`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `valora`
--
ALTER TABLE `valora`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
