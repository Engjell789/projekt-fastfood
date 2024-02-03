<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "contact";

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Deshtoi lidhja me databazën");
}

$sql = "SELECT * FROM addburgers";
$result = mysqli_query($data, $sql);
?>

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
}
.food_box{
    width: 50%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 100px 0;
}
.food_box .food_card{
    width: 350px;
    height: 390px;
    padding-top: 40px;
    margin-bottom: 50px;
    margin-right: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 1.0);
}
.food_box .food_card .food_image{
    width: 200px;
    height: 190px;
    margin: 0 auto;
}
.food_box .food_card .food_image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.food_text h4{
    text-align: center;
    font-size: 20px;
}
.food_text h5{
    text-align: center;
    font-size: 14px;
}
.food_text .food_btn{
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: white;
    background: orange;
    padding: 8px 10px;
    margin: 0 80px;
    margin-top: 6%;
}
     }
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
                <a href="userporosia.php"><input class="login" type="submit" value="ORDER" name="login"> </a>
            </div>
        </div>
    </section>

    <div class="food_box"> 
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="food_card">
            <div class="food_image">
                <img src="<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>">
            </div>
            <div class="food_text">
                <h4><?php echo $row['name']; ?></h4>
                <h5><?php echo $row['price']; ?>$</h5>
                <a href="userporosia.php" class="food_btn">ORDER</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>

<?php
mysqli_close($data);
?>
