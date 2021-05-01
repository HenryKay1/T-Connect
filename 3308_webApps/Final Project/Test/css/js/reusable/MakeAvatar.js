/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function MakeAvatar(params){
    var avatarObj = document.createElement("div");
    var avatarImg = document.createElement("img");
    var customAvatar = {
                name: "___",
                tribe: "___",
                description: "Enter a Text describing your new Avatar!",
                img: "pics/avatars.jpg"
    };
                     
    
//    var avatarName = params.name;
//    console.log('avatar name:', avatarName);
//    console.log(params.avatar[avatarName]);
//            
//    avatarObj.avatar = params.avatar[avatarName].name; //Avatar Name
//    avatarObj.tribe = params.avatar[avatarName].tribe; //Which Nation was born
//    avatarObj.description = params.avatar[avatarName].description;
//    avatarImg.src = params.avatar[avatarName].img;
    

    if(params !== null){
        avatarObj.avatar = params["aang"].name; //Avatar Name
        avatarObj.tribe = params["aang"].tribe; //Which Nation was born
        avatarObj.description = params["aang"].description;
        avatarImg.src = params["aang"].img;
    }
    else {
        avatarObj.avatar = customAvatar.name; 
        avatarObj.tribe = customAvatar.tribe; 
        avatarObj.description = customAvatar.description; 
        avatarImg.src = customAvatar.img;
    }
   
      
    displayAvatar();
    
    //Private function
    function displayAvatar(){
        // make the current properties visible on the page
        avatarObj.innerHTML = "Avatar "+ avatarObj.avatar + ", native to the "+ avatarObj.tribe +" nation. " + 
                avatarObj.description;
        avatarObj.appendChild(avatarImg);
    };
    
    avatarObj.setName = function (newAvatar){
        if(newAvatar === "aang" || newAvatar === "Aang"){
            avatarObj.avatar = params["aang"].name; //Avatar Name
            avatarObj.tribe = params["aang"].tribe; //Which Nation was born
            avatarObj.description = params["aang"].description;
            avatarImg.src = params["aang"].img;
        }
        else if(newAvatar === "korra" || newAvatar === "Korra"){
            avatarObj.avatar = params["korra"].name; //Avatar Name
            avatarObj.tribe = params["korra"].tribe; //Which Nation was born
            avatarObj.description = params["korra"].description;
            avatarImg.src = params["korra"].img;
        }
        else if(newAvatar === "wan" || newAvatar === "Wan"){
            avatarObj.avatar = params["wan"].name; //Avatar Name
            avatarObj.tribe = params["wan"].tribe; //Which Nation was born
            avatarObj.description = params["wan"].description;
            avatarImg.src = params["wan"].img;
        }
        else{
            alert("This Avatar you entered does not exist, please only type Aang, Korra, or Wan.");
        }
        displayAvatar();
    };
    
    avatarObj.setCustomName = function(newName){
        avatarObj.avatar = newName;
        displayAvatar();
    };
    avatarObj.setCustomTribe = function(newTribe){
        avatarObj.tribe = newTribe;
        displayAvatar();
    };
    avatarObj.setCustomDescription = function(newDescription){
        avatarObj.description = newDescription;
        displayAvatar();
    };

    return avatarObj;
}
