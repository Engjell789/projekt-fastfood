<?php
    $servername = "localhost";
    $firstname = "";
    $gmail = "";
    $username = "root";
    $password = "";
    $db_name = "register";

    $conn = new mysqli($servername, $firstname, $gmail, $username, $password, 3306);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "Connection succesful";
?>