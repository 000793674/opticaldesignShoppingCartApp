<?php session_start()?>
<?php 
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page deletes the user the table is it called by profile.js
 */
    include "connect.php";

    //command to delete user associated with current session
    $command = "DELETE FROM users WHERE email_add = ?"; 
    $stmt = $dbh->prepare($command);
    $params = [$_SESSION["email"]];
    $success = $stmt->execute($params);
    
    if($success)
    {
        echo "success";//debug

        //destroys session upon success
        session_unset();
        session_destroy();
    }
    else
    {
        echo "failure";//debug
    } 
?>