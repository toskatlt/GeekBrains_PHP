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

if (isset($_POST)) {
	$first = (int)$_POST['first'];
	$second = (int)$_POST['second'];
	if (isset($_POST['addition'])) {
		$result = mathOperation ($first, $second, 'addition');
	}
	if (isset($_POST['subtraction'])) {
		$result = mathOperation ($first, $second, 'subtraction');
	}
	if (isset($_POST['multiplication'])) {
		$result = mathOperation ($first, $second, 'multiplication');
	}
	if (isset($_POST['division'])) {
		$result = mathOperation ($first, $second, 'division');
	}
	
	
} else {
	$first = 0;
	$second = 0;
	$result = 0;
}

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
		<input type="text" name="second" value='<?=$second?>'>
			<button name='addition'> + </button>
			<button name='subtraction'> - </button>
			<button name='multiplication'> * </button>
			<button name='division'> / </button>
		<input type="text" name="result" value='<?=$result?>'>
	</form>
</body>
</html>