<?php  

$host = "localhost";
$user = "root";
$password = "";
$db = "contact";



$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Deshtoi lidhja me databazën");
}


$sql="SELECT * FROM porosia ";
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
            <a href="adminporosia.php"><input class="login" type="submit" value="ORDER" name="login"> </a>
</div>
</body>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="a">POROSITE E BERA</h2>
                    </div>
                    <div class="card-body">
                        <table class="table tb tx">
                        <tr class="b">
    <td>Id</td>
    <td>Username</td>
    <td>Email</td>
    <td>Phone</td>
    <td>Delete</td>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr class="j">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['porosia'] ?></td>
  
     
        <td>
            <button class="l">
            <a href="deletePorosia.php?id=<?php echo $row['id']; ?>" class="text-light">Delete</a>
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
