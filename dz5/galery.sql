-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 17 2019 г., 15:04
-- Версия сервера: 5.5.62-0+deb8u1
-- Версия PHP: 5.6.40-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `brand`
--

-- --------------------------------------------------------

--
-- Структура таблицы `galery`
--

CREATE TABLE IF NOT EXISTS `galery` (
`id` int(10) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `galery`
--

INSERT INTO `galery` (`id`, `filename`, `view`) VALUES
(1, '01', 6),
(2, '02', 3),
(3, '03', 0),
(4, '04', 30),
(5, '05', 0),
(6, '06', 0),
(7, '07', 0),
(8, '08', 0),
(9, '09', 0),
(10, '10', 0),
(11, '11', 0),
(12, '12', 3),
(13, '13', 1),
(14, '14', 3),
(15, '15', 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `galery`
--
ALTER TABLE `galery`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `galery`
--
ALTER TABLE `galery`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
