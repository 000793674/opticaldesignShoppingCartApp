/**
 * Peter Babb
 * 000793674
 * 2019-12-06
 * 
 * This script executes an ajax call to getproduct.php and updates the html of shop.php
 * This script has event handlers to execute ajax call to addtocart.php
 */

/**
 * This function contains the other functions to execute after the page loads
 */
window.addEventListener("load", function() {
    url = "server/getproduct.php";
    console.log(url);
    fetch(url, { credentials: 'include'})
        .then(response => response.json())
        .then(success)

        
    /**
     * This function should be called when the AJAX call is complete
     * and the json-encoded array has been extracted from the response.
     * @param {Array} shoppinglist
     */
    function success(shoppinglist) {
        let products = document.getElementById("products");
        listOfItems = "";
        
        for(let i = 0; i < shoppinglist.length; i++) {
            
            listOfItems += "<div class\=\"shop\"><img class\=\"shop\" src\="+shoppinglist[i].photo+ ">" + 
            shoppinglist[i].product_name + " <br>"+ 
            shoppinglist[i].description + " <br>" + shoppinglist[i].price + 
            "<br><div id\=\""+i+"\"><p class\=\"add\">Add to cart" +
            "</p></div>"+
            "</div>";    
        }
        products.innerHTML += listOfItems;
        

        /**
         * This function adds click event handlers to each div that is a child of div.shop
         */
        $('div.shop > div').each(function(){


            /**
             * This function executes an ajax call to addtocart.php
             */
            $(this).click(function(){
                url = "server/addtocart.php";

                productid = this.id;
                let params = "product_name="+productid;
                
                fetch(url, { credentials: 'include' , 
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body:  params})
                    .then(response => response.text())
                    .then(
                        /**
                         * This function writes the responce to the console
                         * @param {string} text 
                         */
                        function(text){
                            console.log(text);//debug
                        })
            });


            /**
             * This function fades out the nav to display a header and then fades the nav back in
             */
            $(this).click(function(){
                $('div.navLinks').fadeOut(100, function(){
                    $(this).delay(1000).fadeIn(100);
                });
            });
        });
        console.log("success");//debug
    }
});


    