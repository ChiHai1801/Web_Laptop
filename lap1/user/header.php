<?php

session_start();
//get title for head
$_SESSION['title'] = 'Shop Laptop';
$actual_link = $_SERVER['PHP_SELF'];
switch ($actual_link) {
  case '/localhost/lap1/index.php':
    $_SESSION['title'] = 'Shop Laptop';
    break;
  case '/lap1/lap_gaming.php':
    $_SESSION['title'] = 'lap_gaming';
    break;
  case '/lap1/TTusers.php':
    $_SESSION['title'] = 'Thông tin người dùng';
    break;
  case '/lap1/cart.php':
    $_SESSION['title'] = 'Giỏ Hàng Của Bạn';
    break;
  default:
    $_SESSION['title'] = 'Shop Laptop';
    break;
}

// user logout
if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == '') {
  header('Location:login.php');
}
if (isset($_GET['logout']) && $_GET['logout'] == true) {
  $_SESSION['user_login'] = '';
  $_SESSION['user_id'] = '';
  $_SESSION['cart'] = array();
  header('Location:./index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>Trang chủ</title> -->
    <title><?php echo $_SESSION['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="images/faicon.jpg" />
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/mai.css">
    <link rel="stylesheet" href="./css/TT.css">
    <link rel="stylesheet" href="./css/tintuc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body class="page">
    <header class="header" >

    <a href="#" class="brand-link">
          <img src="faicon.jpg" width="50px" height="50px" alt="">
    </a>

        <a id="logo" class="header__logo" href="#!"  >
            <p><b>SHOP LAPTOP</b></p>
        </a>   
        <div class="button__login-register">
            <a class="bt button__register"   href="./register.php" class="menu-bth">Signup</a>
            <a class="bt button__login"  href="./login.php" class="menu-bth">Login</a>
            <a class="bt button__logout" href="?logout=true"><?php echo 'Logout '?></a>
        </div>
        
        <nav class="header__nav"> 
            <div class="nav__search">
                <input type="text" placeholder="Nhập nội dung cần tìm" height="30px">
                <button type="submit"><i class="fa fa-search"></i></button>

                <div class="shopping-card">
                  <p class="no-ordered-items">0</p>
                  <a href="./cart.php"><i class=" fas fa-shopping-cart cart"></i> </a>
                </div>
                
            </div>

            <span class="nav__small__icon" ><i class="fas fa-bars"></i></span>
    
            <div class="nav__link">
              <a class="nav__link--items"  href="./" class="menu-bth">Trang chủ</a>
              <a class="nav__link--items"  href="./thuonghieu.php" class="menu-bth">Thương Hiệu</a>
              <a class="nav__link--items"  href="./TT_SP/index.php" class="menu-bth">Tin Tức</a>
              <a class="nav__link--items" href="./TTusers.php" class="menu-bth">Thông Tin người dùng</a>
              <a class="nav__link--items" href="./TH_asus.php" class="menu-bth">Asus</a>
              <a class="nav__link--items"  href="./carts.php" class="menu-bth">Cart</a>
              <a class="nav__link--items"  href="./lienhe.php" class="menu-bth">Liên Hệ</a>

              <a class="nav__link--items nav__login-register"  href="./login.php" class="menu-bth">Login</a>
              <a class="nav__link--items nav__login-register"  href="./register.php" class="menu-bth">Signup</a>
          </div>
              
        </nav>    
    </header >