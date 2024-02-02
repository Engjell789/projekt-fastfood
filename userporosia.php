<?php if(isset($_POST['submit'])){
include_once 'porosiadb.php';
$obj=new Porosia();
$res=$obj->porosia($_POST);
if ($res==true){
    echo "<script> alert('succesful') </script>";
}else{
    echo "<script> alert('errorr')</script>";
}




} ?>
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
                <li><a href="userhome.php">HOME</a></li>
                <li><a href="useraboutus.php">ABOUT US</a></li>
                <li><a href="userburger.php">BURGER</a></li>
                <li><a href="userpizza.php">PIZZA</a></li>
                <li><a href="usercontactus.php">CONTACT US</a></li>
                <li><a href="usernotifications.php">NOTIFICATIONS</a></li>
               
            </ul>
            <div>
               
            </div>
        
        </div>
    </section>

    <div class="container">
    <form method="post" action="userporosia.php"  onsubmit="return contactV()">
      
            <h3>BEJE POROSINE KETU</h3>
            <input type="text" id="name" name="name" placeholder="Emri juaj" >
            <input type="text" id="phone" name="phone" placeholder="NR Tel" >
            <input type="text" id="lokacioni" name="lokacioni" placeholder="Lokacioni" >
            <textarea id="porosia" rows="4" name="porosia"  placeholder="Qka deshironi te porositni"></textarea>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
    <script>
        function contactV() {
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var lokacioni = document.getElementById('lokacioni').value;
            var porosia = document.getElementById('porosia').value;

      
    

            if (name === "" || phone === ""|| Lokacioni === "" || porosia === "") {
                alert("plotsoj te gjitha fushat");
                return false;
            }

      

            return true;
        }
    </script>