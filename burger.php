<?php

    require_once 'connection.php';

    $sql = "SELECT * FROM product";
    $all_product = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast food project</title>
    <link rel="stylesheet" href="style.css">

    <script>
    function burger(Porosia) {
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

    <main>
    <?php
        while($row = mysqli_fetch_assoc($all_product)){
    ?>
    <div class="food_box"> 
        <div class="food_card">

            <div class="food_image">
                <img src="plainburger.jfif">
            </div>

        <div class="food_text">
            <h4><?php echo $row["product_name"]; ?></h4>
            <h5><?php echo $row["price"]; ?></h5>
          <a href="#" onclick="burger('PLAIN BURGER')" class="food_btn">ORDER</a>
        </div>
        </div>
        

        <div class="food_card">
            
            <div class="food_image">
                <img src="cheeseburger.jfif">
            </div>
        
            <div class="food_text">
                <h4><?php echo $row["product_name"]; ?></h4>
                <h5><?php echo $row["price"]; ?></h5>
                <a href="#" onclick="burger('CHEESE BURGER ')" class="food_btn">ORDER</a>
                    </a>

            </div>
        </div>


        <div class="food_card">
            
            <div class="food_image">
                <img src="chickenburger.jfif">
            </div>
        
            <div class="food_text">
                <h4><?php echo $row["product_name"]; ?></h4>
                <h5><?php echo $row["price"]; ?></h5>
                <a href="#" onclick="burger('CHICKEN BURGER ')" class="food_btn">ORDER</a>
            </div>
        </div>
        


        <div class="food_card">
            
            <div class="food_image">
                <img src="doublecheeseburger.jfif">
            </div>
        
            <div class="food_text">
                <h4><?php echo $row["product_name"]; ?></h4>
                <h5><?php echo $row["price"]; ?></h5>
                <a href="#" onclick="burger('DOUBLE CHEESEBURGER ')" class="food_btn">ORDER</a>           
             </div>
        </div>
        

        <div class="food_card">
            
            <div class="food_image">
                <img src="fries.jfif">
            </div>
        
            <div class="food_text">
                <h4><?php echo $row["product_name"]; ?></h4>
                <h5><?php echo $row["price"]; ?></h5>
                <a href="#" onclick="burger('FRIES  ')" class="food_btn">ORDER</a>        
            </div>
        </div>
    </div>
    <?php

        }
        ?>
    </main>
</body>