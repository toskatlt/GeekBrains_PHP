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
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cash` int(20) NOT NULL,
  `text` text NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `cash`, `text`, `view`) VALUES
(1, '0.5 ТБ Жесткий диск Toshiba P300', 2450, 'Революционный жесткий диск Toshiba P300 [HDWD105UZSVA] – это уникальное изделие, предназначенное для хранения колоссального объема данных. Представленный агрегат разработан именитой компанией Toshiba, которая далеко не первый год осуществляет производство высокотехнологичный комплектующих к персональным компьютерам. Модель разработана для установки в стандартные персональные компьютеры.  Объем жесткого диска Toshiba P300 [HDWD105UZSVA] составляет целых 500 Гб, что позволит разместить на нем невероятное количество самой разнообразной информации: от многотомных библиотек до коллекции высококачественных фильмов. Объем кэш-памяти устройства также внушителен и равен 64 Мб. Устройство может похвастаться беспрецедентной скоростью передачи информации, которая составляет 196 Мбайт в секунду. Аппарат поддерживает интерфейс SATA III с пропускной способностью в 6 Гбит в секунду. Существенным плюсом жесткого диска является крайне низкий уровень шума в процессе работы.', 48),
(2, '0.5 ТБ Жесткий диск WD Blue', 2799, 'С жестким диском WD Caviar Blue 500 Гб Вам гарантированно обеспечена высокая скорость доступа к хранимой на компьютере информации, достигнутая благодаря кэш памяти размером 32 Мб, вращению шпинделя, достигающему 7 200 оборотов в минуту, а также использованию современной технологии NCQ. В данном приборе гармонично сочетается надежная механическая составляющая и высокоточная электроника, благодаря которой обеспечивается долгосрочное и безопасное хранение данных. WD Caviar Blue 500 Гб с легкостью справляется со сложными поставленными пользователями задачами. Представленная модель подходит как для домашнего пользования для игровых целей, так и для оснащения офисных стационарных компьютеров. Благодаря использованию системы устранения вибраций значительно продлевается срок службы WD Caviar Blue 500 Гб. Во время активного использования температура остается на оптимальных отметках.', 27),
(3, '0.5 ТБ Жесткий диск WD Blue', 2799, 'Жесткий диск WD Blue WD5000AZRZ – это 3.5-дюймовый носитель, предназначенный для установки внутрь моноблоков или настольных компьютеров, отличающийся легкостью (весит всего 450 граммов) сниженным энергопотреблением (3.3 Вт). 500-гигабайтный WD Blue WD5000AZRZ будет отличным приобретением тем, кто не хранит у себя громоздких файловых коллекций, а хочет использовать удобный накопитель для выполнения повседневных задач. В минуту шпиндель модели вращается 5400 раз, благодаря чему HDD является очень тихим: в рабочем состоянии он издает шум в 22 дБ, в спокойном состоянии – на 1 децибел ниже. Носитель может писать и считывать в секунду до 150 мегабайт данных. Благотворно на увеличение производительности влияет и емкий (64 мегабайта) кэш, и SATA-интерфейс третьей версии, отличающийся составляющей 6 Гбит/с пропускной способностью, и поддержка технологии NCQ.', 44),
(4, '1 ТБ Жесткий диск Toshiba P300', 2799, 'Если Вы пребываете в поиске вместительного и долговечного жесткого диска, то Toshiba P300 [HDWD110UZSVA] – это именно то, что удовлетворит Ваши запросы. Представленное устройство разработано легендарной компанией Toshiba, что является гарантией непревзойденного качества и высокопроизводительности аппарата. Жесткий диск Toshiba P300 [HDWD110UZSVA] спроектирован для установки в классические персональные компьютеры, т. к. модель поддерживает интерфейс SATA III, который обладает высокой пропускной способностью в 6 Гбит в секунду. Существенным достоинством представленного жесткого диска является его крайне низкий уровень шумопроизводительности, который составляет всего 26 дБ. Вместительность этой модели жесткого диска поистине колоссальна, т. к. Вы сможете разместить на данном устройстве 1 Тб информации! Объем кэш-памяти аппарата составляет 64 Мб. Устройство может похвастаться беспрецедентной скоростью передачи информации, которая составляет 196 Мбит в секунду.', 37),
(5, '1 ТБ Жесткий диск WD Blue', 2850, 'Жесткий диск WD Caviar Blue WD10EZEX 1 Тб сочетает в себе лучшие наработки компании Western Digital. Гарантированный длительный срок эксплуатации, надежность в использовании, высокая скорость записи и чтения – все это характерно для этой модели.  WD Caviar Blue WD10EZEX 1 Тб позволит хранить сотни часов музыки и видео, устанавливать множество приложений и игр, обеспечит быстрый доступ к хранимым данным. Все это - благодаря скорости вращения 7200 оборотов в минуту и технологии NCQ.  Жесткий диск способен удовлетворить любые требования пользователя. Во время работы он практически не издает шумов, а о вибрации не может быть и речи. Идеальный выбор для длительного и надежного использования.', 17);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
