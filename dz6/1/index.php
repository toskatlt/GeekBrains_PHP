<?php

function mathOperation ($first, $second, $mo) {
	if ($mo == 'addition') {
		$result = $first + $second;
	}
	if ($mo == 'subtraction') {
		$result = $first - $second;
	}
	if ($mo == 'multiplication') {
		$result = $first * $second;
	}
	if ($mo == 'division') {
		if ($second == 0) {
			$result = 'деление на ноль запрещено';
		} else {
			$result = $first / $second;
		}
	}
	return $result;
}

function select ($array, $mo) {
	$result = "";
	$result .= "<select name='select'>";
		foreach ($array as $key => $value) {
			if ($key == $mo) {
				$result .= "<option value={$key} selected>{$value}</option>";
			} else {
				$result .= "<option value={$key}>{$value}</option>";
			}
		}
	$result .= "</select>";
	return $result;
}

if (isset($_POST['enter'])) {
	$first = (int)$_POST['first'];
	$second = (int)$_POST['second'];
	$mathOperation = $_POST['select'];
	$result = mathOperation ($first, $second, $mathOperation);
} else {
	$first = 0;
	$second = 0;
	$result = 0;
}

$array = ["addition" => "плюс", "subtraction" => "минус", "multiplication" => "умножение", "division" => "деление"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action='index.php' method='POST'>
		<input type="text" name="first" value='<?=$first?>'>
			<?=select($array, $mathOperation)?>
		<input type="text" name="second" value='<?=$second?>'>
		<button name='enter'> = </button>
		<input type="text" name="result" value='<?=$result?>'>
	</form>
</body>
</html>