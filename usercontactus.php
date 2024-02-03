
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
    <style>
 
    @media only screen and (min-width: 1px) and (max-width: 600px){
            body{
    margin: 0;
    background-color: bisque;
}
.container{
    width: 100%;
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
form{
    background: white;
    display: flex;
    flex-direction: column;
    padding: 2px 30px;
    width: 68%;
    height: 60%;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 1.0);
}
form h3{
    font-weight: 800;
    margin-bottom: 10px;
}
form input, textarea{
    border: 0;
    margin: 10px 30px;
    padding: 20px;
    outline: none;
    background: #f5f5f5;
    font-size: 16px;
}
form button{
    padding: 15px;
    background: #ff5361;
    color: white;
    font-size: 18px;
    border: 0;
    outline: none;
    cursor: pointer;
    width: 150px;
    margin: 20px auto 0;
    border-radius: 30px;
}
.nav{
 
    width: 100%;
    display: flex;
    justify-content: space-around;
    padding: 5px 0;
    font-size: 7px;
    border:solid 2px;
}

.nav .logo h1{
    font-weight: 500;
    font-family: sans-serif;
    color: black;
}
.nav .logo b{
    color: orangered;
}
.nav ul{
  display: flex;
	flex-direction: column;
	flex-wrap: wrap;
  padding: 20px;

}
.nav ul li{
    margin-right: 50px;
}
.nav ul li a{
    text-decoration: none;
    color: black;
    font-weight: 500;
    font-family: sans-serif;
    font-size: 10px;
}
.container{
    height:1000px;
}
     }
    </style>
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
                <a href="useraboutus.php"><input class="login" type="submit" value="ABOUT US" name="login"> </a>
            </div>
          
        </div>
    </section>

    <div class="container">
    <form method="post" action="usercontactus.php"  onsubmit="return contactV()">
      
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
                alert("vendos nje numer valid");
                return false;
            }
      

            return true;
        }
    </script>
</body>