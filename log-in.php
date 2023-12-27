<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $gmail = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($gmail) && !empty($password) &&  !is_numeric($gmail)){
            
            $query = "select * from where email = '$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: index.php");
                        die;
                    }
                }
            }
            echo"<script type='text/javascript'> alert('wrong username or password')</script>";
        }
        else{
            echo"<script type='text/javascript'> alert('wrong username or password')</script>";
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
                <li><a href="home.html">HOME</a></li>
                <li><a href="aboutus.html">ABOUT US</a></li>
                <li><a href="burger.html">BURGER</a></li>
                <li><a href="pizza.html">PIZZA</a></li>
                <li><a href="contactus.html">CONTACT US</a></li>
            </ul>
            <div>
                <a href="log-in.html"><input class="login" type="submit" value="LOG IN" name="login"> </a>
                
            </div>
        </div>
    </section>
       <main>
            <div class="login-form">
                <div class="login-title">
                    <h2>Log in</h2>
                </div>
    
                <div class="inputL1">
                    <input type="text" id="emailInput" placeholder="Your Email">
                </div>
                <div class="inputL2">
                    <input type="password" id="passwordInput" placeholder="*********">
                </div>
    
                <div class="butonn">
                   <button type="button" class="buton" id="loginButon1" onclick="validateLogin()">Log in</button>
                </div>
    
                <div class="t">
                    <span>I don't have an account? <a href="sign-up.html">Sign up</a></span>
                </div>
            </div>
        </main>
         <script>
            function validateLogin() {
            
                let  emailInput = document.getElementById("emailInput").value;
                let passwordInput = document.getElementById("passwordInput").value;
    
                let permbajtaEemailit=  /\S+@\S+\.\S+/;
                let permbajtaEpaswordit = /^.{8,16}$/;
                if (emailInput.trim() === "" || passwordInput.trim() === "") {
                    alert("Please fill in all fields!");
                }
                    else if (!permbajtaEemailit.test(emailInput)){
                        alert("The email address is not valid. Please enter a valid email address.");
                    }
                    else if (!permbajtaEpaswordit.test(passwordInput)){
                        alert("Password must be between 8 and 16 characters.");
                    }
                 else  {
                    
                    alert("You have successfully entered!");
                    
                }
            }
        </script>
    
 
    


    
    
