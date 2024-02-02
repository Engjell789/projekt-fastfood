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
