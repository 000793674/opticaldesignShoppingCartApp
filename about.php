<!-- 
	Peter Babb 000793674
	12/06/2019

    This page is designed to tell users more about the store
    This page is just for the website and was not included in the project plan
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
		<a href = "index.php" class = "link">HOME</a>&#160;&#8226;&#160;
		<a href = "about.php" class = "current">ABOUT&#160;US</a>&#160;&#8226;&#160;
		<a href="frames/index.php"  class="link">OUR&#160;FRAMES</a>&#160;&#8226;&#160;
		<a href="contacts/index.php"  class="link">CONTACT&#160;LENSES</a>&#160;&#8226;&#160;
		<a href="contact.php" class = "link">CONTACT&#160;US</a>&#160;&#160;&#160;&#160;&#160;
	</nav>
		
			

</div>
<div class="inset60">
	<span>
		<h3>Eyewear should</h3>
		<p>blend form, function and design to give
		you excellent vision with comfort, style, distinction and quality.</p>
	</span>
	<img src="images/storefront.jpg" class="pic" alt = "storefront"/>
</div>
</body>
</html>