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
    <form action="search.php" method="POST">
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
$category = $row['Category'];

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

  $sql2 = "INSERT INTO cart VALUES ('$name', $price, $fprice, '$plocation', $qty)";
  $result2 = mysqli_query($con, $sql2) or die('Error ' . mysqli_error($con));

  if(mysqli_affected_rows($con) > 0)
  {
    echo "<script>alert('$qty x $name added to cart!')</script>";
  }
}

echo "<b><br><b><b><b>";

if(isset($_POST['comments']))
{
  $naam = $_POST['naam'];
  $comment = $_POST['comment'];

  $sql5 = "INSERT INTO comments_table VALUES ('$naam','$comment','$name')";
  $result5 = mysqli_query($con, $sql5) or die('Error ' . mysqli_error($con));
}

?>

<h1 style="margin-left:20px;">Post a comment</h1>
  <form action="" method="POST">
    <span style="margin-left:20px;">Name: </span><br><input type="text" name="naam" style="margin-left:20px;"><br><br>
    <span style="margin-left:20px;">Comment: </span><br><textarea rows="10" cols="30" name="comment" style="margin-left:20px;"></textarea><br>
    <input type="submit" name="comments" value="Post Comment" style="margin-left:20px;">
  </form>
  <hr>
  <h1 style="margin-left:20px;">Other comments:</h1><br>
  
  <?php
  include_once "connection.php";

  $sql6 = "SELECT * FROM comments_table WHERE Product_Name='$name'";
  $result6 = mysqli_query($con, $sql6) or die('Error ' . mysqli_error($con));

  while($rows = mysqli_fetch_array($result6))
  {
    echo "<div style='margin-left:20px;'>";
    echo "<b><i>" .$rows['Name']. ":</i></b><br>";
    echo $rows['Comments']. "<br><br><br>";
    echo "</div>";
  }
  ?>

</body>
</html>