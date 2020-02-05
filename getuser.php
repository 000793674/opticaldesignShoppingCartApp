
<?php session_start()?>
<?php
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page gets all the users from the database associated with the current session
 * and stores them as objects in a json encoded array.
 * This page is called by profile.js
 */
include "connect.php";
include "user.php";

//command to get user
$command = "SELECT email_add, user_password, firstname, lastname, street_address, postal_code, credit_card FROM users WHERE email_add = ?";
$stmt = $dbh->prepare($command);
$params = [$_SESSION["email"]];
$success = $stmt->execute($params);

//stores users in array
$userlist = [];
while ($row = $stmt->fetch()) 
{
    $listitem = new user(
    $row["email_add"], $row["user_password"], 
    $row["firstname"], $row["lastname"], $row["street_address"], 
    $row["postal_code"], $row["credit_card"]);
    array_push($userlist, $listitem);
}

// Write the json encoded array to the HTTP Response
echo json_encode($userlist);