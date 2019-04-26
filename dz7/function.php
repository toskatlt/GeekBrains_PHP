<?php 

include 'config.php';

if (isset($_POST['id_session'])) {
	$query = mysqli_query($dbcnx, "SELECT sum(quantity) as sum FROM `basket` WHERE id_session = '{$_POST['id_session']}'");
	$row = mysqli_fetch_assoc($query);
	if (empty($row['sum'])) { 
		echo 0;
	} else {
		echo $row['sum'];
	}
	
}

function allProducts ($dbcnx) {
	$query = mysqli_query($dbcnx, "SELECT * FROM products");
	foreach ($query as $value) {
		$result[] = $value;
	}
	return $result;
}

function addToBasket ($id, $id_session, $dbcnx) {
	mysqli_query($dbcnx, "INSERT INTO basket (id_session, id_goods) VALUES ('{$id_session}', '{$id}') ON DUPLICATE KEY UPDATE quantity = quantity + 1");
	reload('index.php');
}

function reload ($page) {
	header("Location: {$page}");
}


function selectProductsUser ($id_session, $dbcnx) {
	$query = mysqli_query($dbcnx, "SELECT products.*, basket.quantity, products.price*basket.quantity as subtotal FROM basket, products WHERE products.id=basket.id_goods and basket.id_session = '{$id_session}'");
	foreach ($query as $value) {
		$result[] = $value;
	}
	return $result;
}