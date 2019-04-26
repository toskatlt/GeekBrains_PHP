<?php 

$randval = rand(); 
include_once('function.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BRAND SHOP</title>
	<link rel="stylesheet" href="./css/style.css?ver=<?=$randval?>'">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<div id="app">
<div class="wrapper">
	<div class="top">
		<header class="header">
			<div class="container header-flex">
				<div class="header-left">
					<a class='logo uppercase' href="index.php"><img class="logo-img" src="img/logo.png" alt="BRAND">
						BRAN<span class="pink">D</span></a>
					<div class="form">
						<div class="select">
							<span class="select-text">Browse </span><i class="fas fa-caret-down grey"></i>
							<div class="browse-box">
								<div class="drop-flex">
									<h3 class="drop-heading">Woman</h3>
									<ul class="drop-ul">
										<li><a class="drop-link" href="product.php">Dresses</a></li>
										<li><a class="drop-link" href="product.php">Tops</a></li>
										<li><a class="drop-link" href="product.php">Sweaters/Knits</a></li>
										<li><a class="drop-link" href="product.php">Jackets/Coats</a></li>
										<li><a class="drop-link" href="product.php">Blazers</a></li>
										<li><a class="drop-link" href="product.php">Denim</a></li>
										<li><a class="drop-link" href="product.php">Leggings/Pants</a></li>
										<li><a class="drop-link" href="product.php">Skirts/Shorts</a></li>
										<li><a class="drop-link" href="product.php">Accessories</a></li>
									</ul> 
									<h3 class="drop-heading">MAN</h3>
									<ul class="drop-ul">
										<li><a class="drop-link" href="product.php">Dresses</a></li>
										<li><a class="drop-link" href="product.php">Tops</a></li>
										<li><a class="drop-link" href="product.php">Sweaters/Knits</a></li>
										<li><a class="drop-link" href="product.php">Jackets/Coats</a></li>
									</ul>
								</div>
							</div>
						</div>
						<form action="#" class="form">
							<input type="text" placeholder="Search for Item..." class="search">
							<button type="submit" class="find"><i class="fas fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="header-right">	
					<div class="cart">
						<a href='shopping_cart.php'>
							<div>
								<i class="fas fa-shopping-cart fa-2x"></i>
							</div> 
							<div class="cart-count" id="cart-count">0</div>
						</a>
					</div>
					<div class="my-account">My Account<i class="fas fa-caret-down"></i>
						<div class="sign_drop">
							<a href="login.php" class="cart__button">Register Now</a>
							<a href="login.php" class="cart__button">Sign in</a>	
						</div>
					</div>
				</div>
			</div>
		</header>


<script>
	
	var id_session = '<?php echo @$_COOKIE['PHPSESSID']?>';
	
	function countBasket (id_session) {
		$.ajax({
			type: "POST",
			url: "function.php",
			data: {
				id_session: id_session,
			},
			success: function(html) {
				console.log(html);
				$("#cart-count").html(html);
				
			}
		});
	}
	countBasket(id_session);
	
</script>


<?php 