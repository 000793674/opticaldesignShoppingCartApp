
<?php session_start()?>
<?php
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * This file adds data to the shopping_cart table it is called by usercart.js
 * 
 */
include "connect.php";
include "product.php";
//gets variables
$item = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);

//validate
if($item != null && $item !== "" && $item !== false)
{
    //Grabs product added from the database
    $command = "SELECT product_id, product_name, product_description, price, picture FROM products WHERE product_id = ?+1";
    $stmt = $dbh->prepare($command);
    $params = [(int)$item];
    $success = $stmt->execute($params);
    if($success)
    {
        echo "Success!";//debug
        $items = [];
        while($row = $stmt->fetch())
        {
            //stores products as object
            $item = new product(
                $row["product_id"], $row["product_name"], 
                $row["product_description"], $row["price"], $row["picture"]);

            //adds object to array to use in further commands
            array_push($items, $item);
        }
        
        //checks for existing cart
        $command = "SELECT email_address from shopping_cart WHERE email_address = ?"; 
        $stmt = $dbh->prepare($command);
        $params = [$_SESSION["email"]];
        $success = $stmt->execute($params);

        if ($success)
        {
            if($stmt->rowCount() < 1)
            {//adds a new email into the table
                $command = "INSERT into shopping_cart (email_address, items, order_description, total) VALUES (?,?,?,?)";
                $stmt = $dbh->prepare($command);
                $params = [$_SESSION["email"], 1, $items[0]->toListItem(), $items[0]->getPrice()];
                $success = $stmt->execute($params);
                
                if($success)
                {
                    echo "success2";//debug
                }
                else
                {
                    echo "failure2";//debug
                }
            }
            else
            {
                //updates existing cart
                $command = "UPDATE shopping_cart SET items = items + ?, 
                order_description = CONCAT(order_description, ',', ' ', ?), 
                total = total + ? WHERE email_address = ?";
                $stmt = $dbh->prepare($command);
                $params = [1, $items[0]->toListItem(), $items[0]->getPrice(), $_SESSION["email"]];
                $success = $stmt->execute($params);

                if($success)
                {
                    echo "success3";//debug
                }
                else
                {
                    echo "failure3";//debug
                }
            }
        }
    }
}
else 
{
    echo "Parameters Invalid"+ $item;//debug
}