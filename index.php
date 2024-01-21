<?php 
        include('functions.php');
        if (!isLoggedIn()) {
            $_SESSION['msg'] = "You must log in first";
            header('location: login.php');
        }
?>
<!DOCTYPE html>
<html>
<head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
            
        </div>
    </section>
        <div class="header">
                <h2>Home Page</h2>
        </div>
        <div class="content">
                <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                        <div class="error success" >
                                <h3>
                                        <?php 
                                                echo $_SESSION['success']; 
                                                unset($_SESSION['success']);
                                        ?>
                                </h3>
                        </div>
                <?php endif ?>
                <!-- logged in user information -->
                <div class="profile_info">
                        <img src="images/user_profile.png"  >

                        <div>
                                <?php  if (isset($_SESSION['user'])) : ?>
                                        <strong><?php echo $_SESSION['user']['username']; ?></strong>

                                        <small>
                                                <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                                                <br>
                                                <a href="index.php?logout='1'" style="color: red;">logout</a>
                                        </small>

                                <?php endif ?>
                        </div>
                </div>
        </div>
</body>
</html>
                                