<?php
include_once 'connection.php';

if (isset($_POST['Submit']))
{
  $sql = "INSERT INTO cart VALUES ('Tomatoes - 5lb', 10, './Vegetables/Tomato.jpg', 1)";
  $result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));

  if(mysqli_affected_rows($con) > 0)
  {
    echo '<script>alert("Tomatoes - 5lb added to cart!")</script>';
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
          <h1>Tomatoes - 5lb</h1>
          <div class="price">$10.00</div>
          <form class="form" action="" method="post">
            <input type="submit" name="Submit" value="Add To Cart" class="addCart"> </form>
          <h3>Product Details:</h3>
          <p>Tomato is a supplement thick superfood that offers advantage to a scope of real systems.It has numerous little seeds. It is extremely scrumptious. It is likewise useful for wellbeing. Most tomatoes are red. They are a good source of Vitamin A, C, K, Iron, Folate and Potassium. They are used in salads, curries, soups and other dishes. We source best quality tomatoes and deliver it fresh at your door step.</p>
        </div>
      </div>
    </section><br><br>

    <?php
    if(isset($_POST['postc']))
    {
      $name = $_POST['name'];
      $comment = $_POST['comment'];
      $handle = fopen("comments.php", "a");
      fwrite($handle, "<b><i>" .$name. "</i></b>:<br>" .$comment. "<br><br>");
      fclose($handle);
    }
    ?>

    <h3 style="margin-left:150px;">Post a comment</h3><br>
    <form action="" method="POST" style="margin-left:150px;">
      Name: <br><input type="text" name="name"><br><br>
      Comment: <br><textarea rows="10" cols="30" name="comment"></textarea><br>
      <input type="submit" name="postc" value="Post Comment">
    </form><br><br>
    <hr><br><br>
    <h3 style="margin-left:150px;">Other comments:</h3><br><br>

    <?php

    echo "<p style='margin-left:150px;'>";
    include "comments.php";
    echo "</p>";
    ?>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
  </body>

  </html>