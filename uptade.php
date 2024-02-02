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

    public function updateUser($id, $username, $password, $email, $usertype)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username=?, password=?, email=?, usertype=? WHERE id=?";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "ssssi", $username, $hashedPassword, $email, $usertype, $id);

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
        $username = $user_data['username'];
        $email = $user_data['email'];
        $usertype = $user_data['usertype'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password_1"]) ? $_POST["password_1"] : "";
    $confirm_password = isset($_POST["password_2"]) ? $_POST["password_2"] : "";
    $usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";

    if (empty($username) || empty($email) || empty($usertype)) {
        echo '<script>alert("Ju lutemi, plotësoni të gjitha fushat e regjistrimit.")</script>';
    } elseif ($password != $confirm_password) {
        echo '<script>alert("Fjalëkalimet nuk përputhen.")</script>';
    } else {
        $userManager->updateUser($id, $username, $password, $email, $usertype);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>UPDATE USER</h2>
    </div>

    <form method="post" action="uptade.php?id=<?php echo $id; ?>">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
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
