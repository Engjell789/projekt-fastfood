<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast food project</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function pizza(Porosia) {
        alert("Ju keni porositur me sukses  " + Porosia);
    }
    </script>
</head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><b>BLITZ</b>FOOD</h1></div>
            <ul>
                <li><a href="home.html">HOME</a></li>
                <li><a href="aboutus.html">ABOUT US</a></li>
                <li><a href="burger.php">BURGER</a></li>
                <li><a href="pizza.php">PIZZA</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
            <div>
                <a href="login.php"><input class="login" type="submit" value="LOG IN" name="login"> </a>
            </div>
        </div>
    </section>

    <div class="food_box"> 
        <div class="food_card">

            <div class="food_image">
                <img src="margheritapizza.jfif">
            </div>

        <div class="food_text">
            <h4>MARGHERITA PIZZA</h4>
            <h5>3.49$</h5>
        
            <a href="#" onclick="pizza('MARGHERITA PIZZA')" class="food_btn">ORDER</a>
        </div>
        </div>
        

        <div class="food_card">
            
            <div class="food_image">
                <img src="pepperonipizza.jfif">
            </div>
        
            <div class="food_text">
                <h4>PEPPERONI PIZZA</h4>
                <h5>3.99$</h5>
          
                <a href="#" onclick="pizza('PEPPERONI PIZZA')" class="food_btn">ORDER</a>
            </div>
        </div>


        <div class="food_card">
            
            <div class="food_image">
                <img src="tunapizza.jfif">
            </div>
        
            <div class="food_text">
                <h4>TUNA PIZZA</h4>
                <h5>3.99$</h5>
          
                <a href="#" onclick="pizza('TUNA PIZZA')" class="food_btn">ORDER</a>
            </div>
        </div>
        


        <div class="food_card">
            
            <div class="food_image">
                <img src="veganpizza.jfif">
            </div>
        
            <div class="food_text">
                <h4>VEGAN PIZZA</h4>
                <h5>2.99$</h5>
          
                <a href="#" onclick="pizza('VEGAN PIZZA')" class="food_btn">ORDER</a>
            </div>
        </div>
        

        <div class="food_card">
            
            <div class="food_image">
                <img src="bbqchickenpizza.jfif">
            </div>
        
            <div class="food_text">
                <h4>BBQ CHICKEN PIZZA</h4>
                <h5>4.49$</h5>
       
                <a href="#" onclick="pizza('BBQ  CHICKEN PIZZA')" class="food_btn">ORDER</a>
            </div>
        </div>

        <div class="food_card">
            
            <div class="food_image">
                <img src="mixedpizza.jfif">
            </div>
        
            <div class="food_text">
                <h4>MIXED PIZZA</h4>
                <h5>4.99$</h5>
                <a href="#" onclick="pizza('MIXED  CHICKEN PIZZA')" class="food_btn">ORDER</a>
            </div>
        </div>
    </div>
</body>