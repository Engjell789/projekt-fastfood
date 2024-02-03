<?php
class Database
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

    public function insertProduct($name, $price, $img)
    {
        $target_path = "projekt-fastfood" . $img;
        $sql = "INSERT INTO addburgers (name, price, img) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "sss", $name, $price, $img);

        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_path)) {
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                header('location: adminburger.php');
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
        $database = new Database();
        $database->insertProduct($name, $price, $img);
    }
}


?>



<!DOCTYPE html>
<html>
<head>
    <title>ADD BURGERS</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>* { 
    margin: 0px; padding: 0px; 
}
body {
        font-size: 120%;
        background: #F8F8FF;
        background-color:bisque;
}
.header {
        width: 40%;
        margin: 50px auto 0px;
        color: white;
        background: #5F9EA0;
        text-align: center;
        border: 1px solid #B0C4DE;
        border-bottom: none;
        border-radius: 10px 10px 0px 0px;
        padding: 20px;
}
form, .content {
        width: 40%;
        margin: 0px auto;
        padding: 20px;
        border: 1px solid #B0C4DE;
        background: white;
        border-radius: 0px 0px 10px 10px;
}
.input-group {
        margin: 10px 0px 10px 0px;
}
.input-group label {
        display: block;
        text-align: left;
        margin: 3px;
}
.input-group input {
        height: 30px;
        width: 93%;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid gray;
}
#user_type {
        height: 40px;
        width: 98%;
        padding: 5px 10px;
        background: white;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid gray;
}
.btn {
        padding: 10px;
        font-size: 15px;
        color: white;
        background: #5F9EA0;
        border: none;
        border-radius: 5px;
}
@media only screen and (min-width: 1px) and (max-width: 600px){
    form{
        width: 80%;
    }
    .input-group {
      width:70%;
}
}
@media only screen and (min-width: 600px) and (max-width: 1093px)
{
    form{
        width: 80%;
    }
    .input-group {
      width:70%;
}
</style>
<body>
    <div class="header">
        <h2>ADD BURGERS</h2>
    </div>

    <form method="post" action="addburgers.php" enctype="multipart/form-data">
        <div class="input-group">
            <label>BURGER NAME</label>
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
