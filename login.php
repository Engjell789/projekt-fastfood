<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "contact";
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if ($this->connection === false) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function query($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function escapeString($string) {
        return mysqli_real_escape_string($this->connection, trim($string));
    }

    public function close() {
        mysqli_close($this->connection);
    }
}

class Auth {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function loginUser($name, $password) {
        $username = $this->db->escapeString($name);
        $password = $this->db->escapeString($password);

        if (empty($name) || empty($password)) {
            echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.");</script>';
        } else {
            $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row["password"] === $password) {
                        if ($row["usertype"] == "user") {
                            $_SESSION["username"] = $name;
                            header("location:userhome.php");
                        } else if ($row["usertype"] == "admin") {
                            $_SESSION["username"] = $name;
                            header("location:adminhome.php");
                        }
                    }
                } else {
                    echo '<script>alert("Username or password incorrect");</script>';
                }
            }
        }
    }
}

session_start();
$database = new Database();
$auth = new Auth($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auth->loginUser($_POST["name"], $_POST["password"]);
}

$database->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_btn">Login</button>
        </div>
        <p>Not yet a member? <a href="register.php">Sign up</a></p>
    </form>
</body>
</html>
