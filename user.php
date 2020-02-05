<?php
/**
 * 
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * A class to create user objects, implementing the JsonSerializable 
 * interface so that private members can get json encoded with the
 * json_encode function
 * 
 * 
 * */
class User implements JsonSerializable
{
    private $emailAddress; 
    private $password;
    private $firstname;
    private $lastname;
    private $streetAddress;
    private $postalCode;
    private $creditCard;

    /**
     * default constructor
     * @param {string} emailAddress, password, firstname, lastname, streetAddress, postalCode, creditcard
     *
     */
    function __construct($emailAddress, $password, 
    $firstname, $lastname, $streetAddress, $postalCode, $creditCard)
    {
        $this->emailAddress = $emailAddress;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->streetAddress = $streetAddress;
        $this->postalCode = $postalCode;
        $this->$creditCard = (int)$creditCard;
    }

    /**
     * Called by json_encode  
     */
    public function jsonSerialize()
    {
        return  get_object_vars($this);
    }
}