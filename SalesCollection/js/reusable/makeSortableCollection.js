
function makeSortableCollection(mainObj) {
    addNewProdProperties();                    /* Add any new requested proprties using, sttributes from the mainObj.newProdPropertiesColl new product property collection **/


    var productDisplay = document.createElement("div");
    productDisplay.classList.add("productDisplay");


    //Header Implant
    var headerDiv = document.createElement("div");
    headerDiv.classList.add("headerDiv");
    var h1 = document.createElement("h1");
    h1.innerHTML = mainObj.title;
    headerDiv.appendChild(h1);
    productDisplay.appendChild(headerDiv);

    productDisplay.changeTitle = function (newTitle) {  /* Required public method */
        h1.innerHTML = newTitle;
    };//setNew Title; 

    var newWidth = null;
    var newHeight = null;        /* Allows this function to remember the set widths, incase the HTML CODER specifies one via the public method */

    productDisplay.setImgDimensions = function (width, height) {  /* Required public method */
        newWidth = width;
        newHeight = height;
        var imgList = productDisplay.querySelectorAll("img.collectionImage");  /*Get all images with that class name*/
        for (var i = 0; i < imgList.length; i++) {
            imgList[i].style.width = width;
            imgList[i].style.height = height;

        }
        ;

    };



    //Sort Div Implant
    productDisplay.appendChild(makeSortHeaderDiv(mainObj.sortPhrase, mainObj.sortPropertyAliases));

    var sortAliasesObj = mainObj.sortPropertyAliases;                                                             /* Object that contains sort aliases for UI*/
    var firstObjKey = Object.keys(sortAliasesObj)[0];
    productDisplay.appendChild(buildCollection(firstObjKey, sortAliasesObj[firstObjKey][1]));                           /* Use first propert in aliases as default sort proprty*/


    return productDisplay;


    /* End of Helper Functions */

    function customJsSort(objList, sortProperty, sortOrder) {   /* Custom jsSort that sorts based if the propert id a string or a number */

        objList.sort(function (a, b) {
            if (typeof a[sortProperty] === "string") {   /* Different Computation for string properties (redefining each return value based on what you want(smaller string)*/
                var item1 = a[sortProperty].toLowerCase();
                var item2 = b[sortProperty].toLowerCase();

                if (item1 < item2) {
                    if (sortOrder === "ascending") {
                        return -1;
                    } else {
                        return 1;
                    }

                }
                if (item1 > item2) {
                    if (sortOrder === "ascending") {
                        return 1;
                    } else {
                        return -1;
                    }
                }
                return 0;
            }
            if (typeof a[sortProperty] === "number") {  /*Numeric poperty  sorts*/
                if (sortOrder === "ascending") {

                    return a[sortProperty] - b[sortProperty];
                } else {

                    return b[sortProperty] - a[sortProperty];
                }

            }
        });
        return objList;
    } //custom js Sort

    function makeSortHeaderDiv(sortPhrase, propAliasObj) {  //returns collection header with sort options   

        var div = document.createElement("div");
        div.classList.add("sortDiv");              //css class to edit sort div 
        var span = document.createElement("span");
        span.innerHTML = sortPhrase;
        span.append("\u00A0"); /*add  one character of whitespace*/
        span.classList.add("sortPhrase");            //css class to edit sort phrase 
        div.appendChild(span);
        var select = document.createElement("select");
        select.classList.add("dropdown");
        select.onchange = function () {
            //customJsSort(mainObj)

            //alert(this.parentNode.nextSibling.className) ;
            productDisplay.removeChild(this.parentNode.nextSibling);  /*Remove Current appropriate Product collection and append new one*/
            var sortAliasesObj1 = mainObj.sortPropertyAliases;  /*Get alias object to get sort order*/

            productDisplay.appendChild(buildCollection(select.value, sortAliasesObj1[select.value][1]));

            if (newWidth !== null && newHeight !== null) {            /*Only change image sizes if caller tweaked image size and also after the collection was appended to productDisplay */
                productDisplay.setImgDimensions(newWidth, newHeight);

            }

        };

        for (var props in propAliasObj) {
            var option = document.createElement("option");
            option.value = props;
            option.text = propAliasObj[props][0];
            select.appendChild(option);
        }
        div.appendChild(select);

        return div;
    }//makeSortDiv 




    function makeImgColorCirclesDiv(imagesObj) {   


        var div = document.createElement("div");
        div.classList.add("imageCircleDiv");

        //Image
        var img = document.createElement("img");
        img.classList.add("collectionImage");
        img.src = imagesObj[Object.keys(imagesObj)[0]];
        div.appendChild(img);

        //Color Circles Div
        var circlesDiv = document.createElement("div");
        circlesDiv.classList.add("colorCirclesDiv");

        for (var color in imagesObj) {  //iterate through image object, the key is color and property is the image URL
            var span = document.createElement("span");
            span.productURL = imagesObj[color];
            span.style.backgroundColor = color; // Color set to that of given color in imageObj
            span.classList.add("circle");  //Css to shape and sircles
            span.onclick = function () {
                img.src = this.productURL;

                let children = this.parentNode.childNodes;
                //children.style.border = "solid black";
                for (var i = 0; i < children.length; i++) {
                    children[i].style.border = "solid black";
                }

                this.style.border = "0.2rem solid #e0e3de";
            };
            span.onmouseover = function () {
                //this.style.border = "thick solid #e0e3de";
            };
            span.onmouseout = function () {
                //this.style.border = "solid black";
            };

            circlesDiv.appendChild(span);

        }
        div.appendChild(circlesDiv);

        return div;


    } //makeImgColorCirclesDiv

    function  makePriceDiv(price, locale, currency) {  //format prce by (currency and localestring) and alter color and size

        var currencyObj = {
            style: "currency",
            currency: currency
        };

        var div = document.createElement("div");
        var price1 = price.toLocaleString(locale, currencyObj);
        var formattedPrice = price1.replace('.00', '');
        div.innerHTML = formattedPrice; /* Remove .00 in cases where the price is a whole number */
        div.classList.add("prices");


        return div;

    } //makePriceDiv

    function makeNumericDiv(num) {

        var div = document.createElement("div");
        div.classList.add("numerics");
        div.innerHTML = num;


        return div;

    } //makeNumberDiv


    function makeStarReviewsDiv(rating, numReviews) {  //returns div with 5 star reviews 

        var div = document.createElement("div");
        div.classList.add("rating");
        var span = document.createElement("span");
        span.innerHTML = "Reviews";
        span.append("\u00A0"); /*add  one character of whitespace*/
        div.appendChild(span);

        var numStars = parseInt(rating, 10);
        for (var i = 0; i < 5; i++) {  //add yellow stars for the first parsed rating
            if (i < numStars) {
                var span = document.createElement("span");
                span.classList.add("fa");
                span.classList.add("fa-star");
                span.classList.add("checked"); //Checked stars css available in css document    
                div.appendChild(span);
            } else {
                var span = document.createElement("span");
                span.classList.add("fa");
                span.classList.add("fa-star");
                span.classList.add("unchecked"); //unchecked stars css available in css document
                div.appendChild(span);
            }
        }

        var span = document.createElement("span");
        span.innerHTML = " (" + numReviews + ")";   // Add number of reviews in paranthesis
        div.appendChild(span);

        return div;

    } //makeStarReviewsDiv

    function makeTextDiv(text) {  //returns div with Text

        var div = document.createElement("div");
        div.innerHTML = text;
        return div;

    }//makeTextDiv

    function makeButtonDiv(buttonText) {  //returns div button 

        var div = document.createElement("div");
        div.classList.add("collectionButtonDiv");   //css class to edit button div
        var button = document.createElement("button");
        button.classList.add("collectionButton");  //css class to edit button 
        button.innerHTML = buttonText;
        div.appendChild(button);


        return div;

    }//makeButtonDiv

    /* End of Helper Functions */



    /* Start of UI Building Functions */

    function addNewProdProperties() {                            /* Add new properties from new property collection   to each product object */

        var prodCol = mainObj.productCollection;
        var propCol = mainObj.newProductPropColl;


        if (typeof propCol === "object") {  //The propery is optional so only returning objects are handled

            for (var i = 0; i < prodCol.length; i++) {
                for (var j = 0; j < propCol.length; j++) {

                    var appropriateParams = [];                                  /* reset appropriate new function array paremeter values. Red comments below to get a better undeerstanding */

                    for (var k = 0; k < propCol[j]["funcParameters"].length; k++) {  /*Make sure the new Poperty object function array parameter strings  reference existing 
                     product Object property  and not just the string  */

                        appropriateParams[k] = prodCol[i][propCol[j]["funcParameters"][k]]; /*fill appropriate params array with true, function array paramente*/
                        /*which is some set of existing product properties */


                    }
                    mainObj.productCollection[i][propCol[j]["prodPropName"]] = propCol[j]["propFunction"](appropriateParams);  /* Left Hand Side adds the property name to the 
                     *                                                                                                       product Object and  right Hand side runs input 
                     *                                                                                                       function with input array parameter and sets 
                     *                                                                                                       it as the value of  new product propery */

                }
            }
        } else {
            console.log("No new product properties specified");
        }

    }
    function setNumColums(hrzMarginSum, numColums) {
        return (((100) / numColums) - hrzMarginSum).toString() + "%";
    }


    function buildCollection(sortProperty, sortOrder) {



        //Sort Products collection according to collectionReqsObj's, product sortByProperty

        mainObj.productCollection = customJsSort(mainObj.productCollection, sortProperty, sortOrder);
        console.log("Sorted Collection");
        console.log(mainObj.productCollection);

        //Product Collection Implant
        var prodCollectionDiv = document.createElement("div");
        prodCollectionDiv.classList.add("productCollectionDiv");



        for (var i = 0; i < mainObj.productCollection.length; i++) {

            var productObj = mainObj.productCollection[i];
            var prodObjDiv = document.createElement("div");
            prodObjDiv.classList.add("productObjDiv");


            //Product Images and Color 
            prodObjDiv.appendChild(makeImgColorCirclesDiv(productObj.images));

            //Product Name
            var tempDiv = document.createElement("div");
            ; //Temp Div to hold returning divs and add classes
            tempDiv = makeTextDiv(productObj.productName);
            tempDiv.classList.add("productName");
            prodObjDiv.appendChild(tempDiv);

            //Stock
            var tempDiv = document.createElement("div");
            ; //Temp Div to hold returning divs and add classes
            tempDiv = makeTextDiv("Stock (" + productObj.stock + ")");
            tempDiv.classList.add("stock");
            prodObjDiv.appendChild(tempDiv);

            //Price
            prodObjDiv.appendChild(makePriceDiv(productObj.wholesalePrice, mainObj.locale, mainObj.currency));





            //Button
            prodObjDiv.appendChild(makeButtonDiv("Add to Cart"));

            //Reviews
            prodObjDiv.appendChild(makeStarReviewsDiv(productObj.rating, productObj.numReviews));
            prodObjDiv.style.width = setNumColums(mainObj.hrzMarginSum, mainObj.numColums); /* Set product  width and margins according to inpput */
            prodCollectionDiv.appendChild(prodObjDiv);

        }


        return prodCollectionDiv;
    }

}
;

