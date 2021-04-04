<?php
include_once 'connection.php';

if (isset($_POST['Submit']))
{
  $sql = "INSERT INTO cart VALUES ('Cherry Tomatoes - 5lb', 50, './Vegetables/Tomato.jpg', 1)";
  $result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

  if(mysqli_affected_rows($con) > 0)
  {
    echo '<script>alert("Cherry Tomatoes - 5lb added to cart!")</script>';
  }
}

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <!-- Box icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <!-- Glidejs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Tomato - Vegetables</title>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Vegetables</h1> </div>
        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Vegetables</h1> </div>
            <div class="close"> <i class="bx bx-x"></i> </div>
          </div>
          <ul class="nav-list">
            <li class="nav-item"> <a href="index.php" class="nav-link">Home</a> </li>
            <li class="nav-item"> <a href="cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a> </li>
          </ul>
        </div>
        <a href="cart.php" class="cart-icon"> <i class="bx bx-shopping-bag"></i> </a>
        <div class="hamburger"> <i class="bx bx-menu"></i> </div>
      </div>
    </nav>
    <!-- Product Details -->
    <section class="section product-detail">
      <div class="details container-md">
        <div class="left">
          <div class="main"> <img src="./Vegetables/Tomato.jpg" alt=""> </div>
        </div>
        <div class="right"> <span>Home/Vegetables</span>
          <h1>Cherry Tomatoes - 5lb</h1>
          <div class="price">$50</div>
          <form class="form" action="" method="post">
            <input type="submit" name="Submit" value="Add To Cart" class="addCart"> </form>
          <h3>Product Details:</h3>
          <p>Cherry tomatoes are a small variety of the regular tomato and are normally less acidic making them sweeter than larger tomatoes. They are halved or used as complete in salads or as garnish. They are a good source of Vitamin A, C, K, Iron, Folate and Potassium. We source high quality cherry tomatoes and deliver it fresh at your door step.</p>
        </div>
      </div>
    </section>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
  </body>

  </html>