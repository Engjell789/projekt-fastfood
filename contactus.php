
<?php include('functions.php') ?>

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
                <li><a href="burger.html">BURGER</a></li>
                <li><a href="pizza.html">PIZZA</a></li>
                <li><a href="contactus.html">CONTACT US</a></li>
            </ul>
            <div>
                <a href="login.php"><input class="login" type="submit" value="LOG IN" name="login"> </a>
            </div>
        </div>
    </section>

    <div class="container">
        <form onsubmit = "sendEmail(); reset(); return false;">
            <h3>GET IN TOUCH</h3>
            <input type="text" id="name" placeholder="Your Name" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="text" id="phone" placeholder="Phone no." required>
            <textarea id="message" rows="4" placeholder="How can we help you"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail(){
            Email.send({
    Host : "smtp.gmail.com",
    Username : "username",
    Password : "password",
    To : 'them@website.com',
    From : "you@isp.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => alert(message)
);
        }
    </script>
</body>