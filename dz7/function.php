<?php 

include 'config.php';

if (isset($_POST['id_goods']) && isset($_POST['qty']) && isset($_POST['id_session'])) {
	$dbcnx = get_db();
	mysqli_query($dbcnx, "UPDATE `basket` SET `quantity`='{$_POST['qty']}' WHERE `id_session`='{$_POST['id_session']}' and `id_goods`='{$_POST['id_goods']}'");
}

if (isset($_POST['id_session'])) {
	echo countAllProductFromBasket ($_POST['id_session']);
}


function auth ($login, $pass) {
    $dbcnx = get_db();
    $login = mysqli_real_escape_string($dbcnx, strip_tags(stripslashes($login)));
    $result = mysqli_query($dbcnx, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function is_auth() {
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $dbcnx = get_db();
        $result = mysqli_query($dbcnx, "SELECT * FROM `users` WHERE `hash`='{$hash}'");
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user() {
    return is_auth() ? $_SESSION['login'] : false;
}

function allProducts () {
	$dbcnx = get_db();
	$query = mysqli_query($dbcnx, "SELECT * FROM products");
	foreach ($query as $value) {
		$result[] = $value;
	}
	return $result;
}

function addToBasket ($id, $id_session) {
	$dbcnx = get_db();
	mysqli_query($dbcnx, "INSERT INTO basket (id_session, id_goods) VALUES ('{$id_session}', '{$id}') ON DUPLICATE KEY UPDATE quantity = quantity + 1");
	reload('index.php');
}

function reload ($page) {
	header("Location: {$page}");
}


function selectProductsUser ($id_session) {
	$dbcnx = get_db();
	$query = mysqli_query($dbcnx, "SELECT products.*, basket.quantity, products.price*basket.quantity as subtotal FROM basket, products WHERE products.id=basket.id_goods and basket.id_session = '{$id_session}'");
	if (count($query) > 0) {
		foreach ($query as $value) {
			$result[] = $value;
		}
	} else { $result = 0; }
	return $result;
	
}

function countAllProductFromBasket ($id_session) {
	$dbcnx = get_db();
	$query = mysqli_query($dbcnx, "SELECT sum(quantity) as sum FROM `basket` WHERE id_session = '{$id_session}'");
	$row = mysqli_fetch_assoc($query);
	if (empty($row['sum'])) { 
		echo 0;
	} else {
		echo $row['sum'];
	}
}