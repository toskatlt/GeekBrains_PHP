<?php 

/* HEADER */ include ("modules/header.php");

$allProducts = allProducts($dbcnx);

if (isset($_POST['id'])) {
	addToBasket((int)$_POST['id'], mysqli_real_escape_string($dbcnx, $_COOKIE['PHPSESSID']), $dbcnx);
}

/* MENU */ include ("modules/menu.php"); 

?>	
	<div class="futured_items">
		<div class="container">
			<div class="product">
				<?php foreach ($allProducts as $ap): ?>
					<div class="item">
						<a href="single_page.php" class="product-link"><img src="img/product/img_<?=$ap['id']?>.jpg" alt="Mango футболка" class="item-img"><div class="item-text-block"><p class="item-name"><?=$ap['productName']?></p> <p class="item-price pink"><?=$ap['price']?>$</p></div></a>
						<div class="add_cart">
							<form id="add" action="" method="POST">
								<input type="submit" class="add" value="Add to Cart">
								<input type="hidden" name="id" value="<?=$ap['id']?>">
							</form>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>		
	</div>

