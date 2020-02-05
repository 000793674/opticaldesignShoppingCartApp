/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This script executes an ajax call to change the html on usercart.php
 * This script contains event handlers for click events to execute ajax calls to 
 * either deletecart.php or removefromcart.php
 * This page reloads every time remove from cart is called successfully
 */

/**
 * This function contains the rest of the functions to be executed after the page loads
 */
window.addEventListener("load", function getCart() {
    
    url = "server/getcart.php";
    console.log(url);
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(
            /**
             * This function should be called when the AJAX call is complete
             * and the json-encoded array has been extracted from the response.
             * @param {Array} carts
             */
            function(carts){
            
            //empty string for formatting
            listOfItems = "";
            
            cart = document.getElementById("cart");

            //two arrays used to store string for formatting purposes
            products = [];
            listOfProductElements = [];
            //if array is populated
            if(carts.length > 0)
            {

                //the description is split into several products
                products = carts[0].description.split(', ', carts[0].items);
                
                //for each product in array
                for(i = 0; i < products.length; i++)
                {
                    //every element is added to array
                    productElements = products[i].split(',');
                    
                    //array of arrays
                    listOfProductElements.push(productElements);
                    
                    
                    listOfItems += "<div class\=\"shop\"><img class\=\"shop\" src\="+productElements[3]+ ">" + 
                        productElements[1]+ " $"+ 
                        productElements[2] + 
                        "<div id\=\""+i+"\"><p class\=\"add\">Remove from cart" +
                        "</p></div>"+
                        "</div>";
                }
                listOfItems += "<div><p>Total Items: "+carts[0].items+
                "<br>Total: $"+carts[0].total+"</p></div>";
                listOfItems += "<div id\=\"delete\" ><p class\=\"add\">Delete Order</p></div>";
            }
            //when cart is empty
            else{
                listOfItems +="<div><p>There are no items in your order</p></div>"
            }
            
            cart.innerHTML = listOfItems;


            /**
             * This function executes an ajax call to deletecart.php
             * performs an animation and reloads the page
             */
            $("#delete").click(function(){
            
                url = "server/deletecart.php";
                
                fetch(url, { credentials: 'include'})
                    .then(response => response.text())
                    .then(
                        /**
                         * This function writes the response to the console
                         * @param {string }text
                         */
                        function(text){
                            console.log(text);
                        })
                /**
                 * This function fades out the nav to display a header and then fades the nav back in
                 */
                $('div.navLinks').fadeOut(100, function(){
                    $(this).delay(1000).fadeIn(100)});
                    
                getCart();
            });


            /**
             * This function formats the params to be sent in an ajax call to removefromcart.php
             * and reloads the page for the user
             */
            $('div.shop > div').each(function(){
                $(this).click(function(){
                    
                    //removes item to be deleted from the array of product descriptions
                    if(products.length > 1){
                        products.splice(this.id, 1);
                    }

                    //remakes a string with removed description
                    productid = "";
                    for( i = 0; i<products.length; i++){
                        //formatting
                        if ( i > 0)
                        {
                        productid += ", " + products[i];
                        }
                        else{
                            productid += products[i];
                        }
                    }
                    url = "server/removefromcart.php";

                    price = listOfProductElements[this.id][2];
                    items = carts[0].items;
                    let params = "product_name="+productid+"&price="+price+"&items="+items;

                    console.log(params);//debug

                    fetch(url, { credentials: 'include' , 
                    method: "POST",
                    headers: {"Content-Type": "application/x-www-form-urlencoded"},
                    body:  params})
                        .then(response => response.text())
                        .then(
                            /**
                            * This function writes the response to the console
                            * @param {string }text
                            */
                           function(text)
                           {
                               console.log(text);//deug
                           })
                        
                });

                /**
                 * This function fades out the nav to display a header and then fades the nav back in
                 */
                $(this).click(function(){
                    $('div.navLinks').fadeOut(100, function(){
                        $(this).delay(1000).fadeIn(100);
                });

                getCart();
                
            });
        });
    }); 
});
