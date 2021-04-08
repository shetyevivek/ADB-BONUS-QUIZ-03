<?php
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mystyle2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Product Details</title>
</head>

<body style="background:none;">
	
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="vegetables.php">Vegetables</a>
  <a href="fruits.php">Fruits</a>
  <a href="condiments.php">Condiments</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Submit</button>
    </form>
  </div>
  <a href="cart.php" style="float:right;"><i class="fa fa-shopping-cart" style="font-size:19.5px;color:white"></i></a>
</div>

<!-- Cards -->
<?php
include_once "connection.php";

$name = $_GET['name'];

// Retrieve the data
$sql = "SELECT * FROM grocery WHERE Name='$name'";
$result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

echo "<div class='cards'>";

$row = mysqli_fetch_array($result);

$name = $row['Name'];
$price = $row['Price'];
$plocation = $row['Photo_Location'];
$description = $row['Description'];

echo "<article class='card'>";
echo "<img src='$plocation'>";
echo "<div class='text'>";
echo "<h1>Name: $name</h1>";
echo "<p>Price: $$price.00</p><br>";
echo "<p>Description: $description</p><br><br>";
echo "<form action='' method='POST'>";
echo "Quantity: ";
echo "<input type='number' name='qty' min='1' placeholder='1' style='width:25px;'><br><br>";
echo "<input type='submit' name='Submit' value='Add to cart' class='buttons' onclick='myFunction()'>";
echo "</form";
echo "</div></article>";

echo "</div>";

//If Submit button is clicked
if(isset($_POST['Submit']))
{
	$qty = $_POST['qty'];
	$fprice = ($qty * $price);

  $sql2 = "INSERT INTO cart VALUES ('$name', $fprice, '$plocation', $qty)";
  $result2 = mysqli_query($con, $sql2) or die('Error ' . mysqli_error($con));

  if(mysqli_affected_rows($con) > 0)
  {
    echo "<script>alert('$qty x $name added to cart!')</script>";
  }
}

?>

</body>
</html>