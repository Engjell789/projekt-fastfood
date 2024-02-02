<?php

class ContactManager
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

    public function deleteContactMessage($id)
    {
        $sql = "DELETE FROM contact_us WHERE id = ?";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('location: dashboardcontactus.php');
        } else {
            echo "Deshtoi fshirja: " . mysqli_error($this->connection);
        }

        mysqli_stmt_close($stmt);
    }
}

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $contactManager = new ContactManager();
    $contactManager->deleteContactMessage($id);
}
?>
