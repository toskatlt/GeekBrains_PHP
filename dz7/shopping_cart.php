<?php 

/* HEADER */ include ("templates/header.php");
/* MENU */ include ("templates/menu.php"); 
/* BREADCREMBS */ include ("templates/breadcrumbs.php");

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
		<div id="cart">
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
			<div class="cart__pos-right" id="<?=$spu['id']?>">
				<div class="cart__pos-col">$<div id="price"><?=$spu['price']?></div></div>
				<div class="cart__pos-col"><input id="qty" type="number" min="1" class="cart__item-input" value="<?=$spu['quantity']?>"></div>
				<div class="cart__pos-col">FREE</div>
				<div class="cart__pos-col" id="subtotal">$<?=($spu['subtotal'])?></div>
				<div class="cart__pos-col" id="del"><a href="#" class="cart__del"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
			</div>
		</div>
		<?php endforeach; ?>
		</div>	
	</div>
	
	<div class="medium__button conteiner">
		<a href="#" class="cart__button-big">cLEAR SHOPPING CART</a>
		<a href="#" class="cart__button-big">cONTINUE sHOPPING</a>
	</div>
	
</div>


<script>
	
	$cartPos = document.querySelector('#cart');
	$cartPos.addEventListener('click', handleCartPosClick);
	
	function handleCartPosClick (event) {	
		let details = event.target.parentNode;
		let $div = event.target.parentNode.parentNode;
		let id = event.target.parentNode.parentNode.id;
		let qty = $div.querySelector('.cart__item-input').value;
		let price = $div.querySelector('#price').textContent;
		$div.querySelector('#subtotal').textContent = '$' + (qty * price);
		
		$.ajax({
			type: "POST",
			url: "function.php",
			data: {
				id_session: id_session,
				id_goods: id,
				qty: qty
			},
			success: function(html) {
				console.log(html);
				$("#cart-count").html(html);	
			}
		});

	}
</script>