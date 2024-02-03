<?php

class UserManager
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

    public function getUserData($id)
    {
        $query = "SELECT * FROM users WHERE id=?";
        $stmt = mysqli_prepare($this->connection, $query);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            echo "Gabim gjatë marrjes së të dhënave: " . mysqli_error($this->connection);
            return null;
        }
    }

    public function updateUser($id, $name, $password, $email, $usertype)
    {
       

        $sql = "UPDATE users SET name=?, password=?, email=?, usertype=? WHERE id=?";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "ssssi", $name, $password, $email, $usertype, $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('location: admin.php');
        } else {
            echo "Gabim gjatë përditësimit: " . mysqli_error($this->connection);
        }

        mysqli_stmt_close($stmt);
    }
}

session_start();

$userManager = new UserManager();

// Retrieve user data based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_data = $userManager->getUserData($id);

    if ($user_data) {
        $name = $user_data['name'];
        $email = $user_data['email'];
        $usertype = $user_data['usertype'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password_1"]) ? $_POST["password_1"] : "";
    $confirm_password = isset($_POST["password_2"]) ? $_POST["password_2"] : "";
    $usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";

    if (empty($name) || empty($email) || empty($usertype)) {
        echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.")</script>';
    } elseif ($password != $confirm_password) {
        echo '<script>alert("Fjalëkalimet nuk përputhen.")</script>';
    } else {
        $userManager->updateUser($id, $name, $password, $email, $usertype);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
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
        <h2>UPDATE USER</h2>
    </div>

    <form method="post" action="uptade.php?id=<?php echo $id; ?>">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
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
            <label>User Type</label>
            <input type="text" name="usertype" value="<?php echo $usertype; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="update_btn">Update</button>
        </div>
    </form>
</body>
</html>
