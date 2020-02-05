<?php
/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This page gets all the products from the database and stores them as objects
 * in a json encoded array.
 * This page is called by shop.js
 */
include "connect.php";
include "product.php";

//command to get all products from the database
$command = "SELECT product_id, product_name, product_description, price, picture FROM products";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();


$shoppinglist = [];

//adds products to array
while ($row = $stmt->fetch()) 
{
    $listitem = new product(
    $row["product_id"], $row["product_name"], 
    $row["product_description"], $row["price"], $row["picture"]);
    array_push($shoppinglist, $listitem);
}

// Write the json encoded array to the HTTP Response
echo json_encode($shoppinglist);
