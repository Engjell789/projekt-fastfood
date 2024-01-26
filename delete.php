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

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql = "delete from users where id=$id";
    $result = mysqli_query($data, $sql);
    if($result){
        header('location:admin.php');
    }else{
        echo "deshtoi";
    }
}


    ?>