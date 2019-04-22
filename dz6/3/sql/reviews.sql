-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 22 2019 г., 12:00
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
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `text` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `id_goods`, `text`, `datetime`) VALUES
(1, 3, 'Хороший товар, всем советую!', '2019-04-22 09:35:22'),
(2, 3, 'Взял год назад,, работает как часы', '2019-04-22 09:38:01'),
(3, 3, 'новый отзыв', '2019-04-22 11:58:10'),
(4, 3, 'новый отзыв', '2019-04-22 11:58:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`), ADD KEY `id_goods` (`id_goods`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
