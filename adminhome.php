<?php
   session_start();

if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast food project</title>
    <link rel="stylesheet" href="style.css">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
</head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><b>BLITZ</b>FOOD</h1></div>
            <ul>
                <li><a href="adminhome.php">HOME</a></li>
                <li><a href="aboutus.html">ABOUT US</a></li>
                <li><a href="burger.php">BURGER</a></li>
                <li><a href="pizza.php">PIZZA</a></li>
                <li><a href="admincontactus.php">CONTACT US</a></li>
            </ul>
            <div>
                <a href="login.php"><input class="login" type="submit" value="LOG IN" name="login"> </a>
            </div>

            <a href="logout.php"><input class="login"  type="submit" value="LOG OUT" name="logout"></a>
            <a href="logout.php"><input class="login"  type="submit" value="LOG OUT" name="logout"></a>
        </div>
    </section>

    <div class="text_main">
        <h1>WELCOME TO</h1><?php echo $_SESSION["username"] ?>
        <h2><b>BLITZ</b>FOOD</h2>
    </div>

    <div class="container">
        <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="slider1.webp"></div>
              <div class="swiper-slide"><img src="slider2.jpg"></div>
              <div class="swiper-slide"><img src="slider3.jpg"></div>
            </div>
            <div class="swiper-pagination"></div>
          
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          
          </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

		<script>
			const swiper = new Swiper('.swiper', {
  loop: true,

  pagination: {
    el: '.swiper-pagination',
	clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
		</script>
    
</body>
</html>