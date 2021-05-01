function makeSneaker(propertyObj) {

    var snkObj = document.createElement("div");

   
    snkObj.brand = propertyObj.brand || "Not Set";
    snkObj.name = propertyObj.name || "Not Set";
    snkObj.stock = propertyObj.stock || 0;
    snkObj.wsPrice = propertyObj.wsPrice || 0;    // Wholesale Price
    snkObj.rPrice = propertyObj.rPrice || 0;     // Retail Price
    snkObj.imagePath1 = propertyObj.image_a_path || "pics/noPreview.png";  // Default Image if image 1 is not set 
    snkObj.imagePath2 = propertyObj.image_b_path || "pics/noPreview.png";  // Default Image if image 2 is not set 
    var  rating = propertyObj.starRating || -1 ;
    var  modelNumber = propertyObj.modelNumber || -1;

    var display = function ( ) {           // Private display function

        // make the current properties visible on the page
        snkObj.innerHTML =
                "<br/> Name:  " + snkObj.name +
                "<br/> Brand:  " + snkObj.brand +
                "<br/> Stock:  " + snkObj.stock +
                "<br/> Wholesale Price: " + formatCurrency(snkObj.wsPrice) +
                "<br/> Retail Price:  " + formatCurrency(snkObj.rPrice) +
                "<br/> Profit Margin:  " + formatCurrency(snkObj.getProfitMargin()) +
                "<br/> Model Number:  " + modelNumber +
                "<br/> 5 star Rating:  " + rating +
                "<div><br/> <img  src = '" + snkObj.imagePath + "'></div><br/>";


    };

    

    var log = function () {             // Private log function
        console.log("Sneaker Information" + snkObj.Id);
        console.log("Name " + snkObj.name);
        console.log("Brand " + snkObj.brand);
        console.log("Stock " + snkObj.stock);
        console.log("Wholesale Price " + snkObj.wsPrice);
        console.log("Retail Price " + snkObj.rPrice);
        console.log("Model Number " + modelNumber);
        console.log("5 Star Rating " + rating);
        console.log("Image Path 1 " + snkObj.imagePath1);
        console.log("Image Path 2 " + snkObj.imagePath2);
    };


    function formatCurrency(num) {  // private function to format currency
        return num.toLocaleString("en-US", {style: "currency", currency: "USD", minimumFractionDigits: 2});
    }

    /* Rest of the functions are public */
    snkObj.setName = function (newName) {

        snkObj.name = newName;
        display(); // show updated property on the page


    };

    snkObj.setBrand = function (newBrand) {
        snkObj.brand = newBrand;
        display(); // show updated property on the page
    };


    snkObj.setStock = function (newStock) {
        snkObj.stock = newStock; //-1 means not set
        display(); // show updated property on the page
    };

    snkObj.setWsPrice = function (NewWsPrice) {
        snkObj.wsPrice = parseInt(NewWsPrice);
        display(); // show updated salary on the page

    };

    snkObj.setRPrice = function (NewRPrice) {

        snkObj.rPrice = parseInt(NewRPrice);


        display(); // show updated salary on the page
    };
    snkObj.getProfitMargin = function () {
        var profit = snkObj.rPrice - snkObj.wsPrice;

        return formatCurrency(profit);
    };
    
    snkObj.setStarRating = function (NewRating) {

        rating = NewRating ;

        display(); // show updated salary on the page
    };
    snkObj.setModelNumber = function (NewModelNum) {

        modelNumber = NewModelNum;
        display(); // show updated salary on the page
    };
    
    snkObj.geteDateOfMake = function() {
        var year  = modelNumber.substring(1, 4);
        return year;
    };
    
    snkObj.changeImgPaths = function(NewImgPath1, NewImgPath2) {
         snkObj.imagePath1 = NewImgPath1;
         snkObj.imagePath1 = NewImgPath2;
    };
    
    
    


    /* Event Listeners */

    snkObj.onmouseover = function () { //Increment salary by .10  on mouse over

        if (snkObj.imagePath != "pics/noPreview.png") {

            snkObj.imagePath = propertyObj.image_b_path;
            display(); // show updated salary on the page
        }

    };

    snkObj.onmouseout = function () { //Increment salary by .10  on mouse over

        if (snkObj.imagePath != "pics/noPreview.png") {
            snkObj.imagePath = propertyObj.image_a_path;  //default Image
            display(); // show updated salary on the page
        }
        alert(snkObj.imagePath);

    };




    display(); // show initial properties on the page 
    return snkObj;
}