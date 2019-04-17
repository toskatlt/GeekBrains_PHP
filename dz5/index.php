<?php
	define("GALLERY_DIR", 'gallery_img/');
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
	<title>Галерея</title>
	<link rel="stylesheet" href="css/style.css?ver=<?=$randval?>'">
</head>
<body>
	<div class='container grid'>
	<?php 
		$selectAllImg = selectAllImg($dbcnx);
		foreach($selectAllImg as $img) { 
	?>
		<p><a rel="gallery" class="photo" href='./galery.php?id=<?=$img['id']?>'><img src='<?=$linkDirSmall . $img['filename']?>.jpg'></a></p>
		
	<?php } ?>
	</div>
</body>
</html>