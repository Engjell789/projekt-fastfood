
<?php if(isset($_POST['submit'])){
include_once 'c.php';
$obj=new Contact();
$res=$obj->contact_us($_POST);
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
                <li><a href="home.html">HOME</a></li>
                <li><a href="aboutus.html">ABOUT US</a></li>
                <li><a href="burger.php">BURGER</a></li>
                <li><a href="pizza.php">PIZZA</a></li>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
            <div>
                <a href="login.php"><input class="login" type="submit" value="LOG IN" name="login"> </a>
            </div>
        </div>
    </section>

    <div class="container">
    <form method="post" action="contactus.php"  onsubmit="return contactV()">
      
            <h3>GET IN TOUCH</h3>
            <input type="text" id="name" name="name" placeholder="Your Name" >
            <input type="email" id="email" name="email" placeholder="Email" >
            <input type="text" id="phone" name="phone" placeholder="Phone no." >
            <textarea id="message" rows="4" name="message"  placeholder="How can we help you"></textarea>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
    <script>
        function contactV() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var message = document.getElementById('message').value;

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var phoneRegex = /^\+\d+$/;

    

            if (name === "" || email === "" || phone === "" || message === "") {
                alert("plotsoj te gjitha fushat");
                return false;
            }

            if (!emailRegex.test(email)) {
                alert("vendos nje email valid");
                return false;
            }
        
            if (!phoneRegex.test(phone)) {
                alert("vendos nje numer");
                return false;
            }
      

            return true;
        }
    </script>
</body>