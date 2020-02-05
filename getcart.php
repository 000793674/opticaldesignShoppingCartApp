
<?php session_start()?>
<?php 
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page gets the cart associated with the current session from the database
 */
    include "connect.php";
    include "cart.php";

    //command to get cart
    $command = "SELECT order_id, email_address, items, order_description, total FROM shopping_cart WHERE email_address = ?"; 
    $stmt = $dbh->prepare($command);
    $params = [$_SESSION["email"]];
    $success = $stmt->execute($params);
    
    if($success)
    {

        //if successful cart object is added to array to be json encoded
        $carts =[];
        while($row = $stmt->fetch())
        {
           $cart =  new cart ($row["order_id"], $row["email_address"],$row["items"],
            $row["order_description"], $row["total"]); 
            array_push($carts, $cart);   
        }
        echo json_encode($carts);   
    }
?>