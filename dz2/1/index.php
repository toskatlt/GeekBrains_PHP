<?php 

/*
1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
*/

$a = rand(-15, 15);
$b = rand(-15, 15);

echo '<b>Задание 1.</b><br>';
echo 'a = '.$a.'<br>';
echo 'b = '.$b.'<br>';

if ($a >= 0 && $b >= 0) {
	echo 'a - b = '.($a - $b).'<br>';
} 
elseif ($a < 0 && $b < 0) {
	echo 'a * b = '.($a * $b).'<br>';
}
elseif ($a < 0 && $b >= 0 || $a >= 0 && $b < 0) {
	echo 'a + b = '.($a + $b).'<br>';
}

echo '<br><br>';

// 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. *.

$a = rand(0, 15);

echo '<b>Задание 2.</b><br>';
echo 'a = '.$a.'<br>';

switch ($a) {
	case 0:
		echo '0';
	case 1:
		echo '1';
	case 2:
		echo '2';
	case 3:
		echo '3';
	case 4:
		echo '4';
	case 5:
		echo '5';
	case 6:
		echo '6';
	case 7:
		echo '7';
	case 8:
		echo '8';
	case 9:
		echo '9';
	case 10:
		echo '10';
	case 11:
		echo '11';
	case 12:
		echo '12';
	case 13:
		echo '13';
	case 14:
		echo '14';
	case 15:
		echo '15';
}

echo '<br><br>';

// 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. В делении на 0 сделайте проверку и вывод сообщения об ошибке.

function addition($a, $b) {
	return $a + $b;
}

function subtraction($a, $b) {
	return $a - $b;
}

function multiplication($a, $b) {
	return $a * $b;
}

function division($a, $b) {
	if ($b != 0) {
		return $a / $b;
	} else {
		return 'Деление на 0 запрещено';
	}
}

echo '<b>Задание 3.</b><br>';
echo 'a = '.$a.'<br>';
echo 'b = '.$b.'<br>';
		
echo '<br>';

echo addition($a, $b).' - сумма<br>';
echo subtraction($a, $b).' - разница<br>';	
echo multiplication($a, $b).' - произведение<br>';
echo division($a, $b).' - деление<br>';

echo '<br><br>';

// 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation ($a, $b, $mo) {
	switch ($mo) {
		case 'сумма':	
			return addition($a, $b);
		case 'разница':	
			return subtraction($a, $b);	
		case 'умножение':	
			return multiplication($a, $b);	
		case 'деление':	
			return division($a, $b);
	}
}

$mathOperation = ['сумма', 'разница', 'умножение', 'деление'];
$rand = rand(0, 3); 

echo '<b>Задание 4.</b><br>';
echo 'a = '.$a.'<br>';
echo 'b = '.$b.'<br>';
echo 'Мат.функция = '.$mathOperation[$rand].'<br>';

echo 'Ответ: '.mathOperation ($a, $b, $mathOperation[$rand]).'<br>';

echo '<br><br>';

// 7. * Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями.

$hour = rand(0, 23);
$minutes = rand(0, 59);

function declOfNum($number, $type) {
	$arr = array(
        'm' => array('минута', 'минуты', 'минут'),
        'h' => array('час', 'часа', 'часов'),
    );
	
	$result .= $number.' ';
	
	switch (($number >= 20) ? $number % 10 : $number ) {
		case 1:
			$result .= $arr[$type][0];
			break;
		case 2:
		case 3:
		case 4:
			$result .= $arr[$type][1];
			break;
		default:
			$result .= $arr[$type][2];
	}

    return $result;
}

echo '<b>Задание 7*.</b><br>';
echo declOfNum($hour, 'h').' ';
echo declOfNum($minutes, 'm').'<br>';