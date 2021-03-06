<!-- 
	Peter Babb 000793674
	12/06/2019

    This page displays user info from profile.js. This page allows the user to change some
    of their personal info.
    
-->
<?php session_start()?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Optical Design of Stratford</title>
    <link rel="stylesheet" type="text/css" href="css/opticaldesign.css" />
    <script src = "js/profile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<!-- / -->
</head>
<body>
    <?php 
    if (isset($_SESSION["email"])){
        ?>
    <div class="navLinks">
        <nav>
            <a href = "profile.php" class = "current">MY&#160;PROFILE</a>&#160;&#8226;&#160;
            <a href = "usercart.php" class = "link">MY&#160;CART</a>&#160;&#8226;&#160;
            <a href = "shop.php" class = "link">SHOP</a>&#160;&#8226;&#160;
            <a href = "server/logout.php" class = "link">LOG&#160;OUT</a>&#160;&#8226;&#160;
            <a href = "index.php" class = "link">HOME</a>&#160;&#8226;&#160;
            <a href = "about.php" class = "link">ABOUT&#160;US</a>&#160;&#8226;&#160;
            <a href="frames/index.php"  class="link">OUR&#160;FRAMES</a>&#160;&#8226;&#160;
            <a href="contacts/index.php"  class="link">CONTACT&#160;LENSES</a>&#160;&#8226;&#160;
            <a href="contact.php" class = "link">CONTACT&#160;US</a>&#160;&#160;&#160;&#160;&#160;
        </nav>
    </div>
    <span id = profile>
    <form id = updateForm smethod ="POST">
            <label class = error>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</label><br>
            <label for=email_address>E-mail: <?php echo $_SESSION["email"]?></label>
            <br><br>
            <label for="First_Name">First Name: </label>
            <br><label id = "First_NameError" class = "error"></label>
            <input name="First_Name" type="text"  value="">
            <br> 
            <label for="Last_Name">Last Name: </label>
            <br><label id = "Last_NameError" class = "error"></label>
            <input type="text" name="Last_Name">
            <br>
            <label for="Address">Address:</label>
            <br><label id = "AddressError" class = "error"></label>
            <input type="text" name="Address">
            <br>
            <label for="Postal_Code">Postal Code: </label>
            <br><label id = "Postal_CodeError" class =error></label>
            <input type="text" name="Postal_Code">
            <input type="button" class="button" value="UPDATE" id="update"><br>
            <input type="button" class="button" value="DELETE ACCOUNT" id="delete"><br>
            <label class = "error" name = "status"></label>
    </span>
    <?php
    }
    else 
        echo"<p> You are not logged in!</p>"?>
</body>
</html>
