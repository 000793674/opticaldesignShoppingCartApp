<?php

/**
 * 
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * A class to create cart objects, implementing the JsonSerializable 
 * interface so that private members can get json encoded with the
 * json_encode function
 * 
 * 
 * */
class Cart implements JsonSerializable 
{
    
    private $orderId; //primary key
    private $email; //users email (foreign key)
    private $description; //list items in cart
    private $total; // total amount of money
    private $items; // number of items in the cart
    
    /**
     * constructor for cart object
     * 
     *@param {Number} orderID, items, total
     *@param {string} $email, description
     */
    function __construct($orderId, $email, $items,
    $description, $total)
    {
        $this->orderId = $orderId;
        $this->email = $email;
        $this->description = $description;
        $this->total = $total;
        $this->items = $items;
    }
    
    /**
     * Called by json_encode  
     */
    public function jsonSerialize()
    {
        return  get_object_vars($this);
    }
}