/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This script has several eventhandlers to check user input
 * This script has an event handler to prevent the form from submitting
 * This script executes an ajax call to register.php
 * Upon call success this script redirects the user to index.php
 * if the call fails an error is displayed for the user
 * 
 */

/**
 * This function contains the rest of the script to be executed when the page loads
 */
window.addEventListener("load", function() {

    /**
     * This function adds event handlers to each text input on the form
     */
    $('#registrationForm > input:text').each(function(){
        /**
         * This functions checks if the user left the field blank and displays
         * an error message if they do
         */
        $(this).blur(function checkBlank(){
            if(this.value ==""){
                document.getElementById(this.name+"Error").innerHTML = this.name + " Cannot Be Blank";    
            }
            else{
                document.getElementById(this.name+"Error").innerHTML = "";
            }
        });
    });

    
    postalcode = $("input[name='Postal_Code']");
    /**
     * This functions checks every character of the postal code field as the user types to ensure proper formatting
     */
    $(postalcode).keyup(function validatePostalCode(){

        for(i = 0; i < this.value.length; i++){
            //every even number
            if(i%2 ==0)
            {
                //if this character is a capital letter
                if(this.value.charAt(i) >= 'A' && this.value.charAt(i) <= 'Z')
                {
                    document.getElementById("Postal_CodeError").innerHTML = "";
                }
                else
                {
                    document.getElementById("Postal_CodeError").innerHTML = "Postal Code Must Follow A1A1A1 Format";
                    break;
                }
            }
            //every odd number
            else{
                //if this character is a digit
                if(this.value.charAt(i).toLowerCase() >= '0' && this.value.charAt(i).toLowerCase() <= '9')
                {
                    document.getElementById("Postal_CodeError").innerHTML = "";
                }
                else
                {
                    document.getElementById("Postal_CodeError").innerHTML = "Postal Code Must Follow A1A1A1 Format";
                    break;
                }
            }
        }
    });


    creditcard = $("input[name='Credit_Card'");
    /**
     * This functions checks every character the user types into the creditcard field to ensure proper formating
     */
    $(creditcard).keyup(function validateCreditCard(){
        for(i = 0; i < this.value.length; i++){
            //if character is not a digit
            if(!(this.value.charAt(i) >= '0' && this.value.charAt(i) <='9') || this.value.length !== 16)
            {
                document.getElementById("Credit_CardError").innerHTML = "Credit Card Must Contain 16 Digits";
            }
            else
            {
                document.getElementById("Credit_CardError").innerHTML = "";
            }
        
        }
    });


    email = $("input[name='E-mail']");
    /**
     * This function checks user input as it's typed to ensure the user enters an email address
     */
    $(email).keyup(function validateEmail(){
        if(this.value.includes('@') && this.value.includes('.'))
        {
            document.getElementById("E-mailError").innerHTML = "";
        }
        else
        {
            document.getElementById("E-mailError").innerHTML = "E-mail Invalid";
        }
    });


    password = $("input[name='Password']");
    /**
     * This functions checks user input in the password field to make sure it's in the correct format
     */
    $(password).keyup(function validatePassword(){
        if(this.value.length < 8)
        {
            document.getElementById("PasswordError").innerHTML = "Password Must Be At Least 8 Characters";
        }
        else
        {
            document.getElementById("PasswordError").innerHTML = "";
        }
           
    });


    /**
     * This function executes an ajax call to register.php and passes parameters to be validated
     */
    $("#register").click(function(event){
        event.preventDefault();
        url = "server/register.php";

        firstname = $("input[name='First_Name']").val();
        lastname = $("input[name='Last_Name']").val();
        address = $("input[name='Address']").val();
        postalcode = $("input[name='Postal_Code']").val();
        creditcard = $("input[name='Credit_Card']").val();
        email = $("input[name='E-mail']").val();
        password = $("input[name='Password']").val();

        params = "First_Name="+firstname+"&Last_Name="+lastname+"&Address="+address+
        "&Postal_Code="+postalcode+"&Credit_Card="+creditcard+"&E-mail="+email+"&Password="+password;
        console.log(params);//debug

        fetch(url, { credentials: 'include',
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body:  params})   
            .then(response => response.text())
            .then(
                /**
                 * On success this function redirects the user to index.php
                 * On failure this function displays an error for the user
                 * @param {string} text 
                 */
                function(text){
                    console.log(text);//debug
                    if(text == "success")
                    {
                        redirect = setInterval(() => {
                            location.href="index.php";
                            
                        }, 10);
                    }
                    else
                    {
                        $("label[name='status']").html("UNABLE TO REGISTER WITH THIS INFO");
                    }
                });
    });
});
