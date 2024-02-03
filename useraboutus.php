<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast food project</title>
    <link rel="stylesheet" href="style.css">
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
}}
</style>
</head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><b>BLITZ</b>FOOD</h1></div>
            <ul>
                <li><a href="userhome.php">HOME</a></li>
                <li><a href="useraboutus.php">ABOUT US</a></li>
                <li><a href="userburger.php">BURGER</a></li>
                <li><a href="userpizza.php">PIZZA</a></li>
                <li><a href="usercontactus.php">CONTACT US</a></li>
                <li><a href="usernotifications.php">NOTIFICATIONS</a></li>
                
            </ul>
            <div>
                <a href="usercontactus.php"><input class="login" type="submit" value="CONTACT US" name="login"> </a>
                
            </div>
        </div>
    </section>

    <div class="aboutus">
        <h3>WELCOME TO BLITZ FOOD</h3>
        <h4>At <b>BLITZ</b>FOOD, we believe that great meals should<br>
            be not only delicious but also convenient. Our journey began <br>
            with a passion for serving mouthwatering, high-quality fast food <br>
            that satisfies cravings and fits into the fast-paced lives of our<br>
            customers.</h4>

        <h3>OUR STORY</h3>
        <h4>Established in 2023, <b>BLITZ</b>FOOD has been a proud<br>
            member of the local community, bringing smiles to the faces of<br>
            hungry individuals and families. What started as a small<br>
            endeavor has blossomed into a go-to destination for those<br>
            seeking a quick, tasty bite.</h4>

        <h3>QUALITY INGREDIENTS, EXCEPTIONAL FLAVOR</h3>
        <h4>We take pride in sourcing the finest ingredients to create a<br>
            menu that bursts with flavor. From our signature burgers to our<br>
            crispy fries and refreshing beverages, each item is crafted with<br>
            care to ensure a delightful dining experience.</h4>

        <h3>COMMUNITY COMMITMENT</h3>
        <h4>We are more than just a fast-food joint; we are a part of the<br>
            community we serve. <b>BLITZ</b>FOOD is committed to<br>
            supporting local initiatives, charities, and events that make our<br>
            neighborhood thrive. We believe in giving back to the<br>
            community that has embraced us.</h4>
    </div>
</body>
