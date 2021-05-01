function twoSneakers() {
    

    var mainDiv = document.createElement("div");
    mainDiv.classList.add("mainBox");

    /* Add Page Header */
    var h1 = document.createElement("h1");
    h1.innerHTML = "Sneaker Specs";
    mainDiv.appendChild(h1);

    var sneakerDiv = document.createElement("div");
    sneakerDiv.classList.add("sneakersBox");
    mainDiv.appendChild(sneakerDiv);
    var snk1Div = document.createElement("div");
    snk1Div.classList.add("sneaker_n");          // N could be 1,2,3 
    var snk2Div = document.createElement("div");
    snk2Div.classList.add("sneaker_n");
    sneakerDiv.appendChild(snk1Div);
    sneakerDiv.appendChild(snk2Div);

    //mainDiv.innerHTML = "Where arre you";



    var twoSneaksDOM = document.createElement("div");



    //mainDiv.appendChild(twoSneaksDOM);
    twoSneaksDOM.classList.add("sneakerPage");

    //twoSneaksDOM.appendChild(mainDiv);



    /* Initialize Objects ( 2 images are rewuired */
    var sneakerObjA = {};

    sneakerObjA.Id = 234;   // // Create first sneaker onject
    sneakerObjA.name = "Retro 11s";
    sneakerObjA.brand = "Jordans";
    sneakerObjA.stock = 224;
    sneakerObjA.wsPrice = 170;
    sneakerObjA.rPrice = 250;
    sneakerObjA.starRating = 4.9;
    sneakerObjA.modelNumber = "2019MBD";  // first 4 characters represent year of make
    sneakerObjA.image_a_path = "pics/retro11B.jpeg";
    sneakerObjA.image_b_path = "pics/retro11A.jpeg";


    var sneakerObjB = {};   // Create second sneaker onject

    sneakerObjB.Id = 233;
    sneakerObjB.name = "RB Foamposites ";
    sneakerObjB.brand = "Nike";
    sneakerObjB.stock = 521;
    sneakerObjB.wsPrice = 200;
    sneakerObjB.rPrice = 290;
    sneakerObjB.starRating = 4.5;
    sneakerObjB.modelNumber = "2016FET";
    sneakerObjB.image_a_path = "pics/foamsB.jpeg";
    sneakerObjB.image_b_path = "pics/foamsA.jpeg";

    /* Call Make function with initialized object A  */

    var mySneakerObjA = makeSneaker(sneakerObjA);
    mySneakerObjA.classList.add("sneakerDiv");
    snk1Div.appendChild(mySneakerObjA);

    /* Add Buttons and input space  */


    var buttonDiv = document.createElement("div");
    var setNameBtn = document.createElement("button");
    setNameBtn.innerHTML = "Change Name";
    buttonDiv.appendChild(setNameBtn);
    var setNameInput = document.createElement("input");
    buttonDiv.appendChild(setNameInput);
    snk1Div.appendChild(buttonDiv);


    var buttonDiv = document.createElement("div");
    var setBrandBtn = document.createElement("button");
    setBrandBtn.innerHTML = "Change Brand";
    buttonDiv.appendChild(setBrandBtn);
    var setBrandInput = document.createElement("input");
    buttonDiv.appendChild(setBrandInput);
    snk1Div.appendChild(buttonDiv);


    
    
    var buttonDiv = document.createElement("div");
    var setStockBtn = document.createElement("button");
    setStockBtn.innerHTML = "Change Stock Number";
    buttonDiv.appendChild(setStockBtn);
    var setStockInput = document.createElement("input");
    buttonDiv.appendChild(setStockInput);
    snk1Div.appendChild(buttonDiv);
    
    var buttonDiv = document.createElement("div");
    var setSRatingBtn = document.createElement("button");
    setSRatingBtn.innerHTML = "Change Star Rating";
    buttonDiv.appendChild(setSRatingBtn);
    var setSRatingInput = document.createElement("input");
    buttonDiv.appendChild(setSRatingInput);
    snk1Div.appendChild(buttonDiv);
    
    var buttonDiv = document.createElement("div");
    var setMNumberBtn = document.createElement("button");
    setMNumberBtn.innerHTML = "Change Model Number";
    buttonDiv.appendChild(setMNumberBtn);
    var setMNumberInput = document.createElement("input");
    buttonDiv.appendChild(setMNumberInput);
    snk1Div.appendChild(buttonDiv);

    //twoSneaksDOM.appendChild(mySneakerObjA);



    /* Event Listeners for object A   */

    setNameBtn.onclick = function () {
        mySneakerObjA.setName(setNameInput.value);
    };
    setBrandBtn.onclick = function () {
        mySneakerObjA.setBrand(setBrandInput.value);
    };
    setStockBtn.onclick = function () {
        mySneakerObjA.setStock(setStockInput.value);
    };
     setSRatingBtn.onclick = function () {
        mySneakerObjA.setStarRating(setSRatingInput.value);
    };
    
      setMNumberBtn.onclick = function () {
        mySneakerObjA.setModelNumber(setMNumberInput.value);
    };

    /* Call Make function with initialized object B  */

    var mySneakerObjB = makeSneaker(sneakerObjB);
    mySneakerObjB.classList.add("sneakerDiv");
    snk2Div.appendChild(mySneakerObjB);


    /* Add Buttons and input space  */

    var buttonDiv = document.createElement("div");
    var changeWspBtn = document.createElement("button");
    changeWspBtn.innerHTML = "Change Wholesale Price";
    buttonDiv.appendChild(changeWspBtn);
    var changeWspInput = document.createElement("input");
    buttonDiv.appendChild(changeWspInput);
    snk2Div.appendChild(buttonDiv);


    var buttonDiv = document.createElement("div");
    var changeRpBtn = document.createElement("button");
    changeRpBtn.innerHTML = "Change Retail Price";
    buttonDiv.appendChild(changeRpBtn);
    var changeRpInput = document.createElement("input");
    buttonDiv.appendChild(changeRpInput);
    snk2Div.appendChild(buttonDiv);
    
    var buttonDiv = document.createElement("div");
    var changePrimImgBtn = document.createElement("button");
    changePrimImgBtn.innerHTML = "Change Primary Path/Link";
    buttonDiv.appendChild(changePrimImgBtn);
    var changePrimImgInput= document.createElement("input");
    buttonDiv.appendChild(changePrimImgInput);
    snk2Div.appendChild(buttonDiv);
    
    var buttonDiv = document.createElement("div");
    var changeSecImgBtn = document.createElement("button");
    changeSecImgBtn.innerHTML = "Change Secondary Path/Link";
    buttonDiv.appendChild(changeSecImgBtn);
    var changeSecImgInput= document.createElement("input");
    buttonDiv.appendChild(changeSecImgInput);
    snk2Div.appendChild(buttonDiv);
    


    var userInstruc = document.createElement("div");
    userInstruc.innerHTML = "<br><b>User Instructions</b>" +
            "<ul>" +
            "<li>Mouse into the image to show the " +
            "second image and mouse  out to return to the first image. Default 'no preview' image " +
            "doesn't change if no image paths are initialized  in the  sneaaker parameter object initialization</li>" +
            "<li>If you change the secondary image you need to mouse in to see you change because the primary is what you see when  no events occur</li>" +
            "<li>Input values in the input fields to be used by buttons.Button functions can be read from the button's text</li>" +
            "</ul>";
    //buttonDiv.innerHTML = " Profit Margin: ";
    // buttonDiv.appendChild(setStockBtn);
    //var setStockInput = document.createElement("input");
    //buttonDiv.appendChild(setStockInput);
    mainDiv.appendChild(userInstruc);


    /* Event Listeners for object B   */

    changeWspBtn.onclick = function () {
        mySneakerObjB.setWsPrice(changeWspInput.value);

    };
    changeRpBtn.onclick = function () {
        mySneakerObjB.setRPrice(changeRpInput.value);
    };
    changePrimImgBtn.onclick = function () {
        mySneakerObjB.changeImgPath1(changePrimImgInput.value);
    };
    
    changeSecImgBtn.onclick = function () {
        mySneakerObjB.changeImgPath2(changeSecImgInput.value);
    };



    /*  
     var yourSneakerButton = document.createElement("button");
     yourSneakerButton.innerHTML = "Change Name";
     twoSneaksDOM.appendChild(yourSneakerButton);
     
     var yourSneakerInput = document.createElement("input");
     twoSneaksDOM.appendChild(yourSneakerInput);
     
     yourSneakerButton.onclick = function () {
     yourSneakerObj.setName(yourSneakerInput.value);
     };
     
     */

    return mainDiv;
}


