<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="mystyle3.css">
	<link rel="stylesheet" type="text/css" href="mystyle2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Shopping Cart</title>
</head>

<body style="background:none;">

	<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="vegetables.php">Vegetables</a>
  <a href="fruits.php">Fruits</a>
  <a href="condiments.php">Condiments</a>
  <div class="search-container">
    <form action="search.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Submit</button>
    </form>
  </div>
  <a href="cart.php" style="float:right;"><i class="fa fa-shopping-cart" style="font-size:19.5px;color:white"></i></a>
</div>

	<main>
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

      $sql = "SELECT Name, BPrice, SUM(FPrice) AS Subtotal, Photo_Location, SUM(Quantity) AS Quantity FROM cart GROUP BY Name ORDER BY Name ASC";
      $result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

      while ($row = mysqli_fetch_array($result))
      {
        $name = $row['Name'];
        $image = $row['Photo_Location'];
        $quantity = $row['Quantity'];
        $price = $row['BPrice'];
        $subtotal = $row['Subtotal'];

        echo "<div class='basket-product'>";
        echo "<div class='item'>";
        echo "<div class='product-image'>";
        echo "<img src='$image' class='product-frame'>";
        echo "</div>";
        echo "<div class='product-details'>";
        echo "<h1><strong><span class='item-quantity'>$quantity</span> x $name</strong></h1>";
        echo "</div>";
        echo "</div>";
        echo "<div class='price'>$price.00</div>";
        echo "<div class='quantity'>";
        echo "<input type='number' value='$quantity' min='1' class='quantity-field'>";
        echo "</div>";
        echo "<div class='subtotal'>$subtotal.00</div>";
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
					<?php
					include_once "connection.php";

					$sql = "SELECT SUM(FPrice) AS Total FROM cart";
					$result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

					$row = mysqli_fetch_array($result);

					$totalprice = $row['Total'];

					if($totalprice == NULL)
					{
						$totalprice = 0;
					}

					echo "<div class='subtotal-value final-value' id='basket-subtotal'>$totalprice</div>";
					?>
				</div>
				<div class="summary-total">
					<div class="total-title">Total</div>
					<?php
					include_once "connection.php";

					$sql = "SELECT SUM(FPrice) AS Total FROM cart";
					$result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

					$row = mysqli_fetch_array($result);

					$totalprice = $row['Total'];

					if($totalprice == NULL)
					{
						$totalprice = 0;
					}

					echo "<div class='total-value final-value' id='basket-total'>$totalprice</div>";
					?>
				</div>
				<div class="summary-checkout">
					<button class="checkout-cta">Go to Secure Checkout</button>
				</div>
			</div>
		</aside>
	</main>

	<form action="" method="post">
		<input type="submit" class="emptybtn" name="empty" value="Empty Cart" style="margin-left:300px; background:gray;; color:#fff; cursor:pointer; border:0px; padding:10px;">
	</form><br><br><br>

	<?php
	include_once "connection.php";

	if(isset($_POST['empty']))
	{
		$sql = "TRUNCATE TABLE cart";
		$result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

		header("Location: cart.php");
	}
	
	?>

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
					$('.emptybtn').fadeOut(fadeTime);
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