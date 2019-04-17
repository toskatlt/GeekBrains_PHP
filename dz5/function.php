<?php 

include 'config.php';

function selectAllImg ($dbcnx) {
	$query = mysqli_query($dbcnx, "SELECT * FROM galery ORDER BY view DESC");
	$n = mysqli_num_rows($query);
	for ($i = 0; $i < $n; $i++) {
		$result[] = mysqli_fetch_assoc($query);
	}
	return $result;
}

function selectImg ($dbcnx, $id) {
	$query = mysqli_query($dbcnx, "SELECT * FROM galery WHERE id='{$id}'");
	$result = mysqli_fetch_assoc($query);
	return $result;
}

function clickView ($dbcnx, $id) {
	mysqli_query($dbcnx, "UPDATE galery SET view=view+1 WHERE id='{$id}'");
}