<!-- 
	Peter Babb 000793674
	12/06/2019

    This page is designed to tell users how to find the store
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
		<a href = "about.php" class = "link">ABOUT&#160;US</a>&#160;&#8226;&#160;
		<a href="frames/index.php"  class="link">OUR&#160;FRAMES</a>&#160;&#8226;&#160;
		<a href="contacts/index.php"  class="link">CONTACT&#160;LENSES</a>&#160;&#8226;&#160;
		<a href="contact.php" class = "current">CONTACT&#160;US</a>&#160;&#160;&#160;&#160;&#160;
	</nav>
		
	
		
			

</div>
<div class = "inset60">
	<div>
		<span>
			<p><a class="link"  target="_blank"
			href="https://goo.gl/maps/NW5k9VXwtN82">
			84 Wellington Street, 
			Stratford, ON&#160;
			N5A&#160;2L2</a></br></br>
			
			
			519&#160;271&#160;7171</br></br>
			
			
			
			Hours:</br>
			Tuesday - Friday:</br> 9:30am - 5:30pm</br></br>
			Saturday: </br> 10:00am - 2:00pm</br></br>
			Sunday &amp; Monday, closed</p>
		</span>
		<img src="images/googlemap.png" class= "map" alt="map"/>
	</div>
</div>

<footer>
	<a class = "link" href="opticaldesign.ca">www.opticaldesign.ca</a></br>
	
	<a class="link"  href="mai&#108;to:info&#64;opticaldesign&#46;ca">
	info&#64;opticaldesign&#46;ca</a></br>
	
	Follow Us: </br>
	<a href="http://facebook.com/opticaldesign.ca" target="_blank"  
		class="link">
		<img src="images/facebook.png" class="facebook"
		alt="Optical Design&apos;s Facebook page" />
	</a>
	&#160;&#8226;&#160;
	<a href="http://instagram.com/opticaldesignofstratford" target="_blank"  
		class="link"
	><img src="images/insta.png" class="facebook"
		alt="Optical Design&apos;s Instagram feed" /></a>
</footer> 
	
</body>
</html>