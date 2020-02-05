<!--
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page checks that parameters from login.html match those for a user in the database.
 * If successful this page will establish a session and redirect the user home.
 * If this page fails it destroys the session, lets the user know of the failure and prompts them to try again
-->
<?php session_start()?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Optical Design of Stratford</title>
	<link rel="stylesheet" type="text/css" href="../css/opticaldesign.css" />
	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<!-- / -->
</head>
<?php
include "connect.php";
include "user.php";

$email = filter_input(INPUT_POST, "email2", FILTER_SANITIZE_EMAIL, FILTER_NULL_ON_FAILURE);
$password = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_STRING);

//validates input
if ($email != null && $email !== false && $email !==""
&& $password !=null && $password !== false && $password !=="") 
{
    //Looks for existing email
    $command = "SELECT email_add, user_password from users WHERE email_add = ?"; 
    $stmt = $dbh->prepare($command);
    $params = [$email];
    $success = $stmt->execute($params);

    if ($success)
    {
        $row = $stmt->fetch();
        //if email and password match the query, a session is registered
        if ($email === $row["email_add"] && password_verify($password, $row["user_password"])){
            $_SESSION["email"] = $email;
        }   
        else
        {
        // bad login attempt. kick them out.
        session_unset();
        session_destroy();
        }
    }  
}
?>
<body>
    <?php
        //if successful
        if (isset($_SESSION["email"]))
        {
    ?>
            <h1>Welcome <?= $_SESSION["email"] ?>!</h1>

            <script>//redirects user home after confirming a successful log in
                var redirect = setInterval(() => {
                    location.href='../index.php';
                    
                }, 1500);
            </script>
    <?php
        }
        else 
        {
    ?>
            <h1>Login Error! Access denied.</h1>
            <a href="../login.html">Try again.</a>
    <?php
        }
    ?>
</body>
</html>