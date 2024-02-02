<?php  

$host = "localhost";
$user = "root";
$password = "";
$db = "contact";



$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Deshtoi lidhja me databazën");
}


$sql="SELECT * FROM  news ";
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
        body {
            font-family: 'Arial', sans-serif;
          
            margin: 0;
            padding: 0;
        }


     
      
  
        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        .header-row {
            background-color: #343a40;
            color: #fff;
        }

      
    </style>
</head>

<body class="bg-dark">
    <section class="menu">
        <div class="nav">
            <div class="logo">
                <h1><b>BLITZ</b>FOOD</h1>
            </div>
            <ul>
                <li><a href="userhome.php">HOME</a></li>
                <li><a href="useraboutus.php">ABOUT US</a></li>
                <li><a href="userburger.php">BURGER</a></li>
                <li><a href="userpizza.php">PIZZA</a></li>
                <li><a href="usercontactus.php">CONTACT US</a></li>
                <li><a href="usernotifications.php">NOTIFICATIONS</a></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="a">NOTIFICATIONS</h2>
            </div>
            <div class="card-body">
                <table>
                    <tr class="header-row">
                        <th>Name</th>
                        <th>Message</th>
                        <th>Data</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr class="data-row">
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['message'] ?></td>
                            <td><?php echo $row['data'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
