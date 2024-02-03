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
<style>
@media only screen and (min-width: 1px) and (max-width: 600px){
body{
    margin: 0;
    background-color: bisque;
}
.nav{
 
    width: 100%;
    display: flex;

    justify-content: space-around;
    padding: 5px 0;
    font-size: 7px;
    border:solid 2px;
}

.nav .logo h1{
    font-weight: 500;
    font-family: sans-serif;
    color: black;
}
.nav .logo b{
    color: orangered;
}
.nav ul{
  display: flex;
	flex-direction: column;
	flex-wrap: wrap;
  padding: 20px;

}
.nav ul li{
    margin-right: 50px;
}
.nav ul li a{
    text-decoration: none;
    color: black;
    font-weight: 500;
    font-family: sans-serif;
    font-size: 10px;
}

/* butoni login*/
input{
    padding: 3px 13px;
    cursor: pointer;
    font-weight: 500;
  
   
}


/*main text*/
.text_main{
    width: 100%;
    position: absolute;
    top: 20%;
    text-align: center;
    color: black;
    
}
.text_main h1{
    font-size: 15px;
    font-family: sans-serif;
}
.text_main h2{
    font-size: 25px;
    font-family: sans-serif;
}
.text_main b{
    color: orangered;
    font-family: sans-serif;
}
.image_main img{
    display: block;
    width: auto;
    height: auto;
    margin-left: 28%;
    margin-top: 45%;
    
}
.container{
	width: auto;
	height: auto;
	display: flex;
	align-items: center;
	justify-content: center;
}
.swiper{
	width: auto;
	height: auto;
	margin-top: 45%;
}
.swiper-slide img{
	width: 99%;
    height: 800px;
}
.swiper .swiper-button-prev{
	color: #01b5a4;
}
.swiper .swiper-button-next{
	color: #01b5a4;
}
}
</style>
</head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><b>BLITZ</b>FOOD</h1></div>
            <ul>
                <li><a href="adminhome.php">HOME</a></li>
                <li><a href="adminaboutus.php">ABOUT US</a></li>
                <li><a href="adminburger.php">BURGER</a></li>
                <li><a href="adminpizza.php">PIZZA</a></li>
                <li><a href="admincontactus.php">CONTACT US</a></li>
                <li><a href="adminnotifications.php">NOTIFICATIONS</a></li>
              
            </ul>
            <div>
            <a href="logout.php"><input class="login"  type="submit" value="LOG OUT" name="logout"></a>
            </div>

      
        </div>
    </section>

    <div class="text_main">
        <h1>WELCOME TO</h1>
        <h2><b>BLITZ</b>FOOD</h2>
     
        <a href="admin.php"><input class="login"  type="submit" value="USERS/ADMIN" name="USERS/ADMIN"></a>
      
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