<?php session_start();
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page takes the params from register.js and validates them
 * If successful then it adds the params as a user in the database.
 * 
 */

/**
 * This function checks that a postal code is formatted correctly (A1A1A1)
 * 
 * @param {String} postalcode
 * @return {boolean} validpostalcode
 */
function validatePostalCode($postalcode)
{
    $validPostalCode = true; //bool to return
    if (strlen($postalcode) == 6)
    {
        for( $i = 0; $i < 6; $i++)
        {
            //even number
            if($i % 2 == 0)
            {
                //if character is a letter
                if (ctype_alpha($postalcode[$i]))
                {
                }
                else
                {
                    $validPostalCode = false;
                    break;
                }
            }
            //odd number
            else 
            {
                //if character is a digit
                if(ctype_digit($postalcode[$i]))
                {    
                }
                else{
                    $validPostalCode = false;
                    break;
                }
            }
        }
    }
    else
    {
        $validPostalCode = false;
    }
    return $validPostalCode;
}
/**
 * This function makes sure the creditcard is 16 characters long and all digits
 * @param {string} creditcard
 * @return {boolean}
 */
function validateCreditCard($creditcard){
    if(strlen($creditcard) == 16 && ctype_digit($creditcard)){
        return true;
    }
    else return false;
}
?>
<?php
include "connect.php";

$firstname = filter_input(INPUT_POST, "First_Name", FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, "Last_Name", FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, "Address", FILTER_SANITIZE_STRING);
$postalcode = filter_input(INPUT_POST, "Postal_Code", FILTER_SANITIZE_STRING);
$creditcard = filter_input(INPUT_POST, "Credit_Card", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "E-mail", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, "Password");

//validates the params
if ($email !== null && $email !== false && $email !=="" && 
    $password != null && $password !== false && $password !=="" &&
    $firstname !=null && $firstname !==false && $firstname !== "" &&
   $lastname != null && $lastname !==false && $lastname !== "" &&
   $address != null && $address !== false && $address !== ""&&
   $postalcode != null && $postalcode !== false && $postalcode !=="" && validatePostalCode($postalcode) &&
   $creditcard != null && $creditcard !== false && $creditcard !== "" && validateCreditCard($creditcard) )
{

    $hash = password_hash($password, PASSWORD_DEFAULT);//encripts password
    

    //command to insert user into database
    $command = "INSERT INTO users (email_add, user_password, firstname, lastname, 
    street_address, postal_code, credit_card) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($command);
    $params = [$email, $hash, $firstname, $lastname, $address, $postalcode, $creditcard];
    $success = $stmt->execute($params);
    
    if($success
    ){
        echo("success");//debug
        //email stored in session
        $_SESSION["email"] = $email;
        
    }
    else
    {
        echo ("failure");//debug
        //bad attempt, destroy session
        session_unset();
        session_destroy();
    }
}
else 
{
    echo( "Invalid Parameters");//debug
    //bad attempt, destroy session
    session_unset();
    session_destroy();
}
?>
