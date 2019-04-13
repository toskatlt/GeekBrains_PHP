<?php

ini_set("memory_limit", "256M");
set_time_limit(120);
$start = microtime(true);

$y = 0;

function seach ($y) {
	$i = 0;
	
	$a = range(1, 100); // Берем массив из значений от 1 до 100
	shuffle($a); // Перемешиваем значения в массиве
	$array = array_slice($a, 0, 50); // Отсекаем половину массива

	foreach ($array as $a) {
		if($a <= 25) { $i++; } // Проверяем сколько в массиве осталось значений ниже 26
	}
	
	$y++;
	
	if ($i > 3) { // Если значений ниже 26 больше чем 3, запускаем функцию заново
		seach($y); 
	} else { // В противном случае выводим данные на экран
		foreach ($array as $a) {
			if ($a < 26) {
				echo '<b style="color:red;">'.$a.'</b> ';
			} else {
				echo $a.' ';
			}
		}
		echo "<br><br>";
		echo $y.' - количество повторений';
		echo "<br><br>";
		echo $i.' - количество совпадений';
		echo "<br><br>";
	}
}
	
seach($y);

$end = microtime(true);
$time = $end - $start;
echo "Время: ".$time;
