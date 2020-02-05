<!--
    Peter Babb 000793674
    This page displays the items added to the users shopping cart and allows users to remove the from
    the cart
-->
<?php session_start()?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Optical Design of Stratford</title>
    <link rel="stylesheet" type="text/css" href="css/opticaldesign.css" />
    <script src = "js/usercart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<!-- / -->
</head>
<body>
    
    <div class="navLinks">
        <nav>
            <a href = "profile.php" class = "link">MY&#160;PROFILE</a>&#160;&#8226;&#160;
            <a href = cart.php class = current>MY&#160;CART</a>&#160;&#8226;&#160;
            <a href = "shop.php" class = "link">SHOP</a>&#160;&#8226;&#160;
            <a href = "server/logout.php" class = "link">LOG&#160;OUT</a>&#160;&#8226;&#160;
            <a href = "index.php" class = "link">HOME</a>&#160;&#8226;&#160;
            <a href = "about.php" class = "link">ABOUT&#160;US</a>&#160;&#8226;&#160;
            <a href="frames/index.php"  class="link">OUR&#160;FRAMES</a>&#160;&#8226;&#160;
            <a href="contacts/index.php"  class="link">CONTACT&#160;LENSES</a>&#160;&#8226;&#160;
            <a href="contact.php" class = "link">CONTACT&#160;US</a>&#160;&#160;&#160;&#160;&#160;
        </nav>
    </div>
    <h1 class = "added">Removed!</h1>
    <span id = "cart">
        
    </span>
</body>
</html>

