<?php 

include 'config.php';

function selectAllImg ($dbcnx) {
	$query = mysqli_query($dbcnx, "SELECT * FROM goods ORDER BY view DESC");
	for ($i = 0; $i < mysqli_num_rows($query); $i++) $result[] = mysqli_fetch_assoc($query);
	return $result;
}

function selectImg ($dbcnx, $id) {
	$query = mysqli_query($dbcnx, "SELECT * FROM goods WHERE id='{$id}'");
	$result = mysqli_fetch_assoc($query);
	return $result;
}

function clickView ($dbcnx, $id) {
	mysqli_query($dbcnx, "UPDATE goods SET view=view+1 WHERE id='{$id}'");
}

function getGoods ($dbcnx, $id, $linkDirBig) {
	$good = selectImg($dbcnx, $id);
	$result = "";
	$result .= "<div><img src='{$linkDirBig}{$good['id']}.jpg'></div>";
	$result .= "<div><span><b>Просмотров</b>: {$good['view']}</span> <span><b>Цена</b>: {$good['cash']} руб.</span></div>";
	$result .= "<div><h3><b>Описание {$good['name']}</b><h3></div>";
	$result .= "<div>{$good['text']}</div>";
	return $result;
}

function allGoods ($dbcnx, $linkDirSmall) {
	$selectAllImg = selectAllImg($dbcnx);
	$result = '';
	foreach($selectAllImg as $img) { 
		$result .= "<p><a rel='gallery' class='photo' href='./galery.php?id={$img['id']}' title='{$img['name']}'><img src='{$linkDirSmall}{$img['id']}.jpg'></a></p>";
	}
	return $result;
}

function allReviews ($dbcnx, $id) {
	$query = mysqli_query($dbcnx, "SELECT * FROM `reviews` WHERE `id_goods`={$id}");
	for ($i = 0; $i < mysqli_num_rows($query); $i++) {
		$result[] = mysqli_fetch_assoc($query);
	}
	return $result;
}

function reviews ($dbcnx, $id) {
	$allReviews = allReviews ($dbcnx, $id);
	$result = "";
	foreach ($allReviews as $ar) {
		$result .= "<br><div> [{$ar['datetime']}] {$ar['text']}</div><br>";
	}
	$result .= "<div><form action='{$_SERVER['REQUEST_URI']}' method='POST'>";
	$result .= "Написать отзыв: <input type='text' name='review'><button name='newreviews'>отправить</button>";
	$result .= "</form></div>";
	return $result;
}

function addReviews ($dbcnx, $id_goods, $review) {
	$datetime = date('Y-m-d H:i:s');
	mysqli_query($dbcnx, "INSERT INTO `reviews`(`id_goods`, `text`, `datetime`) VALUES ('{$id_goods}', '{$review}', '{$datetime}')");
}