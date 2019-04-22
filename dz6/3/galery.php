<?php
	define("GALLERY_DIR", 'img/');
	define("SMALL_IMG", 'small/');
	define("BIG_IMG", 'big/');

	include 'config.php';
	include 'function.php';


	$linkDirSmall = GALLERY_DIR . SMALL_IMG;
	$linkDirBig = GALLERY_DIR . BIG_IMG;

	$randval = rand();

	if (isset($_GET['id'])) {
		$id = mysqli_real_escape_string($dbcnx, $_GET['id']);
		clickView($dbcnx, $id);
		
		if (isset($_POST['newreviews'])) {
			$review = mysqli_real_escape_string($dbcnx, $_POST['review']);
			addReviews($dbcnx, $id, $review);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="css/style.css?ver=<?=$randval?>'">
</head>
<body>
	<div class='container flex'>
		<div><a href='./index.php'>Назад</a></div>
		<?php echo(getGoods ($dbcnx, $id, $linkDirBig)); ?>
		<br>
		<div><h3><b>Все отзывы:</b></h3></div>
		<?php echo(reviews ($dbcnx, $id)); ?>
	</div>
</body>
</html>