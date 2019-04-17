<?php
	define("GALLERY_DIR", 'gallery_img/');
	define("SMALL_IMG", 'small/');
	define("BIG_IMG", 'big/');

	include 'config.php';
	include 'function.php';

	$linkDirSmall = GALLERY_DIR . SMALL_IMG;
	$linkDirBig = GALLERY_DIR . BIG_IMG;

	$randval = rand();

	if (isset($_GET['id'])) {
		$id = mysqli_real_escape_string($dbcnx, $_GET['id']);
		$img = selectImg($dbcnx, $id);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Галерея</title>
	<link rel="stylesheet" href="css/style.css?ver=<?=$randval?>'">
</head>
<body>
	<div class='container flex'>
		<?php 	
			if (isset($_GET['id'])) {
				$id = mysqli_real_escape_string($dbcnx, $_GET['id']);
				$img = selectImg($dbcnx, $id);
				clickView($dbcnx, $id);
		?>
		<div><a href='./index.php'>Назад</a></div>
			<div><img src='<?=$linkDirBig . $img['filename']?>.jpg'></div>
			<div>Просмотров: <?=($img['view']+1)?></div>
		<?php  } ?>
	</div>
</body>
</html>