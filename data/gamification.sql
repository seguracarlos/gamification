-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2019 a las 12:55:04
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gamification`
--
CREATE DATABASE IF NOT EXISTS `gamification` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gamification`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `achievements`
--

CREATE TABLE IF NOT EXISTS `achievements` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `badge` varchar(45) DEFAULT NULL,
  `imgpath` varchar(45) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `achievements`
--

INSERT INTO `achievements` (`id`, `name`, `badge`, `imgpath`, `points`) VALUES
(1, 'Achievment 1', 'champ.png', 'ruta', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `achivecategory`
--

CREATE TABLE IF NOT EXISTS `achivecategory` (
  `id_achive` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `achivecategory`
--

INSERT INTO `achivecategory` (`id_achive`, `id_category`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `achivetask`
--

CREATE TABLE IF NOT EXISTS `achivetask` (
  `id_task` int(11) NOT NULL,
  `id_achive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `achivetask`
--

INSERT INTO `achivetask` (`id_task`, `id_achive`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `badge` varchar(45) DEFAULT NULL,
  `imgpath` varchar(45) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `badge`, `imgpath`, `points`) VALUES
(1, 'Fortalezas', 'forta.png', 'ruta', 1000),
(2, 'hola', 'hola', 'holasa', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE IF NOT EXISTS `games` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `imgpath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `name`, `image`, `imgpath`) VALUES
(1, 'Aurora', 'aurora-png', 'ruta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `badge` varchar(45) DEFAULT NULL,
  `imgpath` varchar(45) DEFAULT NULL,
  `minpoints` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `name`, `badge`, `imgpath`, `minpoints`, `points`) VALUES
(1, 'Valiente Azul', 'valienteazul.png', 'ruta2', 10, 10005),
(2, 'Valiente Rojo', 'valienterojo.png', 'ruta', NULL, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `badge` varchar(45) DEFAULT NULL,
  `imgpath` varchar(45) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `maxDate` date DEFAULT NULL,
  `typetask` int(1) NOT NULL,
  `descriptiont` varchar(300) NOT NULL,
  `calculateValue1` varchar(30) NOT NULL,
  `calculateValue2` varchar(30) NOT NULL,
  `calculateValue3` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `badge`, `imgpath`, `points`, `maxDate`, `typetask`, `descriptiont`, `calculateValue1`, `calculateValue2`, `calculateValue3`) VALUES
(1, 'Define 3 variables', 'ordenado.png', 'ruta', 2, NULL, 1, 'Define 3 variables correctamente', '3', '', ''),
(2, 'Muestra 5 alteras', NULL, NULL, 4, NULL, 1, 'Muestra 3 alertas en pantalla', '3', '', ''),
(3, 'Muestra 2 mensajes en consola', NULL, NULL, 1, NULL, 1, 'Mostrar 2 mensajes en la consola', '2', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userachievement`
--

CREATE TABLE IF NOT EXISTS `userachievement` (
  `id` int(11) NOT NULL,
  `Achievements_idAchive` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `isDone` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `userachievement`
--

INSERT INTO `userachievement` (`id`, `Achievements_idAchive`, `date`, `time`, `isDone`) VALUES
(1, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usercategory`
--

CREATE TABLE IF NOT EXISTS `usercategory` (
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usercategory`
--

INSERT INTO `usercategory` (`id_category`, `id_user`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `Levels_idLvl` int(11) NOT NULL,
  `points` mediumtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `Levels_idLvl`, `points`) VALUES
(1, 'Usuario Prueba', 1, '14'),
(2, 'paboqed', 2, '5002562');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertask`
--

CREATE TABLE IF NOT EXISTS `usertask` (
  `id` int(11) NOT NULL,
  `Users_iduser` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `isDone` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usertask`
--

INSERT INTO `usertask` (`id`, `Users_iduser`, `date`, `time`, `isDone`) VALUES
(1, 1, NULL, NULL, 1),
(2, 1, NULL, NULL, 1),
(3, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_task_history`
--

CREATE TABLE IF NOT EXISTS `user_task_history` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `achievements`
--
ALTER TABLE `achievements`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `achivecategory`
--
ALTER TABLE `achivecategory`
 ADD PRIMARY KEY (`id_achive`,`id_category`), ADD KEY `fk_AchiveCategory_Categories1_idx` (`id_category`);

--
-- Indices de la tabla `achivetask`
--
ALTER TABLE `achivetask`
 ADD PRIMARY KEY (`id_task`,`id_achive`), ADD KEY `fk_AchiveTask_Achievements1_idx` (`id_achive`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userachievement`
--
ALTER TABLE `userachievement`
 ADD PRIMARY KEY (`id`,`Achievements_idAchive`), ADD KEY `fk_UserAchievement_Achievements1_idx` (`Achievements_idAchive`);

--
-- Indices de la tabla `usercategory`
--
ALTER TABLE `usercategory`
 ADD PRIMARY KEY (`id_category`,`id_user`), ADD KEY `fk_UserCategory_Users1_idx` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`,`Levels_idLvl`), ADD KEY `fk_Users_Levels1_idx` (`Levels_idLvl`);

--
-- Indices de la tabla `usertask`
--
ALTER TABLE `usertask`
 ADD PRIMARY KEY (`id`,`Users_iduser`), ADD KEY `fk_UserTask_Users1_idx` (`Users_iduser`);

--
-- Indices de la tabla `user_task_history`
--
ALTER TABLE `user_task_history`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `achievements`
--
ALTER TABLE `achievements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user_task_history`
--
ALTER TABLE `user_task_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `achivecategory`
--
ALTER TABLE `achivecategory`
ADD CONSTRAINT `fk_AchiveCategory_Achievements1` FOREIGN KEY (`id_achive`) REFERENCES `achievements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_AchiveCategory_Categories1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `achivetask`
--
ALTER TABLE `achivetask`
ADD CONSTRAINT `fk_AchiveTask_Achievements1` FOREIGN KEY (`id_achive`) REFERENCES `achievements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_UserTask_Tasks1` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `userachievement`
--
ALTER TABLE `userachievement`
ADD CONSTRAINT `fk_UserAchievement_Achievements1` FOREIGN KEY (`Achievements_idAchive`) REFERENCES `achievements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_UserAchievement_Users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usercategory`
--
ALTER TABLE `usercategory`
ADD CONSTRAINT `fk_UserCategory_Categories1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_UserCategory_Users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_Users_Levels1` FOREIGN KEY (`Levels_idLvl`) REFERENCES `levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usertask`
--
ALTER TABLE `usertask`
ADD CONSTRAINT `fk_UserTask_Tasks2` FOREIGN KEY (`id`) REFERENCES `tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_UserTask_Users1` FOREIGN KEY (`Users_iduser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
