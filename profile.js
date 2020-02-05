/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This script executes an ajax call to getuser.php and adds html to the page profile.php
 * This script adds event handlers to the form inputs to help with validation and eventhandler on the
 * buttons to process the form
 * This script executes an ajax call to either deleteuser.php or updateuser.php
 * depending on which button is clicked
 * This script reloads the page after updateuser.php or redirects to index.php after deleting a user
 */

/**
 * This function contains the rest of the script to be executed when the page loads
 */
window.addEventListener("load", function() {
    url = "server/getuser.php";
    console.log(url);
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(success)

    /**
     * This function should be called when the AJAX call is complete
     * and the json-encoded array has been extracted from the response.
     * @param {Array} userlist
     */
    function success(userlist) {
        for(let i = 0; i < userlist.length; i++) {

            $("label[for='First_Name']").html("First Name: " + userlist[i].firstname);
            $("label[for='Last_Name']").html("Last Name: " + userlist[i].lastname);
            $("label[for='Address']").html("Address: " + userlist[i].streetAddress);
            $("label[for='Postal_Code']").html("Postal Code: " + userlist[i].postalCode);   
        } 
    }


    /**
     * This function adds an event handler to each text input of the form element
     */
    $('Form > input:text').each(function(){
        /**
         * This function is called when the input is blurred
         * This function checks if the input has been left blank by the user  
         * and displays error message if they have
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


    postalcode = $("input[name='Postal_Code'");
    /**
     * This function checks the user input for every keystroke to ensure correct format
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

    
    /**
     *  This takes the values from the form uses an ajax call to pass the parameters to updateuser.php
     *   
     */ 
    $("#update").click(function(){
        url = "server/updateuser.php";
        console.log(url);

        firstname = $("input[name='First_Name']").val();
        lastname = $("input[name='Last_Name']").val();
        address = $("input[name='Address']").val();
        postalcode = $("input[name='Postal_Code'").val();

        //adds params to a string
        let params = "First_Name="+firstname+"&Last_Name="+lastname+
        "&Address="+address+"&Postal_Code="+postalcode;

        console.log(params);//debug

        fetch(url, { credentials: 'include' , 
                    method: "POST",
                    headers: {"Content-Type": "application/x-www-form-urlencoded"},
                    body:  params})
            .then(response => response.text())
            .then(
                /**
                 * This function reloads the page profile.php or updates the html of
                 * the error label depending on the response
                 * @param {string} text 
                 */
                function(text){
                if (text == "success"){
                    var redirect = setInterval(() => {
                    location.href="profile.php";
                    
                }, 10);
                }
                else{
                    $("label[name='status']").html("UNABLE TO UPDATE INFO");
                }
                console.log(text);
            });
    });


    /**
     * This function executes an ajax call to deleteuser.php and then redirects the user to index.php
     */
    $("#delete").click(function(){
        url = "server/deleteuser.php";

        fetch(url, { credentials: 'include'})   
            .then(response => response.text())
            .then(
                /**
                 * This function is used to check if the ajax call was successful
                 * @param {string} text 
                 */
                function(text){
                console.log(text);//debug
            });
            redirect = setInterval(() => {
                location.href="index.php";
                
            }, 10);    
    });
});