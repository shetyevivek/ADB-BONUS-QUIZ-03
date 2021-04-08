<?php
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Grocery Shopping</title>
</head>

<body>
	
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="vegetables.php">Vegetables</a>
  <a href="fruits.php">Fruits</a>
  <a href="condiments.php">Condiments</a>
  <div class="search-container">
    <form action="search.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="Submit">Submit</button>
    </form>
  </div>
  <a href="cart.php" style="float:right;"><i class="fa fa-shopping-cart" style="font-size:19.5px;color:white"></i></a>
</div>

</body>
</html>