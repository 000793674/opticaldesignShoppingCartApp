<?php session_start()?>
<?php
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * This file validates and removes data from the shopping_cart table
 * 
 */
include "connect.php";

//gets variables
$product_name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);
$items = filter_input(INPUT_POST, "items", FILTER_SANITIZE_SPECIAL_CHARS);

//validate
if($items != null && $items !== "" && $items !== false &&
$price != null && $price !== "" && $price !== false &&
$product_name != null && $product_name !=="" && $product_name !== false){
    
    //if this is the last item the order is deleted
    if($items == 1)
    {
        //command to delete from the table
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
    }
    //else order is updated
    else
    {
        //commande to 'remove' a product from the order
        $command = "UPDATE shopping_cart SET items = items - 1, total = total - ?, 
        order_description = ?  WHERE email_address = ?";
        $stmt = $dbh->prepare($command);
        $params = [$price, $product_name, $_SESSION["email"]];
        $success = $stmt->execute($params);

        if($success)
        {
            echo "success";//debug
        }
        else
        {
            echo "Failure";//debug
        }
    }
    
}