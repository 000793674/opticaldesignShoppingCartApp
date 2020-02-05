<?php
/**
 * 
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * A class to create products objects, implementing the JsonSerializable 
 * interface so that private members can get json encoded with the
 * json_encode function
 * 
 * 
 * */
class Product implements JsonSerializable
{
    private $productId; //primary key
    private $product_name; 
    private $description; //who makes this and where
    private $price;
    private $photo; //source of the photo

    /**
     * default constructor
     * @param {Number} productId, price
     * @param {string} product_name, description, photo
     */
    function __construct($productId, $product_name, 
    $description, $price, $photo)
    {
        $this->productId = $productId;
        $this->product_name = $product_name;
        $this->description = $description;
        $this->price = $price;
        $this->photo = $photo;
    }

    /**
     * This functions returns all the properties of this object as a comma separated string
     * @return {string}
     */
    function toListItem()
    {
        return "$this->productId,$this->product_name,$this->price,$this->photo";
    }

    /**
     * This function returns just the price as a string
     * @return {string}
     */
    function getPrice()
    {
        return"$this->price";
    }

    /**
     * Called by json_encode  
     */
    public function jsonSerialize()
    {
        return  get_object_vars($this);
    }
}