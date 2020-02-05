<?php session_start()?>
<?php 
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page deletes the users shopping cart from the table is it called by usercart.js
 */
    include "connect.php";
    //command to delete row associated with email in current session
    $command = "DELETE FROM shopping_cart WHERE email_address = ?"; 
    $stmt = $dbh->prepare($command);
    $params = [$_SESSION["email"]];
    $success = $stmt->execute($params);

    if($success)
    {
        echo "success";//debug
    }
    else
    {
        echo "failure";//debug
    } 
?>