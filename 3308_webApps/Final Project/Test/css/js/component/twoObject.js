/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//appendChild() method appends a node as the last child of a node.
function twoObject(){
    "use strict";
    var avatar = [];
    avatar["aang"] = {
                name: "Aang",
                tribe: "Air Nation",
                description: "Avatar Aang was the last airbender during his time, \n\
                                                        he was the only airbender due to the fire nation\n\
                                                        killing off his tribe.</br>",
                img: "pics/aang.jpg"
                };
    avatar["korra"] = {
                name: "Korra",
                tribe: "Water Nation",
                description: "Avatar Korra was born after Avatar Aang, she was known for connecting the their world and \n\
                                the spirit world. She has also accidentally converted non-bender into airbenders.</br>",
                img: "pics/korra.jpg"
                      };
    avatar["wan"] = {
                name: "Wan",
                tribe: "Fire Nation",
                description: "Avatar Wan was the first avatar. He gain his four elements by the four great lion turtles.\n\
                                Once he gain all four elements with the help of his traveling spirit Raava, later on he merged \n\
                                with the spirit and gain the ability of resurrection... Starting the avatar chain.</br>",
                img: "pics/wan.jpg"
                      }
                      
//    avatar["customAvatar"] = {
//                name: "___",
//                tribe: "___",
//                description: "Enter a Text describing your new Avatar!",
//                img: "pics/Avatars.jpg"
//                      };

    var content = `
    
        <h3>This section of my site will be my JS Object </h3>
    `;
    var twoAvatarDOM = document.createElement("div"); // create div that will hold two object
    twoAvatarDOM.innerHTML = content;
    
    /*
     * Creating Avatar
     */
    var myAvatarObj = MakeAvatar(avatar);
    myAvatarObj.classList.add("avatarStyle");
    twoAvatarDOM.appendChild(myAvatarObj);
    
    /*
     * Creating a div for Avatars;
     */
    
    //Add a button that will change the Avatar
    //var style = document.createElement("div");
    
    myAvatarObj.appendChild(document.createElement("br"));
    var avatarButton = document.createElement("button");
    
    //style.appendChild(avatarButton);
    
    avatarButton.innerHTML = "Change Avatar between Aang, Korra, or Wan: ";
    myAvatarObj.appendChild(avatarButton);
    
    //Add an input text that sync with the button
    var avatarInput = document.createElement("input");
    //style.appendChild(avatarInput);
    //myAvatarObj.appendChild(style);
    myAvatarObj.appendChild(avatarInput);
    
    avatarButton.onclick = function(){
        myAvatarObj.setName(avatarInput.value);
        myAvatarObj.appendChild(avatarButton);
        myAvatarObj.appendChild(avatarInput);
    };
    
    /*
     * Creating custom Avatar
     */
    var yourAvatarObj = MakeAvatar(null);
    yourAvatarObj.classList.add("avatarStyle");
    twoAvatarDOM.appendChild(yourAvatarObj);
    /*
     * Creating a div for custom Avatars;
     */
    yourAvatarObj.appendChild(document.createElement("br"));
    
    var yourAvatarNameButton = document.createElement("button");
    yourAvatarNameButton.innerHTML = "Add/Change Name";
    var yourAvatarTribeButton = document.createElement("button");
    yourAvatarTribeButton.innerHTML = "Add/Change Tribe";
    var yourAvatarDescriptionButton = document.createElement("button");
    yourAvatarDescriptionButton.innerHTML = "Add/Change Desciption";
    
    //Add a button that will change the Avatar
    yourAvatarObj.appendChild(yourAvatarNameButton);
    yourAvatarObj.appendChild(yourAvatarTribeButton);
    yourAvatarObj.appendChild(yourAvatarDescriptionButton);
    
    //Add an input text that sync with the button
    var avatarNameInput = document.createElement("input");
    yourAvatarObj.appendChild(avatarNameInput);
    var avatarTribeInput = document.createElement("input");
    yourAvatarObj.appendChild(avatarTribeInput);
    var avatarDescriptionInput = document.createElement("input");
    yourAvatarObj.appendChild(avatarDescriptionInput)
//    yourAvatarObj.appendChild(avatarNameInput);
//    yourAvatarObj.appendChild(avatarTribeInput);
//    yourAvatarObj.appendChild(avatarDescriptionInput);
//    
    yourAvatarNameButton.onclick = function(){
        yourAvatarObj.setCustomName(avatarNameInput.value);
        yourAvatarObj.appendChild(yourAvatarNameButton);
        yourAvatarObj.appendChild(yourAvatarTribeButton);
        yourAvatarObj.appendChild(yourAvatarDescriptionButton);
        yourAvatarObj.appendChild(avatarNameInput);
        yourAvatarObj.appendChild(avatarTribeInput);
        yourAvatarObj.appendChild(avatarDescriptionInput)
    };
    yourAvatarTribeButton.onclick = function(){
        yourAvatarObj.setCustomTribe(avatarTribeInput.value);
        yourAvatarObj.appendChild(yourAvatarNameButton);
        yourAvatarObj.appendChild(yourAvatarTribeButton);
        yourAvatarObj.appendChild(yourAvatarDescriptionButton);
        yourAvatarObj.appendChild(avatarNameInput);
        yourAvatarObj.appendChild(avatarTribeInput);
        yourAvatarObj.appendChild(avatarDescriptionInput)
    };
    yourAvatarDescriptionButton.onclick = function(){
        yourAvatarObj.setCustomDescription(avatarDescriptionInput.value);
        yourAvatarObj.appendChild(yourAvatarNameButton);
        yourAvatarObj.appendChild(yourAvatarTribeButton);
        yourAvatarObj.appendChild(yourAvatarDescriptionButton);
        yourAvatarObj.appendChild(avatarNameInput);
        yourAvatarObj.appendChild(avatarTribeInput);
        yourAvatarObj.appendChild(avatarDescriptionInput)
    };
    
    
    
    return twoAvatarDOM;    

}
