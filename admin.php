<?php  

$host = "localhost";
$user = "root";
$password = "";
$db = "contact";



$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Deshtoi lidhja me databazën");
}


$sql="SELECT * FROM users ";
$result = mysqli_query($data, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Only Here</title>
    <style>
body {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  height: 100vh;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
  font-family: Arial, sans-serif;
}

#page-wrap {
  width: 800px;
  background-color: #fff;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
  text-align: left;
}

h2 {
  text-align: center;
  color: #333;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
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

.l:hover {
  background-color: #b32d29;
}

.l a {
  color: #fff;
}

</style>

</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="a">PERDORUESIT</h2>
                    </div>
                    <div class="card-body">
                        <table class="table tb tx">
                        <tr class="b">
    <td>Id</td>
    <td>Username</td>
    <td>Email</td>
    <td>UserType</td>
    
    <td>Delete</td>
</tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['usertype'] ?></td>
     
        <td>
            <button class="l">
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="text-light">Delete</a>
            </button>
        </td>
    </tr>
    <?php
}
?>
                                

</div>
</div>
</div>
</div>
</body>
</html>