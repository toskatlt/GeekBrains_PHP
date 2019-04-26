<?php 

/* HEADER */ include ("modules/header.php");

$SALT = "fg53f4h3g4fd3fhh5";
$secret_key = md5("123" . $SALT);
$cookie_key = $_COOKIE['key'];
$session_key = $_SESSION['pass'];
$current_key = $_GET['pass'];


$allow = false;

if (isset($_GET['logout'])) {
    setcookie("key");
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
}

if (empty($current_key)) {
    if ($session_key == $secret_key) {
        $allow = true;
    } else {
        if ($cookie_key == $secret_key) {
            $allow = true;
        }
    }
} else {
    if (md5($current_key.$SALT) == $secret_key) {
        $allow = true;
        $_SESSION["pass"] = md5($current_key . $SALT);
        if (isset($_GET['save'])) {
            setcookie("key", md5($current_key.$SALT), time() + 3600);

        }
        header("Location: ".$_SERVER['PHP_SELF']);
    }
}

/* MENU */ include ("modules/menu.php"); 

?>	
	<div class="futured_items">
		<div class="container">
			<div class="headline">
				<?php if (!$allow) { ?> 
					<form>
						<input type='password' name='pass'> Запомнить?
						<input type='checkbox' name='save'>
						<input type='submit' name='send'>
					</form>
				<?php } else { ?>
					Добро пожаловать <a href='?logout'>Выход</a>
				<?php } ?>
			</div>
		</div>		
	</div>
