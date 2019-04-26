<?php 

/* HEADER */ include ("modules/header.php");

$selectProductsUser = selectProductsUser (mysqli_real_escape_string($dbcnx, $_COOKIE['PHPSESSID']), $dbcnx);

/* MENU */ include ("modules/menu.php"); 
/* BREADCREMBS */ include ("modules/breadcrumbs.php");

?>

<div class="container">
	<div class="cart__list">
		<div class="cart__head">
			<div class="cart__head-left">Product Details</div>
			<div class="cart__head-rigth">
				<p class="cart__head-text">Unite Price</p>
				<p class="cart__head-text">Quantity</p>
				<p class="cart__head-text">Shipping</p>
				<p class="cart__head-text">Subtotal</p>
				<p class="cart__head-text">Action</p>
			</div>
		</div>
		<?php foreach ($selectProductsUser as $spu): ?>
		<div class="cart__pos">
			<div class="cart__pos-left">
				<div class="cart__pos-img"><img src="img/product/small/img_<?=$spu['id']?>.jpg" alt="<?=$spu['productname']?>"></div>
				<div>
					<a href="single.html" class="cart__pos-title"><?=$spu['productname']?></a>
					<p class="cart__pos-desc"><span class="bold">Color: </span>Black</p>
					<p class="cart__pos-desc"><span class="bold">Size: </span>L</p>					
				</div>
			</div>
			<div class="cart__pos-right">
				<div class="cart__pos-col">$<?=$spu['price']?></div>
				<div class="cart__pos-col"><input type="number" class="cart__item-input" value="<?=$spu['quantity']?>"></div>
				<div class="cart__pos-col">FREE</div>
				<div class="cart__pos-col">$<?=($spu['subtotal'])?></div>
				<div class="cart__pos-col"><a href="#" class="cart__del"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
			</div>
		</div>
		<?php endforeach; ?>	
	</div>
	
	<div class="medium__button conteiner">
		<a href="#" class="cart__button-big">cLEAR SHOPPING CART</a>
		<a href="#" class="cart__button-big">cONTINUE sHOPPING</a>
	</div>
	
</div>

<?php 

/* FOOTER */ include ("modules/footer.php"); 

?>