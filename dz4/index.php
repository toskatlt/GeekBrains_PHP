<?php
define("GALLERY_DIR", 'gallery_img/');
define("SMALL_IMG", 'small/');
define("BIG_IMG", 'big/');

$linkDirSmall = GALLERY_DIR . SMALL_IMG;
$linkDirBig = GALLERY_DIR . BIG_IMG;

if (!empty($_FILES['userfile']['name'])) upload($linkDirBig, $linkDirSmall);

function upload($linkDirBig, $linkDirSmall) {
	$uploaddir = $linkDirBig; // Relative path under webroot
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	//Проверка существует ли файл
	if (file_exists($uploadfile)) { echo "Файл $uploadfile существует, выберите другое имя файла!"; exit;} 

	//Проверка на размер файла 
	if($_FILES["userfile"]["size"] > 1024*1*1024) {
		echo ("Размер файла не больше 5 мб");
		exit;
	}
	//Проверка расширения файла
	$blacklist = array(".php", ".phtml", ".php3", ".php4");
	foreach ($blacklist as $item) {
		if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
			echo "Загрузка php-файлов запрещена!";
			exit;
		}
	}
	//Проверка на тип файла
	$imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
	if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
		echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
		exit;
	}

	if($_FILES['userfile']['type'] != "image/jpeg") {
		echo "Можно загружать только jpg-файлы.";
		exit;
	}

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "Файл успешно загружен.\n";
		create_thumbnail($uploadfile, $linkDirSmall.'/'.$_FILES['userfile']['name'], '150', '100');
	} else {
		echo "Загрузка не получилась.\n";
	}
}

function create_thumbnail($path, $save, $width, $height) {
	$info = getimagesize($path); //получаем размеры картинки и ее тип
	$size = array($info[0], $info[1]); //закидываем размеры в массив

    //В зависимости от расширения картинки вызываем соответствующую функцию
	if ($info['mime'] == 'image/png') {
		$src = imagecreatefrompng($path); //создаём новое изображение из файла
	} else if ($info['mime'] == 'image/jpeg') {
		$src = imagecreatefromjpeg($path);
	} else if ($info['mime'] == 'image/gif') {
 		$src = imagecreatefromgif($path);
	} else {
		return false;
	}

	$thumb = imagecreatetruecolor($width, $height); //возвращает идентификатор изображения, представляющий черное изображение заданного размера
	$src_aspect = $size[0] / $size[1]; //отношение ширины к высоте исходника
	$thumb_aspect = $width / $height; //отношение ширины к высоте аватарки

	if($src_aspect < $thumb_aspect) { //узкий вариант (фиксированная ширина) 		$scale = $width / $size[0]; 		$new_size = array($width, $width / $src_aspect); 		$src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2); //Ищем расстояние по высоте от края картинки до начала картины после обрезки 	} else if ($src_aspect > $thumb_aspect) {
		//широкий вариант (фиксированная высота)
		$scale = $height / $size[1];
		$new_size = array($height * $src_aspect, $height);
		$src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0); //Ищем расстояние по ширине от края картинки до начала картины после обрезки
	} else {
		//другое
		$new_size = array($width, $height);
		$src_pos = array(0,0);
	}

	$new_size[0] = max($new_size[0], 1);
	$new_size[1] = max($new_size[1], 1);

	imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
	//Копирование и изменение размера изображения с ресемплированием

	if($save === false) {
		return imagepng($thumb); //Выводит JPEG/PNG/GIF изображение
	} else {
		return imagepng($thumb, $save); //Сохраняет JPEG/PNG/GIF изображение
	}
}

function scan($linkDir) {
	return array_splice(scandir($linkDir), 2);
}

$scanDir = scan($linkDirSmall);
$randval = rand();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Галерея</title>
	<link rel="stylesheet" href="css/style.css?ver=<?=$randval?>'">
	<script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("a.photo").fancybox({
				transitionIn: 'elastic',
				transitionOut: 'elastic',
				speedIn: 500,
				speedOut: 500,
				hideOnOverlayClick: false,
				titlePosition: 'over'
			});	
		});
	</script>
</head>
<body>
	<div class='container grid'>
	<?php foreach($scanDir as $sD) { ?>
		<p><a rel="gallery" class="photo" href='<?=$linkDirBig . $sD?>'><img src='<?=$linkDirSmall . $sD?>'></a></p>
	<?php } ?>
	</div>
	<div class='upload'>
		<form action='index.php' method='POST' enctype='multipart/form-data'>
			<input type='file' name='userfile'><input type='submit' value='Загрузить'>
		</form>
	</div>
</body>
</html>