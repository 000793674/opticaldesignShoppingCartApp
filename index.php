<!-- 
	Peter Babb 000793674
	12/06/2019

	This is the home page for the Optical Design shopping cart app.
	Users must first log in or register before they have the option to shop.

	C H A N G E  L O G
	==================
	- Table for products was added to the database:

	product_id INT PRIMARY KEY
	product_name VARCHAR
	product_description VARCHAR
	price DECIMAL
	photo VARCHAR

	- In the product plan there was stipulation about adding objects for each of the tables
	in the database. All three of the tables in the database have objects assiciated with
	them: cart.php, product.php, & user.php. 

	* N O T E *
	===========
	about.php, frames/index.php, contacts/index.php, & contact.php are pages that have been included
	because they are part of the website, but weren't included in the project plan because they don't 
	have much relevant code associated with the final project.
-->
<?php session_start()?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Optical Design of Stratford</title>
	<link rel="stylesheet" type="text/css" href="css/opticaldesign.css" />
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
		<?php
			//if the user is logged in the nav displays these links instead 
            if (isset($_SESSION["email"]))
            {
				?><a href = "profile.php" class = "link">MY&#160;PROFILE</a>&#160;&#8226;&#160;
				<a href = "usercart.php" class = link>MY&#160;CART</a>&#160;&#8226;&#160;
				<a href = "shop.php" class = "link">SHOP</a>&#160;&#8226;&#160;
				<a href = "server/logout.php" class = "link">LOG&#160;OUT</a>&#160;&#8226;&#160;
           <?php }
           else {
            ?><a href = "register.html" class = "link">REGISTER</a>&#160;&#8226;&#160;
            <a href = "login.html" class = "link">LOG&#160;IN</a>&#160;&#8226;&#160;
          <?php }
        ?>
		<a href = "index.php" class = "current">HOME</a>&#160;&#8226;&#160;
		<a href = "about.php" class = "link">ABOUT&#160;US</a>&#160;&#8226;&#160;
		<a href="frames/index.php"  class="link">OUR&#160;FRAMES</a>&#160;&#8226;&#160;
		<a href="contacts/index.php"  class="link">CONTACT&#160;LENSES</a>&#160;&#8226;&#160;
		<a href="contact.php" class = "link">CONTACT&#160;US</a>&#160;&#160;&#160;&#160;&#160;
	</nav>

	<a href = "index.php" class = "link"><img src="images/ODlrg.png" class = "icon" alt="favicon"/></a>
</div>

<span>
	
	<p class ="home" >Distinctive </br> Quality </br> Eyewear </br></p>
	<img src="images/sketch.jpg" class ="home" alt="home">
</span>



</body>
</html>
