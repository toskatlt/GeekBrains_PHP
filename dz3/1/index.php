<?php 

// 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

echo "<b>Задание 1.</b><br>";

$i = 0;

while ($i++ < 100) {
	if ($i % 3 == 0) echo $i." ";
}

echo "<br><br>";

// 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10

echo "<b>Задание 2.</b><br>";

function pow1 ($i) {
	if ($i == 0) {
		return "{$i} - это ноль<br>";
	} elseif ($i % 2) {
		return "{$i} - нечетное число<br>";
	} else {
		return "{$i} - четное число<br>";
	}
}

$i = 0;

do { echo pow1 ($i++); }
while ($i <= 10);

echo "<br><br>";


// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива

echo "<b>Задание 3.</b><br>";

$city = [
	'Московская область' => [
		'Москва', 'Клин', 'Зеленоград', 'Коломна'
	],
	'Ленинградская область' => [
		'Санкт-Петербург', 'Колпино','Всеволожск', 'Павловск', 'Кронштадт'
	],
	'Рязанская область' => [
		'Рязань', 'Касимов', 'Шацк', 'Рыбное'
	]
];

foreach ($city as $key => $items) {
	$i = 1;
	echo "{$key}:<br>";
	foreach ($items as $item) {
		echo "{$item}";
		if ($i++ < count($items)) echo ", ";
	}
	echo "<br>";
}

echo "<br><br>";

foreach ($city as $key => $items) {
	$i = 1;
	echo "{$key}:<br>";
	echo join(', ', $items)."<br>";
}

echo "<br><br>";

// 4. ВАЖНОЕ1. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).

$alfabet = [
	'а' => 'a',   'б' => 'b',   'в' => 'v',
	'г' => 'g',   'д' => 'd',   'е' => 'e',
	'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
	'и' => 'i',   'й' => 'y',   'к' => 'k',
	'л' => 'l',   'м' => 'm',   'н' => 'n',
	'о' => 'o',   'п' => 'p',   'р' => 'r',
	'с' => 's',   'т' => 't',   'у' => 'u',
	'ф' => 'f',   'х' => 'h',   'ц' => 'c',
	'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
	'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
	'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
	];

function translit ($str, $alfabet) {
	$result = '';
	for ($i = 0; $i < mb_strlen($str); $i++) {
		$symbol = mb_substr($str, $i, 1);
		if (preg_match("/^[a-zа-яA-ZА-ЯёЁ]/u", $symbol)) {
			if ($symbol === mb_strtoupper($symbol)) {
				$result .= mb_strtoupper($alfabet[mb_strtolower($symbol)]);
			} else {
				$result .= $alfabet[mb_strtolower($symbol)];
			}
		} else {
			$result .= $symbol;
		}
	}
	return $result;
}

echo "<b>Задание 4.</b><br>";

echo "1. ".translit('Привет, Изобретателям велосипедА.', $alfabet)."<br>";
echo "2. ".strtr('привет, изобретателям велосипеда.', $alfabet)."<br>"; // остается только расширить массив до заглавных букв

echo "<br><br>";

// 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

echo "<b>Задание 5.</b><br>";

function replace ($str) {
	$result = '';
	for ($i = 0; $i < mb_strlen($str); $i++) {
		if (mb_substr($str, $i, 1) == ' ') {
			$result .= '_';
		} else {
			$result .= mb_substr($str, $i, 1);
		}
	}
	return $result;
}

echo "1. ".str_replace(' ','_', 'привет изобретателям велосипеда')."<br>";
echo "2. ".replace('привет изобретателям велосипеда')."<br>";

echo "<br><br>";

// 6. ВАЖНОЕ2.В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? 

echo "<b>Задание 6.</b><br>";

$menu = [['Меню1', '#'],['Меню2', '#'],['Меню3', '#'],['Меню4', '#']];

function renderMenu(array $menu) {
	$renderMenu = '<ul>';
	foreach ($menu as $key => $value) {
		$renderMenu .= "<li><a href={$value[1]}>{$value[0]}</a></li>";
	}
	$renderMenu .= '</ul>';
	return $renderMenu;
}

echo renderMenu($menu);

echo "<br><br>";

// 7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла.

echo "<b>Задание 7*.</b><br>";

for ($i = 0; $i < 10; print $i++.' ') {};

echo "<br><br>";

// 8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

echo "<b>Задание 8*.</b><br>";

foreach ($city as $key => $items) {
	$itemsK = [];
	echo "{$key}:<br>";
	foreach ($items as $item) {
		if (mb_substr($item, 0, 1) == 'К') {
			$itemsK[] = $item;
		}
	}
	echo join(', ', $itemsK)."<br>";
}

echo "<br><br>";

// 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

echo "<b>Задание 9*.</b><br>";

function translitAndReplace ($str, $alfabet) {
	$result = '';
	for ($i = 0; $i < mb_strlen($str); $i++) {
		$symbol = mb_substr($str, $i, 1);
		if (preg_match("/^[a-zа-яA-ZА-ЯёЁ]/u", $symbol)) {
			if ($symbol === mb_strtoupper($symbol)) {
				$result .= mb_strtoupper($alfabet[mb_strtolower($symbol)]);
			} else {
				$result .= $alfabet[mb_strtolower($symbol)];
			}
		} elseif ($symbol == ' ') {
			$result .= '_';
		} else {
			$result .= $symbol;
		}
	}
	return $result;
}

echo translitAndReplace('Привет Изобретателям велосипедА', $alfabet)."<br>";

echo "<br><br>";

// 10. *Заполните массив в 100 элементов случайными значениями от 1 до 200, которые не должны повторяться. Задача на бесконечный цикл While(true)

echo "<b>Задание 10*.</b><br>";

$array = [];

while (count($array) < 100) {
	$a = rand(1, 200);
	if (!in_array($a, $array)) { $array[] = $a; }
}

echo count($array).' - количество значений в массиве $array<br>';
foreach ($array as $a) echo $a.' ';

echo "<br><br>";