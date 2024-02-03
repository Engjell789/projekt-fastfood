<?php

class DatabaseConnector {
    private $host;
    private $user;
    private $password;
    private $db;
    private $connection;

    public function __construct($host, $user, $password, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->connect();
    }

    private function connect() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if ($this->connection === false) {
            die("Deshtoi lidhja me databazën");
        }
    }

    public function closeConnection() {
        mysqli_close($this->connection);
    }

    public function executeQuery($sql) {
        return mysqli_query($this->connection, $sql);
    }
}

class UserRegistration {
    private $databaseConnector;

    public function __construct(DatabaseConnector $databaseConnector) {
        $this->databaseConnector = $databaseConnector;
    }

    public function registerUser($name, $email, $password, $confirm_password) {
        if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.")</script>';
        } elseif ($password != $confirm_password) {
            echo '<script>alert("Fjalëkalimet nuk përputhen.")</script>';
        } else {
         

            $sql = "INSERT INTO users (name, password, email) 
                    VALUES ('$name', '$password', '$email')";

            $result = $this->databaseConnector->executeQuery($sql);

            if ($result) {
                header('location: login.php');
            } else {
                echo "Gabim gjatë regjistrimit: " . mysqli_error($this->databaseConnector);
            }
        }
    }
}

$databaseConnector = new DatabaseConnector("localhost", "root", "", "contact");
$userRegistration = new UserRegistration($databaseConnector);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password_1"]) ? $_POST["password_1"] : "";
    $confirm_password = isset($_POST["password_2"]) ? $_POST["password_2"] : "";

    $userRegistration->registerUser($name, $email, $password, $confirm_password);
}

$databaseConnector->closeConnection();

?>




<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
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
}</style>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="post" action="register.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
</body>
</html>
