<?php  

$host = "localhost";
$user = "root";
$password = "";
$db = "contact";



$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Deshtoi lidhja me databazën");
}



$sql="SELECT * FROM contact_us ";
$result = mysqli_query($data, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Only Here</title>
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

/* butoni login*/
input{
    padding: 3px 13px;
    cursor: pointer;
    font-weight: 500;
  
   
}
      }

#page-wrap {
  width: 800px;

}

h2 {
  text-align: center;
  color: #333;

}

.table {

  border-collapse: collapse;
}

th, td {
  padding: 10px;

  color: black;
  border:solid 2px black;
}





.l {
  background-color: #d9534f;
  border: none;
  color: #fff;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}



.l a {
  color: #fff;
 
}

.b{
  background-color:bisque;
  border: solid 5px black;

}
.j{
  background-color:white;
}
.a{
  font-size:30px;
}

</style>
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
            <a href="admincontactus.php"><input class="login"  type="submit" value=" CONTACT US" name="logout"></a>
            </div>
</div>
</body>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="a">Mesazhet nga ContactUs</h2>
                    </div>
                    <div class="card-body">
                        <table class="table tb tx">
                        <tr class="b">
    <td>Id</td>
    <td>Username</td>
    <td>Email</td>
    <td>Phone</td>
    <td>message</td>
    <td>Delete</td>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr class="j">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['message'] ?></td>
     
        <td>
            <button class="l">
            <a href="deleteContactUs.php?id=<?php echo $row['id']; ?>" class="text-light">Delete</a>
            </button>
        </td>
    </tr>
    <?php
}
?>
                                

</div>
</div>
</div>

</body>
</html>
