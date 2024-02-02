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

    public function loginUser($username, $password) {
        $username = $this->db->escapeString($username);
        $password = $this->db->escapeString($password);

        if (empty($username) || empty($password)) {
            echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.");</script>';
        } else {
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row["password"] === $password) {
                        if ($row["usertype"] == "user") {
                            $_SESSION["username"] = $username;
                            header("location:userhome.php");
                        } else if ($row["usertype"] == "admin") {
                            $_SESSION["username"] = $username;
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
    $auth->loginUser($_POST["username"], $_POST["password"]);
}

$database->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
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
