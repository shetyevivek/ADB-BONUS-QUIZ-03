<?php
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

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Codevo - Ecommerce Website</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Grocery Shopping</h1>
        </div>

        <div class="menu">
          <div class="top-nav">
            <div class="logo">
              <h1>Grocery Shopping</h1>
            </div>
            <div class="close">
              <i class="bx bx-x"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="index.php" class="nav-link scroll-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
            </li>
          </ul>
        </div>

        <a href="cart.php" class="cart-icon">
          <i class="bx bx-shopping-bag"></i>
        </a>

        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
    </nav>

    <!-- Hero -->
    <img src="./images/banner.png" alt="" class="hero-img" />

    <div class="hero-content">
      <h2><span class="discount">10% </span> OFF SALE</h2>
      <h1>
        <span>Summer Vibes</span>
        <span>mode on</span>
      </h1>
      <a class="btn" href="vegetables.php">Vegetables</a>
      <a class="btn" href="#">Fruits</a>
      <a class="btn" href="#">Dairy Products</a>
      <a class="btn" href="#">Sea Food</a>
    </div>
  </header>

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>