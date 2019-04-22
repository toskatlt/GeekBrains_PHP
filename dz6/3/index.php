<?php
	define("GALLERY_DIR", 'img/');
	define("SMALL_IMG", 'small/');
	define("BIG_IMG", 'big/');

	include 'config.php';
	include 'function.php';

	$linkDirSmall = GALLERY_DIR . SMALL_IMG;
	$linkDirBig = GALLERY_DIR . BIG_IMG;

	$randval = rand();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="css/style.css?ver=<?=$randval?>'">
</head>
<body>
	<div class='container grid'>
	<?php print_r(allGoods($dbcnx, $linkDirSmall)); ?>
	</div>
</body>
</html>