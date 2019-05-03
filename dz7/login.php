<?php 
/* HEADER */ include ("templates/header.php");

if (isset($_POST['send'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
	
    if (!auth($login, $pass)) {
        echo 'Не верный логин пароль';
    } else {
        if (isset($_POST['save'])) {
            $hash = uniqid(rand(), true);
            $dbcnx = get_db();
            $id = mysqli_real_escape_string($dbcnx, strip_tags(stripslashes($_SESSION['id'])));
            $result = mysqli_query($dbcnx, "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}");
            setcookie("hash", $hash, time() + 3600);
        }
        $allow = true;
        $user = get_user();
		header("Location: index.php");
    }
}


/* MENU */ include ("templates/menu.php"); 

?>	
	<div class="futured_items">
		<div class="container">
			<form method="POST">
			<div class="autorization">
				<?php if (!$allow) { ?> 
					<p><input type='text' name='login' placeholder='Логин'></p>
					<p><input type='password' name='pass' placeholder='Пароль'></p>
					<p>Save? <input type='checkbox' name='save'><input type='submit' name='send'></p>
				<?php } ?>
			</div>
			</form>
		</div>		
	</div>
