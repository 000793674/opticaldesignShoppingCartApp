<?php session_start();?>
<?php
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This gets parameters from profile.js and validates them.
 * If successful the parameters are used to update a row on the users table
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
?>
<?php
include "connect.php";

$firstname = filter_input(INPUT_POST, "First_Name", FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, "Last_Name", FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, "Address", FILTER_SANITIZE_STRING);
$postalcode = filter_input(INPUT_POST, "Postal_Code", FILTER_SANITIZE_STRING);

//validates
if (
    $firstname !=null && $firstname !==false && $firstname !== "" &&
   $lastname != null && $lastname !==false && $lastname !== "" &&
   $address != null && $address !== false && $address !== ""&&
   $postalcode != null && $postalcode !== false && $postalcode !=="" && validatePostalCode($postalcode))
{    
    //command to update the row associated with current session
    $command = "UPDATE users SET firstname = ?, lastname = ?, 
    street_address = ?, postal_code = ? WHERE email_add = ?";
    $stmt = $dbh->prepare($command);
    $params = [$firstname, $lastname, $address, $postalcode, $_SESSION["email"]];
    $success = $stmt->execute($params);

    if($success)
    {
        echo "success";//debug
    }
    else
    {
        echo"failure";//debug
    }
}
else
{
    echo "Invalid Parameters";//debug
}
?>
