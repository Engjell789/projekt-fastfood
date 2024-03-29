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

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_prepare($this->connection, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('location: admin.php');
        } else {
            echo "Deshtoi fshirja: " . mysqli_error($this->connection);
        }

        mysqli_stmt_close($stmt);
    }
}

session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $userManager = new UserManager();
    $userManager->deleteUser($id);
}
?>
