<?php   

class Contact {
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contact";
    public $mysqli;

 

    public function __construct(){
        return $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
    }



    public function news($data) {
        $name=$data['name'];
        $message=$data['message'];
        $q="insert into news set name='$name',message='$message'";
        return $this->mysqli->query($q);

    }


}


if(isset($_POST['submit'])){

    $obj=new Contact();
    $res=$obj->news($_POST);
    if ($res==true){
        echo "<script> alert('succesful') </script>";
    }else{
        echo "<script> alert('errorr')</script>";
    }
    
    
    
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast food project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="menu">
        <div class="nav">
            <div class="logo"><h1><b>BLITZ</b>FOOD</h1></div>
            <ul>
                <li><a href="adminhome.php">HOME</a></li>
                <li><a href="adminaboutus.php">ABOUT US</a></li>
                <li><a href="adminburger.php">BURGER</a></li>
                <li><a href="adminpizza.php">PIZZA</a></li>
                <li><a href="admincontactus.php">CONTACT US</a></li>
                <li><a href="adminnotifications.php">NOTIFICATIONS</a></li>
               
            </ul>
            <div>
                <a href="dashboardcontactus.php"><input class="login" type="submit" value="MESSAGE" name="MESSAGE"> </a>
            </div>
        
        </div>
    </section>

    <div class="container">
    <form method="post" action="adminnotifications.php"  onsubmit="return contactV()">
      
            <h3>SEND NOTIFICATIONS</h3>
            <input type="text" id="name" name="name" placeholder="BLITZFASTFOOD" >
            <textarea id="message" rows="4" name="message"  placeholder="NOTIFICATIONS"></textarea>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
    <script>
        function contactV() {
            var name = document.getElementById('name').value;
            var message = document.getElementById('message').value;

       

    

            if (name === "" || | message === "") {
                alert("plotsoj te gjitha fushat");
                return false;
            }

       
      

            return true;
        }
    </script>
</body>