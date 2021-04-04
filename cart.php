<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>Basket</title>
</head>

<body>
	<main>
		<a href="index.php" style="font-size:20px; color:#000;">Home</a>
		<h2>Shopping Cart</h2>
		<div class="basket">
			<div class="basket-labels">
				<ul>
					<li class="item item-heading">Item</li>
					<li class="price">Price</li>
					<li class="quantity">Quantity</li>
					<li class="subtotal">Subtotal</li>
				</ul>
			</div>

	<?php
      include_once "connection.php";

      $sql = "SELECT * FROM cart";
      $result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

      while ($row = mysqli_fetch_array($result))
      {
        $name = $row['Name'];
        $image = $row['Image_Location'];
        $quantity = $row['Quantity'];
        $price = $row['Price'];

        echo "<div class='basket-product'>";
        echo "<div class='item'>";
        echo "<div class='product-image'>";
        echo "<img src='$image' class='product-frame'>";
        echo "</div>";
        echo "<div class='product-details'>";
        echo "<h1><strong><span class='item-quantity'>$quantity</span> x $name</strong></h1>";
        echo "</div>";
        echo "</div>";
        echo "<div class='price'>$price</div>";
        echo "<div class='quantity'>";
        echo "<input type='number' value='$quantity' min='1' class='quantity-field'>";
        echo "</div>";
        echo "<div class='subtotal'>$price</div>";
        echo "<div class='remove'>";
        echo "<button>Remove</button>";
        echo "</div>";
        echo "</div>";
      }

     ?>

        </div>
		<aside>
			<div class="summary">
				<div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
				<div class="summary-subtotal">
					<div class="subtotal-title">Subtotal</div>
					<div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
				</div>
				<div class="summary-total">
					<div class="total-title">Total</div>
					<div class="total-value final-value" id="basket-total">130.00</div>
				</div>
				<div class="summary-checkout">
					<button class="checkout-cta">Go to Secure Checkout</button>
				</div>
			</div>
		</aside>
	</main>

	<form action="" method="post">
		<input type="submit" name="empty" value="Empty Cart" style="margin-left:200px; background:#ff7c9c; color:#fff; cursor:pointer; border:0px; padding:5px;">
	</form>

	<!-- JAVASCRIPT - DO NOT TOUCH -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script type="text/javascript">
	/* Set values + misc */
	var promoCode;
	var promoPrice;
	var fadeTime = 300;
	/* Assign actions */
	$('.quantity input').change(function() {
		updateQuantity(this);
	});
	$('.remove button').click(function() {
		removeItem(this);
	});
	$(document).ready(function() {
		updateSumItems();
	});
	/* Recalculate cart */
	function recalculateCart(onlyTotal) {
		var subtotal = 0;
		/* Sum up row totals */
		$('.basket-product').each(function() {
			subtotal += parseFloat($(this).children('.subtotal').text());
		});
		/* Calculate totals */
		var total = subtotal;
		/*If switch for update only total, update only total display*/
		if(onlyTotal) {
			/* Update total display */
			$('.total-value').fadeOut(fadeTime, function() {
				$('#basket-total').html(total.toFixed(2));
				$('.total-value').fadeIn(fadeTime);
			});
		} else {
			/* Update summary display. */
			$('.final-value').fadeOut(fadeTime, function() {
				$('#basket-subtotal').html(subtotal.toFixed(2));
				$('#basket-total').html(total.toFixed(2));
				if(total == 0) {
					$('.checkout-cta').fadeOut(fadeTime);
				} else {
					$('.checkout-cta').fadeIn(fadeTime);
				}
				$('.final-value').fadeIn(fadeTime);
			});
		}
	}
	/* Update quantity */
	function updateQuantity(quantityInput) {
		/* Calculate line price */
		var productRow = $(quantityInput).parent().parent();
		var price = parseFloat(productRow.children('.price').text());
		var quantity = $(quantityInput).val();
		var linePrice = price * quantity;
		/* Update line price display and recalc cart totals */
		productRow.children('.subtotal').each(function() {
			$(this).fadeOut(fadeTime, function() {
				$(this).text(linePrice.toFixed(2));
				recalculateCart();
				$(this).fadeIn(fadeTime);
			});
		});
		productRow.find('.item-quantity').text(quantity);
		updateSumItems();
	}

	function updateSumItems() {
		var sumItems = 0;
		$('.quantity input').each(function() {
			sumItems += parseInt($(this).val());
		});
		$('.total-items').text(sumItems);
	}
	/* Remove item from cart */
	function removeItem(removeButton) {
		/* Remove row from DOM and recalc cart total */
		var productRow = $(removeButton).parent().parent();
		productRow.slideUp(fadeTime, function() {
			productRow.remove();
			recalculateCart();
			updateSumItems();
		});
	}
	</script>
</body>

</html>