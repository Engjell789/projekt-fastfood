<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "contact";

session_start();

$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($data === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($data, trim($_POST["username"]));
    $password = mysqli_real_escape_string($data, trim($_POST["password"]));

    if (empty($username) || empty($password) ) {
        echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.");</script>';
    } 
     else {

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  

    $result = mysqli_query($data, $sql);


    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

          

            // Check passwords directly
            if ($row["password"] === $password) {
                // Use strict comparison === to check both value and type
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

    mysqli_close($data);

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
