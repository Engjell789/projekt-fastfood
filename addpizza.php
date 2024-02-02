<?php
class PizzaManager
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "contact";
    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        if ($this->connection === false) {
            die("Deshtoi lidhja me databazën");
        }
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }

    public function insertPizza($name, $price, $img)
    {
        $target_path = "projekt-fastfood" . $img;
        $sql = "INSERT INTO addpizza (name, price, img) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "sss", $name, $price, $img);

        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_path)) {
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                header('location: adminpizza.php');
            } else {
                echo "Gabim gjatë regjistrimit: " . mysqli_error($this->connection);
            }
        } else {
            echo "Ngarkimi i fajllit dështoi.";
        }

        mysqli_stmt_close($stmt);
    }
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $price = isset($_POST["price"]) ? $_POST["price"] : "";
    $img = $_FILES['img']['name'];

    if (empty($name) || empty($price) || empty($img)) {
        echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.")</script>';
    } else {
        $pizzaManager = new PizzaManager();
        $pizzaManager->insertPizza($name, $price, $img);
    }
}
if(!isset($_SESSION["username"]))
{
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>ADD PIZZA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>ADD PIZZA</h2>
    </div>

    <form method="post" action="addpizza.php" enctype="multipart/form-data">
        <div class="input-group">
            <label>PIZZA NAME</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label>PRICE</label>
            <input type="text" name="price">
        </div>
        <div class="input-group">
            <label>IMAGE</label>
            <input type="file" name="img">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Add</button>
        </div>
    </form>
</body>
</html>
