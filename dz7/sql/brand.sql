-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 26 2019 г., 15:23
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
-- Структура таблицы `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
`id` int(22) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_goods` int(22) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_session`, `id_goods`, `quantity`) VALUES
(1, 'qvdopoashm4s1g7vgd0j04vni2', 3, 3),
(2, 'qvdopoashm4s1g7vgd0j04vni2', 2, 1),
(3, 'qvdopoashm4s1g7vgd0j04vni2', 4, 1),
(7, 'j5fbhjhj6o4blp7kv6ro9s8td1', 3, 3),
(8, 'j5fbhjhj6o4blp7kv6ro9s8td1', 4, 4),
(10, 'j5fbhjhj6o4blp7kv6ro9s8td1', 2, 1),
(14, 'iiios0tb8vpeau287u4a4sp2k1', 2, 1),
(15, 'iiios0tb8vpeau287u4a4sp2k1', 6, 1),
(16, 'iiios0tb8vpeau287u4a4sp2k1', 4, 2),
(18, 'ukbh5hs0i11f0iipntodvfrmk1', 3, 1),
(19, 'ukbh5hs0i11f0iipntodvfrmk1', 4, 1),
(20, 'ukbh5hs0i11f0iipntodvfrmk1', 2, 1),
(21, 'ukbh5hs0i11f0iipntodvfrmk1', 1, 2),
(24, 'j5fbhjhj6o4blp7kv6ro9s8td1', 7, 1),
(25, 's7tjegebadkfgjb69i2du0a382', 2, 1),
(26, 's7tjegebadkfgjb69i2du0a382', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `sex` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `productName`, `price`, `sex`) VALUES
(1, 'Mango футболка', 52, 1),
(2, 'D&G блузка', 48, 0),
(3, 'Mango куртка', 49, 1),
(4, 'Mango платье', 34, 0),
(5, 'ТВОЕ штаны', 24, 0),
(6, 'ADIDAS костюм', 40, 1),
(7, 'Reebok штаны', 33, 1),
(8, 'ZARA толстовка', 38, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `basket_uniq` (`id_session`,`id_goods`), ADD KEY `id_session` (`id_session`,`id_goods`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
MODIFY `id` int(22) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
