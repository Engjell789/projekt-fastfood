<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "contact";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Deshtoi lidhja me databazën");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password_1"]) ? $_POST["password_1"] : "";
    $confirm_password = isset($_POST["password_2"]) ? $_POST["password_2"] : "";

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Ju lutemi, plotësoni të gjitha fushat e regjistrimit.";
    } elseif ($password != $confirm_password) {
        echo "Fjalëkalimet nuk përputhen.";
    } else {
        // Hash the password before saving it to the database


        $sql = "INSERT INTO users (username, password, email) 
                VALUES ('$username', '$password', '$email')";

        $result = mysqli_query($data, $sql);

        if ($result) {
                header('location: login.php');
        } else {
            echo "Gabim gjatë regjistrimit: " . mysqli_error($data);
        }
    }
}

mysqli_close($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="post" action="register.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
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
