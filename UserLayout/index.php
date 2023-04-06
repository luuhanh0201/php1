<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="./styles/base.css" />
  <link rel="stylesheet" href="./fontawesome-free-6.3.0-web/css/all.min.css" />
  <link rel="stylesheet" href="./styles/style.css" />
</head>

<body>
  <div class="main">
    <!-- Header -->
    <header class="header max-width">
      <div class="header__detail">
        <div class="gird">
          <p class="header__detail-content">FREE SHIPPING with $20 Purchase</p>
        </div>
      </div>
      <div class="header__width-search">
        <div class="inner__header__width-search">
          <!-- Logo -->
          <div class="header__width-search-logo">
            <img src="./assets/images/LOGO4 1.png" alt="" />
          </div>
          <!-- Search -->
          <div class="header__width-search-input">
            <input type="text" placeholder="Search" />
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
          <!-- Icon -->
          <div class="header__width-search-icons">
            <a href="#" class="control-icon"><i class="fa-solid fa-user"></i></a>
            <a href="#" class="control-icon"><i class="fa-solid fa-heart"></i></a>
            <a href="#" class="control-icon"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
        </div>
      </div>
      <nav class="menu">
        <ul class="list-menu">
          <li class="menu-item active"><a href="#" class="menu-link">HOME</a></li>
          <li class="menu-item"><a href="#" class="menu-link">ABOUT</a></li>
          <li class="menu-item"><a href="#" class="menu-link">SHOP</a></li>
          <li class="menu-item"><a href="#" class="menu-link">INFORMATIONAL</a></li>
          <div class="line"></div>
        </ul>
      </nav>
    </header>

    <!-- Container -->
    <ul class="tab-contents">
      <li class="tab-content  ">
        <?php
        include './home.php'
        ?>
      </li>
      <li class="tab-content">
        <?php
        include './about.php'
        ?>
      </li>
      <li class="tab-content active">
        <?php
        include './shop.php'
        ?>
      </li>
      <li class="tab-content">
        <?php
        include './informational.php'
        ?>
      </li>
    </ul>

</body>
<script src="./js/script.js"></script>

</html>